<?php

namespace App\Http\Controllers\Api;

use App\Card;
use App\CardType;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\LangData;
use App\Http\Traits\OrderCard;
use App\Payment;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;
class CardController extends Controller
{   
    use ApiResponse,LangData,OrderCard;

    public function __construct() {
        
        $this->middleware('auth:api')->except(['cardTypes', 'orderCard']);
    }
/////////////////////////////////////////////////////
    //Card Types
    public function cardTypes(Request $request){
        $language  = ($request->header("X-Language")) ?? 'en';
        if($language == "ar"){
            $CurrenyCode="س.ر";
            $MonthCode= "شهر" ;
        }else {
            $CurrenyCode="SAR";
             $MonthCode= "Month" ;
        }
        $types     = CardType::all();
        foreach ($types as $type ) {
            $type['id']=$type['id'];
             if($language == "ar"){
                $type['price']=$CurrenyCode." ".$type['price'];
                $type['name'] =$MonthCode." ".$type['month_number'];
                }else {
                 $type['price']=$type['price']." ".$CurrenyCode;
                 $type['name']=$type['month_number']." ".$MonthCode;
                }
            
        }
        //$types     = $this->toLang( $language, $types, false);
        return $this->dataResponse($types,null,200);
    }

/////////////////////////////////////////////////////
    //Order Card
    public function orderCard(Request $request){
        $language  = ($request->header("X-Language")) ?? 'en';
        $validator = Validator::make($request->all(),[
            'type_id'              => 'required|integer',
            'amount'               => 'required',
            'image'                => 'required_if:payment_method,Bank Transfer,تحويل بنكى|
                                        image|mimes:jpg,jpeg,svg,png|max:2048',
        ]);
        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),null,422);
        }
        $user = auth('api')->user();

        if( $user ){
            $userCards  = Card::where('user_id',$user->id)->count();
        if( $userCards == 10 ){
            return $this->errorResponse('You Cant order more than '.$userCards.' Cards',null,422);
            
        }
            $card  = $this->order($request,$user);
            return $this->dataResponse($card,trans('messages.card.add'),200);
        }else{
            $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'mobile'    => 'required|unique:users',
            'email'     => 'required|unique:users|email|string|max:255',
            'password'  => 'required|min:6',

        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),null,422);
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
        $token = $user->createToken('Joude')->accessToken;
        return $this->fullDataResponse($token,$card,trans('messages.card.add'),200);
        }//end else  
    }
/////////////////////////////////////////////////////
    //Activate Card
    public function activeCard(Request $request){
        $user_id   = auth('api')->id();
        $validator = Validator::make($request->all(),[
            'mobile'       => 'required',
            'card_number'  => 'required',

        ]);
        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),
                422
            );
        }
        $user = User::where(['mobile'=>$request->mobile,'id'=>$user_id])->first();

        if( !$user ){
            return $this->errorResponse(trans('messages.mobile.wrong'),null,422);
        }

        $card = Card::where('card_number',$request->card_number)
                     ->where('user_id',$user->id)->first();
        if( !$card ){
            return $this->errorResponse(trans('messages.card.notExist'),null,404);
        }
        if($card->status == 1 ){
            return $this->errorResponse(trans('messages.already.activated'),null,404);
        }
        $card->sms_code = 111111;
        $card->save();
        return $this->dataResponse(null,trans('messages.code.send'),200);
    }

/////////////////////////////////////////////////////
    public function activeConfirm(Request $request){

        $validator = Validator::make($request->all(),[
            'code'        => 'required|digits:6',
            'card_number' => 'required',
        ]);
        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),
                422
            );
        }
        $user = auth('api')->user();
        $card = Card::where('card_number',$request->card_number)
                     ->where('user_id',$user->id)
                     ->first();

        if( !$card ){
            return $this->errorResponse(trans('messages.card.notExist'),null,404);
        }
        if($card->sms_code != $request->code ){
            return $this->errorResponse(trans('messages.code.wrong'),null,422);
        }
        $card->sms_code = null;
        $card->status   = 1;
        $card->save();

        if( $user->is_active == 0 ){

            $user->is_active = 1;
        }
        $user->save();
        return $this->dataResponse(null,trans('messages.card.active'),200);
    }
/////////////////////////////////////////////////////
    //Turnoff Card
    public function dectiveCard(Request $request){
        $user_id   = auth('api')->id();
        $validator = Validator::make($request->all(),[
            'mobile'       => 'required',
            'card_number'  => 'required',

        ]);
        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),
                422
            );
        }
        $user = User::where(['mobile'=>$request->mobile,'id'=>$user_id])->first();

        if( !$user ){
            return $this->errorResponse(trans('messages.mobile.wrong'),null,422);
        }
        $card = Card::where('card_number',$request->card_number)
                     ->where('user_id',$user->id)->first();

        if( !$card ){
            return $this->errorResponse(trans('messages.card.notExist'),null,404);
        }
        if( $card->status == 0 ){
            return $this->errorResponse(trans('messages.card.turnedOff'),null,422);
        }
        $card->sms_code = 111111;
        $card->reason   = $request->reason;
        $card->save();
        return $this->dataResponse(null,trans('messages.code.send'),200);
    }
/////////////////////////////////////////////////////
    //DeactiveConfirm
    public function deactiveConfirm(Request $request){
        $validator = Validator::make($request->all(),[
            'code' =>'required|digits:6',
            'card_number' => 'required',
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors()->first(),$validator->errors(),
                422
            );
        }
        $user = auth('api')->user();
        $card = Card::where('card_number',$request->card_number)
                    ->where('user_id',$user->id)
                    ->first();

        if( !$card ){
            return $this->errorResponse(trans('messages.card.notExist'),null,404);
        }

        if($card->sms_code != $request->code ){
            return $this->errorResponse(trans('messages.code.wrong'),null,422);
        }
        $card->sms_code = null;
        $card->status   = 0;
        $card->save();
        return $this->dataResponse(null,trans('messages.card.deactive'),200);
    }
/////////////////////////////////////////////////////
    //User's Cards
    public function myCards(){

        $user_id = auth('api')->id();
        $date    = Date('Y-m-d');

        $cards   = Card::where('user_id',$user_id)
                       ->where('expire_date' , '>=' ,$date)->get();
        
        return CardResource::collection($cards);

    }
}
