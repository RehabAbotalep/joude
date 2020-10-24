<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiResponse;
use App\MobileValidation;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ProfileController extends Controller
{   use ApiResponse;

    public function __construct(){

        $this->middleware('auth:api');
    }
    
     //Update User Profile
    public function updateProfile(Request $request){
        $user_id = Auth::user()->id;
        $user    = User::find($user_id);

        if( !$user ){
            return $this->errorResponse(trans('messages.user.notfound'),null,404);
        }

        $validator = Validator::make($request->all(), [
            'email'       => 'unique:users,email,'. $user->id,
            'mobile'      => 'unique:users,mobile,'. $user->id,
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),422);
        }

        if(!empty($request->name)){
            $user->name = $request->name;
        }

        if(!empty($request->email)){
            $user->email = $request->email;
        }
        if(!empty($request->lang)){
            $user->lang = $request->lang;
        }

        if(!empty($request->mobile)){

            /*
            if($user->mobile == $request->mobile ){
                return $this->errorResponse('This is already Your Number!',null,422);
            }
            */

            $oldNumber = MobileValidation::where('user_id',$user_id)->first();
            if($oldNumber){
                $oldNumber->delete();
            }

            $newNumber = new MobileValidation;
            $newNumber->user_id = $user_id;
            $newNumber->mobile  = $request->mobile;
            $newNumber->code    = 111111;
            $newNumber->save();

            $user->mobile = $request->mobile;
        }
    
        $user->save();
        if(!empty($request->password)){
            $token = $user->createToken('Joude')->accessToken;
            return $this->fullDataResponse( $token,new UserResource($user),trans('messages.update.success'),200);
        }

        return $this->dataResponse(new UserResource($user),trans('messages.update.success'),200);

    }



    public function updatePassword(Request $request){
        $user_id = Auth::user()->id;
        $user    = User::find($user_id);
        if( !$user ){
            return $this->errorResponse(trans('messages.user.notfound'),null,404);
        }

        $validator = Validator::make($request->all(), [
            'old_password'    => 'min:6|required',
            'password'        => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),422);
        }

        if (!empty($request->password)) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            }else{
                    return $this->errorResponse(trans('messages.old.password.incorrect'),null,422);
                }
            }

        $user->save();
        $token = $user->createToken('Joude')->accessToken;
        return $this->fullDataResponse( $token,new UserResource($user),trans('messages.update.success'),200);

    }

    //Active Updated Mobile Number
    public function updateMobile(Request $request){
        $id=Auth::user()->id;
        $updatedMobile = MobileValidation::where('user_id',$id)->first();

        if( !$updatedMobile ){
            return $this->errorResponse(trans('messages.Mobile.Not.Found'),null,404);

        }else{
            if($request->code != $updatedMobile->code){
                return $this->errorResponse(trans('messages.code.wrong'),null,422);
            }
        }

        $user = User::find($id);

        $user->mobile = $updatedMobile->mobile;
        if( $user->is_active == 0){
            $user->is_active = 1;
        }
        $user->save();
        $updatedMobile->delete();
        if( $user && $updatedMobile ){
            $token = $user->createToken('Joude')->accessToken;
            return $this->fullDataResponse( $token,null,trans('messages.update.success'),200);  
        }


    }
}
