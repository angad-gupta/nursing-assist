<?php

namespace App\Modules\Home\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNetaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content, $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$subject)
    {
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = $this->content;  

        return $this->subject($this->subject)->with('content',$content)->view('student::email');
    }
}
