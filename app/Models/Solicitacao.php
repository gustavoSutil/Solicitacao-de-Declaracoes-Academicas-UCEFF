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
 * Atributos adicionais:
 * - documento_solicitado_formatado: retorna o nome legível do documento solicitado
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
        'documento_solicitado'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static array $documento_solicitadoEnum = [
        'declaracao_matricula' => 'Declaração de Matrícula',
        'atestado_frequencia' => 'Atestado de Frequência',
        'certificado_conclusao' => 'Certificado de Conclusão',
    ];

    public static function getDocumentoSolicitadoEnum(): array
    {
        return self::$documento_solicitadoEnum;
    }

    public function getDocumentoSolicitadoFormatadoAttribute()
    {
        return self::$documento_solicitadoEnum[$this->documento_solicitado] ?? 'Documento Desconhecido';
    }
}
