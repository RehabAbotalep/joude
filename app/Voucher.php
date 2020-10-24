<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{	

	protected $hidden  = [ 'created_at' , 'updated_at' ];
	protected $guarded = [];

	
    //Voucher and Stores Relationship
    public function store(){
    	return $this->belongsTo(Store::class);
    }
}
