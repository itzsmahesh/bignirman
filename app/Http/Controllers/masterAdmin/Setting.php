<?php

namespace App\Http\Controllers\masterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Auth,Redirect,View,File,Config,Image,Hash;
use DB;
use App\User;

class Setting extends Controller
{
    public function changePasswordPage(Request $request)
   {
        $users['usersDatas'] = User::where('id', 1)->get();
        $page_title = "User Panel List - Knowborder";
       return view('masters.setting.userPassword',compact('page_title'),$users);
   }
    
    public function adminPasswordUpdatePage(Request $request,$id)
  {
      $users['userssData'] =  User::where('id','=',$id)->get();
      $page_title = "Edit User - Knowborder";
      return view('masters.setting.userPasswordEdit',compact('page_title'),$users);
  }
    
    public function changePasswordUpdateSave(Request $request)
    {

      $id = $request->id;
      $old_pass = Auth::user()->password;
      $old_password = $request->oldpassword;
      if((Hash::check($old_password , $old_pass)))
      {
          
        $input['password']=Hash::make($request['password']);
         $input['email']=$request->email; 
         User::where('id',$id)->update($input); 
          
          Auth::logout();
          $request->session()->flash('alert-danger','Password Updated Successfully!!'); 
          return Redirect::route('/');
          return redirect('/');
      }
      else
      {
         
          $request->session()->flash('alert-danger','Old Password does not match !!');
          return Redirect::route('changePassword');
          
      }
    }
}
