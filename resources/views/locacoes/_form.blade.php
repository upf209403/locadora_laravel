@csrf

<div class="space-y-5 rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
    <div>
         {{-- DATA DA LOCAÇÃO --}}
        <label for="data_locacao" class="block text-sm font-medium text-zinc-900 dark:text-white">Data de locação</label>
        <input
            type="datetime-local"
            id="data_locacao"
            name="data_locacao"
            value="{{ old('data_locacao', isset($locacao->data_locacao) ? \Carbon\Carbon::parse($locacao->data_locacao)->format('Y-m-d\TH:i') : '') }}"
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        >
        @error('data_locacao')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

     {{-- DATA DE RETORNO --}}
    <div>
        <label for="data_retorno" class="block text-sm font-medium text-zinc-900 dark:text-white">Data de retorno</label>
        <input
            type="datetime-local"
            id="data_retorno"
            name="data_retorno"
            required
            value="{{ old('data_locacao', isset($locacao->data_locacao) ? \Carbon\Carbon::parse($locacao->data_locacao)->format('Y-m-d\TH:i') : '') }}"
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        > />
        @error('data_retorno')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- DESCONTO --}}
    <div>
        <label for="desconto" class="block text-sm font-medium text-zinc-900 dark:text-white">
            Desconto
        </label>

        <input
            type="number"
            step="0.01"
            id="desconto"
            name="desconto"
            value="{{ old('desconto', $locacao->desconto ?? '') }}"
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        >

        @error('desconto')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- CLIENTE --}}
    <div>
        <label for="cliente_id" class="block text-sm font-medium text-zinc-900 dark:text-white">
            Cliente
        </label>

        <select
            id="cliente_id"
            name="cliente_id"
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        >
            <option value="">Selecione um cliente</option>

            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}"
                    @selected(old('cliente_id', $locacao->cliente_id ?? '') == $cliente->id)
                >
                    {{ $cliente->nome }}
                </option>
            @endforeach
        </select>

        @error('cliente_id')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>


     {{-- PRODUTO --}}
    <div>
        <label for="produto_id" class="block text-sm font-medium text-zinc-900 dark:text-white">
            Produto
        </label>

        <select
            id="produto_id"
            name="produto_id"
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        >
            <option value="">Selecione um produto</option>

            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}"
                    @selected(old('produto_id', $locacao->produto_id ?? '') == $produto->id)
                >
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>

        @error('produto_id')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- BOTÕES --}}
    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200">
            {{ $buttonText ?? 'Salvar' }}
        </button>
        <a href="{{ route('locacoes.index') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-900">
            Cancelar
        </a>
    </div>
</div>

