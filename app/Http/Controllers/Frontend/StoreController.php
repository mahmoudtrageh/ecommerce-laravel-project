<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use App\Models\Category;
use App\Models\Product;
class StoreController extends Controller
{

    public function ShopView($id){
		$products = Product::where('category_id', $id)->latest()->get();
		$category = Category::where('id', $id)->first();
		return view('shop.index', compact('products', 'category'));
	}

      /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category')->findOrFail($id);

		return response()->json(array(
			'product' => $product,
		));

	} // end method 


	public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);
        $categories = Category::orderBy('category_name','ASC')->get();

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$category = Category::findOrFail($cat_id);
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('shop.product_details',compact('category','categories', 'product','multiImag','relatedProduct'));

	}
}
