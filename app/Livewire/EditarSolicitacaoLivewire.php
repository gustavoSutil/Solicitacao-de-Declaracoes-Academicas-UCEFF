<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use App\Traits\SolicitacaoValidationTrait;
use Livewire\Attributes\On;

class EditarSolicitacaoLivewire extends Component
{
    use SolicitacaoValidationTrait;

    public $nome_aluno;
    public $tipo_documento;
    public $id;

    public function getTipoDocumentoEnumProperty()
    {
        return Solicitacao::getDocumentoSolicitadoEnum();
    }

    /**
     * Submete a alteração na solicitação do documento.
     *
     * @return void
     */
    public function atualizar()
    {
        $this->validate();

        $registro = Solicitacao::findOrFail($this->id);
        
        $registro->update([
            'nome_aluno' => $this->nome_aluno,
            'documento_solicitado' => $this->tipo_documento,
        ]);

        session()->flash('success', 'Solicitação atualizada com sucesso!');

        $this->reset(
            ['nome_aluno','tipo_documento']
        );

        $this->dispatch('consultarSolicitacoes');

        $this->dispatch('closeModalBootstrap');
    }

    
    #[On('carregarSolicitacao')]
    public function carregarSolicitacao($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        $this->id = $solicitacao->id;
        $this->nome_aluno = $solicitacao->nome_aluno;
        $this->tipo_documento = $solicitacao->documento_solicitado;

        $this->dispatch('abrirModalBootstrap');
    }


    public function render()
    {
        return view('livewire.editar-solicitacao-livewire');
    }
}
