<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_users extends Model
{
    protected $primaryKey = 'id_school_user';
    protected $fillable = [
        'id_user',
        'id_school',
    ];

}
