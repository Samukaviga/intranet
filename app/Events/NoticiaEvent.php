<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class NoticiaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /*
    public string $titulo; // Definição da propriedade
    public string $descricao; // Definição da propriedade
    */
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
