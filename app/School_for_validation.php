<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_for_validation extends Model
{
    protected $primaryKey = 'id_school';
    protected $fillable = [
        'id_user',
        'name',
        'email',
        'address',
        'id_city',
        'phone',
        'type',
        'code'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
