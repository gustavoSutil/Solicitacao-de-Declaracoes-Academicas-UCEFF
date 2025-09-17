<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use App\Traits\SolicitacaoValidationTrait;

/**
 * Class SolicitarDocumentoLivewire
 *
 * Componente Livewire responsável por gerenciar a solicitação de documentos pelos alunos.
 *
 * @package App\Livewire
 * 
 * @property string $nome_aluno Nome do aluno que está solicitando o documento
 * @property string $tipo_documento Tipo de documento que está sendo solicitado
 */
class SolicitarDocumentoLivewire extends Component
{
    use SolicitacaoValidationTrait;

    /** @var string $nome_aluno Nome do aluno */
    public $nome_aluno;

    /** @var string $tipo_documento Tipo de documento solicitado */
    public $tipo_documento;

    /**
     * Retorna a lista de tipos de documentos disponíveis.
     *
     * @return array Lista de documentos solicitáveis
     */
    public function getTipoDocumentoEnumProperty()
    {
        return Solicitacao::getDocumentoSolicitadoEnum();
    }

    /**
     * Submete a solicitação de documento.
     *
     * Valida os dados do formulário, cria uma nova solicitação no banco
     * e emite um evento para atualizar a lista de solicitações.
     *
     * @throws \Illuminate\Validation\ValidationException Caso a validação falhe
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

        // Resetar os campos do formulário
        $this->reset('nome_aluno', 'tipo_documento');

        // Disparar evento para atualizar a lista de solicitações
        $this->dispatch('consultarSolicitacoes');
    }

    /**
     * Renderiza a view do componente Livewire.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.solicitar-documento-livewire');
    }
}
