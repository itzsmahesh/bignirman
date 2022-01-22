<?php

namespace App\Http\Controllers\masterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Auth,Redirect,View,File,Config,Image,Hash;
use DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->user_role=='ADMIN') {
               return redirect(route('dashboard'));
            }
        }
        if($request->isMethod('post')){
            $userdata = array(
                'email' 		=> 	$request->get('email'),
                'password' 		=> 	$request->get('password'),
                'user_role' 	=> 	'ADMIN',
                
            );
            if (Auth::attempt($userdata)){
                return redirect(route('dashboard'));
            }else{
                $request->session()->flash('alert-danger','Invaild Id and Password !!');
                return Redirect::back() ->withInput();
            }
        }
        else
        {
            return view('masters.login.login');
        }
        
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('alert-danger','You are Logout !!');
        return redirect(route('login'));
    }
}
