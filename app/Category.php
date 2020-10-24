<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = [ 'created_at' , 'updated_at' ];

    protected $guarded = [];

    //Category Store Relationship
    public function stores(){
    	return $this->hasMany(Store::class);
    }
}
