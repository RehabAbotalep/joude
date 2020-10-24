<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
   protected $hidden  = [ 'created_at', 'updated_at' ];
   protected $guarded = [];


    //Cards and CardTypes Relationship
    public function cards(){
    	return $this->hasMany(Card::class);
    }
}
