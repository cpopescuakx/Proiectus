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

    // ATRIBUTOS POR DEFECTO 
    protected $attributes = [
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
    /** Scope tipo
     *
     *  Scope per a filtrar les propostes actives/inactives
     *
     *  @param Query $query
     *  @param String $tipo Conté les dades introduides en el buscador.
     *  @return void
     **/
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
     *  @param String $name Conté les dades introduides en el buscador.
     *  @return void
     **/

    public function scopeName($query, $name) {

        if ($name != "") {
            $query->where('name', 'like', '%'.$name.'%');
        }
    }
    /** Scope proposal
     *
     *  Scope per a filtrar les propostes que coincideixen amb el
     *  que s'ha escrit al buscador.
     *
     *  @param Query $query
     *  @param String $category Conté les dades introduides en el buscador.
     *  @return void
     **/

    public function scopeCategory($query, $category) {

        if ($category != "") {
            // Proposal::query()
            $query->where('category', 'like', '%'.$category.'%');
        }

    }
    /** Scope project
     *
     *  Scope per a filtrar les propostes que coincideixen amb el
     *  que s'ha escrit al buscador de l'usuari que ho ha escrit.
     *
     *  @param Query $query
     *  @param String $name Conté el nom de la proposta a cercar
     *  @param Integer $id_user Conté la id de l'autor de les propostes
     *  @return void
     **/

     public function scopeNameAuthor($query, $name, $id_user) {

             $query->where('name', 'like', '%'.$name.'%')->where('id_author', $id_user);
     }
}
