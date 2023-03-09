<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class withaddproduct extends Mailable
{
    use Queueable, SerializesModels;


    public $adddata;

    public function __construct($adddata)
    {
        $this->adddata = $adddata;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your ad is published now.') ->view('emails.addproduct');
    }
}
