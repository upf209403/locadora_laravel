<x-layouts::app :title="__('Novo cliente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Novo cliente</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Preencha os dados basicos do cliente.</p>
        </div>

        <form action="{{ route('clientes.store') }}" method="POST" class="max-w-2xl">
            {{-- Metodo POST -> INSERIR INFORMAÇÕES --}}
            @include('clientes._form', ['buttonText' => 'Salvar cliente'])
        </form>
    </div>
</x-layouts::app>

{{-- Action -> Envia para a rota clientes.store (que é a nossa função lá no controller) --}}
