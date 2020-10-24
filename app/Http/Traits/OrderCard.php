<?php 
namespace App\Http\Traits;

use App\Card;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Support\Str;


trait OrderCard{

	public function order($request,$user){

		$card  = new Card;
	    $card->card_number     = rand(100000, 999999);//TODOO
	    $card->user_id         = $user->id;
	   	$card->type_id         = $request->type_id;
	   	$card->payment_method  = $request->payment_method;
	   	($request->receive_the_card_type) ? $card->receive_the_card_type = 'from_branch' : $card->receive_the_card_type = 'shipped';
	   	//$card->receive_the_card_type  = $request->receive_the_card_type;
	    $card->save();
	   	if($card->type_id == 1){
	        $card->expire_date = Carbon::now()->addMonths(12)->toDateString();
	    }
	    if($card->type_id == 2){
	       	$card->expire_date = Carbon::now()->addMonths(6)->toDateString();
	    }
	    $card->save();
	    $payment = new Payment;
	    if($request->has('image')){
	    	
	        $payment->bank_transfer_image   = $this->upload();
	    }
	    
	   	$payment->payment_method = $request->payment_method;
	    $payment->user_id        = $user->id;
	    $payment->card_id        = $card->id;
	    $payment->amount         = $request->amount;
	   	$payment->save();
	   	return $card;

	}
	public function upload(){
		$extension = request()->file("image")->getClientOriginalExtension();
		$name      = request()->file("image")->getClientOriginalName();
		$name2     = explode('.',$name);
		$finalName = $name2[0];
			
		$slug      = Str::slug($finalName, '-');
		$image     =  $slug . time() ."." . $extension;
		$path      =  "/images/" . $image; 

	    request()->image->move(public_path('images'), $image);
	    return $path;
	}

	
}