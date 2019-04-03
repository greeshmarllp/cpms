<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        
    	return view('auth/login');
    }
    public function login_check(Request $request)
    {
    	$this->validate($request, [
          
          'email'  => 'required|email',
          'password' =>'required|alphaNum|min:3'

    	]);        

        $user_data = array('email' => $this->request->get('email'),
    	                   'password' => $this->request->get('password'));
    	
        if(Auth::attempt($user_data))
        {
        	return redirect('/main/successLogin'); 
        }
        else
        {
        	return back()->with('error','Wrong Credentials');
        }

    }

    public function successlogin()
    {
    	return view('success-login');
    }

}//end class
