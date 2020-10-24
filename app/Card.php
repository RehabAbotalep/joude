<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{	

	protected $hidden = [ 'created_at', 'updated_at' ,'id', 'user_id' ];

	
    //Cards and User Relationship
    public function user(){
    	return $this->belongsTo(User::class);
    }


     //Cards and CardTypes Relationship
    public function type(){
    	return $this->belongsTo(CardType::class);
    }
}
