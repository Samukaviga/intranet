<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CriacaoDaNoticia implements ShouldQueue
{
    use Queueable;

    public $noticia;
    /**
     * Create a new job instance.
     */
    public function __construct($noticia)
    {
        $this->noticia = $noticia;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
       

        $array = [];

        //Noticia
        $noticia = $this->noticia;
        $createdAt = $noticia->created_at;

        $diaNoticia = $noticia->created_at->format('d');
        $mesNoticia = $noticia->created_at->format('m');
        $anoNoticia = $noticia->created_at->format('Y');


        //Atual
        $carbonDateTime = Carbon::now();
        $diaAtual = $carbonDateTime->format('d');
        $mesAtual = $carbonDateTime->format('m');
        $anoAtual = $carbonDateTime->format('Y');

        $diferenca = $carbonDateTime->diff($createdAt);



        $resultDia = $diaAtual - $diaNoticia;
        $resultMes = $mesAtual - $mesNoticia;
        $resultAno = $anoAtual - $anoNoticia;
        $resultHora = $diferenca->h;



        // Adiciona a diferença em anos, se for diferente de zero
        if ($resultAno !== 0) {
            $array[] = "$resultAno ano" . ($resultAno > 1 ? 's' : ''); // Adiciona 's' para plural
        }

        // Adiciona a diferença em dias, se for diferente de zero
        if ($resultDia !== 0) {
            $array[] = "$resultDia dia" . ($resultDia > 1 ? 's' : ''); // Adiciona 's' para plural
        }

        // Adiciona a diferença em horas, se for diferente de zero
        if ($resultHora !== 0) {
            $array[] = "$resultHora hora" . ($resultHora > 1 ? 's' : ''); // Adiciona 's' para plural
        }

        // Monta a string final
        $resultadoFinal = implode(', ', $array);

        // Exibe o resultado
        return "$resultadoFinal";
    }
}
