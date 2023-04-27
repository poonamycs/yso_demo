<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Enquiry;
use App\Models\Setting;
use App\Models\Engineer;
use App\Models\Role;
use App\Models\Staff;
use App\Models\PaymentCashflow;
use App\Models\EquipmentType;
use App\Models\OrderEquipments;
use App\Models\SalesTarget;
use carbon\carbon;
use Socialite;
use DB;
use Auth;
use Hash;
use Image;
use Alert;
use Session;

class AdminController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
            $user = Admin::where('email',$data['email'])->first();
            if($user){
                if($user->status == 0){
                    alert()->info('Account is disbaled by admin, To activate please contact admin');
                    return redirect()->back();
                }
            }
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                toast('Hello, '.Auth::guard('admin')->User()->name.'. Login successful.','success');
                return redirect('/dashboard');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid email or password.');
            }
    	}
    	return view('admin.admin_login');
    }

    public function googleLogin(Request $request){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request){
        $user = Socialite::driver('google')->stateless()->User();
        // dd($user);
        $existUser = Admin::where(['email'=>$user->email])->first();
        if($existUser){
            if($existUser != NULL && $existUser->status == '0'){
                return redirect()->back()->with('flash_message_error','Your account is deactivated by Admin. Please contact admin for further queries.');
            }
            if(Auth::guard('admin')->loginUsingId($existUser->id)){
                toast('Hello, '.Auth::guard('admin')->User()->name.'. Login successful.','success');
                return redirect('/dashboard');
            }
        }else{
            return redirect('/')->with('flash_message_error','Account not found with email address. Please check email address.');            
        }
    }

    public function dashboard(Request $request){
        // if(Auth::User()->admin_role == 'Superadmin'){
        //     $hotEnq = Enquiry::select('enquiry.*','admins.name')->leftJoin('admins','enquiry.assignee','admins.id')->where(['enquiry.status'=>'Hot'])->orderBy('enquiry.created_at','ASC')->get();
        //     $EnquiryCount = Enquiry::count();
        //     $OrdersCount = Order::where('status','In Process')->get();
        //     $OrdersCompleteCount = Order::where('status','Completed')->get();
        //     $orders = Order::select('orders.*','admins.name')->leftJoin('admins','admins.id','orders.admin_id')->where('orders.status','In Process')->get();
        // }else{
        //     $hotEnq = Enquiry::select('enquiry.*','admins.name')->leftJoin('admins','enquiry.assignee','admins.id')->where(['enquiry.status'=>'Hot','enquiry.assignee'=>Auth::id()])->orderBy('enquiry.created_at','ASC')->get();
        //     $EnquiryCount = Enquiry::where('assignee',Auth::id())->count();
        //     $OrdersCount = Order::where(['status'=>'In Process','admin_id'=>Auth::id()])->get();
        //     $OrdersCompleteCount = Order::where(['status'=>'Completed','admin_id'=>Auth::id()])->get();
        //     $orders = Order::select('orders.*','admins.name')->leftJoin('admins','admins.id','orders.admin_id')->where(['orders.status'=>'In Process','admin_id'=>Auth::id()])->get();
        // }
        
        $hotEnq = Enquiry::select('enquiry.*','admins.name')->leftJoin('admins','enquiry.assignee','admins.id')->where(['enquiry.status'=>'Hot'])->orderBy('enquiry.created_at','ASC')->get();
        $EnquiryCount = Enquiry::count();
        $EnquiryHotCount = Enquiry::where(['status'=>'HOT'])->count();
        $EnquiryWarmCount = Enquiry::where(['status'=>'WARM'])->count();
        $OrdersCount = Order::where('status','In Process')->get();
        $OrdersBigAmt = Order::where('status','In Process')->orderBy('po_amt','DESC')->take(5)->get();
        $OrdersCompleteCount = Order::where('status','Completed')->get();
        $orders = Order::select('orders.*','admins.name')->leftJoin('admins','admins.id','orders.admin_id')->where('orders.status','In Process')->get();

        // generating receivable amount chart array
        $recAmt = array();
        $totalorders = Order::select('id')->where('admin_id','1')->get();
        $userOrders = null;
        foreach($totalorders as $key => $val){
            $userOrders .= $val->id.',';
        }
        $userOrders = $userOrders;
        for ($i = 0; $i <= 11; $i++) {
            $month = Carbon::now()->addMonth($i);
            $year = Carbon::now()->addMonth($i)->format('Y');
            $start = Carbon::parse($month.' '.$year)->startOfMonth()->format('Y-m-d');
            $end = Carbon::parse($month.' '.$year)->endOfMonth()->format('Y-m-d');
            if(Auth::User()->admin_role == 'Superadmin'){
                $amount = PaymentCashflow::whereBetween('date',[$start, $end])->sum('amount');
            }else{
                // echo($userOrders);
                $amount = PaymentCashflow::whereBetween('date',[$start, $end])->sum('amount');
            }
            $amount = $amount/100000;
            array_push($recAmt, array(
                '["'.$month->shortMonthName.'", '. $amount.'],'
                // 'month' => $month->shortMonthName,
                // 'year' => $year,
            ));
        }

        $currentMonthYear = \Carbon\Carbon::now()->format('F, Y');
        $from = date('Y-m-d', strtotime(new Carbon('first day of this month')));
        $to = date('Y-m-d', strtotime(new Carbon('last day of this month')));
        $thisMonthAmt = PaymentCashflow::whereBetween('date', [$from, $to])->where('status','!=','1')->orWhereNull('status')->sum('amount');
        $thisMonthTotalAmt = PaymentCashflow::whereBetween('date', [$from, $to])->sum('amount');

        $equipments = OrderEquipments::select('order_equipments.*',DB::raw('COUNT(equipment_type) as count'))
           ->groupBy('equipment_type')
           ->orderBy('count')
           ->get();

           $dateyear = Carbon::now()->format('Y');
           $datemonth = Carbon::now()->format('m');
            if ( $datemonth > 3 ) {
                $year = $dateyear + 1;
                $fy = "$dateyear-$year";
            }
            else {
                $year = $dateyear-1;
                $fy = "$year-$dateyear";
            }
        // $fy = "2022-2023";
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
        $q1 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-06-30')))->orderBy('order_size','DESC')->get();
        $q2 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-07-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-09-30')))->orderBy('order_size','DESC')->get();
        $q3 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-10-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-12-31')))->orderBy('order_size','DESC')->get();
        $q4 = Order::select('order_size','po_date')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[1].'-01-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->orderBy('order_size','DESC')->get();
        $saleq1 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[0].'-04-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[0].'-06-30')))->orderBy('order_size','DESC')->get();
        $saleq2 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[0].'-07-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[0].'-09-30')))->orderBy('order_size','DESC')->get();
        $saleq3 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('po_date','>=',date('Y-m-d', strtotime($temp[0].'-10-01')))->whereDate('po_date','<=',date('Y-m-d', strtotime($temp[0].'-12-31')))->orderBy('order_size','DESC')->get();
        $saleq4 = Order::select('order_size','completed_on','status')->where('status','Completed')->whereDate('completed_on','>=',date('Y-m-d', strtotime($temp[1].'-01-01')))->whereDate('completed_on','<=',date('Y-m-d', strtotime($temp[1].'-03-31')))->orderBy('order_size','DESC')->get();
        $target = SalesTarget::where('fy',$fy)->orderBy('btarget','DESC')->first();
        
        $q1 = ($q1->sum('order_size'))/100000;
        $q2 = ($q2->sum('order_size'))/100000;
        $q3 = ($q3->sum('order_size'))/100000;
        $q4 = ($q4->sum('order_size'))/100000;

        $saleq1 = ($saleq1->sum('order_size'))/100000;
        $saleq2 = ($saleq2->sum('order_size'))/100000;
        $saleq3 = ($saleq3->sum('order_size'))/100000;
        $saleq4 = ($saleq4->sum('order_size'))/100000;

        $stq1 = json_decode($target->starget)->sq1;
        $stq2 = json_decode($target->starget)->sq2;
        $stq3 = json_decode($target->starget)->sq3;
        $stq4 = json_decode($target->starget)->sq4;

        $bt = number_format($stq1+$stq2+$stq3+$stq4);
        $saledate = number_format($saleq1 + $saleq2 + $saleq3 + $saleq4);
        $result[] = ['Clicks','Viewers'];
        $result[++$key] = ["Clicks", (int)$bt];
        $result[++$key] = ["Views", (int)$saledate];
    	return view('livewire.index',with(compact('result','bt','saledate','target','OrdersBigAmt','saleq1','saleq2','saleq3','saleq4','q1','q2','q3','q4','OrdersCount','OrdersCompleteCount','EnquiryCount','EnquiryHotCount','EnquiryWarmCount','orders','hotEnq','thisMonthAmt','thisMonthTotalAmt','recAmt','equipments')));
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        toast('Logged out successfully','success');
        return redirect('/');
    }

    public function addUser(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $adminCount = Admin::where('email',$data['email'])->count();
            if($adminCount>0){
                return redirect()->back()->with('error_message','Email already exist in system, try another email.');
            }else{
                $user = new Admin;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->role_id = $data['role'];
                $user->password = bcrypt($data['password']);
                if($data['role'] == 'Superadmin'){
                    $user->admin_role = 'Superadmin';
                }
                if(empty($data['status'])){
                    $status = 0;
                }else{
                    $status = 1;  
                }

                if($request->hasFile('image')) {
                    $image_tmp = $request->image;
                    $filename = time() . '.' . $image_tmp->clientExtension();
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = time() . rand(111, 99999) . '.' . $extension;
                        $article_path = 'assets/img/user/'.$filename;
                        Image::make($image_tmp)->save($article_path);
                        $user->image = $filename;
                    }
                }
                $user->status = $status;
                $user->save();
                    // $staff = new Staff;
                    // $staff->admin_id = $user->id;
                    // $staff->role_id = $request->role;
                    // $staff->save();
                
                alert()->success('User added successfully','');
                return redirect('view-users')->with('success_message','User added successfully');
            }
        }
        $roles = Role::get();
        $meta_title = 'Add User';
        return view('admin.user.add_user')->with(compact('roles','meta_title'));
    }

    public function editUser(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = time() . rand(111, 99999) . '.' . $extension;
                    $article_path = 'assets/img/user/' . $filename;
                    Image::make($image_tmp)->save($article_path);
                }
            }elseif (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            }else {
                $filename = '';
            }

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;  
            }

            if($data['role'] == 'Superadmin'){
                $admin_role = 'Superadmin';
            }else{
                $admin_role = NULL;
            }

            Admin::where(['id'=>base64_decode($id)])->update(['name'=>$data['name'],'role_id'=>$data['role'],'status'=>$status,'admin_role'=>$admin_role,'image'=>$filename]);
            alert()->success('User details updated successfully','');
            return redirect()->back();
        }
        $user = Admin::where('id',base64_decode($id))->first();
        $roles = Role::get();
        return view('admin.user.edit_user',with(compact('user','roles')));
    }

    public function viewUsers(Request $request){
        if(Auth::guard('admin')->User()->admin_role != 'Superadmin'){
            toast('Access Denied','error');
            return redirect()->back();
        }

        $role_id = NULL;
        $status = NULL;
        $name = NULL;
        $users = Admin::select('admins.*', 'roles.name as role_name')->leftJoin('roles','admins.role_id','roles.id')->orderBy('name','ASC');
        if($request->has('role_id') && $request->role_id != null){
            $users = $users->where('admins.role_id',$request->role_id);
            $role_id = $request->role_id;
        }
        if($request->status != null){
            $users = $users->where('admins.status',$request->status);
            $status = $request->status;
        }
        if($request->name != null)
        {
            $users = $users->where('admins.name','LIKE',"%".$request->name."%")->orWhere('admins.email','LIKE',"%".$request->name."%");
            $name = $request->name;
        }
        $users = $users->paginate(10);
        
        $meta_title = 'All Users';
        return view('admin.user.view_users')->with(compact('users','role_id','status','meta_title','name'));
    }

    public function deleteUser(Request $request, $id){
        Admin::where(['id'=>base64_decode($id)])->delete();
        alert()->success('User deleted successfully','');
        return redirect()->back()->with('success_message','User deleted successfully!');
    }

    public function userRoles(Request $request){
        if(Auth::guard('admin')->User()->admin_role != 'Superadmin'){
            toast('Access Denied','error');
            return redirect()->back();
        }
        $roles = Role::orderBy('name','ASC')->get();
        $meta_title = 'Users Roles';
        return view('admin.user.view_roles')->with(compact('roles','meta_title'));
    }

    public function roleCreate(Request $request){
        if($request->isMethod('post')){
            if($request->has('permissions')){
                // dd($request->all());
                $role = new Role;
                $role->name = $request->name;
                $role->permissions = json_encode($request->permissions);
                $role->save();
                toast('Role has been added successfully','success');
                return redirect('user/roles');
            }
        }
        return view('admin.user.role_create');
    }

    public function roleEdit(Request $request, $id){
        $role = Role::findOrFail(base64_decode($id));
        if($request->isMethod('post')){
            $role->name = $request->name;
            if($request->has('permissions')){
                $role->permissions = json_encode($request->permissions);
                $role->save();
                toast('Role has been updated successfully','success');
                return redirect('user/roles');
            }
        }
        return view('admin.user.role_edit',compact('role'));
    }

    public function deleteRole(Request $request, $id){
        Role::destroy(base64_decode($id));
        toast('Role deleted successfully','success');
        return redirect('user/roles');
    }

    public function updateStatus(Request $request){
        // return $request->status;
        if($request->status == '1'){
            $status='0';
        }else{
            $status='1';
        }
        Admin::where(['id'=>$request->userid])->update(['status'=>$status]);
    }

    public function changePassword(){
        $meta_title = 'Change Password';
        return view('admin.change_password')->with(compact('meta_title'));
    }

    public function settings(Request $request){
        if(Auth::guard('admin')->User()->admin_role != 'Superadmin'){
            toast('Access Denied','error');
            return redirect()->back();
        }
        if($request->isMethod('post')){
            // dd($request->all());
            Setting::where('type','delivery_warning_days')->update(['value'=>$request->delivery_warning_days]);
            Setting::where('type','admin_email')->update(['value'=>$request->admin_email]);
            Setting::where('type','payment_upcming_months')->update(['value'=>$request->payment_upcming_months]);
            toast('Settings updated','success');
            return back();
        }
        $meta_title = 'Settings';
        return view('admin.settings')->with(compact('meta_title'));
    }

    public function indiamartAPIUpdate(Request $request){
        if($request->isMethod('post')){
            // dd($request->all());

            Setting::where('type','indiamart_api')->update(['value'=>$request->indiamart_mob.'-'.$request->indiamart_secret]);
            toast('Settings updated','success');
            return back();
        }
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        // return bcrypt($data['current_pwd']);
        $adminCount = Admin::where(['id'=>Auth::User()->id,'password'=>bcrypt($data['current_pwd'])])->count(); 
        if($adminCount == 1){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $adminCount = Admin::where(['id'=>Auth::User()->id])->first();
            if (Hash::check($data['current_pwd'], $adminCount->password)) {
                Admin::where('email',Auth::User()->email)->update(['password'=>bcrypt($data['new_pwd'])]);
                return redirect()->back()->with('success_message','Password updated successfully!');
            }else{
                return redirect()->back()->with('error_message','Incorrect current password!');
            }
        }
    }

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $userCount = Admin::where('email',$data['email'])->count();
            if($userCount==0){
                return redirect()->back()->with('error_message','We can not find a user with that Email address.');
            }

            $userDetails = Admin::where('email',$data['email'])->first();
            //generate random password
            $random_password = Str::random(8);
            $new_password = bcrypt($random_password);

            Admin::where('email',$data['email'])->update(['password'=>$new_password]);

            $email = $data['email'];
            $name = $userDetails->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgot_password',$messageData,function($message) use($email){
                $message->to($email)->subject('New Password - Chemdist Process Solutions');
            });

            return redirect()->back()->with('flash_message_success','Password sent on your email, kindly check your Email.');
        }

        $meta_title = 'Forgot Password';
        return view('admin.forgot_password',compact('meta_title'));
    }

    public function adminProfile(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            Admin::where('id',Auth::User()->id)->update(['name'=>$data['name']]);
            return redirect()->back()->with('success_message','Profile updated');
        }
        $adminDetails = Admin::where('id',Auth::User()->id)->first();
        return view('admin.admin_profile',compact('adminDetails'));
    }
    
    public function ViewEngineers(Request $request){
        $engineers = Engineer::orderBy('name','ASC')->get();
        return view('admin.enquiry.view_engineers')->with(compact('engineers'));
    }

    public function AddEngineer(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $engineer = new Engineer;
            $engineer->name = $data['name'];
            $engineer->abbr = $data['abbr'];
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;  
            }
            $engineer->status = $status;

            $engineer->save();
            return redirect()->back()->with('success_message','Engineer added successfully!');
        }
        $engineers = Engineer::where('status',1)->get();
        return view('admin.enquiry.view_engineers')->with(compact('engineers'));
    }

    public function editEngineer(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            Engineer::where(['id'=>$id])->update(['name'=>$data['name'],'abbr'=>$data['abbr']]);
            return redirect()->back()->with('success_message','User updated successfully!');
        }
    }

    public function getEngineer(Request $request){
        $id = $request->input('id');
        $enggDetails = Engineer::find($id);
        return $enggDetails;
    }

    public function deleteEngineer(Request $request, $id){
        Engineer::where(['id'=>$id])->delete();
        return redirect()->back()->with('success_message','Engineer Removed!');
    }

    public function engineerStatus(Request $request){
        if($request->status == '1'){
            $status='0';
        }else{
            $status='1';
        }
        Engineer::where(['id'=>$request->userid])->update(['status'=>$status]);
    }
    
}