<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
 
class CouponController extends Controller
{
    public function CouponView(){
    	$coupons = Coupon::orderBy('id','DESC')->get();
    	return view('admin.coupon.view_coupon',compact('coupons'));

    }

    public function CouponStore(Request $request){

    	$request->validate([
    		'coupon_name' => 'required',
    		'coupon_discount' => 'required',
    		'coupon_validity' => 'required',
    	 
    	]);

    	 

	Coupon::insert([
		'coupon_name' => strtoupper($request->coupon_name),
		'coupon_discount' => $request->coupon_discount, 
		'coupon_validity' => $request->coupon_validity,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.coupon-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



    public function CouponEdit($id){
     $coupons = Coupon::findOrFail($id);
    	return view('admin.coupon.edit_coupon',compact('coupons'));
    }


    public function CouponUpdate(Request $request, $id){

      Coupon::findOrFail($id)->update([
		'coupon_name' => strtoupper($request->coupon_name),
		'coupon_discount' => $request->coupon_discount, 
		'coupon_validity' => $request->coupon_validity,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.coupon-updated-successfully'),
			'alert-type' => 'info'
		);

		return redirect()->route('manage-coupon')->with($notification);


    } // end mehtod 


    public function CouponDelete($id){

    	Coupon::findOrFail($id)->delete();
    	$notification = array(
			'message' => trans('admin/controllers.coupon-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    }



}
 