<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

     public function adicionarEvento()
     {
         return view('principal.adicionar-evento');
     }
 
     public function editarEvento(Request $request)
     {
 
         $evento = Evento::find($request->id);
 
         return to_route('principal.editar-evento')->with('evento', $evento);
     }
 
     public function editarEventoPost(Request $request)
     {
 
         $validated = $request->validate([
             'nome' => 'required',
             'horario' => 'required',
             'data' => 'required',
         ]);
 
 
         $noticia = Evento::find($request->id_evento);
         $noticia->fill($request->all());
         $noticia->save();
 
         return redirect('/detalhesEvento')->with('mensagemSucesso', 'Evento Editado com Sucesso!');
     }
 
     public function detalhesEvento()
     {
 
         $eventos = Evento::all();
 
         $mensagemSucesso = session('mensagem.sucesso');
 
         return view('principal.detalhes-evento')->with('mensagemSucesso', $mensagemSucesso)
             ->with('eventos', $eventos);
     }
 
     public function adicionarEventoPost(Request $request)
     {
 
 
         $validated = $request->validate([
             'nome' => 'required',
             'data' => 'required',
             'horario' => 'required',
         ]);
 
 
         $reuniao = Evento::create([
             'nome' => $request->nome,
             'data' => $request->data,
             'horario' => $request->horario,
 
         ]);
 
         return to_route('evento.detalhes')->with('mensagemSucesso', "Evento adicionado com sucesso!");
     }

     
    public function eventoDeletar(Request $request)
    {

        Evento::destroy($request->id);

        return back()->with('mensagemSucesso', "Evento deletado com sucesso");
    }
}
