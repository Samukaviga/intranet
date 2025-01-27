<?php

namespace App\Http\Controllers;

use App\Events\NoticiaEvent;
use App\Models\Noticia;
use App\Repositories\PrincipalRepository;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public function __construct(private PrincipalRepository $repository)
    {
        
    }


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

        $noticias = Noticia::all();

        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        NoticiaEvent::dispatch($request);

        return to_route('noticia.detalhes')
            ->with('mensagemSucesso', "Noticia adicionada com sucesso!")
            ->with('noticias', $noticias);
    }

    public function noticiaDeletar(Request $request)
    {

        Noticia::destroy($request->id);

        return back()->with('mensagemSucesso', "Noticia deletada com sucesso");
    }
}
