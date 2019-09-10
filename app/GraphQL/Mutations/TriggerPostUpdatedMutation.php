<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Execution\Utils\Subscription;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class TriggerPostUpdatedMutation
{
    public function resolve($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        \Log::debug('TriggerPostUpdatedMutation.');
        Subscription::broadcast('lighthouse_tutorial', $args);
        return true;
    }
}
