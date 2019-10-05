<?php

namespace App\Models;

class Post extends \App\Models\Base\Post
{
	protected $fillable = [
		'user_id',
		'title',
		'content'
	];

    /**
	 * used for react-apollo extra param title
	 * 
     * @param $query \Illuminate\Database\Eloquent\Builder
     * @param $args
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTitle($query, $args) {
		if (isset($args['title'])) {
			$title = $args['title'];
			if ($title) {
				return $query->where('title', 'LIKE', '%' . $title . '%');
			}
		}
		return $query;
	}
	
	public function author()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function coverImage()
	{
		return $this->belongsTo(\App\Models\CoverImage::class);
	}
}
