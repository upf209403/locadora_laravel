<x-layouts::app :title="$produto->nome">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">{{ $produto->nome }}</h1>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Detalhes do cadastro do produto.</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('produtos.edit', $produto) }}" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200">Editar</a>
                <a href="{{ route('produtos.index') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-900">Voltar</a>
            </div>
        </div>

        <div class="max-w-2xl overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-800">
            <dl class="divide-y divide-zinc-200 text-sm dark:divide-zinc-700">
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Preço</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">R$ {{ $produto->preco }}</dd>
                </div>
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Tipo</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">{{ $produto->tipo }}</dd>
                </div>
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Categoria</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">{{ $produto->categoria }}</dd>
                </div>
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Situacao</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">{{ $produto->locado ? 'Locado' : 'Disponível' }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts::app>
