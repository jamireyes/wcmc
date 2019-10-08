<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class AppointmentStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;
    public $message;
    public $user;

    public function __construct($title, $message, User $user)
    {
        $this->title = $title;
        $this->message = $message;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return ['AppointmentStatus.' .$this->user->role_id];
    }

    public function broadcastAs()
    {
        return 'AppointmentStatus';
    }

}
