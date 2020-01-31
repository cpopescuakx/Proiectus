<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 */
class Project extends Model
{
    /**
     * Taula que utilitza aquest model.
     * 
     * @var string
     */
    protected $table = 'projects';
    protected $primaryKey = 'id_project';
}
