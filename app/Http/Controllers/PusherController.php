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
        $app_id = '850020';
        $app_key = '01bbbd7da92fc31419e7';
        $app_secret = '2c0fb2ff1ce58f419785';
        $app_cluster = 'eu';

        $pusher = new Pusher\Pusher( $app_key, $app_secret, $app_id, array('cluster' => $app_cluster) );
        $pusher->trigger( 'my-channel', 'my_event', 'hello world via Pusher' );
        return "done";
    }

}
