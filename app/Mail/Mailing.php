<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view, $img, $titulo)
    {
        $this->view = $view;
        $this->img = $img;
        $this->titulo = $titulo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)
        ->from("mv.sednemmrotciv@gmail.com", "TECGAMES")
        ->subject("TecMundo - Explore os universos")
        ->with('img', $this->img)
        ->with('titulo', $this->titulo);
    }
}
