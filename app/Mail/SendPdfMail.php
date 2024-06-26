<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent, $order, $setting, $restaurant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdfContent, $order, $setting, $restaurant)
    {
        $this->pdfContent = $pdfContent;
        $this->order = $order;
        $this->setting = $setting;
        $this->restaurant = $restaurant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Food Invoice - ['.$this->restaurant->name.']')
        ->view('emails.mail',['order' => $this->order, 'setting' => $this->setting]) // Optional: Use a Blade template for email content
        ->attachData($this->pdfContent, 'invoice.pdf', [
            'mime' => 'application/pdf',
        ]);
    }
}
