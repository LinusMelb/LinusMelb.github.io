<?php

namespace Linus\Forum\Models;


use Illuminate\Database\Eloquent\Model;

class Forum_Article extends Model {

    //
	protected $table = 'forum_articles';

    public $timestamps = true;

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];


    /* This function is to link User model */
    /* Then we can use \Linus\Forum\Models\Forum_Discussion::with('user')->first(); */
    
    public function user()
    {
        /**
        * Get the phone record associated with the user.
        */
        /* 'user.id' 'forum_discussion.user_id' */
        return $this->belongsTo('App\User', 'user_id', 'id');

    }


}