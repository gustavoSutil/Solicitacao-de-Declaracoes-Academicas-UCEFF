<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    /**
     * Migration para criar a tabela `solicitacoes`.
     *
     * Estrutura:
     * - id: chave primária autoincremental
     * - nome_aluno: nome do aluno solicitante
     * - codigo_de_validacao: código único para validar o documento
     * - documento_solicitado: tipo de documento solicitado
     * - autorizado: indica se a solicitação foi autorizada (pode ser nulo)
     * - created_at / updated_at: timestamps gerenciados automaticamente
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_aluno');
            $table->string('codigo_de_validacao')->unique();
            $table->string('documento_solicitado');
            $table->boolean('autorizado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverte a criação da tabela `solicitacoes`.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }

};
