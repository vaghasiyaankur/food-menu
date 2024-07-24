<?php

namespace App\Notifications;

use App\Models\Restaurant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RestaurantApprovedDeclinedNotification extends Notification
{
    use Queueable;

    private $restaurant;
    private $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($restaurant, $status)
    {
        $this->restaurant = $restaurant;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * This method constructs the mail message to be sent as part of the notification. 
     * It updates the request status of the restaurant, then constructs the email subject 
     * based on the updated status. If the restaurant's request status is updated successfully,
     * it returns a MailMessage instance with the appropriate subject and view.
     *
     * @param  mixed 
     * @return \Illuminate\Notifications\Messages\MailMessage 
    */
    public function toMail($notifiable)
    {
        $result = $this->restaurant->update(['request_status' => $this->status]);

        if($result) {
            $restaurant = Restaurant::where('id', $this->restaurant->id)->first();
            $emailSubject = $restaurant->request_status == 0 
                ? 'Your Restaurant has been Declined' 
                : 'Your Restaurant has been Approved';
    
            return (new MailMessage)
                ->subject($emailSubject)
                ->view('admin.emails.approved_declined_request', compact('restaurant'));
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //
    }
}
