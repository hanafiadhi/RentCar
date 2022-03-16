<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NgelandTourNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $notif;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notif)
    {
        //
        $this->notif = $notif;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.ngelandtour")->with('data', $this->notif);
    }
}
