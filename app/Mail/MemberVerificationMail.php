<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class MemberVerificationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $fullname;
    public $email;
    public $token;
    public $verificationLink;

    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $email, $token)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->token = $token;
        $this->verificationLink = "https://golf4community.com/user-confirmation.php?token={$token}&email={$email}";
    }

    /**
     * Define the message envelope (subject, from, etc.)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('noreply@golf4community.com', 'Golf4Community'),
            subject: 'Verification Email',
        );
    }

    /**
     * Define the message content (the view + data)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verification',
            with: [
                'fullname' => $this->fullname,
                'email' => $this->email,
                'token' => $this->token,
                'verificationLink' => $this->verificationLink,
            ],
        );
    }

    /**
     * No attachments for this mail.
     */
    public function attachments(): array
    {
        return [];
    }
}
