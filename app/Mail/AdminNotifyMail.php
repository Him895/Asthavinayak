<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     *
     */

     public $message;
    public function __construct(Message $message)
{
    $this->message = $message;
}

public function build()
{
    return $this->subject('New Contact Form Message')
                ->view('emails.admin_notify')
                ->with([
                    'name' => $this->message->name,
                    'email' => $this->message->email,
                    'subject' => $this->message->subject,
                    'Message' => $this->message->message,
                ]);
}

    /**
     * Get the message envelope.
     */

    /**
     * Get the message content definition.
     */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
