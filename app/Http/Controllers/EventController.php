<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\MyEvent;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventController extends Controller
{
    public function trigger()
    {
        event(new MyEvent('hello world via Event'));
        \Log::debug('Event.');
        return "done";
    }

}
