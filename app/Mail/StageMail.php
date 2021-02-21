<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $fichier;
    
    /** 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data, $fichier)
    {
        $this->data = $data;
        $this->fichier = $fichier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.stage')->subject('Demande de stage');
    }
}
