<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * had to fake for ra-data-graphql-simple
 */
class ListMetadata extends Eloquent
{
	protected $fillable = [
		'count'
	];
}
