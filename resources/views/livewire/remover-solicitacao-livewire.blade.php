<div>
    {{--  modal de confirmação de exclusão --}}
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja cancelar esta solicitação?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btn-sm" wire:click="confirmarExclusao">Excluir</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('abrirModalExcluir', () => {
            let modalEl = document.getElementById('confirmDeleteModal');
            let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        });

        window.addEventListener('fecharModalExcluir', () => {
            let modalEl = document.getElementById('confirmDeleteModal');
            let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.hide();
        });
    </script>

</div>
