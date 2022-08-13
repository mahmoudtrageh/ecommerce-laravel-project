<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
 
class MenuController extends Controller
{
    public function MenuView(){

    	$menu = Menu::latest()->get();
    	return view('admin.menu.menu_view',compact('menu'));
    }

    public function MenuStore(Request $request){


		
       $request->validate([
    		'menu_name' => 'required',
    	],[
    		'menu_name.required' => trans('admin/controllers.add-menu-name'),
    	]);

		

	Menu::insert([
		'menu_name' => $request->menu_name,
		'url' => $request->url,
		'icon' => $request->icon,
		'menu_slug' => str_replace(' ', '-',$request->menu_name),

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.menu-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


    public function MenuEdit($id){
    	$menu = Menu::findOrFail($id);
    	return view('admin.menu.menu_edit',compact('menu'));

    }


    public function MenuUpdate(Request $request ,$id){
		
      Menu::findOrFail($id)->update([
		'menu_name' => $request->menu_name,
		'url' => $request->url,
		'icon' => $request->icon,
		'menu_slug' => str_replace(' ', '-',$request->menu_name),

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.menu-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all.menu')->with($notification);


    } // end method


    public function MenuDelete($id){

    	Menu::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin/controllers.menu-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    } // end method 


}
 