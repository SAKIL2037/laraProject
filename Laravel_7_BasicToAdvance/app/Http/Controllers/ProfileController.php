<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{


	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function Profile()
    {
    	return view('admin.profile.index');
    	
    }


    public function Update(Request $request)
    {
    	$request->validate([
        'name' => 'required|min:4',
        'email' => 'required|email',

        ]);

      $id = Auth::id();
      User::find($id)->update([
      	'name' => $request->name,
      	'email'=> $request->email,
      ]);


       return redirect()->back()->with('success','Successfuly User Profile Updated');
    }



    public function Password()
    {
    	return view('admin.profile.password');
    }


    public function updatePassword(Request $request)
    {
    	$db_pass = Auth::user()->password;
    	$oldpass = $request->old_password;
    	$newpass = $request->new_password;
    	$conpass = $request->confirm_password;
    

    	if(Hash::check($oldpass,$db_pass)){
    		if($newpass===$conpass){

    			User::find(Auth::user()->id)->update([
    				'password' => Hash::make($request->new_password) 

    			]);
    			Auth::logout();
    			return redirect()->route('login');
    		}
    		else{
    			return redirect()->back()->with('success','New Password and Confirm Password Not Same');
    		}

    	}
    	else{
    		 return redirect()->back()->with('success',$oldpass);

    	}
    }
}
