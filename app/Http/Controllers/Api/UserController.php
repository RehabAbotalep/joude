<?php

namespace App\Http\Controllers\Api;

use App\Card;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\ImageUpload;
use App\Payment;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;


class UserController extends Controller
{   use ApiResponse,ImageUpload;
    //User Register
    public function register(Request $request){
        $language  = ($request->header("X-Language")) ?? 'en';
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'mobile'    => 'required|unique:users',
            'email'     => 'required|unique:users|email|string|max:255',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'


        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),
                422
            );
        }
        $input = $request->all();
        unset($input['confirm_password']);
        $input['password'] = hash::make($input['password']);

        $user = User::create( $input );
        if( $user ){
            $user->lang  = $language;
            $user->save();
        }
        $token = $user->createToken('Joude')->accessToken;
        return $this->fullDataResponse($token,new UserResource($user),'Registed Successfuly',201);
    }

    /*
    //User Verify
    public function verify(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile'    => 'required|regex:/(01)[0-9]{9}/|exists:users',
            'code'      => 'required|digits:4',

        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),
                422
            );
        }
        $user = User::where('mobile' , $request->mobile)
                    ->where('sms_code', $request->code )
                    ->first();

        if( !$user ){
            return $this->errorResponse("Wrong Code",null,422);
        }

        $user->sms_code  = null;
        $user->is_active = 1;
        $user->save();
        $token = $user->createToken('Joude')->accessToken;

        return $this->fullDataResponse($token,new UserResource($user),'Activated Successfuly',200);
    }*/

    //User Login
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'login'    => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(),
               $validator->errors(),422);
            
        }
        $user = User::where('mobile', $request->login)->first();
        
        if( $user ){
            /*
            if( $user->is_active == 0 ){
                return $this->dataResponse(new UserResource($user),'Not Confirmed',403);
            }*/
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                $token = $user->createToken('Joude')->accessToken;
                return $this->fullDataResponse($token,new UserResource($user)
                    ,'Logedin Successfuly',200);
            }
        }
        //Wrong name,mobile or password
        return $this->errorResponse(trans('messages.unautharized'),null,401);
}
    //Forget Password
    public function forgetPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile'   => 'required|exists:users',
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),
                $validator->errors(),422);
        }

        $user = User::where('mobile',$request->mobile)->first();
        if( $user ){
            //$user->sms_code    = rand(100000, 999999);
            $user->sms_code    = 111111;
            $user->save();
            //$mobile = 2 . $user->mobile;
            //$this->sendSms($mobile, $user->sms_code);
            
            return $this->dataResponse(null,trans('messages.code.send'),200); 
        }
   }

    //Submit New Password
    public function submitNewPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile'   => 'required|exists:users',
            'code'     => 'required|digits:6',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',

        ]);

        if( $validator->fails() ){
            return $this->errorResponse($validator->errors()->first(),
                $validator->errors(),422);
        }

        $user = User::where('mobile',$request->mobile)
                    ->where('sms_code',$request->code)
                    ->first();

        if( !$user ){
            return $this->dataResponse(null,trans('messages.code.wrong'),422);
        }

        $user->password = Hash::make($request->password);
        $user->sms_code = null;
        if ($user->is_active == 0) {
            $user->is_active = 1;
        }
        $user->save();
        return $this->dataResponse(null,trans('messages.pwd.changed'),200);
    }

     //Resend Code
    public function resendCode(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile'   => 'required|exists:users',
        ]);

        if($validator->fails()){
             return $this->errorResponse($validator->errors()->first(),
                $validator->errors(),422);
        }

        $user = User::where('mobile',$request->mobile)->first();
        if( $user ){

            //$user->sms_code    = rand(100000, 999999);
            $user->sms_code    = 1234;
            $user->save();
            //$mobile = 2 . $user->mobile;
            //$this->sendSms($mobile, $user->sms_code);
            return $this->dataResponse(null,trans('messages.code.send'),200);
        }
    }

    //get User Profile
    public function getProfile(){

        $user_id = Auth::user()->id;
        
        $user    = User::find($user_id);

        if( !$user ){
            return $this->errorResponse(null,'User Not Found!',404);
        }
        return $this->dataResponse(new UserResource($user),null,200);
    }

    //Upload Image
    public function imageUpload(Request $request){
       return $this->upload($request);
    }

    //User Logout
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return $this->dataResponse(null,null,204);
    }

   
}
