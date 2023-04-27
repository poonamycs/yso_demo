<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Stage;
use App\Models\Attachment;
use App\Models\OrderStages;
use App\Models\OrderSubStages;
use App\Models\SalesTarget;
use App\Models\SETarget;
use App\Models\EquipmentType;
use App\Models\OrderEquipments;
use App\Models\Engineer;
use App\Models\Enquiry;
use App\Models\PaymentCashflow;
use App\Models\Notification;
use App\Exports\OrderBookingSheetExport;
use App\Exports\orderEquipReportExport;
use App\Exports\OBFSheet;
use App\Exports\OrderSheet;
use Dompdf\Dompdf;
use carbon\carbon;
use Carbon\CarbonPeriod;
use Auth;
use DB;
use PDF;
use File;
use Image;
use Excel;

use Dompdf\Options; 
use Dompdf\FontMetrics; 

class OrdersController extends Controller
{   
    // add new order
    public function addOrder(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
            
            $so = Order::where('so',$data['so'])->count();
            if($so != 0){
                return redirect()->back()->with('error_message','SO number already exist in system.');
            }

    		$order = new Order;
    		$order->so = $data['so'];
    		$order->client_name = $data['client_name'];
    		$order->po = $data['po'];
            $order->country = $data['country'];
    		$order->po_date = $data['po_date'];
            $order->delivery_date = $data['delivery_date'];
            $order->tpi = $data['tpi'];
            $order->order_size = $data['order_size'];
            $order->payment_terms = $data['payment_terms'];
            if(!empty($data['new_field_data'])){
                $order->new_field = json_encode($data['new_field_data']);
            }
            // print_r($order->new_field);die();
            // $order->po_amt = $data['po_amt'];
            // if(!empty($data['po_amt_received'])){
            //     $order->po_amt_received = $data['po_amt_received'];
            // }else{
            //     $order->po_amt_received = '0';
            // }

            if($data['country'] == 'India'){
                $order->tax = '18';
            }else{
                $order->tax = NULL;
            }
            $order->admin_id = Auth::id();
            $order->updated_by = Auth::id();

            if(!empty($data['tpi_agency'])){
                $order->tpi_agency = $data['tpi_agency'];
            }else{
                $order->tpi_agency = NULL;
            }

            if($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $filename = time() . '-' . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('attachments/');
                $file->move($destinationPath, $filename);
                $order->attachment = $filename;
            }

            $order->status = 'In Process';
            $order->region = $data['region'];
            $order->save();

            // get last added order id
            $order_id = DB::getPdo()->lastInsertId();

            foreach($data['equipment_type'] as $key => $val) {
                $equipment = new OrderEquipments;
                $equipment->order_id = $order_id;
                $equipment->equipment_type = $data['equipment_type'][$key];
                $equipment->equipment_name = $data['equipment_name'][$key];
                $equipment->mfr = $data['mfr'][$key];
                if(!empty($data['tag'][$key])){
                    $equipment->tag = $data['tag'][$key];
                }else{
                    $equipment->tag = NULL;
                }
                $equipment->save();

                $equipID = $equipment->id;
                $equipType = $val;
                $orderStages = Stage::where('equipment_name',$equipType)->get();
                foreach($orderStages as $stage){
                    OrderStages::insert([
                        'order_id'  =>$order_id,
                        'stage_id'  =>$stage->id,
                        'equip_id'  =>$equipID,
                        'stage_name'=>$stage->stage,
                        'status'    =>NULL,
                        'admin_id'  =>Auth::User()->id,
                        'created_at'=>date('Y-d-m h:i:s'),
                        'updated_at'=>NULL
                    ]);
                }

                $agitators = EquipmentType::where('agitator',1)->get();
                foreach($agitators as $agitator){
                    if($equipType==$agitator->equipment_type){
                        $agitatorStages = Stage::where(['equipment_name'=>'Agitator'])->get();
                        foreach($agitatorStages as $agstage){
                            OrderStages::insert([
                                'order_id'  =>$order_id,
                                'stage_id'  =>$agstage->id,
                                'equip_id'  =>$equipID,
                                'stage_name'=>'Agitator-'.$agstage->stage,
                                'status'    =>NULL,
                                'admin_id'  =>Auth::User()->id,
                                'created_at'=>date('Y-d-m h:i:s'),
                                'updated_at'=>NULL
                            ]);
                        }
                    }
                }
            }

            foreach($data['payment_type'] as $key => $val) {
                DB::table('payment_cashflow')->insert(
                    array(
                        'order_id'      => $order_id, 
                        'payment_type'  => $data['payment_type'][$key], 
                        'amount'        => $data['amount'][$key],
                        'date'          => $data['date'][$key],
                        'created_at'    => date('Y-d-m h:i:s')
                    )
                );
            }

            $user = Admin::select('name','email')->find(Auth::id());
            $email = $user->email;
            $name = $user->name;
            $a_email = settings('admin_email');
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'customer_name'=>$data['client_name'],
            ];
            Mail::send('emails.new_order',$messageData,function($message) use($email, $a_email){
                $message->to($email)->cc($a_email)->subject('New Order Added');
            });

