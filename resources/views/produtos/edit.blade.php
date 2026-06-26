<x-layouts::app :title="__('Editar produto')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Editar produto</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Atualize os dados de {{ $produto->nome }}.</p>
        </div>

        <form action="{{ route('produtos.update', $produto) }}" method="POST" class="max-w-2xl">  {{-- Não tem método PUT no HTML --}}
            {{-- Metodo PUT -> ATUALIZAR INFORMAÇÕES --}}
            @method('PUT')
            @include('produtos._form', ['buttonText' => 'Atualizar produto'])
        </form>
    </div>
</x-layouts::app>