<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class VueController
{
    public function __invoke()
    {
        return Inertia::render('Home');
    }
}
