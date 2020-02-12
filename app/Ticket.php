<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = 'id_ticket';
    protected $fillable = [
     'topic',
     'type',
     'priority',
     'id_assigned_user',
     'id_author',
    ];
}
