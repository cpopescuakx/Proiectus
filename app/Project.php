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


    /** Scope project
     *  
     *  Scope per a filtrar els projectes que coincideixen amb el
     *  que s'ha escrit al buscador.
     * 
     *  @param Query $query 
     *  @param String $name
     *  @return void
     **/

    public function scopeName($query, $name) {

        if ($name != "") {
            $query->where('name', 'like', '%'.$name.'%');
        }
        
    }
}
