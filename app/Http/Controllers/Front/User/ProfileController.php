<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Validator;

class ProfileController extends Controller
{
    //User Forget Password
    //Forget Password
    public function forgetPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile'   => 'required|exists:users',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('mobile',$request->mobile)->first();
        if( $user ){
            //$user->sms_code    = rand(100000, 999999);
            $user->sms_code    = 111111;
            $user->save();
            //$mobile = 2 . $user->mobile;
            //$this->sendSms($mobile, $user->sms_code);
            session()->put('mobile',$user->mobile);
            return redirect()->route('code.view');
            //return view('user.account.verification',compact('mobile')); 
        }
   }
    public function codeView(){
    	return view('user.account.verification');
    }

    //Verify Code
    public function verifyCode(Request $request){

    	$code   = $request->one.$request->two.$request->three.$request->four.$request->five.$request->six;
    	$mobile =  session()->get('mobile');
    	$user   = User::where('mobile',$mobile)->where('sms_code',$code)->first();

        if( !$user ){
            return redirect()->route('code.view')->with('status',trans('messages.code.wrong'));

        }
        
        return redirect()->route('pass.new.view');
        //return redirect()->route('newPass.view',compact('mobile'));
    }

    public function submitNewPasswordView(){
    	return view('user.account.submitNewPassword');
    }

    //Submit New Password
    public function submitNewPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
        ]);

        if( $validator->fails() ){
        	return back()->withInput()->withErrors($validator);
            
        }
        $mobile =  session()->get('mobile');
        $user = User::where('mobile',$mobile)->first();

        $user->password = Hash::make($request->password);
        $user->sms_code = null;
        if ($user->is_active == 0) {
            $user->is_active = 1;
        }
        $user->save();
        return redirect(route('user.login'));
    }
}
