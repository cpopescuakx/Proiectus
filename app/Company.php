<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'id_company';
    protected $fillable = [
     'email',
     'name',
     'nif',
     'sector',
     'status',

    ];
}
