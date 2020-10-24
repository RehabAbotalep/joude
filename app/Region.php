<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $hidden  = [ 'created_at', 'updated_at' ];
    protected $guarded = [];

    //City Region Relationship
    public function city(){
    	return $this->belongsTo(City::class);
    }

    //Branch Region Relationship
    public function branches(){
    	return $this->hasMany(Region::class);
    }
}
