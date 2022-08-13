<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

    	$categories = Category::orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	return view('admin.category.subcategory_view',compact('subcategory','categories'));

    }


     public function SubCategoryStore(Request $request){

       $request->validate([
    		'category_id' => 'required',
    		'subcategory_name' => 'required',
    	],[
    		'category_id.required' => trans('admin/controllers.plz-select-any-option'),
    		'subcategory_name.required' => trans('admin/controllers.add-subcategory-name'),
    	]);

    	 

	   SubCategory::insert([
		'category_id' => $request->category_id,
		'subcategory_name' => $request->subcategory_name,
		'subcategory_slug' => str_replace(' ', '-',$request->subcategory_name),
		 

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.subcategory-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



     public function SubCategoryEdit($id){
    	$categories = Category::orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('admin.category.subcategory_edit',compact('subcategory','categories'));

    }


    public function SubCategoryUpdate(Request $request){

    	$subcat_id = $request->id;

    	 SubCategory::findOrFail($subcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_name' => $request->subcategory_name,
		'subcategory_slug' => str_replace(' ', '-',$request->subcategory_name),
		 

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.subcategory-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all.subcategory')->with($notification);

    }  // end method



    public function SubCategoryDelete($id){

    	SubCategory::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin/controllers.subcategory-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    }

}
 