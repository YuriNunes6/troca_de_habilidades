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
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitante_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('destinatario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('habilidade_id')->constrained('habilidades')->onDelete('cascade');
            $table->text('mensagem');
            $table->enum('status', ['pendente', 'aceita', 'recusada'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }
};
