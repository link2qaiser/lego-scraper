<?php

namespace App\Models\users;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $table      	= 	'users';
	protected $primaryKey 	= 	'id';
	protected $fillable   	= 	['name','email','password','job_token','file_name','tools','urls','remember_token','role'];
}
