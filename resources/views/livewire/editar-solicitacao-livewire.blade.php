<div id="editar-solicitacao-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Solicitação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form>
                    <div class="mb-3">
                        <label for="nome_aluno" class="form-label">Nome do Aluno</label>
                        <input id="nome_aluno"
                            class="form-control @error('nome_aluno') is-invalid @enderror"
                            placeholder="Digite seu nome completo"
                            type="text"
                            wire:model="nome_aluno"
                            >

                        @error('nome_aluno')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">

                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                    <select id="tipo_documento" class="form-select @error('tipo_documento') is-invalid @enderror"
                            wire:model="tipo_documento">
                        <option value="">Selecione o tipo de documento</option>
                        @foreach ($this->getTipoDocumentoEnumProperty() as $id => $descricao)
                            <option value="{{ $id }}">{{ $descricao }}</option>
                        @endforeach
                    </select>

                        @error('tipo_documento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" wire:click="atualizar">Salvar alterações</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('abrirModalBootstrap', () => {
            const modal = new bootstrap.Modal(document.getElementById('editar-solicitacao-modal'));
            modal.show();
        });

        document.addEventListener('closeModalBootstrap', () => {
            const modalEl = document.getElementById('editar-solicitacao-modal');
            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) {
                modalInstance.hide();
            }
        });
    </script>
</div>
