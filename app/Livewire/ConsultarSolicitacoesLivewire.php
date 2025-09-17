<?php

namespace App\Livewire;

use App\Models\Solicitacao;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Class ConsultarSolicitacoesLivewire
 *
 * Componente Livewire responsável por consultar e filtrar solicitações de documentos.
 *
 * @package App\Livewire
 *
 * @property \Illuminate\Database\Eloquent\Collection $solicitacoes Coleção de solicitações filtradas
 * @property string $filtroNome Filtro para o nome do aluno
 * @property \Illuminate\Support\Carbon|null $filtroData Filtro para a data de criação da solicitação
 */
class ConsultarSolicitacoesLivewire extends Component
{
    /** @var \Illuminate\Database\Eloquent\Collection $solicitacoes Coleção de solicitações */
    public $solicitacoes;

    /** @var string Filtro para o nome do aluno */
    public $filtroNome = '';

    /** @var \Illuminate\Support\Carbon|null Filtro para a data de criação da solicitação */
    public $filtroData = null;

    /**
     * Consulta as solicitações de acordo com os filtros definidos.
     *
     * Filtra por nome do aluno e data de criação, e ordena pelo mais recente.
     *
     * @return void
     */
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

    /**
     * Renderiza a view do componente Livewire.
     *
     * Consulta as solicitações antes de renderizar.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->consultarSolicitacoes();

        return view('livewire.consultar-solicitacoes-livewire', [
            'solicitacoes' => $this->solicitacoes
        ]);
    }
}
