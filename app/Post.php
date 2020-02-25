<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'id_post', 'title', 'content', 'creation_date', 'update_at'];

    protected $primaryKey = "id_post";
}
