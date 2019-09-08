<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $bibliography
 * @property int $avatar_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Avatar $avatar
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models\Base
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'bibliography',
		'remember_token'
	];
	
	protected $casts = [
		'avatar_id' => 'int'
	];

	public function avatar()
	{
		return $this->belongsTo(\App\Models\Avatar::class);
	}

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
