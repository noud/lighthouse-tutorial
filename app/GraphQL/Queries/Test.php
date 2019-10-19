<?php

namespace App\GraphQL\Queries;

class Test
{
    public function __invoke(): string
    {
        return rand();
    }
}