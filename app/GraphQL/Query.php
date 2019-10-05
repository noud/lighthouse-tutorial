<?php

namespace App\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Execution\Utils\Subscription;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Query
{
    public function posts($root, array $args)
    {
        // @todo never reached
        if (isset($args['title'])) {
            return \App\Models\Post::all();
            return \App\Models\Post::where('title',$args['title'])->get();
        }else{
            return \App\Models\Post::all();
        }
    }

    public function postsConnection($root, array $args)
    {
        // @todo never reached ?
        if (isset($args['aggregate'])) {
             // @todo do something ?
        }
        return \App\Models\Post::all();
    }
}
