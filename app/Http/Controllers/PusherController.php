<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\MyEvent;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Pusher;

class PusherController extends Controller
{
    public function trigger()
    {
        $app_key = config('broadcasting.connections.pusher.key');
        $app_secret = config('broadcasting.connections.pusher.secret');
        $app_id = config('broadcasting.connections.pusher.app_id');
        $app_cluster = config('broadcasting.connections.pusher.options.cluster');

        $pusher = new Pusher\Pusher( $app_key, $app_secret, $app_id, array('cluster' => $app_cluster) );
        $pusher->trigger( 'my-channel', 'my_event', 'hello world via Pusher' );
        \Log::debug('Pusher.');
        return "done";
    }

}
