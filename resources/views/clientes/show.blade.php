<x-layouts::app :title="$cliente->nome">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">{{ $cliente->nome }}</h1>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Detalhes do cadastro do cliente.</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('clientes.edit', $cliente) }}" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200">Editar</a>
                <a href="{{ route('clientes.index') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-900">Voltar</a>
            </div>
        </div>

        <div class="max-w-2xl overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-800">
            <dl class="divide-y divide-zinc-200 text-sm dark:divide-zinc-700">
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">CPF</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">{{ $cliente->cpf }}</dd>
                </div>
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Endereco</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">{{ $cliente->endereco }}</dd>
                </div>
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Nascimento</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">{{ date('d/m/Y', strtotime($cliente->nascimento)) }}</dd>
                </div>
                <div class="grid gap-1 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Situacao</dt>
                    <dd class="text-zinc-600 dark:text-zinc-300 sm:col-span-2">{{ $cliente->inadimplente ? 'Inadimplente' : 'Em dia' }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts::app>
