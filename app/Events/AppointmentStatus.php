<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AppointmentStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $role;

    public function __construct($message, $role)
    {
        $this->message = $message;
        $this->role = $role;
    }

    public function broadcastOn()
    {
        return ['AppointmentStatus.' .$this->role];
    }

    public function broadcastAs()
    {
        return 'AppointmentStatus';
    }

}
