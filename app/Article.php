<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Article extends Model Implements Feedable
{
  protected $fillable = [
    'id_article', 'id_project', 'version', 'title', 'content', 'creation_date', 'reference', 'id_user', 'status'
  ];
  protected $primaryKey = 'id_article';

  /**
   * 
   */
  public function toFeedItem()
    {
      return FeedItem::create([
        'id' => $this->id_article,
        'title' => $this->title,
        'summary' => $this->content,
        'updated' => $this->updated_at,
        'link' => $this->status,
        'author' => $this->id_user,
      ]);
    }
    public static function getAllFeedItems()
    {
       return Article::all();
    }
}
