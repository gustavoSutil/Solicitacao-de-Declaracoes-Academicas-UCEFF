<?php

namespace App\Traits;

trait SolicitacaoValidationTrait
{
    /**
     * Regras de validação para os campos do formulário.
     *
     * @var array
     */
    protected $rules = [
        'nome_aluno' => 'required|string|min:3|max:255|regex:/^[\pL\s]+$/u',
        'tipo_documento' => 'required|string|in:declaracao_matricula,atestado_frequencia,certificado_conclusao',
    ];

    /**
     * Mensagens de validação personalizadas.
     *
     * @var array
     */
    protected $messages = [
        'nome_aluno.required' => 'Por favor, insira o nome do aluno.',
        'nome_aluno.regex' => 'Formato inválido. Use apenas letras e espaços.',
        'tipo_documento.required' => 'Por favor, selecione um tipo de documento válido.',
    ];
}
