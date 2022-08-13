<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    
 
    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('home',compact('contacts'));
    }


    public function ContactForm(Request $request){

        $request->validate([
			'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
		], [
			'name.required' => trans('admin/controllers.this-field-required'),
            'email.required' => trans('admin/controllers.this-field-required'),
            'subject.required' => trans('admin/controllers.this-field-required'),
            'message.required' => trans('admin/controllers.this-field-required'),
		]);

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
    
        $notification = array(
            'message' => trans('site/controllers.message-send-success'),
            'alert-type' => 'success'
        );   

        return Redirect()->route('home')->with($notification);

    }


}
