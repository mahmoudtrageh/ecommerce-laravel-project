<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailSetting;

class EmailSettingsController extends Controller
{
    public function EmailSetting()
	{

		$email_setting = EmailSetting::find(1);
		return view('admin.email.settings', compact('email_setting'));
	}


	public function EmailSettingUpdate(Request $request)
	{

		$email_id = $request->id;

		EmailSetting::findOrFail($email_id)->update([
			'driver' => $request->driver,
			'host' => $request->host,
			'port' => $request->port,
			'username' => $request->username,
			'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,
            'from_name' => $request->from_name,
		]);

		$notification = array(
			'message' => trans('admin/controllers.email-settings-updated'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end mehtod 
}
