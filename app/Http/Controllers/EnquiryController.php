<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Exports\EnquiryReportExport;
use Illuminate\Support\Arr;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\Enquiry;
use App\Models\Admin;
use App\Models\Engineer;
use carbon\carbon;
use Excel;
use Auth;
use DB;

class EnquiryController extends Controller
{   
    // add new enquiry
    Public function addEnquiry(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $enquiry = new Enquiry;
            $enquiry->qrn = $data['qrn'];
            $enquiry->enq_from = 'Direct';
            $enquiry->customer_name = $data['customer_name'];
            $enquiry->city = $data['city'];
            $enquiry->region = $data['region'];
            $enquiry->enq_date = $data['enq_date'];
            if(!empty($data['qte_date'])){
                $enquiry->qte_date = $data['qte_date'];
            }else{
                $enquiry->qte_date = NULL;
            }
            $enquiry->engineer = null;
            $enquiry->description = $data['description'];
            if(!empty($data['price'])){
                $enquiry->price = $data['price'];
            }else{
                $enquiry->price = NULL;
            }
            if(!empty($data['status'])){
                $enquiry->status = $data['status'];
            }else{
                $enquiry->status = NULL;
            }
            if(!empty($data['email'])){
                $enquiry->email = $data['email'];
            }else{
                $enquiry->email = NULL;
            }
            if(!empty($data['phone'])){
                $enquiry->phone = $data['phone'];
            }else{
                $enquiry->phone = NULL;
            }
            if(!empty($data['assignee'])){
                $enquiry->assignee = $data['assignee'];
            }else{
                $enquiry->assignee = Auth::id();
            }
            $enquiry->contact_person = $data['contact_person'];
            $enquiry->admin_id = Auth::id();
            $enquiry->save();
            return redirect('view-enquiry-logs')->with('success_message','New enquiry added successfully');
        }

        $qrnNo = Enquiry::where('enq_from','Direct')->orderBy('created_at','DESC')->first();
        if(!empty($qrnNo->qrn)){
            $split = explode('-',$qrnNo->qrn);
            $qrn = $split[1]+1;
        }else{
            $qrn = 6300;
        }
        
        $engineers = Engineer::where('status',1)->get();

