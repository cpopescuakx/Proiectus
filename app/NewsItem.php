<?php
// app/NewsItem.php

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class NewsItem extends Model implements Feedable
{
    public function toFeedItem()
    {
        return FeedItem::create([
          // 'id_article' => $this->id_article,
          // 'title' => $this->title,
          // 'content' => $this->content,
          // 'creation_date' => $this->creation_date,
          // 'status' => $this->status,
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'updated' => $this->updated_at,
            'link' => $this->link,
            'author' => $this->author,
        ]);
    }
    public static function getFeedItems()
    {
       return NewsItem::all();
    }
}
