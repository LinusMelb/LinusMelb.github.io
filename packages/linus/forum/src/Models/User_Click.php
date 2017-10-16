<?php

namespace Linus\Forum\Models;

use Illuminate\Database\Eloquent\Model;

class User_Click extends Model
{
        //
    /* Specify table name */
	protected $table = 'user_clicks';

	public $timestamps = true;

    protected $fillable = ['data_type', 'user_id', 'data_id'];

}
