<?php

namespace Linus\Forum\Models;


use Illuminate\Database\Eloquent\Model;

class Subject_Post extends Model {

    //
    /* Specify table name */
	protected $table = 'subject_posts';

    protected $guarded = [];

    /* Create and update timestamps */
    public $timestamps = true;

    protected $fillable = ['uni_id', 'code', 'name', 'description', 'handbook', 'fees', 'availability', 'created_by_user_id'];

    public function answers()
    {
        /**
        * Get the phone record associated with the user.
        */
        /* 'user.id' 'forum_discussion.user_id' */
        return $this->belongsTo('Linus\Forum\Models\Subject_Answer', 'user_id', 'id');

    }


}