<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = ['name', 'email', 'address', 'id_city', 'phone', 'type', 'code'];
}
