<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model Implements Feedable
{
    protected $fillable = [
    'id_post', 'title', 'content', 'creation_date', 'update_at'];

    protected $primaryKey = "id_post";

    public function toFeedItem()
    {
      return FeedItem::create([
        // 'id_post' => $this->id_post,
        // 'id_project' => $this->id_project,
        // 'title' => $this->title,
        // 'content' => $this->content,
        // 'id_user' => $this->id_user,
        // 'status' => $this->status,
        // 'timestamps' => $this->timestamps,
        // 'creation_date' => $this->creation_date,
        // 'update_at' => $this->update_at,
        'id' => $this->id_post,
        'title' => $this->title,
        'summary' => $this->content,
        'updated' => $this->updated_at,
        'link' => $this->status,
        'author' => $this->id_user,
      ]);
    }
    public static function getAllFeedItems()
    {
       return Post::all();
    }
}
