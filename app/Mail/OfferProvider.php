<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfferProvider extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    public $description;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link, $description)
    {
        $this->link = $link;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.offer-provider')->with(['link' => $this->link, 'description' => $this->description]);
    }
}
