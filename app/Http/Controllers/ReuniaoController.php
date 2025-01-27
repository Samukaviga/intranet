<?php

namespace App\Http\Controllers;

use App\Models\Reuniao;
use Illuminate\Http\Request;

class ReuniaoController extends Controller
{
   
    public function adicionarReuniao()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('principal.adicionar-reuniao')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function adicionarReuniaoPost(Request $request)
    {

        $validated = $request->validate([
            'nome' => 'required',
            'data' => 'required',
            'horario' => 'required',
        ]);

        $reuniao = Reuniao::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'horario' => $request->horario,

        ]);

        return to_route('principal')->with('mensagemSucesso', "Reuniao adicionada com sucesso!");
    }

    public function editarReuniao(Request $request)
    {


        $reuniao = Reuniao::find($request->id);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('principal.editar-reuniao')->with('mensagemSucesso', $mensagemSucesso)
                                                        ->with('reuniao', $reuniao);
    }

    public function editarReuniaoPost(Request $request)
    {
  
        $validated = $request->validate([
            'nome' => 'required',
            'data' => 'required',
            'horario' => 'required',
        ]);        

        $reuniao = Reuniao::find($request->id_reuniao);
        $reuniao->nome = $request->nome;
        $reuniao->data = $request->data;
        $reuniao->horario = $request->horario;
        $reuniao->save();

        return redirect('/detalhesNoticia')->with('mensagemSucesso', 'Noticia Editada com Sucesso!');
    }

    public function detalhesReuniao()
    {

        $reunioes = Reuniao::all();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('principal.detalhes-reuniao')->with('mensagemSucesso', $mensagemSucesso)
            ->with('reunioes', $reunioes);
    }

    public function reuniaoDeletar(Request $request)
    {


        Reuniao::destroy($request->id);

        return back()->with('mensagemSucesso', "Reunião deletada com sucesso");
    }
}
