<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   $payment = '';
        ( $this->payment_method == 'Bank Transfer') ? $payment = trans('messages.Bank Transfer') : $payment 
            =trans('messages.cash');
        return [
        
            'Card Number'           => $this->card_number,
            'Date Of Subscription'  => $this->created_at->toDateString(),
            'Expire Subscription'   => $this->expire_date,
            'Payment System'        => $payment,
            'Status'                => $this->status == 1 ? trans('messages.active') : trans('messages.notActive'),
            
        ];
    }
}
