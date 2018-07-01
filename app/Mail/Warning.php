<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Warning extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view, $img, $titulo, $link)
    {
        $this->view = $view;
        $this->img = $img;
        $this->titulo = $titulo;
        $this->link = $link;
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
        ->with('titulo', $this->titulo)
        ->with('link', $this->link);
    }
}
