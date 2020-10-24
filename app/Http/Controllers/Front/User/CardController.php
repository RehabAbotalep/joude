<?php

namespace App\Http\Controllers\Front\User;

use App\Card;
use App\CardType;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\OrderCard;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class CardController extends Controller
{	use OrderCard,ApiResponse;
    //return view Of Order Card
    public function orderCardView(){
    	
        $types     = CardType::all();
    	return view('user.card.orderCard',compact('types'));
    }
    public function orderCard(Request $request){
        $language   = app()->getLocale();
        
        if(auth()->user()){
        	$validator = Validator::make($request->all(),[
            'type_id' => 'required',
            'image'   => 'required_if:payment_method,Bank Transfer,تحويل بنكى|
                                        image|mimes:jpg,jpeg,svg,png|max:2048',
            'payment_method' => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
            $user = auth()->user();
            $userCards  = Card::where('user_id',$user->id)->count();

        if( $userCards == 10 ){
            return back()->with('status','You Cant order more than '.$userCards.' Cards');  
        }
            $card  = $this->order($request,$user);
            return back()->with('status',trans('messages.card.add')); 
           
        }else{
            $validator = Validator::make($request->all(),[
            'type_id' => 'required',
            'image'   => 'required_if:payment_method,Bank Transfer,تحويل بنكى|
                                        image|mimes:jpg,jpeg,svg,png|max:2048',
            'payment_method' => 'required',
            'name'      => 'required|unique:users',
            'mobile'    => 'required|unique:users',
            'email'     => 'required|unique:users|email|string|max:255',
            'password'  => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'

        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        unset($input['confirm_password'],$input['payment_method'],
        		$input['type_id'],$input['amount'],$input['receive_the_card_type']);
        $input['password'] = hash::make($input['password']);
        $user = User::create( $input );

        if( $user ){
            $user->lang     = $language;
            $user->save();
            $card  = $this->order($request,$user); 
        }
        return back()->with('status',trans('messages.card.add')); 
        }//end else  
    }
    //return Activate Card View
    public function activateCardView(){
    	return view('user.card.activateCard');
    }

    public function activeCard(Request $request){
        $user_id   = auth()->id();
        $validator = Validator::make($request->all(),[
            'phone'        => 'required',
            'card_number'  => 'required',

        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $user = User::where(['mobile'=>$request->phone,'id'=>$user_id])->first();

        if( !$user ){
        	return back()->with('error',trans('messages.mobile.wrong'));
        }

        $card = Card::where('card_number',$request->card_number)->where('user_id',$user->id)->first();
        if( !$card ){
        	return back()->with('error',trans('messages.card.notExist'));
        }
        if($card->status == 1 ){
        	return back()->with('error',trans('messages.already.activated'));
        }
        $card->sms_code = 111111;
        $card->save();
        session()->put('card_number',$card->card_number);
        return redirect()->route('activate.card.view');
    }

    public function activeConfirm(Request $request){

        $user = auth()->user();
        $code = $request->one.$request->two.$request->three.$request->four.$request->five.$request->six;
        $card_number =  session()->get('card_number');
        $card = Card::where('card_number',$card_number)->where('user_id',$user->id)->first();

        if( !$card ){
        	return redirect()->route('activate.card.view')->with('error',trans('messages.card.notExist'));
        }
        if($card->sms_code != $code ){
        	return redirect()->route('activate.card.view')->with('error',trans('messages.code.wrong'));
        }
        $card->sms_code = null;
        $card->status   = 1;
        $card->save();
        if( $user->is_active == 0 ){
        	$user->is_active = 1;
        }
        $user->save();
        return redirect(route('my.cards'));
    }
////////////////////////////////////////////////////////////////////////////

    //return Deactivate Card View
    public function dactivateCardView(){
    	return view('user.card.dactivateCard');
    }


    //Turnoff Card
    public function dectiveCard(Request $request){
        $user_id   = auth()->id();
        $validator = Validator::make($request->all(),[
            'mob'    => 'required',
            'card'   => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $user = User::where(['mobile'=>$request->mob,'id'=>$user_id])->first();

        if( !$user ){
        	return back()->with('error',trans('messages.mobile.wrong'));
        }
        $card = Card::where('card_number',$request->card)
                     ->where('user_id',$user->id)->first();

        if( !$card ){
        	return back()->with('error',trans('messages.card.notExist'));
        }
        if( $card->status == 0 ){

        	return back()->with('error',trans('messages.card.turnedOff'));
        }
        $card->sms_code = 111111;
        $card->reason   = $request->reason;
        $card->save();
        session()->put('card_number',$card->card_number);
        return redirect()->route('dactivate.card.view');
    }
/////////////////////////////////////////////////////
    //DeactiveConfirm
    public function deactiveConfirm(Request $request){
        $code = $request->one.$request->two.$request->three.$request->four.$request->five.$request->six;

        $card_number =  session()->get('card_number');
        $user = auth()->user();

        $card = Card::where('card_number',$card_number)->where('user_id',$user->id)->first();

        if( !$card ){
        	return redirect()->route('dactivate.card.view')->with('error',trans('messages.card.notExist'));
        }

        if($card->sms_code != $code ){
        	return redirect()->route('dactivate.card.view')->with('error',trans('messages.code.wrong'));
        }
        $card->sms_code = null;
        $card->status   = 0;
        $card->save();
        return redirect(route('my.cards'));
    }
/////////////////////////////////////////////////////
    //get User Cards 
    public function myCards(){
        $user_id = auth()->id();
        $date    = Date('Y-m-d');

        $cards   = Card::where('user_id',$user_id)->where('expire_date' , '>=' ,$date)->get();
        //return $cards;
    	return view('user.card.myCards',compact('cards'));
    }
  
}
