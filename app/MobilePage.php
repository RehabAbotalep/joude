<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobilePage extends Model
{
    protected $hidden = [ 'created_at' , 'updated_at' , 'slug' ];
}
