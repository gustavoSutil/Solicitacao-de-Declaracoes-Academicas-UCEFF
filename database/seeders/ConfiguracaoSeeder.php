<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Configuracao;

/**
 * Seeder para a tabela `configuracoes`.
 *
 * Este seeder insere a configuração inicial:
 * - chave: necessita_autorizacao
 * - valor: true
 * - descricao: Quando true, necessita autorização para emitir documento.
 *
 * @see Configuracao
 */
class ConfiguracaoSeeder extends Seeder
{
    /**
     * Executa o seeder.
     *
     * @return void
     */
    public function run(): void
    {
        Configuracao::create([
            'chave' => 'necessita_autorizacao',
            'valor' => 'true',
            'descricao' => 'Quando true necessita autorização para emitir documento',
        ]);
    }
}
