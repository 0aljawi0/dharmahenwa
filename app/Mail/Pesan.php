<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Pesan extends Mailable
{
    use Queueable, SerializesModels;

    public $message_id;

    public function __construct($message_id)
    {
        $this->message_id = $message_id;
    }

    public function build()
    {
        $message = Message::find($this->message_id);

        return $this->subject('Message Darmahenwa : '.$message->subject)
            ->from(['address' => $message->email, 'name' => $message->name])
            ->view('mail.pesan', ['data' => $message]);
    }
}
