<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{ 
    protected $hidden  = [ 'created_at', 'updated_at', 'pivot' ];
    protected $guarded = [];

    //City Region Relationship
    public function regions(){
    	return $this->hasMany(Region::class,'city_id');
    }

    //City Store  Relationship
    public function stores(){
    	return $this->belongsToMany(Store::class);
    }

     //City Store  Relationship
    public function branches(){
        return $this->hasMany(Branch::class);
    }
}
