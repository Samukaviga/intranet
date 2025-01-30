<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_habilidade');
            $table->foreign('id_habilidade')->references('id')->on('habilidades')->onDelete('cascade');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

     
    public function down(): void
    {
        Schema::dropIfExists('detalhes');
    }
};
