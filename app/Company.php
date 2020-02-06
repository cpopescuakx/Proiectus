<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $primaryKey = 'id_user';
    protected $fillable = [
     'email',
     'name',
     'nif',
     'sector',
     'status'

    ];
}
