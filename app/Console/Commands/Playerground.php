<?php

namespace App\Console\Commands;

use App\Models\Noticia;
use Illuminate\Console\Command;
use Carbon\Carbon;

class Playerground extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        //format('d-m-Y H:i:s')

        $array = [];

        //Noticia
        $noticia = Noticia::all()->first();
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
        dd($resultadoFinal);


        dd($array);

        dd("1 ano" . " 3 dias " . " 2 horas");
        dd($resultAno);

        // 11-11-2024

        // 19-11-2024

    }
}
