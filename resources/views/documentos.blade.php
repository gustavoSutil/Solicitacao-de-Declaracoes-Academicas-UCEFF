<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- #region (Alpine.js) adicionando largura tela em variavel -->
    <div
    x-data="{ width: window.innerWidth }"
    x-init="
        window.addEventListener('resize', () => {
            width = window.innerWidth;
            $wire.set('larguraTela', width);
        });
        $wire.set('larguraTela', width);
    "
    style="display: none;"
    ></div>
    <!-- #endregion -->

    <title>Solicitar Documento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @livewireStyles
</head>
<body>
    <livewire:solicitar-documento-livewire />

    <livewire:consultar-solicitacoes-livewire />

    <livewire:editar-solicitacao-livewire />

    <livewire:remover-solicitacao-livewire />
        
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
    
</body>
</html>
