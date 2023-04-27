<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WPM;
use App\Models\WPMComments;
use App\Models\EquipmentType;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderEquipments;
use Carbon\Carbon;
use DB;
use Auth;

class WpmController extends Controller
{
    public function WpmActionTracker(Request $request)
    {

        // $wpm_actions = WPM::with(['wpm_order'])->select('equipment_type.equipment_type','orders.client_name','orders.so','orders.po_date','orders.delivery_date')
        //         ->leftJoin('orders','wpms.order_so','orders.so')
        //         ->leftJoin('equipment_type','wpms.equipment','equipment_type.id')
        //         ->orderBy('wpms.id','DESC')->paginate(10);
        $wpm_actions = Order::orderBy('id','asc');
        $search = NULL;
        if($request->search)
        {
            $wpm_actions = $wpm_actions->where('so',$request->search)->orWhere('client_name','LIKE',"%".$request->search."%");
            $search = $request->search;
        }
        $wpm_actions = $wpm_actions->paginate(10);
        return view('admin.wpm.view_wpm')->with(['wpm_actions'=>$wpm_actions,'search'=>$search]);
    }
    public function WpmActionTrackerView(Request $request, $so, $equip_id, $client_name=null, $po_date=null, $delivery_date=null)
    {
        $search = null;
        $status = null;
        $priority = null;
        $date = null;
        $user = null;
        $wpm_tasks = WPM::with(['wpm_order'])->select('wpms.*','admins.name','equipment_type.equipment_type','orders.client_name','orders.so','orders.po_date','orders.delivery_date')
                    ->leftJoin('orders','wpms.order_so','orders.so')
                    ->leftJoin('equipment_type','wpms.equipment','equipment_type.id')
                    ->leftJoin('admins','wpms.action_user','admins.id')
                    ->where('wpms.order_so',$so)->where('wpms.equipment',$equip_id);
        if($request->search)
        {
            $wpm_tasks = $wpm_tasks->where('wpms.task_name','LIKE',"%".$request->search."%");
            $search = $request->search;
        }
        if($request->status)
        {
            $wpm_tasks = $wpm_tasks->where('wpms.status','LIKE',"%".$request->status."%");
            $status = $request->status;
        }
        if($request->priority)
        {
            $wpm_tasks = $wpm_tasks->where('wpms.priority','=',$request->priority);
            $priority = $request->priority;
        }
        if($request->date)
        {
            $wpm_tasks = $wpm_tasks->whereDate('wpms.baseline_target_date', '<=', $request->date)->orWhereDate('wpms.completion_date', '<=', $request->date);
            $date = $request->date;
        }
        if($request->user)
        {
            $wpm_tasks = $wpm_tasks->whereJsonContains('wpms.action_user', $request->user);
            $user = $request->user;
        }
        $wpm_tasks = $wpm_tasks->orderBy('wpms.id','DESC')->paginate(10);
        $equipment = OrderEquipments::where('id',$equip_id)->first();
        return view('admin.wpm.view_wpm_detail')->with(['wpm_tasks'=>$wpm_tasks,'equipment'=>$equipment,'search'=>$search,'status'=>$status,'priority'=>$priority,'date'=>$date,'user'=>$user]);
    }
    public function WpmTaskView(Request $request, $id, $so, $equip_id, $client_name=null, $po_date=null, $delivery_date=null)
    {
        $wpm_tasks = WPM::with(['wpm_order'])->select('wpms.*','admins.name','equipment_type.equipment_type','orders.client_name','orders.so','orders.po_date','orders.delivery_date')
                    ->leftJoin('orders','wpms.order_so','orders.so')
                    ->leftJoin('equipment_type','wpms.equipment','equipment_type.id')
                    ->leftJoin('admins','wpms.action_user','admins.id')->where('wpms.id',$id)->first();
        $equipment = OrderEquipments::where('id',$equip_id)->first();
        $wpmcomments = WPMComments::where('wpm_id',$id)->get();
        $users = Admin::all();
        return view('admin.wpm.view_task_detail')->with(['wpmcomments'=>$wpmcomments,'wpm_tasks'=>$wpm_tasks,'equipment'=>$equipment,'users'=>$users]);
    }
    public function WpmTaskEdit(Request $request, $id, $so, $equip_id, $client_name=null, $po_date=null, $delivery_date=null)
    {
        $wpm_task = WPM::with(['wpm_order'])->select('wpms.*','admins.name','equipment_type.equipment_type','orders.client_name','orders.so','orders.po_date','orders.delivery_date')
                    ->leftJoin('orders','wpms.order_so','orders.so')
                    ->leftJoin('equipment_type','wpms.equipment','equipment_type.id')
                    ->leftJoin('admins','wpms.action_user','admins.id')->where('wpms.id',$id)->first();
        $equipment = OrderEquipments::where('id',$equip_id)->first();
        $wpmcomments = WPMComments::where('wpm_id',$id)->get();
        $users = Admin::all();
        return view('admin.wpm.edit_wpm')->with(['wpmcomments'=>$wpmcomments,'wpm_task'=>$wpm_task,'equipment'=>$equipment,'users'=>$users]);
    }
    public function updateWpmTask(Request $request)
    {
        $wpm_action = WPM::where('id',$request->id)->first();
        $wpm_action->order_so = $request->so;
        $wpm_action->description = $request->description;
        $wpm_action->equipment = $request->equip_id;
        $wpm_action->baseline_target_date = $request->baseline_date;
        $wpm_action->completion_date = $request->completion_date;
        $wpm_action->category = $request->category;
        $wpm_action->action_user = json_encode($request->action_user);
        $wpm_action->priority = $request->priority;
        $wpm_action->task_name = $request->task_name;
        $wpm_action->status = "Pending";
        $wpm_action->updated_at = Carbon::now();
        $wpm_action->update();
        return redirect('wpm-action-tracker');
    }
    public function actionUserChange(Request $request)
    {
        $wpm_action = WPM::where('id',$request->id)->first();
        $wpm_action->action_user = json_encode($request->action_user);
        $wpm_action->save();
        return $wpm_action;
    }
    public function addComment(Request $request){
        $insert = DB::table('wpm_comments')->insert(['wpm_id'=>$request->task_id,'comments'=>$request->note,'admin_id'=>Auth::User()->id]);
        $note_id = DB::getPdo()->lastInsertId();
        $date = date('d M, y');
        $array = [$note_id, $request->note, $date];
        return $array;
    }
    public function deleteComment(Request $request){
        DB::table('wpm_comments')->where('id',$request->id)->delete();
        return $request->id;
    }
    public function DeleteWpm($id){
        WPM::where('id',$id)->delete();
        return redirect('wpm-action-tracker');
    }
    public function addTask(Request $request,$id = null, $equip_id = null)
    {
        
        if($request->isMethod('post')){
            $wpm_action = new WPM();
            $wpm_action->order_so = $request->so;
            $wpm_action->description = $request->description;
            $wpm_action->equipment = $request->equip_id;
            $wpm_action->baseline_target_date = $request->baseline_date;
            $wpm_action->completion_date = $request->completion_date;
            $wpm_action->category = $request->category;
            $wpm_action->action_user = json_encode($request->action_user);
            $wpm_action->priority = $request->priority;
            $wpm_action->task_name = $request->task_name;
            $wpm_action->status = "Pending";
            $wpm_action->created_at = Carbon::now();
            $wpm_action->save();
            
            return redirect('wpm-action-tracker');
        }
        $users = Admin::all();
        return view('admin.wpm.add_wpm')->with(['users'=>$users,'id'=>$id, 'equip_id'=> $equip_id]);
    }
    public function updateWpmStatus(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        if($status == 'Completed'){
            WPM::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'Hold'){
            WPM::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'Pending'){
            WPM::where('id',$id)->update(['status'=>$status]);
        }
        if($status == 'Working'){
            WPM::where('id',$id)->update(['status'=>$status]);
        }else{
            WPM::where('id',$id)->update(['status'=>$status]);
        }
        $statusHtml = $status.' <i class="icon ion-ios-arrow-down tx-11 mg-l-3">';
        return $statusHtml;
    }
}
