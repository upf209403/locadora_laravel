<x-layouts::app :title="__('Editar cliente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Editar cliente</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Atualize os dados de {{ $cliente->nome }}.</p>
        </div>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="max-w-2xl">  {{-- Não tem método PUT no HTML --}}
            {{-- Metodo PUT -> ATUALIZAR INFORMAÇÕES --}}
            @method('PUT')
            @include('clientes._form', ['buttonText' => 'Atualizar cliente'])
        </form>
    </div>
</x-layouts::app>
