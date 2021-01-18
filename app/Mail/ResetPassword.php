<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $link_url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link_url)
    {
        $this->link_url = $link_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset-password')->subject('Solicitação de Alteração de Senha Ecommerce');
    }
}
