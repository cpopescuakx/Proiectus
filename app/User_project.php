<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_project extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
