<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeSerie;
    public $idSerie;
    public $qtdTemp;
    public $qtdEpisodios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        string $nomeSerie, 
        int $idSerie, 
        int $qtdTemp, 
        int $qtdEpisodios
        )
    {
        $this->nomeSerie = $nomeSerie;
        $this->idSerie = $idSerie;
        $this->qtdTemp = $qtdTemp;
        $this->qtdEpisodios = $qtdEpisodios;

        $this->subject = "Série $this->nomeSerie criada com sucesso!";
    }

    /**
     * Build the message.markdown
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.series-created');
    }
}
