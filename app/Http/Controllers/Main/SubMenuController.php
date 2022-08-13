<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubMenu;
use App\Models\Menu;

class SubMenuController extends Controller
{
    public function SubMenuView(){

    	$menus = Menu::orderBy('menu_name','ASC')->get();
    	$submenu = SubMenu::latest()->get();
    	return view('admin.menu.submenu_view',compact('submenu','menus'));

    }


     public function SubMenuStore(Request $request){

       $request->validate([
    		'menu_id' => 'required',
    		'submenu_name' => 'required',
    	],[
    		'menu_id.required' => trans('admin/controllers.plz-select-any-option'),
    		'submenu_name.required' => trans('admin/controllers.add-submenu-name'),
    	]);

    	 

	   SubMenu::insert([
		'menu_id' => $request->menu_id,
		'submenu_name' => $request->submenu_name,
		'url' => $request->url,
		'icon' => $request->icon,
		'submenu_slug' => str_replace(' ', '-',$request->submenu_name),
		 

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.submenu-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



     public function SubMenuEdit($id){
    	$menus = Menu::orderBy('menu_name','ASC')->get();
    	$submenu = SubMenu::findOrFail($id);
    	return view('admin.menu.submenu_edit',compact('submenu','menus'));

    }


    public function SubMenuUpdate(Request $request){

    	$submenu_id = $request->id;

    	 SubMenu::findOrFail($submenu_id)->update([
		'menu_id' => $request->menu_id,
		'submenu_name' => $request->submenu_name,
		'url' => $request->url,
		'icon' => $request->icon,
		'submenu_slug' => str_replace(' ', '-',$request->submenu_name),
		 

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.submenu-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all.submenu')->with($notification);

    }  // end method

    public function SubMenuDelete($id){

    	SubMenu::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin/controllers.submenu-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    }

}
 