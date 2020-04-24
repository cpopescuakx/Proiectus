<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faq_votes extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
     'id_user',
     'id_faq',
     'like',
     'vote_type',
    ];
}
