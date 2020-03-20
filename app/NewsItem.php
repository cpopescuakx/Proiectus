<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class NewsItem extends Post implements Feedable
{
    public function toFeedItem()
    {
      return FeedItem::create([
        'id_post' => $this->id_post,
        'id_project' => $this->id_project,
        'title' => $this->title,
        'content' => $this->content,
        'id_user' => $this->id_user,
        'status' => $this->status,
        'timestamps' => $this->timestamps,
        'creation_date' => $this->creation_date,
        'update_at' => $this->update_at,
        // 'id' => $this->id,
        // 'title' => $this->title,
        // 'summary' => $this->summary,
        // 'updated' => $this->updated_at,
        // 'link' => $this->link,
        // 'author' => $this->author,
      ]);
    }
    public static function getAllFeedItems()
    {
       return Post::all();
    }
}
