<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
     'question',
     'answer',
     'like',
     'dislike',
     'topic',

    ];
}
