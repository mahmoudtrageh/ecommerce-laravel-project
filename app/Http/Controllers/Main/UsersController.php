<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use Carbon\Carbon;
class UsersController extends Controller
{
    public function AllUsers(){
		$users = User::latest()->get();
		return view('admin.user.all_user',compact('users'));
	}

	public function AddUserRole(){
    	return view('admin.user.user_create');
    }


 public function StoreUserRole(Request $request){
   	 

    	$image = $request->file('img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    	$save_url = $name_gen;

		$input = $request->all();
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
		])->validate();

	User::insert([
		'first_name' => $request->first_name,
		'last_name' => $request->last_name,
		'email' => $request->email,
		'password' => Hash::make($request->password),
		'img' => $save_url,
		'created_at' => Carbon::now(),
		 

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.user-created-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all-users')->with($notification);

    } // end method 



    public function EditUserRole($id){

    	$adminuser = User::findOrFail($id);
    	return view('admin.user.user_edit',compact('adminuser'));

    } // end method 




 public function UpdateUserRole(Request $request){
    	
    	$admin_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('img')) {

			if(file_exists( public_path() . 'upload/admin_images/' . $old_img)) {
				unlink($old_img);
			}
    	
    	$image = $request->file('img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    	$save_url = $name_gen;

	User::findOrFail($admin_id)->update([
		'first_name' => $request->first_name,
		'last_name' => $request->last_name,
		'email' => $request->email,
		'img' => $save_url,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.user-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all-users')->with($notification);

    	}else{

    	User::findOrFail($admin_id)->update([
		'first_name' => $request->first_name,
		'last_name' => $request->last_name,
		'email' => $request->email,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.user-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all-users')->with($notification);

    	} // end else 

    } // end method 


 	public function DeleteUserRole($id){

 		$adminimg = User::findOrFail($id);
 		$img = $adminimg->img;
 		unlink($img);

 		User::findOrFail($id)->delete();

 		 $notification = array(
			'message' => trans('admin/controllers.user-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

 	} // end method 
}
