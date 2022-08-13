<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    
    public function CheckoutStore(Request $request){
    	// dd($request->all());

    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['province_id'] = $request->province_id;
    	$data['address'] = $request->address;
    	$data['notes'] = $request->notes;
    	$cartTotal = Cart::total();

    	
        if ($request->payment_method == 'stripe') {
    		return view('payment.stripe',compact('data','cartTotal'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return view('payment.cash',compact('data','cartTotal'));
    	} 

    }// end mehtod. 

}
 