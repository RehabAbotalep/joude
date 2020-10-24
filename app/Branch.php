<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $hidden  = [ 'created_at' , 'updated_at' ];
    protected $guarded = [];

    //Branch Store Relationship
   	public function store(){
   		return $this->belongsTo(Store::class);
   	}

    public function city(){
      return $this->belongsTo(City::class);
    }

   	//Branch Region Relationship
   	public function region(){
   		return $this->belongsTo(Region::class);
   	}
}
