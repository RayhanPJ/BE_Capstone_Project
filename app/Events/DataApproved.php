<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DataApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $message;

    public function __construct($id, $message)
    {
        $this->id = $id;
        $this->message = $message;
    }
}
