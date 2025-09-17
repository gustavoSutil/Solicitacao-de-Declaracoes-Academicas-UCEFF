<div>
    <div wire:poll.10s class="container mt-5" style="max-width: 700px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Solicitações de Documentos</h5>
            </div>

            <div class="card-body">

                {{-- pesquisa por data ou nome --}}
                <div class="mb-4">
                    <h6 class="mb-3">Filtros</h6>
                    <div class="row g-2">
                        <div class="col-md-9 col-12">
                            <input type="text"
                                class="form-control"
                                placeholder="Pesquisar por nome"
                                wire:model.lazy="filtroNome">
                        </div>
                        <div class="col-md-3 col-12">
                            <input type="date"
                                class="form-control"
                                wire:model.lazy="filtroData">
                        </div>
                    </div>
                </div>


                {{-- Com o Alpine.js detectamos o tamanho da tela --}}
                <div x-data="{ isMobile: window.innerWidth < 768 }" x-init="
                    window.addEventListener('resize', () => {
                        isMobile = window.innerWidth < 768;
                    });
                ">
                    @if ($solicitacoes->isEmpty())
                        <p class="text-muted">Nenhuma solicitação encontrada.</p>
                    @else
                        <template x-if="isMobile">
                            <div class="mb-3">
                                @foreach ($solicitacoes as $solicitacao)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            {{-- 3 pontos (opções) --}}
                                            <div class="d-flex justify-content-end position-relative" x-data="{ open: false }">
                                                <div @click="open = !open" style="cursor: pointer;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                                    </svg>
                                                </div>

                                                {{-- Menu suspenso opções --}}
                                                <div x-show="open" @click.away="open = false"
                                                    class="position-absolute bg-white border mt-2 p-2 shadow-sm rounded"
                                                    style="z-index: 1000; right: 0;">
                                                    <a href="#"
                                                        class="dropdown-item"
                                                        @click="$dispatch('carregarSolicitacao', { id: {{ $solicitacao->id }} })">
                                                        Editar Solicitação
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a
                                                        class="d-block mb-1 dropdown-item"
                                                        @click="$dispatch('excluirSolicitacao', { id: {{ $solicitacao->id }} })">
                                                        Excluir Solicitação
                                                    </a>
                                                </div>
                                            </div>


                                            <p><strong>Nome do Aluno:</strong> {{ $solicitacao->nome_aluno }}</p>
                                            <p><strong>Data da Solicitação:</strong> {{
                                                Carbon\Carbon::parse($solicitacao->created_at)
                                                    ->setTimeZone('America/Sao_Paulo')
                                                    ->format('d/m/Y H:i')
                                            }}</p>
                                            <p><strong>Documento Solicitado:</strong> {{ $solicitacao->documento_solicitado_formatado }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </template>


                        <template x-if="!isMobile">
                            <div>
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body row">
                                            <div class="col-5"><strong>Nome do Aluno</strong></div>
                                            <div class="col-3"><strong>Data da Solicitação</strong></div>
                                            <div class="col-3"><strong>Documento Solicitado</strong></div>
                                            <div class="col-1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($solicitacoes as $solicitacao)
                                        <div class="card">
                                            <div class="card-body row">
                                                <div class="col-5">{{ $solicitacao->nome_aluno }}</div>
                                                <div class="col-3">{{
                                                    Carbon\Carbon::parse($solicitacao->created_at)
                                                        ->setTimeZone('America/Sao_Paulo')
                                                        ->format('d/m/Y H:i')
                                                }}</div>
                                                <div class="col-3">{{ $solicitacao->documento_solicitado_formatado }}</div>
                                                <div class="col-1 position-relative" x-data="{ open: false }">
                                                    {{-- 3 pontos (opções) --}}
                                                    <div @click="open = !open" style="cursor: pointer;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                            <path
                                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                                        </svg>
                                                    </div>

                                                    {{-- Menu suspenso opções --}}
                                                    <div x-show="open" @click.away="open = false"
                                                        class="position-absolute bg-white border mt-2 p-2 shadow-sm rounded"
                                                        style="z-index: 1000;">
                                                        <a href="#"
                                                            class="dropdown-item"
                                                            @click="$dispatch('carregarSolicitacao', { id: {{ $solicitacao->id }} })">
                                                            Editar Solicitação
                                                        </a>
                                                    <div class="divider"></div>
                                                    <a
                                                        href="#"
                                                        class="dropdown-item"
                                                        @click="$dispatch('excluirSolicitacao', { id: {{ $solicitacao->id }} })">
                                                        Excluir Solicitação
                                                    </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </template>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
