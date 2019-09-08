<?php

namespace App\Models;

class Comment extends \App\Models\Base\Comment
{
	protected $fillable = [
		'post_id',
		'reply'
	];
}
