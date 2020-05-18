<?php

namespace App\Models\twitterassistant;

use Illuminate\Database\Eloquent\Model;

class Rss_Resource extends Model
{
    protected $table = 'twas_rss_resources';
	protected $primaryKey = 'rr_id';
	public $timestamps = false;
}
