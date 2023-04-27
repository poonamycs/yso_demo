<?php 

use App\Models\OrderEquipments;
use App\Models\EquipmentType;
use App\Models\OrderStages;
use App\Models\Order;
use App\Models\Stage;
use App\Models\User;
use App\Models\Admin;
use App\Models\Enquiry;
use App\Models\Setting;

function getEquipmentStatus($order_id, $equip_id){
    //$completeStages = OrderStages::where(['order_id'=>$order_id,'equip_id'=>$equip_id,'status'=>'Completed'])->count();
    $completeStages = OrderStages::where(['order_id'=>$order_id,'equip_id'=>$equip_id])->where(function($query) {
        $query->where('status', 'Completed')
            ->orWhere('status', 'Skip');
        })->count();
	$totalStages = OrderStages::where(['order_id'=>$order_id,'equip_id'=>$equip_id])->count();
    $totalPer = (($completeStages/$totalStages)*100);
    return round($totalPer, 1);
}

function getOrderStatus($order_id){
    //$completeStages = OrderStages::where(['order_id'=>$order_id,'status'=>'Completed'])->count();
    $completeStages = OrderStages::where('order_id', $order_id)->where(function($query) {
        $query->where('status', 'Completed')
            ->orWhere('status', 'Skip');
        })->count();
	$totalStages = OrderStages::where(['order_id'=>$order_id])->count();
    $totalPer = (($completeStages/$totalStages)*100);
    return round($totalPer, 1);
}

function numberFormat($num) {
  	if($num>1000) {
        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('K', 'L', 'Cr', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
        return $x_display;
  	}
  	return $num;
}
function numberFormat2($num){
    if($num > 100000)
    {
        $x = $num/100000;
        $x_number_format = number_format($x);
        return $x_number_format;
    }
    else
    {
        $x = $num/100000;
        $x_number_format = $x;
        return $x_number_format;
    }
}
function enquiryCount($type) {
    if(Auth::guard('admin')->User()->admin_role == 'Superadmin'){
        return Enquiry::where('enq_from',$type)->count();
    }else{
        return Enquiry::where('enq_from',$type)->where('assignee',Auth::id())->count();;
    }
}

function settings($type) {
    $val = Setting::select('value')->where('type',$type)->first();
    return $val->value;
}

function getInitials($name){
    $words = explode(' ', $name);
    return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
}

function user($id){
    $user = Admin::select('name')->where('id',$id)->first();
    if(!empty($user)){
        return $user->name;
    }else{
        return '';
    }
}

// OBF tracker
function orderTotal($id, $fy=null){
    $temp = explode('-',$fy);
    return $total = Order::select('order_size','status','admin_id','')->where('admin_id',$id)
                    ->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))
                    ->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))
                    ->sum('order_size');
}