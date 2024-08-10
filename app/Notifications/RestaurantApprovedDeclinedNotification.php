<?php

namespace App\Notifications;

use App\Helper\LanguageHelper;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RestaurantApprovedDeclinedNotification extends Notification
{
    use Queueable;

    private $restaurant;
    private $status;
    private $isDeclinedReason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($restaurant, $status, $isDeclinedReason)
    {
        $this->restaurant = $restaurant;
        $this->status = $status;
        $this->isDeclinedReason = $isDeclinedReason;
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
        $restaurantData = [
            'request_status'    =>  $this->status,
            'declined_reason'   =>  $this->isDeclinedReason
        ];

        if($this->status == 0) {
            $restaurantData['restaurant_code'] = Null;
        }
        $result = $this->restaurant->update($restaurantData);

        $restaurantArray = array();
        if($result) {
            $restaurant = Restaurant::where('id', $this->restaurant->id)->first();
            array_push($restaurantArray, $restaurant);
            
            if($restaurant->request_status == 1) {
                LanguageHelper::setLanguagesApprovedRestaurant($restaurant->id);
            }

            $emailSubject = $restaurant->request_status == 0 
                ? 'Your Restaurant has been Declined' 
                : 'Your Restaurant has been Approved';
            
            if($restaurant->request_status == 0) {
                User::whereRestaurantId($restaurantArray[0]['id'])->delete();
                Restaurant::whereId($restaurantArray[0]['id'])->delete();
            }

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
