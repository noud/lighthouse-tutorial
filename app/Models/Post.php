<?php

namespace App\Models;

class Post extends \App\Models\Base\Post
{
	protected $fillable = [
		'user_id',
		'title',
		'content'
	];

	public function coverImage()
	{
		return $this->belongsTo(\App\Models\CoverImage::class);
	}
}
