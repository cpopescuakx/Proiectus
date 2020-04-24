<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $primaryKey = 'id_chat';
    protected $fillable = ['name', 'id_project'];
    public function users()
    {
        return $this->belongsToMany('App\Chat_member', 'chat_members', 'id_chat', 'id_user')->withTimestamps();
    }

    public function hasUser($user_id)
    {
        foreach ($this->users as $user) {
            if($user->id_user == $user_id) {
                return true;
            }
        }
    }

}
