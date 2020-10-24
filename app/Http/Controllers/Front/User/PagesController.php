<?php

namespace App\Http\Controllers\Front\User;

use App\ContactUs;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use App\MobilePage;
use App\Setting;
use Illuminate\Http\Request;
use Validator;

class PagesController extends Controller
{	use LangData;
    //get Faq
    public function faqs(){
    	$faqs     = Faq::all();
        $language = app()->getLocale();
        $faqs     = $this->toLang($language,$faqs,false);
    	return view('user.pages.faqs',compact('faqs'));
    }

    public function termsCondition(){
    	$terms    = MobilePage::where('slug','terms_and_conditions')->first();
    	$language = app()->getLocale();
        $terms     = $this->toLang($language,$terms,true);

    	return view('user.pages.terms-conditions',compact('terms'));
    }

    public function aboutUs(){
        $language = app()->getLocale();
        $about    = MobilePage::where('slug','about_us')->first();
        $about    = $this->toLang( $language, $about, true);

        $phone    = Setting::value('phone');
        return view('user.pages.aboutus',compact('about','phone'));
    }
    
    //get Contact Us View
    public function contactUsView(){
        return view('user.pages.contactUs');
    }

    //Post Contact Us
    public function contactUs(Request $request){

        $validator = Validator::make($request->all(),[
            'message' => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $user  = auth()->user();
        if($user){
            $user->messages()->create($input);
        }

        else{
            ContactUs::create($input);
        }

        return back()->with('status',trans('messages.thank.you'));

    }
}
