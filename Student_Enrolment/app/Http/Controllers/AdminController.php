<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\admin;
use DB;
use Session;

session_start();

class AdminController extends Controller
{
    public function login_dashboard(Request $request)
    {
    	

    	$email = $request->email;
    	$password = $request->password;

    	$result = DB::table('admins')
    	->where('admin_email',$email)
    	->where('admin_password',$password)
    	->first();

    	if($result){
    		Session::put('admin_email',$result->admin_email);
    		Session::put('admin_id',$result->admin_id);
    		return redirect('/admin_dashboard');
    	}
    	else{
    		Session::put('exception','Email and Password not Match');
    		return redirect('/backend');
    	}
    }


    public function adminDashboard()
    {
    	return view('admin.dashboard');
    }
      public function view_profile()
    {
        return view('admin.view_profile');
    }
      public function setting()
    {
        return view('admin.setting');
    }

     public function logout()
    {
        Session::put('admin_email',null);
        Session::put('admin_id',null);
    	return view('admin.admin_login');
    }
}
