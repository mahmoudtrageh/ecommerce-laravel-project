<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\OrderItem;
use Carbon\Carbon;
use PDF;

class UserProfileController extends Controller
{
    public function ProfileView(){
		$orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
		$id = Auth::user()->id;
    	$user = User::find($id);
		return view('auth.profile', compact('orders', 'user'));
	}

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::guard('web')->user()->id);
		$data->first_name = $request->first_name;
		$data->last_name = $request->last_name;
		$data->email = $request->email;
		$data->phone = $request->phone;
 

		if ($request->file('img')) {
			$file = $request->file('img');
			@unlink(public_path('upload/admin_images/'.$data->img));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/admin_images'),$filename);
			$data['img'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => trans('site/controllers.user-profile-updated-success'),
			'alert-type' => 'success'
		);

		return redirect()->route('profile.view',Auth::guard('web')->user()->id)->with($notification);

    } // end method 
 

    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('home');
		}else{
			return redirect()->back();
		}


	}// end method

    public function OrderDetails($order_id)
    {
        $order = Order::with('provinces', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('order.order_details', compact('order', 'orderItem'));
    } // end mehtod 

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('provinces', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));



        $pdf = PDF::loadView('order.order_invoice', [
            'mode'                       => '',
            'format'                     => 'A4',
            'default_font_size'          => '12',
            'default_font'               => 'sans-serif',
            'margin_left'                => 10,
            'margin_right'               => 10,
            'margin_top'                 => 10,
            'margin_bottom'              => 10,
            'margin_header'              => 0,
            'margin_footer'              => 0,
            'orientation'                => 'P',
            'title'                      => 'Laravel mPDF',
            'author'                     => '',
            'watermark'                  => '',
            'show_watermark'             => false,
            'show_watermark_image'       => false,
            'watermark_font'             => 'sans-serif',
            'display_mode'               => 'fullpage',
            'watermark_text_alpha'       => 0.1,
            'watermark_image_path'       => '',
            'watermark_image_alpha'      => 0.2,
            'watermark_image_size'       => 'D',
            'watermark_image_position'   => 'P',
            'custom_font_dir'            => '',
            'custom_font_data'           => [],
            'auto_language_detection'    => false,
            'temp_dir'                   => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
            'pdfa'                       => false,
            'pdfaauto'                   => false,
            'use_active_forms'           => false,
        ], compact('order', 'orderItem'));
        return $pdf->stream('invoice.pdf');
    } // end mehtod 

    ///////////// Order Traking ///////

    public function OrderTraking(Request $request)
    {

        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {

            // echo "<pre>";
            // print_r($track);

            return view('traking.track_order', compact('track'));
        } else {

            $notification = array(
                'message' => trans('site/controllers.invoice-code-invalid'),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // end mehtod 
}
