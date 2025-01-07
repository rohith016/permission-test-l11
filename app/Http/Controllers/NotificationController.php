<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
