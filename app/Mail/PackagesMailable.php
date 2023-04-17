<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PackagesMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = $this->data->email;
        $subject = $this->data->name .' - '.\Request::server('HTTP_REFERER');
        $name = $this->data->name;
        
        return $this->view('email.packages')
            ->replyTo($address, $name)
            ->from($address, $name)
            ->subject($subject);
    
    }
}
