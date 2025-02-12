<?php

namespace App\Http\Controllers;

use App\Models\Rh_Conteudo;
use Illuminate\Http\Request;
use Storage;

class RecursosHumanosController extends Controller
{

    public function recursosHumanos()
    {

        $conteudos = Rh_Conteudo::all();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('recursos-humanos.index')->with('conteudos', $conteudos)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function recursosHumanosDetalhes(Request $request)
    {
        $conteudo = Rh_Conteudo::find($request->id);

        return view('recursos-humanos.detalhes')->with('conteudo', $conteudo);
    }

    public function recursosHumanosEditar(Request $request)
    {
        $conteudo = Rh_Conteudo::find($request->id); 

        return view('recursos-humanos.editar')->with('conteudo', $conteudo);
    }

    public function recursosHumanosNovo()
    {
        return view('recursos-humanos.novo');
    }

    public function recursosHumanosNovoPost(Request $request)
    {

        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);


        $coverPathImage = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/recursos-humanos/imagens', 'public') : $coverPathImage = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome '/recursos-humanos/imagens' e retorna o caminho salvo e salva em public (config/filesystems) 
        $coverPathArquivo = $request->hasFile('arquivo') ? $request->file('imagem')->store('assets/recursos-humanos/arquivos', 'public') : $coverPathArquivo = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome '/recursos-humanos/arquivos' e retorna o caminho salvo e salva em public (config/filesystems) 


        Rh_Conteudo::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $coverPathImage,
            'arquivo' => $coverPathArquivo,
        ]);

        return to_route('recursos-humanos.index')->with('Counteudo do Recursos Humanos adicionado com sucesso!');
    }

    public function recursosHumanosEditarPost( Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]); 

        $conteudo = Rh_Conteudo::find($request->id);

        $conteudo->titulo = $request->titulo;
        $conteudo->descricao = $request->descricao;

        if($request->imagem !== null)
        {   
            //excluindo imagem local, asyc
            $conteudo->imagem ? Storage::disk('public')->delete($conteudo->imagem) : null; 

            //CoverPath
            $coverPathImage = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/recursos-humanos/imagens', 'public') : $coverPathImage = null; 
            $conteudo->imagem = $coverPathImage;

        }

        if($request->arquivo !== null)
        {   
            //excluindo imagem local, asyc
            $conteudo->arquivo ? Storage::disk('public')->delete($conteudo->arquivo) : null; 

            //CoverPath
            $coverPathArquivo = $request->hasFile('arquivo') ? $request->file('arquivo')->store('assets/recursos-humanos/arquivos', 'public') : $coverPathArquivo = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome '/recursos-humanos/arquivos' e retorna o caminho salvo e salva em public (config/filesystems) 
            $conteudo->arquivo = $coverPathArquivo;

        }
        
        $conteudo->save();

        return redirect("/recursos-humanos")->with('mensagemSucesso', 'Conteudo editado com Sucesso!');

    }
}

