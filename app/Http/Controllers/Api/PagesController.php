<?php

namespace App\Http\Controllers\Api;

use App\ContactUs;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\LangData;
use App\MobilePage;
use App\Setting;
use Illuminate\Http\Request;
use Validator;

class PagesController extends Controller
{ use LangData,ApiResponse;
    // Faqs
    public function faqs(Request $request){
      $language = ($request->header("X-Language")) ?? 'en';
      $faqs  = Faq::all();
      $faqs  = $this->toLang($language,$faqs,false);
      return $this->dataResponse($faqs,null,200);
    }

    //Settings 
    public function settings(){
      $setting = Setting::first();
      return $this->dataResponse($setting,null,200);
    }

    //About Us
    public function about(Request $request){
      $language = ($request->header("X-Language")) ?? 'en';
      $about    = MobilePage::where('slug','about_us')->first();
      $about    = $this->toLang( $language, $about, true);
      return $this->dataResponse($about,null,200);
    }

    //Terms and Condition
    public function termsConditions(Request $request){
      $language = ($request->header("X-Language")) ?? 'en';
      $terms_condition = MobilePage::where('slug','terms_and_conditions')->first();
      $terms_condition = $this->toLang( $language, $terms_condition, true);
      return $this->dataResponse($terms_condition,null,200);
    }

    //Contact Us
    public function contactUs(Request $request){
      $id = auth('api')->id();
      //dd($id);
      //if is visitor 
      if(!isset($id)){
        $validator = Validator::make($request->all(),[
          'message' => 'required',
          'name' => 'required',
          'email' => 'required|email',
          'mobile' => 'required',
          ]);
        if($validator->fails()){
          return $this->errorResponse($validator->errors()->first(),$validator->errors(),
            422
          );
        }

        $contact = new ContactUs;
        $contact->message = $request->message;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->save();
        return $this->dataResponse(null,trans('messages.message.sent'),200);
      }


      $validator = Validator::make($request->all(),[
        'message' => 'required'
        ]);
      if($validator->fails()){
        return $this->errorResponse($validator->errors()->first(),$validator->errors(),
          422
        );
      }
      $contact = new ContactUs;
      $contact->message = $request->message;
      $contact->user_id = $id;
      $contact->save();
      return $this->dataResponse(null,'Message send Sucessfully!',200);

    }
}
