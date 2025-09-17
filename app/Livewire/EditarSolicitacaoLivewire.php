<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use App\Traits\SolicitacaoValidationTrait;
use Livewire\Attributes\On;

/**
 * Class EditarSolicitacaoLivewire
 *
 * Componente Livewire responsável por gerenciar a edição de solicitações de documentos.
 *
 * @package App\Livewire
 *
 * @property string $nome_aluno Nome do aluno cuja solicitação está sendo editada
 * @property string $tipo_documento Tipo de documento que será atualizado
 * @property int $id ID da solicitação sendo editada
 */
class EditarSolicitacaoLivewire extends Component
{
    use SolicitacaoValidationTrait;

    /** @var string $nome_aluno Nome do aluno */
    public $nome_aluno;

    /** @var string $tipo_documento Tipo de documento solicitado */
    public $tipo_documento;

    /** @var int $id ID da solicitação sendo editada */
    public $id;

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
     * Atualiza uma solicitação existente no banco de dados.
     *
     * Valida os dados, atualiza o registro correspondente e emite eventos
     * para atualizar a lista de solicitações e fechar o modal.
     *
     * @throws \Illuminate\Validation\ValidationException Caso a validação falhe
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

        Solicitacao::whih('user')->get();


        session()->flash('success', 'Solicitação atualizada com sucesso!');

        $this->reset(['nome_aluno', 'tipo_documento']);

        $this->dispatch('consultarSolicitacoes');
        $this->dispatch('closeModalBootstrap');
    }

    /**
     * Carrega os dados de uma solicitação para edição.
     *
     * Define as propriedades do componente com os dados da solicitação
     * e abre o modal de edição.
     *
     * @param int $id ID da solicitação a ser carregada
     *
     * @return void
     */
    #[On('carregarSolicitacao')]
    public function carregarSolicitacao($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        $this->id = $solicitacao->id;
        $this->nome_aluno = $solicitacao->nome_aluno;
        $this->tipo_documento = $solicitacao->documento_solicitado;

        $this->dispatch('abrirModalBootstrap');
    }

    /**
     * Renderiza a view do componente Livewire.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.editar-solicitacao-livewire');
    }
}
