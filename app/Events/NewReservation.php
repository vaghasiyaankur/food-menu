<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class NewReservation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    public $restaurant_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order,$restaurant_id)
    {
        $this->order = $order;
        $this->restaurant_id = $restaurant_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('reservation-' . $this->restaurant_id);
    }

    public function broadcastAs()
    {
        return 'NewReservation';
    }
}
