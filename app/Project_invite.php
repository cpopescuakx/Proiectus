<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_invite extends Model
{
    //samueldeluque@proiectus.cat, xaviernaves@iesmontsia.org, aaaa

    protected $fillable = [
        'id_project', 'invited_by', 'email', 'token'
    ];
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
