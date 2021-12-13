<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $subject;
    public $email;
    public $data;

    public function __construct($email, $subject, $message, $data = null)
    {
        $this->email = $email;
        $this->message = $message;
        $this->subject = $subject;
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('sayursembalun19@gmail.com')
                    ->view($this->message)
                    ->to($this->email)
                    ->subject($this->subject)
                    ->with(['data' => $this->data]);
    }
}
