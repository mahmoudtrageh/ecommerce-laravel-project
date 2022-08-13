<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;
 


class OrderController extends Controller
{
    
	// Pending Orders 
	public function PendingOrders(){
		
		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('admin.orders.pending_orders',compact('orders'));

	} // end mehtod 


	// Pending Order Details 
	public function PendingOrdersDetails($order_id){

		$order = Order::with('provinces','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('admin.orders.pending_orders_details',compact('order','orderItem'));

	} // end method 



	// Confirmed Orders 
	public function ConfirmedOrders(){
		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('admin.orders.confirmed_orders',compact('orders'));

	} // end mehtod 


	// Processing Orders 
	public function ProcessingOrders(){
		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('admin.orders.processing_orders',compact('orders'));

	} // end mehtod 


		// Picked Orders 
	public function PickedOrders(){
		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('admin.orders.picked_orders',compact('orders'));

	} // end mehtod 



			// Shipped Orders 
	public function ShippedOrders(){
		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('admin.orders.shipped_orders',compact('orders'));

	} // end mehtod 


			// Delivered Orders 
	public function DeliveredOrders(){
		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('admin.orders.delivered_orders',compact('orders'));

	} // end mehtod 


				// Cancel Orders 
	public function CancelOrders(){
		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('admin.orders.cancel_orders',compact('orders'));

	} // end mehtod 




	public function PendingToConfirm($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'confirm']);

      $notification = array(
			'message' => trans('admin/controllers.order-confirm-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('pending-orders')->with($notification);


	} // end method





	public function ConfirmToProcessing($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'processing']);

      $notification = array(
			'message' => trans('admin/controllers.order-processing-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('confirmed-orders')->with($notification);


	} // end method



		public function ProcessingToPicked($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'picked']);

      $notification = array(
			'message' => trans('admin/controllers.order-picked-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('processing-orders')->with($notification);


	} // end method


	 public function PickedToShipped($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'shipped']);

      $notification = array(
			'message' => trans('admin/controllers.order-shipped-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('picked-orders')->with($notification);


	} // end method


	 public function ShippedToDelivered($order_id){

	 $product = OrderItem::where('order_id',$order_id)->get();
	 foreach ($product as $item) {
	 	Product::where('id',$item->product_id)
	 			->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
	 } 
 
      Order::findOrFail($order_id)->update(['status' => 'delivered']);

      $notification = array(
			'message' => trans('admin/controllers.order-delivered-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('shipped-orders')->with($notification);


	} // end method


	public function AdminInvoiceDownload($order_id){

		$order = Order::with('provinces','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	 
		$pdf = PDF::loadView('admin.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} // end method 



}
 