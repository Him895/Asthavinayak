<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $replyData;
    public function __construct($replyData)
    {

        $this->replyData = $replyData;
        //
    }

    public function build()
    {
        return $this->view('emails.user_reply')
                ->subject($this->replyData['subject'])
                ->with(['data' => $this->replyData]);
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
