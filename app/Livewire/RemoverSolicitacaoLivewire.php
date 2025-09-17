<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use Livewire\Attributes\On;

class RemoverSolicitacaoLivewire extends Component
{

    public $solicitacaoId;

    #[On('excluirSolicitacao')]
    public function excluirSolicitacao($id)
    {
        $this->solicitacaoId = $id;
        $this->dispatch('abrirModalExcluir');
    }

    public function confirmarExclusao(){
        
        Solicitacao::destroy($this->solicitacaoId);

        $this->dispatch('consultarSolicitacoes');
        
        $this->dispatch('fecharModalExcluir');
    }

    public function render()
    {
        return view('livewire.remover-solicitacao-livewire');
    }
}
