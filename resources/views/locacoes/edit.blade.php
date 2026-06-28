<x-layouts::app :title="__('Editar locação')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Editar locação</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Atualize os dados da locação {{ $locacao->id }}.</p>
        </div>

        <form action="{{ route('locacoes.update', $locacao) }}" method="POST" class="max-w-2xl">
            @method('PUT')
            @include('locacoes._form', ['buttonText' => 'Atualizar locação', 'clientes'=>$clientes, 'produtos'=>$produtos])
        </form>
    </div>
</x-layouts::app>