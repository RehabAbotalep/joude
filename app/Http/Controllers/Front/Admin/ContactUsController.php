<?php

namespace App\Http\Controllers\Front\Admin;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function getContact(){
    	
    	$contacts = ContactUs::orderBy('created_at','DESC')->get();
    	return view('admin.contacts.index',compact('contacts'));
    }

    public function destroy($id){
    	ContactUs::find($id)->delete();
    	return back();
    }
}
