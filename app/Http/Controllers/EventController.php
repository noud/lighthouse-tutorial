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
        event(new MyEvent('hello world'));
        
        $post = Post::find(6);
        $post->title = 'TEST';
        $post->save();
        
        \Nuwave\Lighthouse\Execution\Utils\Subscription::broadcast('postUpdated', $post, false);
        //\Log::debug('An informational message done.');
        return "done";
    }

}
