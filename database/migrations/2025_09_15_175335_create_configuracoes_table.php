<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    /**
     * Migration para criar a tabela `configuracoes`.
     *
     * Estrutura:
     * - id: chave primária autoincremental
     * - chave: identificador único da configuração
     * - valor: valor atribuído à configuração
     * - descricao: descrição explicativa sobre a configuração
     * - created_at / updated_at: timestamps automáticos
     *
     * Observação:
     * Esta tabela é usada para armazenar parâmetros de usabilidade
     * que podem ser alterados dinamicamente pelo sistema.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->id();
            $table->string('chave')->unique();
            $table->string('valor');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverte a criação da tabela `configuracoes`.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracoes');
    }
};
