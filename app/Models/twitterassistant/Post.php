<?php

namespace App\Models\twitterassistant;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'twas_posts';
	protected $primaryKey = 'p_id';
}
