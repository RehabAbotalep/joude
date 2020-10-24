<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{	
	protected $hidden  = [ 'created_at' , 'updated_at', 'pivot' ];
    protected $guarded = [];

    //Category Store Relationship
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    //Branch Store Relationship
    public function branches(){
    	return $this->hasMany(Store::class);
    }

    //Voucher and Stores Relationship
    public function vouchers(){
        return $this->hasMany(Voucher::class);
    }

     //City Store  Relationship
    public function cities(){
        return $this->belongsToMany(City::class);
    }
}
