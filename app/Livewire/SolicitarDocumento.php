<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;

class SolicitarDocumento extends Component
{
    public $nome_aluno;
    public $tipo_documento;

    /**
     * Regras de validação para os campos do formulário.
     *
     * @var array
     */
    protected $rules = [
        'nome_aluno' => 'required|string|min:3|max:255|regex:/^[\pL\s]+$/u',
        'tipo_documento' => 'required|string|in:declaracao_matricula,certificado_conclusao,historico_academico',
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

    /**
     * Submete a solicitação de documento.
     *
     * @return void
     */
    public function solicitar()
    {   
        $this->validate();

        Solicitacao::create([

            'nome_aluno' => $this->nome_aluno,
            'documento_solicitado' => $this->tipo_documento,
            'codigo_de_validacao' => uniqid(),

        ]);

        session()->flash('success', 'Solicitação enviada com sucesso!');

        $this->reset(
            'nome_aluno'
        );

        $this->reset(
            'tipo_documento'
        );
    }

    public function render()
    {
        return view('livewire.solicitar-documento-livewire');
    }
}
