<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
     * Taula que utilitza aquest model.
     * 
     * @var string
     */
    protected $table = 'proposals';
    protected $primaryKey = 'id_proposal';
}
