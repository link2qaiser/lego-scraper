<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    
    protected $fillable = [
        'name', 'email', 'password','job_token','file_name','urls','role','tools'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
