<?php

namespace App\Models\twitterassistant;

use Illuminate\Database\Eloquent\Model;

class User_Account extends Model
{
    protected $table = 'twas_user_accounts';
	protected $primaryKey = 'ua_id';
	public $timestamps = false;
}
