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
    public function __construct($link_url,$name)
    {
        $this->url = $link_url;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reset-password',[
            'url' => $this->url,
            'name' => $this->name
        ])->subject('Solicitação de Alteração de Senha '.env('Ecommerce'));
    }
}
