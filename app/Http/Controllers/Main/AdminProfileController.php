<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AdminProfileController extends Controller
{ 
   
	public function AdminProfile(){
		$id = Auth::guard('admin')->user()->id;
		$adminData = Admin::find($id);
		return view('admin.admin_profile_view',compact('adminData'));
	}
 
	public function AdminProfileEdit(){

		$id = Auth::guard('admin')->user()->id;
		$editData = Admin::find($id);
		return view('admin.admin_profile_edit',compact('editData'));

	}

	public function AdminProfileStore(Request $request){

		$id = Auth::guard('admin')->user()->id;
		$data = Admin::find($id);
		$data->name = $request->name;
		$data->email = $request->email;


		if ($request->file('img')) {
			$file = $request->file('img');
			@unlink(public_path('upload/admin_images/'.$data->img));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/admin_images'),$filename);
			$data['img'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => trans('admin/controllers.profile-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('admin.profile')->with($notification);

	} // end method 



	public function AdminChangePassword(){

		return view('admin.admin_change_password');

	}

	public function AdminUpdateChangePassword(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::guard('admin')->user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$admin = Admin::find(Auth::guard('admin')->user()->id);
			$admin->password = Hash::make($request->password);
			$admin->save();
			Auth::logout();
			return redirect()->route('admin.logout');
		}else{
			return redirect()->back();
		}


	}// end method

}