            return redirect('view-orders/In Process')->with('success_message','New order added successfully.');
    	}else{
	    	$data = Order::orderBy('created_at','DESC')->first();
	    	$year = date("Y");
            
	    	if(!empty($data->so)){
				$so_num = $data->so+1;
			}else{
				$so_num = 1;
			}

			if(!empty($data->mfr)){
				// $mfr_array = explode("-", $data->mfr);
                $mfr = $data->mfr;
                // dd($mfr_array);
				// $mfr_no = $mfr_array[3];
				// $mfr = $mfr_no+1;
                // $mfr = $mfr_no+1;
			}else{
				$mfr = 1;
			}

            $equipTypes = EquipmentType::get();
            $meta_title = 'Add New Order';
			return view('admin.order.add_order')->with(compact('so_num','year','mfr','equipTypes','meta_title'));
		}
    }

    // edit existing order
    public function editOrder(Request $request, $id){
        $id = base64_decode($id);
        if($request->isMethod('post')){
            $data = $request->all();
            
            $po_amt_recev = !empty($data['po_amt_received']) ? $data['po_amt_received'] : null;
            $j = 1;$k = 1;
            $item = ' ';
            $items = array();
            while($j < $request->count+1)
            { 
                $input = ['data' => [
                    '1' => $data['new_field_label'][$j],
                    '2' => $data['new_field_datatype'][$j],
                    '3' => $data['new_field_value'][$j]
                ]
                ];
                $j++;
                
                $item = json_encode($input);
                // if($request->new_field_data)
                // {
                //     $item[$k++] = $request->new_field_data;
                // }
                $items[$k++] = $item;
                
            }
            // dd($items);
            Order::where(['id'=>$id])
                ->update([
                    'admin_id'      => Auth::User()->id,
                    'po'            => $data['po'],
                    'client_name'   => $data['client_name'],
                    'po_date'       => $data['po_date'],
                    'delivery_date' => $data['delivery_date'],
                    'tpi'           => $data['tpi'],
                    'tpi_agency'    => $data['tpi_agency'],
                    'order_size'    => $data['order_size'],
                    'po_amt_received'=> $po_amt_recev,
                    'tax'           => $data['tax'],
                    'payment_terms' => $data['payment_terms'],
                    'new_field' => json_encode($items),
                    'updated_by'    => Auth::id()
                ]);

            foreach($data['equipment_name'] as $key => $val){
                // echo $data['order_equip_id'].' - ';
                OrderEquipments::where(['order_id'=>$id,'id'=>$data['order_equip_id']])->update([
                    'equipment_name'=> $data['equipment_name'][$key],
                    'mfr'           => $data['mfr'][$key],
                    'tag'           => $data['tag'][$key]
                ]);
            }

            foreach($data['equipment_type1'] as $key => $val) {
                if(!empty($data['equipment_type1'][$key])){
                    $orderEquip                 = new OrderEquipments;
                    $orderEquip->order_id       = $id;
                    $orderEquip->equipment_type = $data['equipment_type1'][$key];
                    $orderEquip->equipment_name = $data['equipment_name1'][$key];
                    $orderEquip->mfr            = $data['mfr1'][$key];
                    $orderEquip->tag            = $data['tag1'][$key];
                    $orderEquip->save();

                    $equipType = $val;
                    $orderStages = Stage::where('equipment_name',$equipType)->get();
                    foreach($orderStages as $stage){
                        OrderStages::insert([
                            'order_id'  =>$id,
                            'stage_id'  =>$stage->id,
                            'stage_name'=>$stage->stage,
                            'status'    =>'Pending',
                            'admin_id'  =>Auth::User()->id
                        ]);
                    }

                    $agitators = EquipmentType::where('agitator',1)->get();
                    foreach($agitators as $agitator){
                        if($equipType==$agitator->equipment_type){
                            $agitatorStages = Stage::where(['equipment_name'=>'Agitator'])->get();
                            foreach($agitatorStages as $stage){
                                OrderStages::insert([
                                    'order_id'  =>$id,
                                    'stage_id'  =>$stage->id,
                                    'stage_name'=>'Agitator-'.$stage->stage,
                                    'status'    =>'Pending',
                                    'admin_id'  =>Auth::User()->id
                                ]);
                            }
                        }
                    }
                }
            }
            return redirect()->back()->with('success_message','Order Updated Successfully.');
        }

        $order = Order::where(['id'=>$id])->first();
        $equipTypes = EquipmentType::get();
        $data = Order::orderBy('created_at','DESC')->first();
        $year = date("Y");
        // dd($data);
        if(!empty($data->so)){
            $so_num = $data->so+1;
        }else{
            $so_num = 1;
        }

        if(!empty($data->mfr)){
            // $mfr_array = explode("-", $data->mfr);
            $mfr = $data->mfr;
            // $mfr = $mfr_no+1;
        }else{
            $mfr = 1;
        }
        // dd($order);
        return view('admin.order.edit_order', compact('order','equipTypes','so_num','year','mfr'));
    }

    // view all orders status wise - In-Process|Completed
    public function viewOrders(Request $request, $status){
        $country = null;
        $assignee = null;
        $allOrders = Order::with('orderEquipments')->select('id','admin_id','delivery_date','so','client_name','status')->where(['status'=>$status])->orderBy('so', 'DESC');
        // if(Auth::user()->admin_role == 'Superadmin'){
        //     $allOrders = $allOrders;
        // }else{
        //     $allOrders = $allOrders->where('admin_id',Auth::id());            
        // }
        if($request->has('country') && $request->country != null){
            $allOrders = $allOrders->where('country',$request->country);
            $country = $request->country;
        }
        if($request->has('assignee1') && $request->assignee1 != null){
            $allOrders = $allOrders->where('admin_id',$request->assignee1);
            $assignee = $request->assignee1;
        }
        $allOrders = $allOrders->paginate(10);
        $meta_title = 'View '.$status.' Orders';
        return view('admin.order.view_order')->with(compact('allOrders','country','assignee','meta_title'));
    }
    public function orderViewReport(Request $request,$id1=null,$id2=null,$id3=null){
        if($id2 == null && $id3 == null)
        {
            $id = $id1;
        }
        else if($id3 == null)
        {
            $id = $id2;
        }
        else
        {
            $id = $id3; 
        }
        $allOrders = Order::with('orderEquipments')->select('id','admin_id','country','so','client_name','status','delivery_date','po_amt')->where('status','LIKE',"%".$id."%")->orderBy('so', 'DESC');        
        if($id2 != null){
            $allOrders = $allOrders->where('country','LIKE',"%".$id1."%")->orWhere('admin_id',$id1);
            $country = $id2;
        }
        if($id2 != null && $id3 !=null){
            $allOrders = $allOrders->where('country','LIKE',"%".$id2."%")->orWhere('admin_id',$id1);
            $assignee = $id1;
        }
        $allOrders = $allOrders->get();
        return Excel::download(new OrderSheet($allOrders),'Sales-Orders.xlsx');
        
    }
    // update order status
    public function updateOrderStatus(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        if($status == 'Completed'){
            Order::where('id',$id)->update(['status'=>$status,'completed_on'=>date('Y-d-m h:i:s')]);
        }else{
            Order::where('id',$id)->update(['status'=>$status,'completed_on'=>NULL]);
        }
        $statusHtml = $status.' <i class="icon ion-ios-arrow-down tx-11 mg-l-3">';
        return $statusHtml;
    }

    // single order detail ajax modal
    public function viewOrderModal(Request $request){
        $id = $request->input('id');
        $order = Order::select('admins.name','orders.*')->join('admins','admins.id','orders.updated_by')->where('orders.id',$id)->first();
        $modal = '<div class="modal-header">
                    <h6 class="modal-title">'.$order->client_name.' | SO ID <u>#'.$order->so.'</u></h6><button aria-label="Close" class="close"
                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <table class="mb-0 table table-borderless table-responsive">
                        <tbody>
                            <tr>
                                <th><i class="fa fa-angle-double-right"></i> SO Number</th>
                                <td>: '.$order->so.'</td>
                                <th><i class="fa fa-user"></i> Client Name</th>
                                <td>: '.$order->client_name.'</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-angle-double-right"></i> PO Number</th>
                                <td>: '.$order->po.'</td>
                                <th><i class="fa fa-calendar-alt"></i> PO Date</th>
                                <td>: '.date('D, d-M-Y', strtotime($order->po_date)).'</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-calendar-alt"></i> Delivery Date</th>
                                <td>: '.date('D, d-M-Y', strtotime($order->delivery_date)).'</td>
                                <th><i class="fa fa-angle-double-right"></i> TPI</th>
                                <td>: '.$order->tpi.'</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-angle-double-right"></i> Created At</th>
                                <td>: '.date('d M Y', strtotime($order->created_at)).'</td>
                                <th><i class="fa fa-angle-double-right"></i> Last Updated</th>
                                <td>: '.date('d M Y', strtotime($order->updated_at)).', '.$order->name.'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body pt-0">
                    <button id="copy_btn" type="button" value="copy" class="btn btn-primary mb-2 btn-sm"><i class="fa fa-copy"></i> Copy Table</button>
                    <table class="mb-0 table table-bordered" id="resultsTable">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Equipment Type</th>
                                <th>Equipment Name</th>
                                <th>MFR No.</th>
                                <th>Tag No.</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $i=1;
                            $orders = OrderEquipments::where(['order_id'=>$id])->get();
                            foreach($orders as $row){
                $modal .= '<tr>
                                <td>'.$i.'</td>
                                <td>'.$row->equipment_type.'</td>
                                <td>'.$row->equipment_name.'</td>
                                <td>'.$row->mfr.'</td>
                                <td>'.$row->tag.'</td>
                            </tr>';
                            $i++;
                            }
            $modal .= '</tbody>
                    </table>
                </div>
                <script>
                    var copyBtn = document.querySelector("#copy_btn");
                    copyBtn.addEventListener("click", function () {
                        var urlField = document.querySelector("#resultsTable");
                       
                        var range = document.createRange();  
                        range.selectNode(urlField);
                        window.getSelection().addRange(range);
                       
                        document.execCommand("copy");
                    }, false);
                </script>
                ';
        return $modal;
    }

    public function updateOrderAssignee(Request $request){
        $user_id = $request->input('user_id');
        $order_id = $request->input('order_id');
        Order::where('id',$order_id)->update(['admin_id'=>$user_id,'updated_by'=>Auth::id()]);
    }

    // view single order payment cashflow 
    public function viewOrderPaymentCashflow(Request $request){
        $order_id = $request->input('id');
        $cashflows = PaymentCashflow::where('order_id',$order_id)->get();
        $modal = '<div class="modal-header">
                    <h6 class="modal-title">Payment Cashflow</u></h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="">
                    <div class="card-body">
                        <table class="mb-0 table table-bordered" id="resultsTable">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Payment Type</th>
                                    <th>Amount</th>
                                    <th>Paymnet to be received on</th>
                                </tr>
                            </thead>
                            <tbody>';
                                $i = 1;
                                foreach($cashflows as $row){
                    $modal .= '<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$row->payment_type.'</td>
                                    <td>'.$row->amount.'</td>
                                    <td>'.date('d M Y', strtotime($row->date)).'</td>
                                </tr>';
                            $i++;
                            }
            $modal .= '</tbody>
                    </table>
                </div>';
        return $modal;
    }

    // single order payment cashflow details page
    public function PaymentCashflow(Request $request, $id){
        $orderDetails = Order::find(base64_decode($id));
        $paymentDetails = PaymentCashflow::select('payment_cashflow.*','admins.name')
                        ->leftJoin('admins','payment_cashflow.updated_by','admins.id')
                        ->orderBy('payment_cashflow.date','ASC')
                        ->where('payment_cashflow.order_id',base64_decode($id))
                        ->get();
        $totalReceived = PaymentCashflow::where(['order_id'=>base64_decode($id),'status'=>'1'])->sum('amount');
        // dd($paymentDetails);
        $meta_title = $orderDetails->client_name .' | Payment Cycles';
        return view('admin.payment.payment_cashflow', compact('paymentDetails','orderDetails','totalReceived','meta_title'));
    }

    // single order payment cashflow details page
    public function PaymentTracker(Request $request){
        $name = null;
        $clients = Order::with('AmendmentPayments','paidpaymentcycles');
        if($request->name != null){
            $clients = $clients->where('client_name', 'LIKE',"%".$request->name."%")->orWhere('po_amt',$request->name)->orWhere('order_size',$request->name);
            $name = $request->name;
        }
        $clients = $clients->paginate(10);
        $meta_title = 'Payment Tracker';
        return view('admin.payment.payment_tracker', compact('clients','meta_title','name'));
    }

    // add more payment cycle
    public function addPaymentCycle(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            foreach($data['payment_type'] as $key => $val) {
                DB::table('payment_cashflow')->insert(
                    array(
                        'order_id'      => $id, 
                        'payment_type'  => $data['payment_type'][$key], 
                        'amount'        => $data['amount'][$key],
                        'date'          => $data['date'][$key],
                        'status'        => '0',
                        'updated_by'    => Auth::id(),
                        'created_at'    => date('Y-d-m h:i:s')
                    )
                );
            }

            Notification::insert([
                'title'     =>'New payment cycle added',
                'url'       =>'payment-cashflow/'.base64_encode($id),
                'admin_id'  =>Auth::id()
            ]);

            toast('Payment cycle added successfully','success');
            return redirect()->back();
        }
    }
    
    // view single payment cycle modal
    public function editPaymentCycleModal(Request $request){
        $id = $request->input('id');
        $cycleDetails = PaymentCashflow::where('id',$id)->first();
        if($cycleDetails->payment_type == "Amendment"){
            $amendment       = 'selected';
            $installment    = 'na';
        }elseif($cycleDetails->payment_type == "Installment"){
            $amendment       = 'na';
            $installment    = 'selected';
        }
        $modal = '<div class="modal-header">
                    <h6 class="modal-title">Edit Payment Cycle</u></h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="'.url("update-payment-cycle/".$cycleDetails->id).'" method="post" id="editcycle">'.csrf_field().'
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label required_field">Payment Type</label>
                                    <select class="form-select form-control form-control-lg" name="payment_type">
                                        <option value="Amendment" '.$amendment.'>Amendment</option>
                                        <option value="Installment" '.$installment.'>Installment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label required_field">Amount </label>
                                    <input type="number" name="amount" class="form-control" required value="'.$cycleDetails->amount.'" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label required_field">Date </i></label>
                                    <input type="date" name="date" class="form-control" required value="'.date('Y-m-d',strtotime($cycleDetails->date)).'" />
                                </div>
                            </div>                            
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label required_field">Remark </label>
                                    <textarea name="remark" class="form-control" required rows="2">'.$cycleDetails->remark.'</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>';
        return $modal;
    }
    
    // update payment terms
    public function updatePaymentTerms(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            Order::where('id',base64_decode($id))->update(['payment_terms'=>$data['payment_terms']]);
            toast('Payment terms updated successfully','success');
            return redirect()->back();
        }
    }
    
    // update single payment cycle
    public function updatePaymentCycle(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['remark'])){
                toast('Please enter remark','warning');
            }
            PaymentCashflow::where('id',$id)->update(['payment_type'=>$data['payment_type'],'amount'=>$data['amount'],'date'=>$data['date'],'remark'=>$data['remark'],'updated_by'=>Auth::id()]);
            toast('Payment cycle updated successfully','success');
            return redirect()->back();
        }
    }

    // delete selected payment cycle
    public function deletePaymentCycle(Request $request, $id){
        PaymentCashflow::where('id',$id)->delete();
        toast('Payment cycle removed successfully','success');
        return redirect()->back();
    }

    // update payment status Unpaid/paid
    public function updatePaymentStatus(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        // return $updateStatus;
        $updateStatus = PaymentCashflow::where(['id'=>$id])->update(['status'=>$status, 'admin_id'=>Auth::id()]);
        return 200;
    }

    // update po amount recived status
    public function updatePoAmountStatus(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        // return $status;
        $updateStatus = Order::where(['id'=>$id])->update(['po_amt_received'=>$status, 'admin_id'=>Auth::id()]);
        return 200;
    }

    // delete order
    public function deleteOrder(Request $request, $id){
        Order::where('id', $id)->delete();
    	return redirect()->back()->with('success_message','Order deleted successfully.');
    }

    // view all order stages equipment and order wise
    public function orderStages(Request $request, $equip_id, $equipment, $order_id){
        $order = Order::where(['id'=>$order_id])->first();
        $orderEquipments = OrderEquipments::where(['order_id'=>$order_id])->get();
        $orderEquipment = OrderEquipments::where(['order_id'=>$order_id,'id'=>$equip_id])->first();
        // $orderStages = OrderStages::select('order_stages.*','admins.name')->join('admins','order_stages.admin_id','admins.id')->where(['order_stages.order_id'=>$order->id,'order_stages.equip_id'=>request()->equip_id])->orderBy('order_stages.id','ASC');
        $status = null;
        $name = null;
        $department = null;
        if($request->name != null)
        {
        //     $orderStages =$orderStages->where('order_stages.stage_name','LIKE',"%".$name."%");
            $name = $request->name;
        }
        if($request->department != null)
        {
            $department = $request->department;
        }
        if($request->status != null)
        {
            $status = $request->status;
        }
        // if($request->status == "Pending")
        // {
        //     $orderStages =$orderStages->where('order_stages.status',"Pending");
        // }
        // if($request->status == "Skip")
        // {
        //     $orderStages =$orderStages->where('order_stages.status',"Skip");
        // }
        // if($request->status == "Completed")
        // {
        //     $orderStages =$orderStages->where('order_stages.status',"Completed");
        // }
        // $orderStages = $orderStages->get();
        $meta_title = $equipment. ' | ' . $order->client_name;
        return view('admin.order.order_stages')->with(compact('order','name','status','department','orderEquipments','orderEquipment','equipment','meta_title'));
    }

    public function deleteOrderStage(Request $request, $id){
        OrderStages::where(['id'=>base64_decode($id)])->delete();
        alert()->success('Order Stage deleted successfully','');
        return redirect()->back()->with('success_message','Order Stage deleted successfully!');
    }
    // update order stage status NA|Pending|Completed
    public function updateOrderStages(Request $request){
        $stage_id = $request->input('stage_id');
        $id = $request->input('id');
        $status = $request->input('status');

        if($status == 'Pending'){
            $started_at = date('Y-m-d H:i:s');
            $updateStatus = OrderStages::where(['stage_id'=>$stage_id, 'id'=>$id])->update(['status'=>$status, 'admin_id'=>Auth::User()->id,'started_at'=>$started_at,'updated_at'=>date('Y-m-d H:i:s')]);
        }elseif($status == 'Completed' || $status == 'Skip'){
            $completed_at = date('Y-m-d H:i:s');
            $updateStatus = OrderStages::where(['stage_id'=>$stage_id, 'id'=>$id])->update(['status'=>$status, 'admin_id'=>Auth::User()->id,'completed_at'=>$completed_at,'updated_at'=>date('Y-m-d H:i:s')]);
        }else{
            $status = NULL;
            $updateStatus = OrderStages::where(['stage_id'=>$stage_id, 'id'=>$id])->update(['status'=>$status,'admin_id'=>Auth::User()->id,'started_at'=>null,'completed_at'=>null,'updated_at'=>date('Y-m-d H:i:s')]);
        }

        if($updateStatus){
            return 200;
        }
    }
    public function updateOrderSubStages(Request $request){
        $sub_stage_id = $request->input('sub_stage');
        $status = $request->input('status');
        $ordersubstage = OrderSubStages::where(['sub_stage_id'=>$sub_stage_id])->first();
        if($ordersubstage == NULL)
        {
            OrderSubStages::insert([
                'order_id'  =>$request->order_sub_stage,
                'sub_stage_id' =>$sub_stage_id,
                'equip_id' =>$request->equip_sub_stage,
                'admin_id' =>Auth::User()->id,
                'started_at' => date('Y-d-m h:i:s'),
                'created_at'=> date('Y-d-m h:i:s'),
                'updated_at'=>NULL
            ]);
        }
        
        if($status == 'completed'){   
            $completed_at = date('Y-m-d H:i:s');
            $updateStatus = OrderSubStages::where(['sub_stage_id'=>$sub_stage_id])->update(['status'=>$status, 'admin_id'=>Auth::User()->id,'completed_at'=>$completed_at,'updated_at'=>date('Y-m-d H:i:s')]);
        }else{

            $status = NULL;
            $updateStatus = OrderSubStages::where(['sub_stage_id'=>$sub_stage_id])->update(['status'=>$status,'admin_id'=>Auth::User()->id,'started_at'=>null,'completed_at'=>null,'updated_at'=>date('Y-m-d H:i:s')]);
        }

        if($updateStatus){
            return 200;
        }
    }
    // generate equipment wise gantt report
    public function equipmentExcelReport(Request $request, $order_id, $equip_id){
        $order = Order::find($order_id);
        $orderEquipment = OrderEquipments::find($equip_id);
        $order_stages = OrderStages::select('order_stages.*','stages.days')->join('stages','stages.id','order_stages.stage_id')->where(['order_id'=>$order_id,'equip_id'=>$equip_id])->get();
        $max_delivery_date = OrderStages::select('order_stages.*','stages.days')->join('stages','stages.id','order_stages.stage_id')->where(['order_id'=>$order_id,'equip_id'=>$equip_id])->orderBy('completed_at','desc')->first();
        $stageday = 0;
        foreach($order_stages as $order_stage)
        {
            $stageday = $stageday+$order_stage->days;
        }
        
        // $orderCreatedDate = strtotime(date('Y-m-d', strtotime($order->created_at)));
        // print_r(date('Y-m-d', strtotime($order->created_at. " +4 days")));
        // print_r(strtotime(date('Y-m-d', strtotime($order->created_at. " +4 days"))));
        // print_r($orderCreatedDate+10);
        // dd($orderCreatedDate);
            // foreach($order_stages as $stage){
            //     if ($stage->started_at) {
            //         // echo "<pre>";print_r($stage->toArray()); die;
                    
            //         $tt = $order->toArray();
            //         $startDate = strtotime($stage->started_at);
            //         $endDate = strtotime($stage->completed_at);
            //         $datediff = $endDate - $startDate;
                    
            //         $days = round($datediff / (60 * 60 * 24));
                    
            //         for ($i = 1; $i <= $days; $i++) {
            //             echo date('Y-m-d', strtotime("+".$i." day", $startDate)).
            //             ' Color Yello'.'<br>';
            //         }
            //     }
            // }
            //     die('exit');



            //     $start_date = $stage->started_at;
            //     $start_date = date('d M Y', strtotime($start_date));
            //     // echo "<pre>";print_r(date('d M Y', strtotime($start_date)));
            //     $period = CarbonPeriod::create(Carbon::parse($order->created_at), Carbon::parse($max_delivery_date->completed_at)->addDay());
            //     foreach ($period as $date)
            //     {
            //         echo "<pre>";print_r(date('d M Y', strtotime($date)));
            //         $date = date('d M Y', strtotime($date));
            //         $result = strcmp($date,$start_date);
            //         // echo "<pre>";print_r($result);
            //         if($result == 0)
            //         {
            //             print_r("yes");
            //         }
            //         else
            //         {
            //             print_r("no");
            //         }
            //     }
            // }die();



        //         $result = strcmp($date1,$stage->started_at);
        //         echo "<pre>";print_r($result);
        //         if($result == 1)
        //         {
        //             echo "<pre>";print_r("yes");
        //         }
        //     }
        // }die();
        return Excel::download(new orderEquipReportExport($order,$order_stages,$orderEquipment,$max_delivery_date,$stageday),'Production Plan-'.$orderEquipment->equipment_type.' '.$orderEquipment->tag.'.xlsx');
    }

    // add order stage multiple attachments
    public function addAttachments(Request $request){
        // return $request->input('form_data');
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            if($request->hasFile('attachments')){
                $files = $request->file('attachments');

                foreach($files as $file){
                    $attachment = new Attachment;
                    // $attachments = $file->getClientOriginalName();
                    $attachments = time() . '-' . $file->getClientOriginalName();
                    $destinationPath = public_path('images/attachments/');
                    $file->move($destinationPath, $attachments);
                    $attachment->attachments=$attachments;

                    $attachment->order_id = $data['order_id'];
                    $attachment->stage_id = $data['stage_id'];
                    $attachment->admin_id = Auth::user()->id;
                    $attachment->save();
                }
            }
            toast('Stage Attachments added successfully','success');
            return redirect()->back();
        }
    }

    // view order stage, all attachments page - Old
    public function viewAttachments($order_id, $stage_id){
        $icons = [
            'pdf'  => 'pdf',
            'doc'  => 'word',
            'docx' => 'word',
            'xls'  => 'excel',
            'xlsx' => 'excel',
            'csv'  => 'excel',
            'ppt'  => 'powerpoint',
            'pptx' => 'powerpoint',
            'txt'  => 'text',
            'PNG'  => 'image',
            'JPG'  => 'image',
            'png'  => 'image',
            'jpg'  => 'image',
            'jpeg' => 'image',
            'zip'  => 'zip',
        ];
        $attachments = Attachment::where(['order_id'=>$order_id, 'stage_id'=>$stage_id])->get();
        // dd($attachments);
        $meta_title = 'Stage Attachments';
        return view('admin.stage.stage_attachments')->with(compact('attachments','icons','order_id','stage_id','meta_title'));
    }

    // view order stage, all attachments ajax modal
    public function getStageAttachments(Request $request){
        $order_id = $request->input('order_id');
        $stage_id = $request->input('stage_id');

        $icons = [
            'pdf'  => 'pdf',
            'doc'  => 'word',
            'docx' => 'word',
            'xls'  => 'excel',
            'xlsx' => 'excel',
            'csv'  => 'excel',
            'ppt'  => 'powerpoint',
            'pptx' => 'powerpoint',
            'txt'  => 'text',
            'PNG'  => 'image',
            'JPG'  => 'image',
            'png'  => 'image',
            'jpg'  => 'image',
            'jpeg' => 'image',
            'mp4'  => 'video',
            'zip'  => 'archive',
        ];

        // return $order_id;
        $attachments = Attachment::select('attachments.*','attachments.created_at as attachments.attachment_created_at','admins.name')
                        ->join('admins','attachments.admin_id','admins.id')
                        ->where(['attachments.order_id'=>$order_id,'attachments.stage_id'=>$stage_id])
                        ->get();

        $data = '<div class="modal-header pb-1 pt-2"> 
                    <h6 class="modal-title" style="margin-left: -1rem;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="test">Attachments ('.count($attachments).')</h6>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button> 
                </div>
                <div class="row row-sm">';
                if(count($attachments) > 0){
                    foreach($attachments as $row){
                    $extension = File::extension($row->attachments);
                    $filesize = round(filesize("images/attachments/".$row->attachments)/1024, 0);
                    $data .= '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-6 mt-2">
                                <div class="card">
                                    <div class="card-body h-100 p-0" style="object-fit: cover">
                                        <div class="pro-img-box" title="By: '.$row->name.' | On: '.date('d M Y', strtotime($row->created_at)).' ('.$row->created_at->diffForHumans().')">';
                                        $ext = array("jpeg", "jpg", "png");
                                        if(in_array($extension, $ext)){
                                            $data .= '<a href="../../../images/attachments/'.$row->attachments.'" target="_blank"><img class="img-resp" src="../../../images/attachments/'.$row->attachments.'" alt="attachment"></a>';
                                        }else{
                                            $data .= '<img class="img-resp" src="../../../images/attachment.png" alt="attachment">';
                                        }
                                        $data .= '</div>
                                        <div class="text-center pt-1">
                                            <h3 class="tx-12-f mb-1 mt-1 p-1"><i class="fa fa-file-'.$icons[$extension].'"></i><span title="'.$row->attachments.' | '.$filesize.'KB"> '.Str::limit($row->attachments, 15).' </span><i class="fa fa-info-circle" title="By: '.$row->name.' | On: '.date('d M Y', strtotime($row->created_at)).' ('.$row->created_at->diffForHumans().')"></i></h3>
                                            <div class="mb-1">
                                                <a href="../../../images/attachments/'.$row->attachments.'" class="btn btn-sm btn-outline-info" download><i class="fa fa-download"></i> Download</a>
                                                <button rel="'.$row->id.'" rel1="delete-attachment" class="btn btn-sm btn-outline-danger deleteBtn"><i class="fa fa-trash pt-1 pb-1"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }else{                        
                $data .= '<div class="col-md-12 col-sm-12 text-center mt-2">
                            <img src="../../../na.png" width="200">
                            <div class="text-center pt-1 mb-4 font-weight-bold">
                                Attachments not found.
                            </div>
                        </div>';
                    }
                $data .= '</div>';
        return $data;
    }

    // delete stage singlr attachment
    public function deleteAttachment(Request $request, $id){
        $attachmentFile = Attachment::where('id',$id)->first();
        $image_path  = 'images/attachments/';
        if(file_exists($image_path.$attachmentFile->attachments)){
            unlink('images/attachments/'.$attachmentFile->attachments);
        }
       Attachment::where('id',$id)->delete();
       return redirect()->back()->with('success_message','Stage attachment deleted');
    }

    // generate order report PDF with stage status, name
    public function orderReport(Request $request, $id){
        $order = Order::with('orderEquipments')->where('id',$id)->first();
        
        $pdf = PDF::loadView('report.order_report', compact('order'));
        
        // return $pdf->stream();
        return $pdf->stream("Report-SO-".$order->so."-".$order->client_name."-".date('dMY').".pdf");
        // return view('report.order_report')->with(compact('order'));
    }
    
    // delete specific equipment along with its attachments
    public function deleteEquipment($id){
        $order = Order::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Equipment removed from order.');
    }
    
    // delete payment cashflow cycle
    public function deletePaymentCashflow($id){
        $order = PaymentCashflow::where('id',$id)->delete();
        toast('Removed successfully','success');
        return redirect()->back();
    }

    // enter stage remark ajax submit button
    public function stageRemark(Request $request){
        $stage_id = $request->stage_id;
        $remark = $request->remark;
        // return $stage_id.' '.$remark;
        if(empty($remark)){
            $remark = NULL;
        }
        if($sql = OrderStages::where('id',$stage_id)->update(['remark'=>$remark])){
            return 200;
        }
    }

    public function OrderBookingSheet(Request $request,$fy=null){
        // $year = $fy ? $fy : (date('Y')-1);
        if($fy){
            $year = $fy;
        }else{
            $year = date('Y');
            $month = date('m');
            $year = ($month < 4) ? $year-1 : $year;
        }
        // dd($year);
        $q1 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime($year.'-04-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime($year.'-06-30')))->orderBy('orders.po_date','ASC')->get();

        $q2 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime($year.'-07-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime($year.'-09-30')))->orderBy('orders.po_date','ASC')->get();

        $q3 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime($year.'-10-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime($year.'-12-31')))->orderBy('orders.po_date','ASC')->get();

        $q4 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime(($year+1).'-01-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime(($year+1).'-03-31')))->orderBy('orders.po_date','ASC')->get();

        // $year = $fy ? $fy : date('Y');
        // $month = date('m');
        // if($month < 4){
        //     $year = $year-1;
        // }
        // $start_date = date('Y-m-d',strtotime(($year).'-04-01'));
        // $end_date = date('Y-m-d',strtotime(($year+1).'-03-31'));
        // $fyYear = array('start_date' => $start_date, 'end_date' => $end_date);

        // $orders = Order::select('so','client_name','region','country','description','order_size','po_date','delivery_date','name')
        //     ->leftJoin('admins','orders.admin_id','admins.id')
        //     ->orderBy('so','ASC')
        //     ->get();
        // for($i=3; $i<=12; $i++){
        //     $d = new \Carbon\Carbon('-'.$i.' months');
        //     $d1 = new \Carbon\Carbon('-'.$i.' months');
        //     $date = Carbon::now();
        //     $firstOfQuarter = $d->firstOfQuarter();
        //     $lastOfQuarter = $d1->lastOfQuarter();
        //     echo date('d M Y', strtotime($firstOfQuarter)).' | '. date('d M Y', strtotime($lastOfQuarter)); echo '<br>';
        //     $i=$i+2;
        // }

        $meta_title = 'Order Booking Sheet';
        return view('admin.order.view_order_booking_sheet', compact('meta_title','year','q1','q2','q3','q4'));
    }

    public function OBSExcelReport(Request $request,$fy=null){
        $year = $fy ? $fy : (date('Y')-1);
        $q1 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime($year.'-04-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime($year.'-06-30')))->orderBy('orders.po_date','ASC')->get();

        $q2 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime($year.'-07-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime($year.'-09-30')))->orderBy('orders.po_date','ASC')->get();

        $q3 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime($year.'-10-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime($year.'-12-31')))->orderBy('orders.po_date','ASC')->get();

        $q4 = Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')->Join('admins','orders.admin_id','admins.id')->whereDate('orders.po_date','>=',date('Y-m-d', strtotime(($year+1).'-01-01')))->whereDate('orders.po_date','<=',date('Y-m-d', strtotime(($year+1).'-03-31')))->orderBy('orders.po_date','ASC')->get();

        return Excel::download(new OrderBookingSheetExport($year,$q1,$q2,$q3,$q4),'Order Booking Sheet-'.$year.'.xlsx');
    }

    public function OBF(Request $request, $fy=null){
        if($fy){
            $fy = $fy;
            $year = $fy;
        }else{
            $year = date('Y');
            $month = date('m');
            $year = ($month < 4) ? $year-1 : $year;
            $fy = ($year).'-'.($year+1);
        }
        $temp = explode('-',$fy);

        // $start_date = date('Y-m-d',strtotime(($year).'-04-01'));
        // $end_date = date('Y-m-d',strtotime(($year+1).'-03-31'));
        // $fyYear = array('start_date' => $start_date, 'end_date' => $end_date);

        // $orders = Order::select('so','client_name','region','country','description','order_size','po_date','delivery_date','name')
        //     ->leftJoin('admins','orders.admin_id','admins.id')
        //     ->whereDate('orders.po_date','>=',$start_date)
        //     ->whereDate('orders.po_date','<=',$end_date)
        //     ->orderBy('orders.so','ASC')
        //     ->get();

        $target = SalesTarget::where('fy',$fy)->first();

        $q1 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-06-30')))->get();
        $saleq1 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[0].'-06-30')))->get();

        $q2 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-07-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-09-30')))->get();
        $saleq2 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[0].'-07-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[0].'-09-30')))->get();

        $q3 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-10-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-12-31')))->get();
        $saleq3 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-10-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-12-31')))->get();

        $q4 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[1].'-01-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->get();
        $saleq4 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[1].'-01-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->get();

        $targets = SalesTarget::where('fy',$fy)->orderBy('fy','DESC')->get();
        $setargets = SETarget::where('fy',$fy)->orderBy('fy','ASC')->get();
        $poAwaited = Enquiry::where('status','PO AWAITED')->whereDate('created_at','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('created_at','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->orderBy('created_at','DESC')->get();

        $col_q1 = ($q1->sum('order_size'))/100000;
        $col_q2 = ($q2->sum('order_size'))/100000;
        $col_q3 = ($q3->sum('order_size'))/100000;
        $col_q4 = ($q4->sum('order_size'))/100000;

        $col_saleq1 = ($saleq1->sum('order_size'))/100000;
        $col_saleq2 = ($saleq2->sum('order_size'))/100000;
        $col_saleq3 = ($saleq3->sum('order_size'))/100000;
        $col_saleq4 = ($saleq4->sum('order_size'))/100000;

        $meta_title = 'OBF';
        return view('admin.order.view_obf', compact('meta_title','col_q1','col_q2','col_q3','col_q4','col_saleq1','col_saleq2','col_saleq3','col_saleq4','fy','target','targets','setargets','q1','q2','q3','q4','saleq1','saleq2','saleq3','saleq4','poAwaited'));
    }

    public function OBFExcelReport(Request $request, $fy=null){
        if($fy){
            $fy = $fy;
            $year = $fy;
        }else{
            $year = date('Y');
            $month = date('m');
            $year = $month < 4 ? $year-1 : $year;
            $fy = ($year).'-'.($year+1);
        }
        $temp = explode('-',$fy);

        $target = SalesTarget::where('fy',$fy)->first();

        $q1 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-06-30')))->get();
        $saleq1 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[0].'-06-30')))->get();

        $q2 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-07-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-09-30')))->get();
        $saleq2 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[0].'-07-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[0].'-09-30')))->get();

        $q3 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-10-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-12-31')))->get();
        $saleq3 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-10-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-12-31')))->get();

        $q4 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[1].'-01-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->get();
        $saleq4 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[1].'-01-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->get();

        $targets = SalesTarget::where('fy',$fy)->orderBy('fy','DESC')->get();
        $setargets = SETarget::where('fy',$fy)->orderBy('fy','DESC')->get();
        $poAwaited = Enquiry::where('status','PO AWAITED')->whereDate('created_at','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('created_at','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->orderBy('created_at','DESC')->get();
        return Excel::download(new OBFSheet($fy,$target,$targets,$setargets,$q1,$q2,$q3,$q4,$saleq1,$saleq2,$saleq3,$saleq4,$poAwaited),'OBF Report-'.$fy.'.xlsx');
    }

    public function addFYTarget(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            // $temp = SalesTarget::where('fy',$data['fy'])->count();
            // if($temp > 0){
            //     return redirect()->back()->with('error_message','Sale Target set already for FY '.$data['fy']);
            // }

            $target = new SalesTarget;
            $target->fy = $data['fy'];
            $target->target = $data['bq1']+$data['bq2']+$data['bq3']+$data['bq4'];
            $target->btarget = json_encode([
                'bq1'=>$data['bq1'],
                'bq2'=>$data['bq2'],
                'bq3'=>$data['bq3'],
                'bq4'=>$data['bq4']
            ]);
            $target->starget = json_encode([
                'sq1'=>$data['sq1'],
                'sq2'=>$data['sq2'],
                'sq3'=>$data['sq3'],
                'sq4'=>$data['sq4']
            ]);
            $target->save();
            return redirect()->back();
        }
    }

    public function addSETarget(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            $target = new SETarget;
            $target->fy     = $data['fy'];
            $target->target = $data['target'];
            $target->region = request('region');
            $target->sengg  = request('sengg');
            $target->per    = request('per');
            $target->save();
            return redirect()->back()->with('success_message','Sales Engineer and Region target added successfully');
        }
    }

    public function deleteFYTarget(Request $request, $id=null){
        SalesTarget::where('id',$id)->delete();
        toast('FY Target removed successfully','success');
        return redirect()->back();   
    }

    public function deleteSETarget(Request $request, $id=null){
        SETarget::where('id',$id)->delete();
        toast('FY Sales Target removed successfully','success');
        return redirect()->back();   
    }
    public function addField(Request $request)
    {
        $input = [
            'data' => [
                '1' => $request->label,
                '2' => $request->datatype,
                '3' => $request->value
            ]
        ];
        $item = json_encode($input);
        return $item;
    }
}