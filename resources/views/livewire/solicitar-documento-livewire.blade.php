<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Solicitar Documento</h5>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="solicitar">
                <div class="mb-3">
                    <label for="nome_aluno" class="form-label">Nome do Aluno</label>
                    <input type="text" id="nome_aluno" class="form-control @error('nome_aluno') is-invalid @enderror"
                           wire:model="nome_aluno" placeholder="Digite seu nome completo">

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
                        <option value="declaracao_matricula">Declaração de Matrícula</option>
                        <option value="certificado_conclusao">Certificado de Conclusão</option>
                        <option value="atestado_frequencia">Atestado de Frequência</option>
                    </select>

                    @error('tipo_documento')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Enviar Solicitação
                </button>
            </form>
        </div>
    </div>
</div>
