<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\MyEvent;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubscriptionController extends Controller
{
    public function trigger()
    {
        $post = Post::find(6);
        $post->title = 'TEST7';
        $post->save();
        
        \Nuwave\Lighthouse\Execution\Utils\Subscription::broadcast('postUpdated', $post, true);
        \Log::debug('Subscription.');
        return "done";
    }

}
