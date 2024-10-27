<?php

namespace App\Mail;

use App\Models\Inscription; // Ensure you import the correct Inscription model
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $inscription; // Property to hold the inscription instance

    // Constructor expects an instance of App\Models\Inscription
    public function __construct(Inscription $inscription)
    {
        $this->inscription = $inscription;
    }

    public function build()
{
    return $this
        ->subject('Inscription Accepted')
        ->view('emails.inscription_accepted')
        ->with(['inscription' => $this->inscription]); // Ensure the variable is being passed
}


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Inscription Accepted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inscription_accepted', // Ensure this matches your view
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // You can add attachments if necessary
    }
}
