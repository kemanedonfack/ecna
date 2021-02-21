<?php

namespace App\Mail;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;
 
    public $last;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $last)
    {
        $this->last = $last;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newsletter')->subject('Newsletter Ecna Cameroun');;
    }
}
