<?php

namespace App\Mail;

use App\Models\Restaurant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestaurantApprovedDeclined extends Mailable
{
    use Queueable, SerializesModels;

    private $restaurant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($restaurant)
    {
        $this->restaurant =  $restaurant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $restaurant = Restaurant::where('id', $this->restaurant)->first();
        $status = $restaurant->request_status == 0 ? 'Your Restaurant has been Declined' : 'Your Restaurant has been Approved';

        return $this->subject($status)
        ->view('admin.emails.approved_declined_request', compact('restaurant'));
    }
}
