<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Messanger extends Mailable
{
    use Queueable, SerializesModels; 

    public $messanger;
  
    /**
     * Create a new message instance. 
     *
     * @return void 
     */
    public function __construct($messanger)
    {
        $this->messanger = $messanger;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('You have new message with messanger Jack Pops Messenger') ->view('emails.messanger');
    }
}
