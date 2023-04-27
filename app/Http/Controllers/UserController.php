<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            if(Auth::guard('web')->attempt(['email'=>$data['email'],'password'=>$data['password']])){\
                toast('logged in successfully','success');
                return redirect('superadmin/dashboard');
            }else{
            	toast('Invalid username or password','error');
                return redirect('superadmin/login')->with('flash_message_error','Invalid email or password.');
            }
        }
    	return view('superadmin.login');
    }

    public function dashboard(){
    	return view('superadmin.dashboard');
    }

    public function logout(){
    	Auth::guard('web')->logout();
        return redirect('superadmin/login');
    }
}
