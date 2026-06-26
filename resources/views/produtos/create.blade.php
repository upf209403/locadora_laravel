<x-layouts::app :title="__('Novo produto')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Novo produto</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Preencha os dados basicos do produto.</p>
        </div>

        <form action="{{ route('produtos.store') }}" method="POST" class="max-w-2xl">
            {{-- Metodo POST -> INSERIR INFORMAÇÕES --}}
            @include('produtos._form', ['buttonText' => 'Salvar produto'])
        </form>
    </div>
</x-layouts::app>

{{-- Action -> Envia para a rota clientes.store (que é a nossa função lá no controller) --}}