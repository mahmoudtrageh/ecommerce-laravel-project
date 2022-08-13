<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    
	public function AddProduct(){
		$categories = Category::latest()->get();
		return view('admin.product.product_add',compact('categories'));

	}


	public function StoreProduct(Request $request){

        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

      $product_id = Product::insertGetId([
      	'category_id' => $request->category_id,
      	'product_name' => $request->product_name,
      	'product_slug' =>  str_replace(' ', '-', $request->product_name),
      	'product_code' => $request->product_code,
      	'product_qty' => $request->product_qty,
      	
      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_desc' => $request->short_desc,
      	'long_desc' => $request->long_desc,

      	'product_thambnail' => $save_url,

      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);


      ////////// Multiple Image Upload Start ///////////

      $images = $request->file('multi_img');
      foreach ($images as $img) {
      	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::insert([

    		'product_id' => $product_id,
    		'photo_name' => $uploadPath,
    		'created_at' => Carbon::now(), 

    	]);

      }

      ////////// Een Multiple Image Upload Start ///////////


       $notification = array(
			'message' => trans('admin/controllers.product-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('manage-product')->with($notification);


	} // end method



	public function ManageProduct(){

		$products = Product::latest()->get();
		return view('admin.product.product_view',compact('products'));
	}


	public function EditProduct($id){

		$multiImgs = MultiImg::where('product_id',$id)->get();

		$categories = Category::latest()->get();
		$products = Product::findOrFail($id);
		return view('admin.product.product_edit',compact('categories','products','multiImgs'));

	}


	public function ProductDataUpdate(Request $request){

		$product_id = $request->id;

         Product::findOrFail($product_id)->update([
      	'category_id' => $request->category_id,
      	'product_name' => $request->product_name,
      	'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
      	'product_code' => $request->product_code,
      	'product_qty' => $request->product_qty,
      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_desc' => $request->short_desc,
      	'long_desc' => $request->long_desc,  	 
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);

          $notification = array(
			'message' => trans('admin/controllers.product-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('manage-product')->with($notification);


	} // end method 


/// Multiple Image Update
	public function MultiImageUpdate(Request $request){
		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImg::findOrFail($id);
	    unlink($imgDel->photo_name);
	     
    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);

	 } // end foreach

       $notification = array(
			'message' => trans('admin/controllers.product-images-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

	} // end mehtod 


 /// Product Main Thambnail Update /// 
 public function ThambnailImageUpdate(Request $request){
 	$pro_id = $request->id;
 	$oldImage = $request->old_img;
 	unlink($oldImage);

    $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

    	Product::findOrFail($pro_id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);

         $notification = array(
			'message' => trans('admin/controllers.product-thumbnail-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     } // end method


 //// Multi Image Delete ////
     public function MultiImageDelete($id){
     	$oldimg = MultiImg::findOrFail($id);
     	unlink($oldimg->photo_name);
     	MultiImg::findOrFail($id)->delete();

     	$notification = array(
			'message' => trans('admin/controllers.product-images-deleted-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     } // end method 



     public function ProductInactive($id){
     	Product::findOrFail($id)->update(['status' => 0]);
     	$notification = array(
			'message' => trans('admin/controllers.product-inactive'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }


  public function ProductActive($id){
  	Product::findOrFail($id)->update(['status' => 1]);
     	$notification = array(
			'message' => trans('admin/controllers.product-active'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     	
     }



     public function ProductDelete($id){
     	$product = Product::findOrFail($id);
     	unlink($product->product_thambnail);
     	Product::findOrFail($id)->delete();

     	$images = MultiImg::where('product_id',$id)->get();
     	foreach ($images as $img) {
     		unlink($img->photo_name);
     		MultiImg::where('product_id',$id)->delete();
     	}

     	$notification = array(
			'message' => trans('admin/controllers.product-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

     }// end method 



  // product Stock 
public function ProductStock(){

    $products = Product::latest()->get();
    return view('admin.product.product_stock',compact('products'));
  }


}
 