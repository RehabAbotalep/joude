<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $hidden  = [ 'created_at', 'updated_at'];
    protected $guarded = [];

    //City Region Relationship
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
