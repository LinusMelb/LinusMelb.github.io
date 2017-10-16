<?php

namespace Linus\Forum\Models;


use Illuminate\Database\Eloquent\Model;

class Forum_Category extends Model {

    //
	protected $table = 'forum_categories';

    protected $guarded = [];

    public $timestamps = true;

    protected $fillable = ['parent_id', 'order', 'name', 'color', 'slug', 'slug', 'color', 'created_by_user_id'];

     /* This function is to link discussion model */
    /* Then we can use \Linus\Forum\Models\Forum_Discussion::with('user')->first(); */
    
    public function discussions()
    {
        /**
        * Get the discussions record associated with the category.
        */
        /* 'user.id' 'forum_discussion.category_id' */
        return $this->hasMany('\Linus\Forum\Models\Forum_Discussion', 'category_id', 'id')->orderBy('created_at', 'desc');

    }


}