        $meta_title = 'Add New Enquiry';
        return view('admin.enquiry.add_enquiry')->with(compact('qrn','engineers','meta_title'));
    }

    // edit existing enquiry
    public function editEnquiry(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            if(!empty($data['description'])){
                $description = $data['description'];
            }else{
                $description = '';
            }

            if(!empty($data['qte_date'])){
                $qte_date = $data['qte_date'];
            }else{
                $qte_date = NULL;
            }

            if(!empty($data['status'])){
                $status = $data['status'];
            }else{
                $status = NULL;
            }

            if(!empty($data['email'])){
                $email = $data['email'];
            }else{
                $email = NULL;
            }

            if(!empty($data['phone'])){
                $phone = $data['phone'];
            }else{
                $phone = NULL;
            }

            if(!empty($data['price'])){
                $price = $data['price'];
            }else{
                $price = NULL;
            }
            if(!empty($data['assignee'])){
                $assignee = $data['assignee'];
            }else{
                $assignee = NULL;
            }
            Enquiry::where(['id'=>$id])->update(['customer_name'=>$data['customer_name'],'city'=>$data['city'],'region'=>$data['region'],'enq_date'=>$data['enq_date'],'qte_date'=>$qte_date,'description'=>$description,'price'=>$price,'status'=>$status,'contact_person'=>$data['contact_person'],'email'=>$email,'phone'=>$phone,'assignee'=>$assignee]);
            return redirect()->back()->with('success_message','Enquiry details updated successfully.');
        }
        $row = Enquiry::find($id);
        $engineers = Engineer::where('status',1)->get();
        return view('admin.enquiry.edit_enquiry')->with(compact('row','engineers'));
    }

    // view manual enquiries
    public function ViewEnquiries(Request $request, $id=null){
        $city = null;
        $region = null;
        $enqstatus = null;
        $assignee = null;
        $labels = null;
        $source = null;
        
        $allEnq = Enquiry::with(['assignee_enq'])->select('admins.name','admins.email','enquiry.id','enquiry.enq_date','enquiry.qrn','enquiry.description','enquiry.customer_name','enquiry.phone','enquiry.created_at','enquiry.city','enquiry.region','enquiry.status','enquiry.enq_labels','enquiry.assignee')
                ->leftJoin('admins','enquiry.admin_id','admins.id')
                ->orderBy('id','DESC');

        // if(Auth::user()->admin_role == 'Superadmin'){
        //     $allEnq = Enquiry::select('admins.name','admins.email','enquiry.id','enquiry.description','enquiry.customer_name','enquiry.phone','enquiry.created_at','enquiry.city','enquiry.region','enquiry.status','enquiry.enq_labels','enquiry.assignee')
        //         ->leftJoin('admins','enquiry.admin_id','admins.id')
        //         ->orderBy('id','DESC');
        // }else{
        //     $allEnq = Enquiry::select('admins.name','admins.email','enquiry.id','enquiry.description','enquiry.customer_name','enquiry.phone','enquiry.created_at','enquiry.city','enquiry.region','enquiry.status','enquiry.enq_labels','enquiry.assignee')
        //         ->leftJoin('admins','enquiry.admin_id','admins.id')
        //         ->where('enquiry.assignee', Auth::id())
        //         ->orderBy('id','DESC');
        // }

        if($request->has('city') && $request->city != null){
            $allEnq = $allEnq->where('enquiry.city',$request->role_id);
            $city = $request->city;
        }
        if($request->status != null){
            $allEnq = $allEnq->where('enquiry.status',$request->status);
            $enqstatus = $request->status;
        }
        if($request->region != null){
            $allEnq = $allEnq->where('enquiry.region',$request->region);
            $region = $request->region;
        }
        if($request->assignee != null){
            $allEnq = $allEnq->where('enquiry.assignee',$request->assignee);
            $assignee = $request->assignee;
        }
        if($request->label != null){
            $allEnq = $allEnq->where('enq_labels','like', "%\"{$request->label}\"%");
            $labels = $request->label;
        }
        if($request->source != null){
            $allEnq = $allEnq->where('enq_from', $request->source);
            $source = $request->source;
        }
        if($request->search != null){
            $keyword = $request->search;
            $allEnq = $allEnq->where(function($query) use($keyword){
                $query->where('customer_name','like','%'.$keyword.'%')
                ->orWhere('city','like','%'.$keyword.'%')
                ->orWhere('description','like','%'.$keyword.'%')
                ->orWhere('contact_person','like','%'.$keyword.'%');
            });
        }
        // dd($allEnq);

        $allEnq = $allEnq->paginate(20);
        $status = Enquiry::select('status')->groupBy('status')->get();

        $enquiry = null;
        if(!empty($id)){
            $enquiry = Enquiry::find($id);
        }

        $alllabels = DB::table('enq_labels')->get();
        $meta_title = 'Enquiry Log Sheet';
        return view('admin.enquiry.view_enquiries')->with(compact('allEnq','alllabels','status','enquiry','city','region','enqstatus','assignee','labels','source','meta_title'));
    }
    public function import(Request $request){
        Excel::import(new ImportUser,$request->file('file')->store('files'));
        return redirect()->back()->with('success_message', 'File Imported Successfully');
    }
    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
    // add indiamart enquiry to YSO enquiry
    public function addIndiaMartEnquiry(Request $request){
        if($request->isMethod('post')){
            $rows = $request->all();
            foreach($rows['enquiries'] as $data){
                $enquiry = new Enquiry;
                $enquiry->qrn = json_decode($data)->UNIQUE_QUERY_ID;
                $enquiry->enq_from = 'IndiaMart';
                $cname = !empty(json_decode($data)->SENDER_COMPANY) ? json_decode($data)->SENDER_COMPANY : json_decode($data)->SENDER_NAME;
                $enquiry->customer_name = $cname;
                $enquiry->contact_person = json_decode($data)->SENDER_NAME;
                $enquiry->email = json_decode($data)->SENDER_EMAIL;
                $enquiry->phone = json_decode($data)->SENDER_MOBILE;
                $enquiry->city = json_decode($data)->SENDER_CITY;
                $enquiry->region = json_decode($data)->SENDER_STATE;
                $enquiry->enq_date = date('Y-m-d', strtotime(json_decode($data)->QUERY_TIME));
                $enquiry->description = json_decode($data)->QUERY_MESSAGE;
                $enquiry->address = json_decode($data)->SENDER_ADDRESS;
                $enquiry->admin_id = Auth::id();
                $enquiry->assignee = Auth::id();
                $enquiry->save();
            }

            $user = Admin::select('name','email')->find(Auth::id());
            $email = $user->email;
            $name = $user->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'customer_name'=>json_decode($data)->SENDER_NAME,
            ];
            Mail::send('emails.assign_enquiry',$messageData,function($message) use($email){
                $message->to($email)->subject('Enquiry Assign');
            });

            toast('IndiaMart enquiry added successfully','success');
            return redirect('view-enquiry-logs');
        }
    }

    public function ViewIndiaMartEnquiries(){
        if(empty(settings('indiamart_api'))){
            return redirect()->back()->with('error_message','Please enter IndiaMart API to view IndiaMart enquiries.');
        }

        $api = explode('-', settings('indiamart_api'));
        $API_url = "https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key=".$api[1]."&start_time=".date('d-M-Y', strtotime('-5 days'))."&end_time=".date('d-M-Y')."";
        $temp = json_decode(@file_get_contents($API_url));
        if(!$temp){
            return redirect()->back()->with('error_message','Too many requests. Please try after some time.');
        }
        if($temp->STATUS == 'FAILURE'){
            return redirect()->back()->with('error_message',$temp->MESSAGE);
        }
        $indiamartEnq = $temp->RESPONSE;
        return view('admin.enquiry.view_indiamart_enquiries')->with(compact('indiamartEnq'));
    }

    // view indiamrt enquiries modal
    public function GetIndiaMartEnquiries(){
        if(empty(settings('indiamart_api'))){
            return '<h6 class="fw-500 mt-3 pl-1 text-danger"><i class="fa fa-exclamation-triangle"></i> Please enter IndiaMart API to view all enquiries.<h6>';
        }
        $api = explode('-', settings('indiamart_api'));
        // https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/9890220852/GLUSR_MOBILE_KEY/MTYzNzA0NjYyNS45NDg1Izc5MDQ0MjIw/Start_Time/12-JAN-2022/End_Time/18-APR-2022/
        // $API_url = "https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/".$api[0]."/GLUSR_MOBILE_KEY/".$api[1]."/Start_Time/12-JUL-2019/End_Time/".date('d-M-Y')."/";

        $API_url = "https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key=".$api[1]."&start_time=".date('d-M-Y', strtotime('-5 days'))."&end_time=".date('d-M-Y')."";
        $getEnq = json_decode(file_get_contents($API_url));

        $users = Admin::where('status','1')->orderBy('name','ASC')->get();
        $options = '';
        foreach($users as $user){
            $options .= '<option value="'.$user->id.'">'.$user->name.'</option>';
        }
        $indiamartEnq = '<table class="table table-bordered" id="imEnq">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact Details</th>
                                <th scope="col">Message</th>
                                <th scope="col">Assign</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $i=1;
                        foreach($getEnq as $row){
                            $enquiries = Enquiry::select('qrn')->where('enq_from','IndiaMart')->get()->toArray();
                            $enquiries = Arr::flatten(json_decode(json_encode($enquiries),true));
                            if(!in_array($row->QUERY_ID, $enquiries)){
        $indiamartEnq .= '<tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$row->SENDERNAME.'</td>
                            <td>'.$row->MOB.' <br>'.$row->SENDEREMAIL.'</td>
                            <td class="w-25">'.$row->ENQ_MESSAGE.'</td>
                            <td class="d-flex text-center">
                                <form action="add-indiamart-enq" method="post">'.csrf_field().'
                                <input type="hidden" name="enq_from" value="IndiaMart">
                                <input type="hidden" name="customer_name" value="'.$row->SENDERNAME.'">
                                <input type="hidden" name="qrn" value="'.$row->QUERY_ID.'">
                                <input type="hidden" name="email" value="'.$row->SENDEREMAIL.'">
                                <input type="hidden" name="phone" value="'.$row->MOB.'">
                                <input type="hidden" name="description" value="'.$row->ENQ_MESSAGE.'">
                                <input type="hidden" name="city" value="'.$row->ENQ_CITY.'">
                                <input type="hidden" name="region" value="'.$row->ENQ_STATE.'">
                                <input type="hidden" name="enq_date" value="'.$row->DATE_RE.'">
                                <table class="table-borderless">
                                    <tr>
                                        <td>
                                            <select name="assignee" class="form-select select2 form-control" required>
                                                <option value="">-- Select --</option>
                                                '.$options.'
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-secondary"> Add</button>
                                        </td>
                                    </tr>
                                </table>
                                </form>
                            </td>
                        </tr>';
                        $i++;
                        }
                    }
        $indiamartEnq .= '</tbody>
                    </table>';
        return $indiamartEnq;
    }

    // view enquiry detail ajax call
    public function ViewEnquiryDetail(Request $request){
        $id = $request->input('id');
        $enqDetails = Enquiry::select('enquiry.*','admins.name')
                    ->leftJoin('admins','enquiry.assignee','admins.id')
                    ->where('enquiry.id',$id)
                    ->first();
        // return $enqDetails;
        $enqNotes = DB::table('enquiry_notes')->select('enquiry_notes.*','admins.name')->join('admins','admins.id','enquiry_notes.admin_id')->where('enquiry_notes.enquiry_id',$id)->OrderByDesc('id')->get();

        $assignee = !empty($enqDetails->name) ? $enqDetails->name : 'NA';
        $contact_person = !empty($enqDetails->contact_person) ? $enqDetails->contact_person : 'NA';
        $person_email = !empty($enqDetails->email) ? $enqDetails->email : 'NA';
        $person_phone = !empty($enqDetails->phone) ? $enqDetails->phone : 'NA';
        $assignEnq = (Auth::user()->admin_role == 'Superadmin') ? 'd-block' : 'd-none';
        $qte = !empty($enqDetails->qte_date) ? date('d M Y', strtotime($enqDetails->qte_date)) : 'NA';
        $price = !empty($enqDetails->price) ? number_format($enqDetails->price) : 'NA';

        $labels = DB::table('enq_labels')->orderBy('id','ASC')->get();
        $enq = '<div id="enqDetail" class="main-content-body main-content-body-chat">
                    <div class="main-chat-header bg-primary" style="border-radius: 4px 4px 0 0;">
                        <div class="main-chat-msg-name m-0">
                            <h6 class="text-white">'.$enqDetails->customer_name.' &nbsp;&nbsp;';
                            if(!empty($enqDetails->enq_labels)){
                                foreach ($enqDetails->enq_labels as $label) {
                                    $lab = DB::table('enq_labels')->where('id', $label)->first();
                                    if(!empty($lab)){
                                        $enq .= '<i class="fa fa-tag" style="color: '.$lab->code.'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$lab->title.'"></i>&nbsp;';
                                    }
                                }
                            }
                            $enq .= '</h6><small class="font-weight-bold text-white">Enquiry ID: '.$enqDetails->id.'</small> | <small class="font-weight-bold text-white">Enquiry On: '.date('d M Y', strtotime($enqDetails->enq_date)).'</small>
                        </div>
                        <nav class="nav"> 
                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-light m-1 pl-1 pr-1 btn-sm" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fa fa-clock"></i> Set Reminder</button>
                            <div class="dropdown-menu box-shadow-primary p-2 w-50">
                                <form action="javascript:void" method="post" onsubmit="setReminder('.$enqDetails->id.')" id="setReminderForm">
                                <div class="form-group m-0">
                                    <label for="note">Remind me on</label>
                                    <div class="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="reminder_note" id="reminder_note" value="'.$enqDetails->reminder_note.'" placeholder="Reminder note" />
                                        </div>
                                        <div class="form-group">
                                            <input type="datetime-local" class="form-control" name="reminder_date" id="reminder_date" value="'.date('Y-m-d\TH:i', strtotime($enqDetails->reminder_date)).'" required />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark btn-sm mt-1 pt-2 pb-2" id="addReminder"><i class="fa fa-check"></i> Set</button>
                                </form>
                            </div>
                            <a class="btn ripple btn-light pr-1 btn-sm" href="#setLabel" type="button"><i class="fa fa-tags"></i> Set Label</a>
                            <a class="btn btn-light m-1 pl-1 btn-sm" href="edit-enquiry/'.$enqDetails->id.'" title="Edit"><i class="fa fa-pencil-alt"></i></a> 
                            <a class="btn btn-light pl-1 pr-1 btn-sm deleteBtn text-black" data-bs-toggle="tooltip" title="Delete Enquiry" rel1="delete-enquiry" rel="'.$enqDetails->id.'" title="Delete"><i class="fa fa-trash"></i></a>
                        </nav>
                    </div>
                    <div class="main-chat-body" id="ChatBody">
                        <div class="card-body">
                            <div class="ps-0">
                                <div class="main-profile-overview">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <h6 class=""><i class="fa fa-terminal"></i> <span class="font-weight-normal">QRN</span>: '.$enqDetails->qrn.'</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6><i class="fa fa-calendar-alt"></i> <span class="font-weight-normal">QTE Date</span>: '.$qte.'</h6>
                                        </div>
                                        <div class="col-md-4 '.$assignEnq.'">
                                            <h6 class=""><i class="fa fa-user-tie"></i> <span class="font-weight-normal">Assignee</span>: <button data-bs-toggle="dropdown" id="assignee" class="btn btn-sm btn-outline-dark">'.$assignee.' <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                                                <div class="dropdown-menu box-shadow-primary ht-200 overflow-scroll">';
                                                    foreach (Admin::select('id','name')->orderBy('name','ASC')->get() as $user) {
                                                    $enq .= '<a class="dropdown-item" onclick="assignEnq('.$user->id.','.$enqDetails->id.')">'.$user->name.'</a>';
                                                    }
                                        $enq .= '</div>
                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="font-weight-normal opacity-75">Contact Details <i class="fa fa-angle-down"></i></h6>
                                    <div class="row mb-2">
                                        <div class="col-md-3 col">
                                            <h6>'.$contact_person.'</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fa fa-user-alt"></i> Name</h6>
                                        </div>
                                        <div class="col-md-3 col">
                                            <h6><a href="tel:'.$person_phone.'">'.$person_phone.'</a></h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fa fa-phone-alt"></i> Phone</h6>
                                        </div>
                                        <div class="col-md-6 col">
                                            <h6><a href="mailto:'.$person_email.'">'.$person_email.'</a></h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fa fa-envelope"></i> Email</h6>
                                        </div>
                                    </div>
                                    <h6 class="font-weight-normal opacity-75">Price <i class="fa fa-angle-down"></i></h6>
                                    <div class="main-profile-bio card card-body p-2 bg-light">'.$price.'</div>

                                    <h6 class="font-weight-normal opacity-75">Message <i class="fa fa-angle-down"></i></h6>
                                    <div class="main-profile-bio card card-body p-2 bg-light">'.$enqDetails->description.'</div>
                                    
                                    <hr class="mg-y-15">
                                    <div class="dropdown dropup mb-2">
                                        <a class="modal-effect btn btn-light btn-sm" onclick="addNoteModal('.$enqDetails->id.',)" data-bs-toggle="modal" href="#modaldemo8"><i class="fa fa-pencil-alt"></i> Add Note</a>
                                    </div>
                                    <div class="main-profile-social-list w-100" id="addedNote" style="max-height: 200px; overflow-y: scroll">';
                                        foreach($enqNotes as $note){
                                $enq .= '<div class="media mr-1 w-100" id="media'.$note->id.'">
                                            <a class="profile-user d-flex mr-1" href="javascript:void" data-bs-toggle="popover" title="'.$note->name.'"><div class="avatar avatar-xs bg-info tx-14-f"> '.mb_substr(ucfirst(Auth::guard('admin')->User()->name) , 0, 1).' </div></a>
                                            <div class="media-body">
                                                <span class="tx-14-f">'.$note->note.'</span>
                                                <small data-bs-toggle="tooltip" title="'.date('d M, y h:iA', strtotime($note->updated_at)).'"><i class="fa fa-clock"></i> '.date('d M, y', strtotime($note->updated_at)).'</small>
                                            </div>
                                            <div class="invisible"><a href="javascript:void(0)" class="text-black" onclick="deleteNote('.$note->id.')"><i class="fa fa-trash"></i></a></div>
                                        </div>';
                                        }
                            $enq .= '<div class="media invisible m-0 w-100">
                                        <div class="" data-bs-toggle="tooltip">d M, y</div>
                                            <div class="media-body">
                                                <span class="tx-12-f">Curabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sit Curabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sit</span>
                                            </div>
                                            <div class=""><i class="fa fa-trash"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="setLabel" class="overlay popup'.$enqDetails->id.'">
                        <div class="popup">
                            <h2 class="h6">Add Label</h2>
                            <a class="close" href="#">&times;</a>
                            <div class="col-lg-12 col-xl-12 p-0">
                                <div class="card mb-0">
                                    <div class="card-body p-0">
                                        <form action="javascript:void" method="post" id="addEnquiryLabelForm" name="addEnquiryLabelForm" onsubmit="addEnquiryLabels('.$enqDetails->id.')">';
                                        foreach($labels as $label){
                                        if(!empty($enqDetails->enq_labels) && in_array($label->id, $enqDetails->enq_labels)){
                                            $status = 'checked';
                                        }else{
                                            $status = '';
                                        }
                                        $enq .= '
                                            <div class="d-flex p-3 border-top">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="labels[]" '.$status.' value="'.$label->id.'" id="labels">
                                                    <span>'.$label->title.'</span>
                                                </label> 
                                                <span class="ms-auto"> 
                                                    <i class="fa fa-tag tx-16-f" style="color: '.$label->code.'"></i> 
                                                </span> 
                                            </div>';
                                        }
                                        $enq .= '                                        
                                            <div class="text-center mb-1"><button type="submit" class="btn btn-dark"><i class="fa fa-check"></i> Submit</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        return $enq;
    }

    // <div class="modal fade" id="modaldemo8">
    //     <div class="modal-dialog modal-dialog-centered" role="document">
    //         <div class="modal-content modal-content-demo">
    //             <div class="modal-header pt-2 pb-2">
    //                 <h6 class="modal-title">'.$enqDetails->customer_name.'</h6>
    //             </div>
    //             <div class="modal-body pt-2 pb-3">
    //                 <form action="javascript:void" method="post" onsubmit="addNote()" id="addEnqNote">'.csrf_field().'
    //                     <div class="form-group mb-1">
    //                         <label for="note">Add Note <small>250 Characters Limit</small></label>
    //                         <div class="media">
    //                             <textarea class="form-control" name="note" id="note" rows="3" maxlength="250" required></textarea>
    //                         </div>
    //                     </div>
    //                     <input type="hidden" name="enq_id" value="'.$enqDetails->id.'">
    //                     <button type="submit" class="btn btn-dark btn-sm mt-1 pt-2 pb-2" id="addButton"><i class="fa fa-check-circle"></i> Add Note</button>
    //                     <button data-bs-dismiss="modal" type="button" class="btn btn-link mt-1"><i class="fa fa-times"></i> Cancel</button>
    //                 </form>
    //             </div>
    //         </div>
    //     </div>
    // </div>
    public function EnquiryDetail(Request $request,$id)
    {
        $enqDetail = Enquiry::select('enquiry.*','admins.name')
                    ->leftJoin('admins','enquiry.assignee','admins.id')
                    ->where('enquiry.id',$id)
                    ->first();
        $enqNotes = DB::table('enquiry_notes')->select('enquiry_notes.*','admins.name')->join('admins','admins.id','enquiry_notes.admin_id')->where('enquiry_notes.enquiry_id',$id)->OrderByDesc('id')->get();
        $assignee = !empty($enqDetail->name) ? $enqDetail->name : 'NA';
        $contact_person = !empty($enqDetail->contact_person) ? $enqDetail->contact_person : 'NA';
        $person_email = !empty($enqDetail->email) ? $enqDetail->email : 'NA';
        $person_phone = !empty($enqDetail->phone) ? $enqDetail->phone : 'NA';
        $assignEnq = (Auth::user()->admin_role == 'Superadmin') ? 'd-block' : 'd-none';
        $qte = !empty($enqDetail->qte_date) ? date('d M Y', strtotime($enqDetail->qte_date)) : 'NA';
        $price = !empty($enqDetail->price) ? number_format($enqDetail->price) : 'NA';
        return view('admin/enquiry/enquiry_detail')->with(['enqNotes'=>$enqNotes,'enqDetail'=>$enqDetail,'assignEnq'=>$assignEnq,'qte'=>$qte,'contact_person'=>$contact_person,'assignee'=>$assignee,'price'=>$price,'person_email'=>$person_email,'person_phone'=>$person_phone]);
    }
    public function updateEnquiryStatus(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        if($status == 'HOT'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'WARM'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'LONG LEAD'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'BUDGETARY'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'CANCELLED'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'HOLD'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'LOST'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'ORDER'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'PO AWAITED'){
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        else{
            Enquiry::where('id',$id)->update(['status'=>$status]);
        }
        $statusHtml = $status.' <i class="icon ion-ios-arrow-down tx-11 mg-l-3">';
        return $statusHtml;
    }
    // assign enquiry
    public function assignEnquiry(Request $request){
        $user_id = $request->id;
        $enq_id = $request->enq_id;
        $user = Admin::select('name','email')->find($user_id);
        $enquiry = Enquiry::select('customer_name')->find($enq_id);
        // return $id.'-'.$enq_id;
        if(Enquiry::where('id',$enq_id)->update(['assignee'=>$user_id])){
            $email = $user->email;
            $name = $user->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'customer_name'=>$enquiry->customer_name,
            ];
            Mail::send('emails.assign_enquiry',$messageData,function($message) use($email){
                $message->to($email)->subject('Enquiry Assign');
            });
            return redirect()->back();
            // return $user->name. ' <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i>';
        }
    }

    // add new enquiry labels
    public function addEnqLabels(Request $request){
        $labels = $request->label;
        $enq_id = $request->enq_id;

        $temp = str_replace(["labels%5B%5D","&","="]," ",$labels);
        $temp1 = explode(' ',$temp);
        $array[] = array();
        foreach ($temp1 as $value) {
            if(!empty($value)){
                $array[] .= $value;
            }
        }
        if(Enquiry::where('id',$request->enq_id)->update(['enq_labels'=>$array])){
            return 200;
        }
    }

    // add new enquiry labels
    public function addLabel(Request $request){
        if(DB::table('enq_labels')->insert(['title'=>$request->title,'code'=>$request->code])){
            $label_id = DB::getPdo()->lastInsertId();
            return $label_id;
        }
    }

    // delete particular label
    public function deleteLabel(Request $request){
        DB::table('enq_labels')->where('id',$request->id)->delete();
        return $request->id;
    }

    // add enquiry label note ajax
    public function addNote(Request $request){
        $insert = DB::table('enquiry_notes')->insert(['enquiry_id'=>$request->enq_id,'note'=>$request->note,'admin_id'=>Auth::User()->id]);
        $note_id = DB::getPdo()->lastInsertId();
        $date = date('d M, y');
        $array = [$note_id, $request->note, $date];
        return $array;
    }

    // delete enquiry note ajax
    public function deleteNote(Request $request){
        // return $request->id;
        DB::table('enquiry_notes')->where('id',$request->id)->delete();
        return $request->id;
    }

    // add enquiry reminder so user will reminder on set date with note
    public function addReminder(Request $request){
        Enquiry::where('id',$request->enq_id)->update(['reminder_note'=>$request->note,'reminder_date'=>$request->date]);
        // return $array;
    }

    // delete reminder - set value null
    public function deleteReminder(Request $request){
        Enquiry::where('id',$request->enq_id)->update(['reminder_note'=>NULL,'reminder_date'=>NULL]);
    }

    // search enquiries ajax
    public function searchEnq(Request $request){
        if($request->has('keyword')){
            $keyword = $request->keyword;
            // $result = Enquiry::where('customer_name','LIKE','%'.$request->keyword.'%')->get();
            $result = Enquiry::where(function($query) use($keyword){
                        $query->where('customer_name','like','%'.$keyword.'%')
                        ->orWhere('city','like','%'.$keyword.'%')
                        ->orWhere('description','like','%'.$keyword.'%')
                        ->orWhere('contact_person','like','%'.$keyword.'%');
                    })->get();
            return response()->json($result);
        }else{
            $result = Enquiry::select('admins.name','admins.email','enquiry.*')->join('admins','enquiry.admin_id','admins.id')->orderBy('id','DESC')->get();
            return response()->json($result);
        }
    }

    // delete enquiry
    public function DeleteEnquiry($id){
        Enquiry::where('id',$id)->delete();
        return redirect('view-enquiry-logs');
        // return redirect()->back()->with('success_message','Enquiry deleted');
    }

    public function enquiryReport(Request $request, $status=null){
        $from = $request->from ? $request->from : Carbon::now()->subMonths(6)->format('Y-m'.'-1');
        $to = $request->to ? $request->to : Carbon::now()->format('Y-m-d');
        $status = $status ? $status : 'HOT';
        
        $raw = Enquiry::select('enquiry.id','enquiry.qrn','enquiry.customer_name','enquiry.description','enquiry.price','admins.name')
            ->leftJoin('admins','admins.id','enquiry.assignee')
            ->where('enquiry.status',$status)
            ->whereDate('enquiry.created_at','>=',$from)
            ->whereDate('enquiry.created_at','<=',$to);

        $sum = $raw->sum("enquiry.price");
        $enquiries = $raw->paginate(10);
        $count = $raw->count();
        return view('admin.enquiry.view_enquiries_report', compact('enquiries','sum','count','from','to'));
    }

    public function EnquiryExcelReport(Request $request){
        $from = $request->from ? $request->from : Carbon::now()->subMonths(6)->format('Y-m'.'-1');
        $to = $request->to ? $request->to : Carbon::now()->format('Y-m-d');
        
        $hot = Enquiry::select('enquiry.id','enquiry.qrn','enquiry.customer_name','enquiry.description','enquiry.price','admins.name')
            ->leftJoin('admins','admins.id','enquiry.assignee')
            ->where('enquiry.status','HOT')
            ->whereDate('enquiry.created_at','>=',$from)
            ->whereDate('enquiry.created_at','<=',$to)
            ->get();
        
        $warm = Enquiry::select('enquiry.id','enquiry.qrn','enquiry.customer_name','enquiry.description','enquiry.price','admins.name')
            ->leftJoin('admins','admins.id','enquiry.assignee')
            ->where('enquiry.status','WARM')
            ->whereDate('enquiry.created_at','>=',$from)
            ->whereDate('enquiry.created_at','<=',$to)
            ->get();
        
        $longlead = Enquiry::select('enquiry.id','enquiry.qrn','enquiry.customer_name','enquiry.description','enquiry.price','admins.name')
            ->leftJoin('admins','admins.id','enquiry.assignee')
            ->where('enquiry.status','LONG LEAD')
            ->whereDate('enquiry.created_at','>=',$from)
            ->whereDate('enquiry.created_at','<=',$to)
            ->get();

        return Excel::download(new EnquiryReportExport($hot,$warm,$longlead,$from,$to),'Enquiry Report Sheet.xlsx');
    }

}