<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewReceived extends Mailable
{
    use Queueable, SerializesModels;

    public array $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Получено отзыв на сайте',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.review',
            with: ['message' => $this->mailData]
        );
    }
}
