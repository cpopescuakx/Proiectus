<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';
    protected $primaryKey = 'id_proposal';
    protected $fillable = [
        'name', 
        'limit_date', 
        'description', 
        'professional_family'
    ];
    protected $attributes = [
        'id_author' => 1,
        'category' => 'company',
        'status' => 'active'
    ];
}