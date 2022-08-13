<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Seo;
use App\Models\Gateway;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
	public function SiteSetting()
	{

		$setting = Setting::find(1);
		return view('admin.setting.setting_update', compact('setting'));
	}


	public function SiteSettingUpdate(Request $request)
	{

		$setting_id = $request->id;


		$image = $request->file('logo');
		if ($image) {
			// logo
			$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(300, 200)->save('upload/settings/' . $name_gen);
			$save_url = 'upload/settings/' . $name_gen;

			Setting::findOrFail($setting_id)->update([
				'phone_one' => $request->phone_one,
				'phone_two' => $request->phone_two,
				'email' => $request->email,
				'name' => $request->name,
				'site_name' => $request->site_name,
				'address' => $request->address,
				'facebook' => $request->facebook,
				'twitter' => $request->twitter,
				'linkedin' => $request->linkedin,
				'youtube' => $request->youtube,
				'instagram' => $request->instagram,
				'github' => $request->github,
				'logo' => $save_url,	
			]);
		}
		$favicon =  $request->file('favicon');
		if ($favicon) {
			// favicon
			$name_gen_favicon = hexdec(uniqid()) . '.' . $favicon->getClientOriginalExtension();
			Image::make($favicon)->resize(50, 50)->save('upload/settings/' . $name_gen_favicon);
			$last_img_favicon = 'upload/settings/' . $name_gen_favicon;
			Setting::findOrFail($setting_id)->update([
				'phone_one' => $request->phone_one,
				'phone_two' => $request->phone_two,
				'email' => $request->email,
				'name' => $request->name,
				'site_name' => $request->site_name,
				'address' => $request->address,
				'facebook' => $request->facebook,
				'twitter' => $request->twitter,
				'linkedin' => $request->linkedin,
				'youtube' => $request->youtube,
				'instagram' => $request->instagram,
				'github' => $request->github,
				'favicon' => $last_img_favicon,
			]);
		} else {
			Setting::findOrFail($setting_id)->update([
				'phone_one' => $request->phone_one,
				'phone_two' => $request->phone_two,
				'email' => $request->email,
				'site_name' => $request->site_name,
				'name' => $request->name,
				'address' => $request->address,
				'facebook' => $request->facebook,
				'twitter' => $request->twitter,
				'linkedin' => $request->linkedin,
				'youtube' => $request->youtube,
				'instagram' => $request->instagram,
				'github' => $request->github,
			]);
		}

		

		$notification = array(
			'message' => trans('admin/controllers.setting-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method 



	public function SeoSetting()
	{

		$seo = Seo::find(1);
		return view('admin.setting.seo_update', compact('seo'));
	}


	public function SeoSettingUpdate(Request $request)
	{

		$seo_id = $request->id;

		Seo::findOrFail($seo_id)->update([
			'meta_title' => $request->meta_title,
			'meta_author' => $request->meta_author,
			'meta_keyword' => $request->meta_keyword,
			'meta_description' => $request->meta_description,
			'google_analytics' => $request->google_analytics,

		]);

		$notification = array(
			'message' => trans('admin/controllers.seo-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end mehtod 

	public function GatewaySetting()
	{

		$gateway = Gateway::find(1);
		return view('admin.setting.gateway_update', compact('gateway'));
	}


	public function GatewaySettingUpdate(Request $request)
	{

		$gateway_id = $request->id;

		Gateway::findOrFail($gateway_id)->update([
			'google_client_id' => $request->google_client_id,
			'google_app_secret' => $request->google_app_secret,
			'stripe_key' => $request->stripe_key,
			'stripe_secret' => $request->stripe_secret,

		]);

		$notification = array(
			'message' => trans('admin/controllers.gateway-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end mehtod 


}
