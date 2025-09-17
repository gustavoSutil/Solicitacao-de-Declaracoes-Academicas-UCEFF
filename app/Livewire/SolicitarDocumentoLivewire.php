<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use App\Traits\SolicitacaoValidationTrait;

class SolicitarDocumentoLivewire extends Component
{
    use SolicitacaoValidationTrait;

    public $nome_aluno;
    public $tipo_documento;

    public function getTipoDocumentoEnumProperty()
    {
        return Solicitacao::getDocumentoSolicitadoEnum();
    }

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

        $this->dispatch('consultarSolicitacoes');
    }

    public function render()
    {
        return view('livewire.solicitar-documento-livewire');
    }
}
