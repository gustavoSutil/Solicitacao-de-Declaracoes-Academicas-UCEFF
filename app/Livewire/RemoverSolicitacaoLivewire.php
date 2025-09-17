<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use Livewire\Attributes\On;

/**
 * Class RemoverSolicitacaoLivewire
 *
 * Componente Livewire responsável por gerenciar a remoção de solicitações.
 *
 * @package App\Livewire
 * 
 * @property int $solicitacaoId ID da solicitação que será removida
 */
class RemoverSolicitacaoLivewire extends Component
{
    /** @var int $solicitacaoId ID da solicitação selecionada para exclusão */
    public $solicitacaoId;

    /**
     * Dispara a ação de exclusão de uma solicitação.
     *
     * Define a propriedade $solicitacaoId e abre o modal de confirmação.
     *
     * @param int $id ID da solicitação que será excluída
     * 
     * @return void
     */
    #[On('excluirSolicitacao')]
    public function excluirSolicitacao($id) 
    {
        $this->solicitacaoId = $id;
        $this->dispatch('abrirModalExcluir');
    }

    /**
     * Confirma a exclusão da solicitação.
     *
     * Remove a solicitação do banco de dados, atualiza a lista de solicitações
     * e fecha o modal de confirmação.
     *
     * @return void
     */
    public function confirmarExclusao()
    {
        Solicitacao::destroy($this->solicitacaoId);

        // Atualiza a lista de solicitações
        $this->dispatch(event: 'consultarSolicitacoes');

        // Fecha o modal de exclusão
        $this->dispatch('fecharModalExcluir');
    }

    /**
     * Renderiza a view do componente Livewire.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.remover-solicitacao-livewire');
    }
}
