<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Department;
use App\Models\OrderStages;
use App\Models\EquipmentType;
use App\Models\Sub_stage;
use DB;
use Auth;

class StagesController extends Controller
{
    public function addStage(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
            // dd($data);
    		foreach ($data['stage'] as $key => $val) {
                if(!empty($val)){
                    $stage = new Stage;
                    $stage->equipment_name = $data['equipment_name'];
                    $stage->department_id = $data['department_name'];
                    $stage->stage = $data['stage'][$key];
                    $stage->days = $data['days'][$key];
                    $stage->save();
                }
            }
            return redirect()->back()->with('success_message',$data['equipment_name'].' stages added successfully!');
    	}
        $equipment_types = EquipmentType::get();
        $departments = Department::all();
        // dd($equipment_types);
        $meta_title = 'Add Equipment Stages';
    	return view('admin.stage.add_equipment_stage',with(compact('equipment_types','meta_title','departments')));
    }

    public function editStage(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            Stage::where('id',$id)->update(['stage'=>$data['stage'],'days'=>$data['days'],'department_id'=>$data['department_name']]);
            toast('Stage updated successfully.','success');
            return redirect()->back();
        }
    }

    public function viewStages(Request $request){
        $equipment = null;
    	$stages = Stage::select('equipment_name','id','updated_at')->groupBy('equipment_name');
        if($request->equipment != null){
            $stages = $stages->where('equipment_name',$request->equipment);
            $equipment = $request->equipment;
        }
        $stages = $stages->paginate(10);
        $meta_title = 'View Equipment Stages';
    	return view('admin.stage.view_equipment_stages')->with(compact('stages','meta_title','equipment'));
    }

    public function viewEquipmentStages(Request $request,$equipment_name, $id){
        $departments = Department::all();
    	$EquipmentStages = Stage::with(['depts'])->where('equipment_name',$equipment_name);
        $department = null;
        $name = null;
        if($request->department != null)
        {
            $EquipmentStages = $EquipmentStages->where('department_id','=',$request->department);
            
            $department = $request->department;
        }
        if($request->name != null)
        {
            $EquipmentStages = $EquipmentStages->where('stage','LIKE',"%".$request->name."%");
            $name = $request->name;
        }
        $EquipmentStages = $EquipmentStages->orderBy('stage_no','ASC')->get();   
    	return view('admin.stage.view_single_equipment_stages')->with(compact('EquipmentStages','departments','department','name'));
    }

    public function deleteStage($id){
        Stage::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Stage deleted');
    }

    public function getStageDetail(Request $request){
        $id = $request->input('id');
        $stage = Stage::find($id);
        $department = Department::all();
        return [$stage,$department];
    }
    public function subStageDetail(Request $request){
        $id = $request->input('id');
        $stage = Stage::find($id);
        return [$stage];
    }
    public function addSubStage(Request $request){
       $sub_stage = new Sub_stage();
       $sub_stage->equipment_name = $request->equip_name;
       $sub_stage->stage = $request->equip_stage;
       $sub_stage->sub_stage = $request->equip_sub_stage;
       $sub_stage->days = $request->equip_days;
       $sub_stage->save();
       return redirect()->back();
    }
    public function addEquipmentType(Request $request){
        $equipment = null;
        $name = null;
        if($request->isMethod('post')){
            $data = $request->all();
            $type = new EquipmentType;
            $type->equipment_type = $data['equipment_type'];
            $type->abbr = $data['abbr'];
            $type->admin_id = Auth::User()->id;
            $type->save();
            return redirect()->back()->with('success_message','New equipment type added');
        }

        $equipment_types = EquipmentType::select('admins.name','admins.email','equipment_type.*')->join('admins','equipment_type.admin_id','admins.id')->orderBy('equipment_type.equipment_type','ASC');
        if($request->equipment != null){
            $equipment_types = $equipment_types->where('equipment_type.equipment_type',$request->equipment);
            $equipment = $request->equipment;
        }
        if($request->name != null){
            $equipment_types = $equipment_types->where('admins.name','LIKE',"%".$request->name."%");
            $name = $request->name;
        }
        $equipment_types = $equipment_types->paginate(10);
        $meta_title = 'Equipment Types';
        return view('admin.stage.add_equipment_type')->with(compact('equipment_types','meta_title','equipment','name'));
    }

    public function editType(Request $request){
        $id = $request->input('id');
        $equipmentDetails = EquipmentType::find($id);
        return $equipmentDetails;
    }

    public function updateType(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            EquipmentType::where('id',$id)->update(['equipment_type'=>$data['equipment_type'],'abbr'=>$data['abbr']]);
            return redirect()->back()->with('success_message','Equipment type updated successfully');
        }
    }

    public function deleteEquipmentType($id){
        EquipmentType::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Equipment type deleted');
    }

    public function updateStage(Request $request){
        $posts = Stage::all();     
        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['stage_no' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }

}
