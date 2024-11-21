<?php

namespace App\Providers;

use App\Events\NoticiaEvent;
use App\Listeners\CriarNoticia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

     protected $listen = [
        NoticiaEvent::class => [
            CriarNoticia::class, //listener
            
        ],

    ];


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
