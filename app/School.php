<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $primaryKey = 'id_school';
    public $timestamps = false;
    protected $fillable = [
     'email',
     'name',
     'code',
     'type',

    ];
}
