<?php

namespace Linus\Forum\Models;

use Illuminate\Database\Eloquent\Model;

class Forum_Comment extends Model
{
  //
  protected $table = 'forum_comments';

  protected $guarded = [];

  public $timestamps = true;

  protected $fillable = ['discussion_id', 'user_id', 'content', 'order'];

  public function user()
  {
      /**
      * Get the image record associated with the user.
      */
      /* 'user.id' 'forum_comments.user_id' */
      return $this->belongsTo('App\User', 'user_id', 'id');

  }
}
