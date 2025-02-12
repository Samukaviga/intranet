<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComercialController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecursosHumanosController;
use App\Http\Controllers\ReuniaoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {


    if (Auth::check()) {

        return redirect()->route('principal');
    }

    return view('auth.login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {

    //Principal
    Route::get('/principal', [PrincipalController::class, 'index'])->middleware(['auth', 'verified'])->name('principal');
    Route::get('/alterarSenha', [PrincipalController::class, 'alterarSenha']);
    Route::post('/alterarSenha', [PrincipalController::class, 'alterarSenhaPost']);


    // UNIDADES
    Route::get('/liceuBrasil', [PrincipalController::class, 'liceuBrasil']);

    // EVENTO
    Route::get('/adicionarEvento', [EventoController::class, 'adicionarEvento'])->name('evento.adicionar');
    Route::get('/detalhesEvento', [EventoController::class, 'detalhesEvento'])->name('evento.detalhes');
    Route::get('/editarEvento/{id}', [EventoController::class, 'editarEvento'])->name('evento.editar');
    Route::post('/editarEvento', [EventoController::class, 'editarEventoPost'])->name('evento.editar.post');;
    Route::post('/adicionarEvento', [EventoController::class, 'adicionarEventoPost'])->name('evento.adicionar.post');;

    Route::delete('/evento/deletar/{id}', [EventoController::class, 'eventoDeletar'])->name('evento.deletar');


    // REUNIAO
    Route::get('/adicionarReuniao', [ReuniaoController::class, 'adicionarReuniao'])->name('reuniao.adicionar');
    Route::get('/detalhesReuniao', [ReuniaoController::class, 'detalhesReuniao'])->name('reuniao.detalhes');
    Route::get('/editarReuniao/{id}', [ReuniaoController::class, 'editarReuniao'])->name('reuniao.editar');
    Route::post('/editarReuniao', [ReuniaoController::class, 'editarReuniaoPost'])->name('reuniao.editar.post');
    Route::post('/adicionarReuniao', [ReuniaoController::class, 'adicionarReuniaoPost'])->name('reuniao.adicionar.post');

    Route::delete('/reuniao/deletar/{id}', [ReuniaoController::class, 'reuniaoDeletar'])->name('reuniao.deletar');


    // NOTICIA
    Route::get('/adicionarNoticia', [NoticiaController::class, 'adicionarNoticia'])->name('noticia.adicionar');
    Route::get('/detalhesNoticia', [NoticiaController::class, 'detalhesNoticia'])->name('noticia.detalhes');
    Route::get('/editarNoticia/{id}', [NoticiaController::class, 'editarNoticia'])->name('noticia.editar');
    Route::post('/adicionarNoticia', [NoticiaController::class, 'adicionarNoticiaPost'])->name('noticia.adicionar.post');
    Route::post('/editarNoticia', [NoticiaController::class, 'editarNoticiaPost'])->name('noticia.editar.post');

    Route::delete('/noticia/deletar/{id}', [NoticiaController::class, 'noticiaDeletar'])->name('noticia.deletar');

    // PERFIL
    Route::get('/perfil', [PrincipalController::class, 'perfil']);
    Route::post('/perfil/foto', [PrincipalController::class, 'perfilFoto']);

    
    // BLOG
    Route::get('/blog', [BlogController::class, 'blog']);
    Route::get('/blog/detalhes/{id}', [BlogController::class, 'blogDetalhes']);
    Route::get('/blog/editar/{id}', [BlogController::class, 'blogEditar']);
    Route::get('/blog/novo', [BlogController::class, 'blogNovo']);
    Route::post('/blog/editar', [BlogController::class, 'editarBlogPost']);

    Route::delete('/blog/deletar/{id}', [BlogController::class, 'blogDeletar']);

    Route::post('/blog/novo', [BlogController::class, 'blogNovoPost']);

    // RECURSOS HUMANOS
    Route::get('/recursos-humanos', [RecursosHumanosController::class, 'recursosHumanos'])->name('recursos-humanos.index');
    Route::get('/recursos-humanos/novo', [RecursosHumanosController::class, 'recursosHumanosNovo']);
    Route::get('/recursos-humanos/editar', [RecursosHumanosController::class, 'recursosHumanosEditar']);
    Route::get('/recursos-humanos/detalhes/{id}', [RecursosHumanosController::class, 'recursosHumanosDetalhes']);
    Route::post('/recusos-humanos/novo', [RecursosHumanosController::class, 'recursosHumanosNovoPost'])->name('recursos-humanos.novo.post');
    
    Route::get('/comercial', [ComercialController::class, 'comercial']);
    Route::get('/comercial/novo', [ComercialController::class, 'comercialNovo']);
    Route::get('/comercial/editar', [ComercialController::class, 'comercialEditar']);
    Route::get('/comercial/detalhes', [ComercialController::class, 'comercialDetalhes']);

});


require __DIR__ . '/auth.php';
