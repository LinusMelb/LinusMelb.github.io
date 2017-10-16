<?php

namespace Linus\Forum\Models;


use Illuminate\Database\Eloquent\Model;

class Subject_Answer extends Model {

    //
    /* Specify table name */
	protected $table = 'subject_answers';

    protected $guarded = [];

    /* Create and update timestamps */
    public $timestamps = true;

    protected $fillable = ['user_id', 'difficulty', 'practicality', 'answer', 'post_id'];


    public function user()
    {
        /**
        * Get the phone record associated with the user.
        */
        /* 'user.id' 'forum_discussion.user_id' */
        return $this->belongsTo('App\User', 'user_id', 'id')->select(array('id', 'avatar'));

    }

}