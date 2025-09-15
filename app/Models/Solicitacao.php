<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para a tabela `solicitacoes`.
 *
 * Representa uma solicitação de documento acadêmico feita por um aluno.
 *
 * Atributos:
 * - id: chave primária autoincremental
 * - nome_aluno: nome do aluno solicitante
 * - codigo_de_validacao: código único para validar o documento
 * - autorizado: indica se a solicitação foi autorizada (nulo quando pendente)
 * - created_at / updated_at: timestamps gerenciados automaticamente
 *
 * @property int $id
 * @property string $nome_aluno
 * @property string $codigo_de_validacao
 * @property string $documento_solicitado
 * @property bool|null $autorizado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Solicitacao extends Model
{
    protected $table = 'solicitacoes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome_aluno',
        'codigo_de_validacao',
        'autorizado',
        'documento_solicitado'
    ];

    protected $casts = [
        'autorizado' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
