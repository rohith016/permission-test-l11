<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\TestNotification\Invoice;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $user = User::find(2);
        // $user->notificationsRelation()->create([
        //     'data' => ['message' => 'Testing user Data'],
        // ]);
        $notifications = $user->notifications;

        dd($notifications);
    }


    public function test(){
        return (new Invoice())->send('hello world');
    }
}
