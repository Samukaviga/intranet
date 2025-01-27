<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
       //NOTICIA
       public function adicionarNoticia()
       {
           return view('principal.adicionar-noticia');
       }
   
       public function editarNoticia(Request $request)
       {
   
           $noticia = Noticia::find($request->id);
   
           return view('principal.editar-noticia')->with('noticia', $noticia);
       }
   
       public function editarNoticiaPost(Request $request)
       {
   
           $validated = $request->validate([
               'titulo' => 'required',
               'descricao' => 'required',
           ]);
   
           $noticia = Noticia::find($request->id_noticia);
           $noticia->fill($request->all());
           $noticia->save();
   
           return redirect('/detalhesNoticia')->with('mensagemSucesso', 'Noticia Editada com Sucesso!');
       }
   
       public function detalhesNoticia()
       {
   
           $noticia = Noticia::all();
   
           $mensagemSucesso = session('mensagem.sucesso');
   
           return view('principal.detalhes-noticia')->with('mensagemSucesso', $mensagemSucesso)
               ->with('noticias', $noticia);
       }
   
       public function adicionarNoticiaPost(Request $request)
       {
   
           $validated = $request->validate([
               'titulo' => 'required',
               'descricao' => 'required',
           ]);
   
           NoticiaEvent::dispatch($request);
   
           return view('principal.adicionar-noticia')->with('mensagemSucesso', "Noticia adicionada com sucesso!");
       }
}
