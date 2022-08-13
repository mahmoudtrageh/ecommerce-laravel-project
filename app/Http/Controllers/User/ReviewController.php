<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Auth;
use Carbon\Carbon; 


class ReviewController extends Controller
{
    public function ReviewStore(Request $request){

    	$product = $request->product_id;

    	$request->validate([

    		'summary' => 'required',
    		'comment' => 'required',
    	]);

    	Review::insert([
    		'product_id' => $product,
    		'user_id' => Auth::id(),
    		'comment' => $request->comment,
    		'summary' => $request->summary,
            'rating' => $request->quality,
    		'created_at' => Carbon::now(),

    	]);

    	$notification = array(
			'message' => trans('site/controllers.review-will-approve-admin'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } // end mehtod 



 public function PendingReview(){

    	$review = Review::where('status',0)->orderBy('id','DESC')->get();
    	return view('admin.review.pending_review',compact('review'));

    } // end method 



    public function ReviewApprove($id){

    	Review::where('id',$id)->update(['status' => 1]);

    	$notification = array(
            'message' => trans('site/controllers.review-approved-success'),
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end mehtod 


    public function PublishReview(){
    $review = Review::where('status',1)->orderBy('id','DESC')->get();
    	return view('admin.review.publish_review',compact('review'));
    }



    public function DeleteReview($id){

    	Review::findOrFail($id)->delete();

    	$notification = array(
            'message' => trans('site/controllers.review-deleted-success'),
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    } // end method 

}
 