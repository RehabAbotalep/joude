<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\MobileValidation;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{	use ApiResponse;
    //Get Register Form
   	public function getRegister(){
   		return view('user.account.register');
   	}

   	//User Register
   	public function postRegister(Request $request){
   		  $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'mobile'    => 'required|unique:users',
            'email'     => 'required|unique:users|email|string|max:255',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }
        

        $input = $request->all();
        unset($input['confirm_password']);
        $input['password'] = hash::make($input['password']);

        $user = User::create( $input );
        if( $user ){
            $user->lang  = app()->getLocale();
            $user->save();
        }
        Auth::login($user);
        return redirect(route('home'));
   	}

    //logout
    public function logout(){
        Auth::logout();
        return redirect(route('home'));
    }

    //get User Account View
    public function getAccount(){
      $user = auth()->user();
      return view('user.account.myAccount',compact('user'));
    }

    //get Login View
    public function getLogin(){
      return view('user.account.login');
    }

    //Login User
    public function postLogin(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'phoneNumber'    => 'required',
            'password'       => 'required|min:6',
        ]);

        if ($validator->fails()) {

          return back()->withErrors($validator)->withInput();
        }

        $user = User::where('mobile', $request->phoneNumber)->first();
        
        if( $user ){
            /*
            if( $user->is_active == 0 ){
                return $this->dataResponse(new UserResource($user),'Not Confirmed',403);
            }*/
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);

                return redirect(route('home'));
            }
        }
        //Wrong name,mobile or password
        return back()->with('status',trans('messages.unautharized'));
    }

    //Get Update Profile view
    public function getUpdate(){
      return view('user.account.update');
    }

    
    //Update User Profile
    public function postUpdate(Request $request){
        $user    = auth()->user();

        $validator = Validator::make($request->all(), [
            'email'       => 'unique:users,email,'. $user->id,
            'mobile'      => 'unique:users,mobile,'. $user->id,
        ]);

        if($validator->fails()){
          return back()->withErrors($validator)->withInput();;
        }

        if(!empty($request->name)){
          $user->name = $request->name;
        }

        if(!empty($request->email)){
          $user->email = $request->email;
        }
        if(!empty($request->lang)){
          $user->lang = app()->getLocale();;
        }

        if(!empty($request->mobile)){

          $oldNumber = MobileValidation::where('user_id',$user->id)->first();
          if($oldNumber){
            $oldNumber->delete();
          }

          $newNumber = new MobileValidation;
          $newNumber->user_id = $user->id;
          $newNumber->mobile  = $request->mobile;
          $newNumber->code    = 111111;
          $newNumber->save();

          $user->mobile = $request->mobile;
          $user->save();
          $mobile = $user->mobile;
      
          return redirect(route('mobile.update.view'));
        }
    
        $user->save();
        return redirect(route('user.account'))->with('status',trans('messages.update.success'));
        
    }
    public function codeView(){
      return view('user.account.updateMobileVerification');
    }

    //Active Updated Mobile Number
    public function updateMobile(Request $request){
        $code   = $request->one.$request->two.$request->three.$request->four.$request->five.$request->six;

        $user   = auth()->user();
        $updatedMobile = MobileValidation::where('user_id',$user->id)->first();

        if( !$updatedMobile ){
          return redirect(route('mobile.update.view'))->with('errors',trans('messages.Mobile.Not.Found'));

        }else{
            if($code != $updatedMobile->code){
              return redirect(route('mobile.update.view'))->with('errors',trans('messages.code.wrong'));
            }
        }

        $user->mobile = $updatedMobile->mobile;
        if( $user->is_active == 0){
          $user->is_active = 1;
        }
        $user->save();
        $updatedMobile->delete();
        if( $user && $updatedMobile ){
          return redirect(route('user.account'))->with('status',trans('messages.update.success')); 
        }


    }
}
