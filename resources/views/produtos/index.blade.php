<x-layouts::app :title="__('Produtos')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Produtos</h1>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Cadastro simples de produtos da locadora.</p>
            </div>

            <a href="{{ route('produtos.create') }}" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200">
                Novo produto
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 dark:border-emerald-900 dark:bg-emerald-950 dark:text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-zinc-200 dark:border-zinc-700">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-zinc-200 text-sm dark:divide-zinc-700">
                    <thead class="bg-zinc-50 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:bg-zinc-900 dark:text-zinc-400">
                        <tr>
                            <th class="px-4 py-3">Nome</th>
                            <th class="px-4 py-3">Preço</th>
                            <th class="px-4 py-3">Tipo</th>
                            <th class="px-4 py-3">Situacao</th>
                            <th class="px-4 py-3 text-right">Acoes</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 bg-white dark:divide-zinc-700 dark:bg-zinc-800">
                        @forelse ($produtos as $produto)
                            <tr>
                                <td class="px-4 py-3 font-medium text-zinc-900 dark:text-white">{{ $produto->nome }}</td>
                                <td class="px-4 py-3 text-zinc-600 dark:text-zinc-300">R$ {{ $produto->preco }}</td>
                                <td class="px-4 py-3 text-zinc-600 dark:text-zinc-300">{{ $produto->tipo }}</td>
                                <td class="px-4 py-3">
                                    <span class="rounded-full px-2 py-1 text-xs font-medium {{ $produto->locado ? 'bg-red-100 text-red-700 dark:bg-red-950 dark:text-red-200' : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-200' }}">
                                        {{ $produto->locado ? 'Locado' : 'Disponível' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('produtos.show', $produto) }}" class="text-zinc-700 hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-white">Ver</a>
                                        <a href="{{ route('produtos.edit', $produto) }}" class="text-zinc-700 hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-white">Editar</a>
                                        <button
                                            type="button"
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                                            data-delete-url="{{ route('produtos.destroy', $produto) }}"
                                            data-delete-name="{{ $produto->nome }}"
                                            onclick="openDeleteProdutosModal(this)"
                                        >
                                            Excluir
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-zinc-600 dark:text-zinc-400">
                                    Nenhum produto cadastrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{ $produtos->links() }}

        <div id="deleteProdutoModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-zinc-950/60 px-4">
            <div class="w-full max-w-md rounded-xl border border-zinc-200 bg-white p-6 shadow-xl dark:border-zinc-700 dark:bg-zinc-900">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">Excluir produto</h2>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                    Tem certeza que deseja excluir <span id="deleteProdutoName" class="font-medium text-zinc-900 dark:text-white"></span>?
                </p>

                <form id="deleteProdutoForm" method="POST" class="mt-6 flex justify-end gap-3">
                    @csrf
                    @method('DELETE')

                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800"
                        onclick="closeDeleteProdutoModal()"
                    >
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
                    >
                        Excluir
                    </button>
                </form>
            </div>
        </div>

        <script>
            function openDeleteProdutosModal(button) {
                document.getElementById('deleteProdutoForm').action = button.dataset.deleteUrl;
                document.getElementById('deleteProdutoName').textContent = button.dataset.deleteName;
                document.getElementById('deleteProdutoModal').classList.remove('hidden');
                document.getElementById('deleteProdutoModal').classList.add('flex');
            }

            function closeDeleteProdutoModal() {
                document.getElementById('deleteProdutoModal').classList.add('hidden');
                document.getElementById('deleteProdutoModal').classList.remove('flex');
            }
        </script>
    </div>
</x-layouts::app>
