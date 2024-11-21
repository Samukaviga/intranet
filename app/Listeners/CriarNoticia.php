<?php

namespace App\Listeners;

use App\Events\NoticiaEvent;
use App\Models\Noticia;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CriarNoticia
{

    public function __construct()
    {
        //
    }


    public function handle(NoticiaEvent $event): void
    {
        $noticia = Noticia::create([
            'titulo' => $event->request->titulo,
            'descricao' => $event->request->descricao,
        ]);
    }
}
