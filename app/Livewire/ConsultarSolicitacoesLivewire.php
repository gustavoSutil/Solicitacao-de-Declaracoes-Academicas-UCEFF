<?php

namespace App\Livewire;

use App\Models\Solicitacao;
use Livewire\Attributes\On;
use Livewire\Component;

class ConsultarSolicitacoesLivewire extends Component
{
    public $solicitacoes;

    public $filtroNome = '';
    public $filtroData = null;

    #[On('consultarSolicitacoes')]
    public function consultarSolicitacoes()
    {
        $this->solicitacoes = Solicitacao::query();

        if (!empty($this->filtroNome)) {
            $this->solicitacoes->where('nome_aluno', 'like', '%' . $this->filtroNome . '%');
        }

        if (!empty($this->filtroData)) {
            $this->solicitacoes->whereDate('created_at', $this->filtroData);
        }

        $this->solicitacoes = $this->solicitacoes->orderByDesc('created_at')->get();
    }

    public function render()
    {

        $this->consultarSolicitacoes();

        return view('livewire.consultar-solicitacoes-livewire', [
            'solicitacoes' => $this->solicitacoes
        ]);
    }
}
