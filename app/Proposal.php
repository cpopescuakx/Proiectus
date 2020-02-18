<?php

namespace App;

use App\Scopes\ProposalScope;
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

    //! MODIFICAR CUANDO FUNCIONE LOGIN
    protected $attributes = [
        'id_author' => 1,
        'category' => 'company',
        'status' => 'active'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ProposalScope);
    }

    // Función scope para filtrar propuestas activas/inactivas
    public function scopeTipo($query, $tipo) {
    	if ($tipo) {
            return $query->where('status','=',"$tipo");
    	}
    }

    /** Scope proposal
     *
     *  Scope per a filtrar les propostes que coincideixen amb el
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
    /** Scope project
     *
     *  Scope per a filtrar les propostes que coincideixen amb el
     *  que s'ha escrit al buscador de l'usuari que ho ha escrit.
     *
     *  @param Query $query
     *  @param String $name
     *  @param Integer $id_user
     *  @return void
     **/

     public function scopeNameAuthor($query, $name, $id_user) {

             $query->where('name', 'like', '%'.$name.'%')->where('id_author', $id_user);
     }
}
