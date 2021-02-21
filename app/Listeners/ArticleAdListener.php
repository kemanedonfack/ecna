<?php

namespace App\Listeners;

use App\Newsletter;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticleAdListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        dd('eee');
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    { //->dispatchNow()
        
        $news = Newsletter::all();
        
       foreach ($news as $key) {

            Mail::to($key->email)->send(new NewsletterMail($event->last));

        }
    }
}
 