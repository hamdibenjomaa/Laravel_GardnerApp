<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $userName;

    /**
     * Create a new message instance.
     *
     * @param Event $event
     * @param string $userName
     */
    public function __construct(Event $event, $userName)
    {
        $this->event = $event;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation de votre participation à un événement')
                    ->view('frontOffice.events.participation_confirmation');
    }
}
