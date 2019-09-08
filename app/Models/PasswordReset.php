<?php

namespace App\Models;

class PasswordReset extends \App\Models\Base\PasswordReset
{
	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'email',
		'token'
	];
}
