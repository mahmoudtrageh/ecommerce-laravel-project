<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lang;
use Image;
use Illuminate\Support\Carbon;

class LangsController extends Controller
{
    public function AllLang(){

        $langs = Lang::latest()->paginate(5);
        return view('admin.lang.lang_view' , compact('langs'));
    }


    public function StoreLang(Request $request){

        $image = $request->file('logo');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('upload/lang/'.$name_gen);
    	$save_url = 'upload/lang/'.$name_gen;
        
        Lang::insert([
            'logo' => $save_url,
            'name' => $request->name,
            'code' => $request->code,
            'created_at' => Carbon::now()
        ]);
         
        $notification = array(
            'message' => trans('admin/controllers.lang-added-successfully'),
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);

    }


    public function EditLang($id){
        $langs = Lang::find($id);
        return view('admin.lang.lang_edit',compact('langs'));

    }
 

    public function Update(Request $request, $id){

        $lang_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('logo')) {

            unlink($old_img);
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/lang/'.$name_gen);
            $save_url = 'upload/lang/'.$name_gen;

            Lang::findOrFail($lang_id)->update([
                'logo' => $save_url,
                'name' => $request->name,
                'code' => $request->code,
                'created_at' => Carbon::now()
            ]);

        }else{
            
            Lang::findOrFail($lang_id)->update([
                'name' => $request->name,
                'code' => $request->code,
                'created_at' => Carbon::now()
            ]);

        }

        $notification = array(
            'message' => trans('admin/controllers.lang-updated-successfully'),
            'alert-type' => 'info'
        );         
        return Redirect()->back()->with($notification);
       
    }

     public function Delete($id){
       
        $lang = Lang::findOrFail($id);
		$img = $lang->logo;

		if (file_exists(public_path() . 'upload/lang/' . $img)) {
			unlink($img);
		}
        Lang::find($id)->delete();
        $notification = array(
            'message' => trans('admin/controllers.lang-deleted-successfully'),
            'alert-type' => 'error'
        );   
        return Redirect()->back()->with($notification);

     }
}
