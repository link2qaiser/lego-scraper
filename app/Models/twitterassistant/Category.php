<?php

namespace App\Models\twitterassistant;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'twas_categories';
	protected $primaryKey = 'c_id';
	public $timestamps = false;
}
