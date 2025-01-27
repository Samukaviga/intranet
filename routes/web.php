<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
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


    //UNIDADES
    Route::get('/liceuBrasil', [PrincipalController::class, 'liceuBrasil']);



    // EVENTO
    Route::get('/adicionarEvento', [PrincipalController::class, 'adicionarEvento']);
    Route::get('/detalhesEvento', [PrincipalController::class, 'detalhesEvento']);
    Route::get('/editarEvento/{id}', [PrincipalController::class, 'editarEvento']);
    Route::post('/editarEvento', [PrincipalController::class, 'editarEventoPost']);
    Route::post('/adicionarEvento', [PrincipalController::class, 'adicionarEventoPost']);

    //REUNIAO
    Route::get('/adicionarReuniao', [PrincipalController::class, 'adicionarReuniao']);
    Route::get('/detalhesReuniao', [PrincipalController::class, 'detalhesReuniao']);
    Route::get('/editarReuniao/{id}', [PrincipalController::class, 'editarReuniao']);
    Route::post('/editarReuniao', [PrincipalController::class, 'editarReuniaoPost']);
    Route::post('/adicionarReuniao', [PrincipalController::class, 'adicionarReuniaoPost']);

    // NOTICIA
    Route::get('/adicionarNoticia', [NoticiaController::class, 'adicionarNoticia']);
    Route::get('/detalhesNoticia', [NoticiaController::class, 'detalhesNoticia']);
    Route::get('/editarNoticia/{id}', [NoticiaController::class, 'editarNoticia']);
    Route::post('/adicionarNoticia', [NoticiaController::class, 'adicionarNoticiaPost']);
    Route::post('/editarNoticia', [NoticiaController::class, 'editarNoticiaPost']);

    Route::get('/perfil', [PrincipalController::class, 'perfil']);
    Route::post('/perfil/foto', [PrincipalController::class, 'perfilFoto']);


    //BLOG
    Route::get('/blog', [PrincipalController::class, 'blog']);
    Route::get('/blog/detalhes/{id}', [PrincipalController::class, 'blogDetalhes']);
    Route::get('/blog/editar/{id}', [PrincipalController::class, 'blogEditar']);
    Route::get('/blog/novo', [PrincipalController::class, 'blogNovo']);
    Route::post('/blog/editar', [PrincipalController::class, 'editarBlogPost']);

    Route::delete('/blog/deletar/{id}', [PrincipalController::class, 'blogDeletar']);

    Route::post('/blog/novo', [PrincipalController::class, 'blogNovoPost']);

    //RECURSOS HUMANOS
    Route::get('/recursos-humanos', [PrincipalController::class, 'recursosHumanos']);
    Route::get('/recursos-humanos/novo', [PrincipalController::class, 'recursosHumanosNovo']);
    Route::get('/recursos-humanos/editar', [PrincipalController::class, 'recursosHumanosEditar']);
    Route::get('/recursos-humanos/detalhes', [PrincipalController::class, 'recursosHumanosDetalhes']);
    Route::get('/recursos-humanos/detalhes', [PrincipalController::class, 'recursosHumanosDetalhes']);

    Route::get('/comercial', [PrincipalController::class, 'comercial']);
    Route::get('/comercial/novo', [PrincipalController::class, 'comercialNovo']);
    Route::get('/comercial/editar', [PrincipalController::class, 'comercialEditar']);
    Route::get('/comercial/detalhes', [PrincipalController::class, 'comercialDetalhes']);
    Route::get('/comercial/detalhes', [PrincipalController::class, 'comercialDetalhes']);

});


require __DIR__ . '/auth.php';
