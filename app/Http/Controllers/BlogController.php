<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
     //BLOG
     public function blog()
     {
         $mensagemSucesso = session('mensagem.sucesso');
 
         Carbon::setLocale('pt_BR');
 
         $blogs = Blog::all();
 
         return view('blog.index')->with('blogs', $blogs)->with('mensagemSucesso', $mensagemSucesso);
     }
 
     public function blogDetalhes(Request $request)
     {
 
         $blog = Blog::where('id', $request->id)->first();
 
 
         return view('blog.detalhes')->with('blog', $blog);
     }
 
     public function blogEditar(Request $request)
     {   
         $blog = Blog::find($request->id);
 
         return view('blog.editar')->with('blog', $blog);
     }
 
     public function editarBlogPost(Request $request)
     {
 
         $validated = $request->validate([
             'titulo' => 'required',
             'descricao' => 'required',
         ]); 
 
         $blog = Blog::find($request->id_blog);
         $blog->titulo = $request->titulo;
         $blog->descricao = $request->descricao;
 
         if($request->imagem !== null)
         {   
             //excluindo imagem local, asyc
             $blog->imagem ? Storage::disk('public')->delete($blog->imagem) : null; 
 
             //CoverPath
             $coverPath = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/blog', 'public') : $coverPath = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome 'series_cover' e retorna o caminho salvo e salva em public (config/filesystems)
             $request->coverPath = $coverPath; 
 
             $blog->imagem = $request->coverPath;
 
         }
 
         $blog->save();
 
         return redirect("/blog")->with('mensagemSucesso', 'Blog editado com Sucesso!');
 
 
     }
 
     public function blogNovo()
     {
         return view('blog.novo');
     }
 
     public function blogNovoPost(Request $request)
     {
 
         $validated = $request->validate([
             'titulo' => 'required',
             'descricao' => 'required',
         ]);
 
         $coverPath = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/blog', 'public') : $coverPath = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome 'series_cover' e retorna o caminho salvo e salva em public (config/filesystems)
 
         $request->coverPath = $coverPath;
 
         $blog = Blog::create([
             'titulo' => $request->titulo,
             'descricao' => $request->descricao,
             'imagem' => $request->coverPath,
             'id_user' => $request->id_user,
         ]);
 
         return redirect("/blog")->with('mensagemSucesso', 'Blog adicionado com Sucesso!');
     }
 
     public function blogDeletar(Request $request)
     {
         $blogs = Blog::all();
 
         $blog = Blog::find($request->id);
 
         $blog->imagem ? Storage::disk('public')->delete($blog->imagem) : null; //excluindo imagem local, asyc
 
         Blog::destroy($request->id);
 
         return back()->with('mensagemSucesso', "Blog deletado com sucesso");
     }
}
