<?php

namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAuthController extends Controller
{
    public function Index()
    {
        return view('admin.admin_login');
    } // end method

    public function Login(Request $request)
    {
        $check = $request->all();
        $success = array(
			'message' => trans('admin/controllers.logging-successfully'),
			'alert-type' => 'success'
		);
        $error = array(
			'message' => trans('admin/controllers.verify-info'),
			'alert-type' => 'error'
		);
        if (Auth::guard('admin')->attempt(['email' =>
        $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with($success);
        } else {
            return back()->with($error);
        }
    } // end method

    public function AdminLogout()
    {
        $success = array(
			'message' => trans('admin/controllers.logout-successfully'),
			'alert-type' => 'success'
		);
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with($success);
    } // end method

}
