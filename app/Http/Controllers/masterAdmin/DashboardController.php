<?php

namespace App\Http\Controllers\masterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\OrderSystem;
use Auth,Redirect,View,File,Config,Image,Hash;
use DB;

class DashboardController extends Controller
{
    public function showdashboard(Request $request)
    {
        return view('masters.dashboard.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('flash_notice',trans("messages.Login.logout"));
    }

    function examOrdersList(Request $request)
    {
        $data['orders'] = OrderSystem::join('users','exam_order.user_id','users.id')->join('tests','tests.test_id','exam_order.test_id')->orderby('exam_order.order_id','desc')->get(['exam_order.is_active AS order_active','exam_order.*','users.*']);

        return view('masters.orders.order',$data);
        return $data;
    }

    function order_status_update(Request $request)
    {
        $input = $request->all();
       // return $input;
        OrderSystem::where('order_id',$request->order_id)->update($input);

        $request->session()->flash('alert-success','Order Active Status has been Successfully update.');
        return Redirect::route('examOrders');
    }
}
