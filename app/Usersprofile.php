<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usersprofile extends Model
{
	//public $table = "usersprofile";
	protected $table = 'usersprofile';
    protected $fillable=[
        'name',
        'email',
		'profilepic',
		'phone'
        
    ];
}
