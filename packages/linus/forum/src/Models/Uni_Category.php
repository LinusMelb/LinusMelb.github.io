<?php

namespace Linus\Forum\Models;


use Illuminate\Database\Eloquent\Model;

class Uni_Category extends Model {

    //
    /* Specify table name */
	protected $table = 'uni_category';

	public $timestamps = false;


    protected $fillable = ['name', 'slug'];

}