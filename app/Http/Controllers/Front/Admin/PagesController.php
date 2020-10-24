<?php

namespace App\Http\Controllers\Front\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use App\MobilePage;
use App\Setting;
use Illuminate\Http\Request;

class PagesController extends Controller
{	
	use LangData;


    public function aboutUs(){
    	$aboutUs  = MobilePage::where('slug','about_us')->first();
    	return view('admin.pages.aboutUs',compact('aboutUs'));
    }

    public function updateAbout(Request $request){
    	$about = MobilePage::where('id',$request->aboutUs_id)->first();
    	$about->content_ar = $request->content_ar;
        $about->content_en = $request->content_en;
    	$about->save();
    	return back();

    }


    public function terms(){
    	$terms    = MobilePage::where('slug','terms_and_conditions')->first();
    	return view('admin.pages.terms',compact('terms'));
    }

    public function updateTerms(Request $request){
    	$terms = MobilePage::where('id',$request->terms_id)->first();
        //dd($request->content_en);
    	$terms->content_ar = $request->content_ar;
        $terms->content_en = $request->content_en;
    	$terms->save();
    	return back();

    }


    public function setting(){

        $setting = Setting::first();
        return view('admin.pages.setting',compact('setting'));
    }

    public function updateSetting(Request $request){
        $this->validate($request,[
            'email'         => 'email|string',
        ]);
        $setting = Setting::first();
        $setting->update($request->all());
        return back();
    }
}
