<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $hidden  = [ 'created_at' , 'updated_at' ];
    protected $guarded = [];
}
