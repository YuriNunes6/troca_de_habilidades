<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('habilidade_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('habilidade_id')->constrained('habilidades')->onDelete('cascade');
            $table->enum('nivel_aprendizado',['regular','intermediario','avancado']);
            $table->string('tempo_experiencia');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

        /**
        * Reverse the migrations.
        */
    public function down(): void
    {
        Schema::dropIfExists('habilidade_usuario');
    }
};
