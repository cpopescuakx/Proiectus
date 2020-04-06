<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 */
class Project extends Model Implements Feedable
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

    public function toFeedItem()
    {
        return FeedItem::create([
        'id' => $this->id_project,
        'name' => $this->name,
        'ending_date' => $this->ending_date,
        'budget' => $this->budget,
        'description' => $this->description,
        'professional_family' => $this->professional_family,
        'status' => $this->status,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        ]);
    }

    public static function getAllFeedItems()
    {
       return Project::all();
    }
}
