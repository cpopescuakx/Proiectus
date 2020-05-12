<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
// Implementacions de l'interficie feedable, que retornarà una instancia "FeedItem"
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
// Implementem l'interficie al model
class Post extends Model Implements Feedable
{
    // Paràmetres usables per l'array associativa
    protected $fillable = [
    'id_post', 'title', 'content', 'creation_date', 'update_at'];
    // Clau primària
    protected $primaryKey = "id_post";
    // Acció que fa la crida a l'interficie i crea una array associativa (ja que hem de tenir mínim aquests camps- id, title, summary...)
    public function toFeedItem()
    {
      return FeedItem::create([
        'id' => $this->id_post,
        'title' => $this->title,
        'summary' => $this->content,
        'updated' => $this->updated_at,
        'link' => $this->status,
        'author' => $this->id_user,
      ]);
    }
    // Acció que ens retorna totes les dades de Post amb Eloquent
    public static function getAllFeedItems()
    {
       return Post::all();
    }

    // public function scopeSearch ($query)
    // {
    //   return $query->where('title');
    // }
}
