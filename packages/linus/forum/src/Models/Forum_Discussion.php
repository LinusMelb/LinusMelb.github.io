<?php

namespace Linus\Forum\Models;


use Illuminate\Database\Eloquent\Model;

class Forum_Discussion extends Model {

    //
	protected $table = 'forum_discussions';

    public $timestamps = true;

    protected $fillable = ['title', 'category_id', 'sub_category_id', 'content', 'user_id', 'slug', 'color'];


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

    public function category(){

        return $this->belongsTo('Linus\Forum\Models\Forum_Category', 'category_id', 'id');
    }


}