<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $fillable = [
    'id_article', 'id_project', 'version', 'title', 'content', 'creation_date', 'reference', 'id_user', 'status'
  ];
  protected $primaryKey = 'id_project';
}
