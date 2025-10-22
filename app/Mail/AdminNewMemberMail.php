<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNewMemberMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $username;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * Define the message envelope (subject, from, etc.)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('noreply@golf4community.com', 'Golf4Community'),
            subject: 'New Member Registration Notification',
        );
    }

    /**
     * Define the message content (the view + data)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_new_member',
            with: [
                'username' => $this->username,
                'email' => $this->email,
            ],
        );
    }


    /**
     * Attachments (none by default)
     */
    public function attachments(): array
    {
        return [];
    }
}
