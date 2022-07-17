<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{
  protected $table = 'articles'; 
  public $timestamps = true; 

  public function user() {
    return $this->belongsTo('App\Models\User');
  }
  public function comment() {
    return $this->hasMany('App\Models\Comment');
  }
}
