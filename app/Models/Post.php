<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

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

	/**
	 * @todo should give OpenCRUD pagination
	 */
	public function visiblePosts($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): Builder
    {
        return DB::table('posts')
            ->where('visible', true)
            ->where('posted_at', '>', $args['after']);
    }

	public function user(): BelongsTo
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function coverImage(): BelongsTo
	{
		return $this->belongsTo(\App\Models\CoverImage::class);
	}
}
