<x-layouts::app :title="__('Nova locação')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Nova locação</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Preencha os dados da locaão.</p>
        </div>

        <form action="{{ route('locacoes.store') }}" method="POST" class="max-w-2xl">
            {{-- Metodo POST -> INSERIR INFORMAÇÕES -- CARREGAR Clientes e Produtos --}}
            @include('locacoes._form', ['buttonText' => 'Salvar locação',  'clientes' => $clientes,
            'produtos' => $produtos])
        </form>
    </div>
</x-layouts::app>