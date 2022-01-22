<?php

namespace App\Http\Controllers\masterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth,Redirect,View,File,Config,Image;
use Validator;
use DB;
use App\User;
use Hash;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        $data['seller'] = User::where('user_role','SELLER')->get();
        $page_title = "Sellers - ".SITEPROFILE;
        return view('masters.seller.list',compact('page_title'),$data);
    }
    public function create(Request $request)
    {

        $page_title = "Seller Create - ".SITEPROFILE;
        $page_head = "Seller Create";
        return view('masters.seller.new',compact('page_title','page_head'));
    }

    function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['user_role'] = "SELLER";
        if($request->file('image')!='')
        {
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $imgname = $filename;

            $input['image']= $imgname;
            $destinationPath=public_path('upload/seller/');
            $request->file('image')->move($destinationPath, $imgname);

        }
        User::insert($input);
        return Redirect::route('seller');
    }
    public function edit(Request $request,$id)
    {
        $data['seller'] = User::find($id);
        $page_title = "Seller Update - ".SITEPROFILE;
        $page_head = "Seller Update";
        return view('masters.seller.new',compact('page_title','page_head'),$data);
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['user_role'] = "SELLER";
        if($request->file('image')!='')
        {
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $imgname = $filename;

            $input['image']= $imgname;
            $destinationPath=public_path('upload/seller/');
            $request->file('image')->move($destinationPath, $imgname);

        }
        User::where('id',$request->id)->update($input);
        return Redirect::route('seller');
    }


    public function addTestimonialsPage(Request $request)
    {

        $page_title = " Add Testimonials - ".SITEPROFILE;
       return view('masters.testimonials.add_testimonials',compact('page_title'));
    }

    public function testimonialsStore(Request $request)
   {
      $input = $request->all();
      if($request->file('image')!='')
      {
          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;

          $input['image']= $imgname;
          $destinationPath=public_path('upload/home/testimonials/');
          $request->file('image')->move($destinationPath, $imgname);

      }
          Testimonials::insert($input);
          $request->session()->flash('alert-success','Testimonials has been sucessfully added.');
          return Redirect::route('addTestimonials');
   }

    public function testimonialsUpdatePage(Request $request,$testimonials_id)
  {
      $users['testimonials_datas'] = Testimonials::where('testimonials_id',$testimonials_id)->get();
      $page_title = "Edit Testimonials - ".SITEPROFILE;
      return view('masters.testimonials.edit_testimonials',compact('page_title'),$users);
  }

  public function testimonialsEditStore(Request $request)
    {
      $input = $request->all();
      $testimonials_id = $request->testimonials_id;
      if($request->file('image')!='')
      {
          $data=Testimonials::where('testimonials_id','=',$testimonials_id)->value('image');
	      $fullpath=public_path('upload/home/testimonials/').$data;
	      File::delete($fullpath);

          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;

          $input['image']= $imgname;
          $destinationPath=public_path('upload/home/testimonials/');
          $request->file('image')->move($destinationPath, $imgname);

      }

      else
      {
           unset($input['image']);
      }

       Testimonials::where('testimonials_id','=',$testimonials_id)->update($input);

        $request->session()->flash('alert-success','Testimonials has been sucessfully Updated . ');
        return Redirect::route('testimonials');


    }

    public function testimonialsDeleteFormat(Request $request,$testimonials_id)
  {
      $data=Testimonials::where('testimonials_id','=',$testimonials_id)->value('image');
      $fullpath=public_path('upload/testimonials/').$data;
      File::delete($fullpath);
      $m = Testimonials::where('testimonials_id','=',$testimonials_id)->delete();
      $request->session()->flash('alert-success','Testimonials has been deleted Successfully!!');
      return Redirect::route('testimonials');
  }
}
