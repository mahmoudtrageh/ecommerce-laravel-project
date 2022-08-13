<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Image;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
	public function Home(){
		$categories = Category::latest()->get();
		$products = Product::latest()->get();
		return view('home', compact('categories', 'products'));
	}

	
}
 