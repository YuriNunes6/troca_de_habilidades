<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sessoes', function (Blueprint $table) { // Criação da tabela "sessoes"

            $table->id(); // ID da sessão
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade'); // Usuário associado à sessão
            $table->foreignId('id_habilidade')->references('id')->on('habilidades')->onDelete('cascade'); // Habilidade associada à sessão
            $table->time('horario_inicio'); // Horário de início da sessão
            $table->time('horario_fim'); // Horário de término da sessão
            $table->date('data'); // Data da sessão
            $table->enum('status', ['pendente','confirmada','cancelada','concluida'])->default('pendente'); // Status da sessão
            $table->text('observacoes')->nullable(); // Observações adicionais sobre a sessão

            $table->timestamps(); // Armazena as colunas created_at e updated_at para controle de tempo de criação e atualização da sessão
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessoes');
    }
};