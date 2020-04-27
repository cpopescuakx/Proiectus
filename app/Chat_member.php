<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat_member extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'users', 'id_user', 'id')->withTimestamps();
    }

    public function chats()
    {
        return $this->hasMany('App\Chat', 'id_chat', 'id_chat');
    }
}
