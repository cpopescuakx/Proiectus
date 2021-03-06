<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class School extends Model Implements Feedable
{
    protected $primaryKey = 'id_school';

    protected $fillable = [
     'email',
     'name',
     'code',
     'type',

    ];

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
        'id' => $this->id_school,
        'title' => $this->name,
        'summary' => $this->type,
        'updated' => $this->updated_at,
        'link' => $this->status,
        'author' => $this->code,
      ]);
    }
    public static function getAllFeedItems()
    {
       return School::all();
    }
}
