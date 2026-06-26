@csrf

<div class="space-y-5 rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
    <div>
        <label for="nome" class="block text-sm font-medium text-zinc-900 dark:text-white">Nome do Produto</label>
        <input
            type="text"
            id="nome"
            name="nome"
            {{-- Atributo "name" que vai identificar para passar para o controller --}}
            value="{{ old('nome', $produto->nome ?? '') }}"
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        >
        @error('nome')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="preco" class="block text-sm font-medium text-zinc-900 dark:text-white">Preço</label>
        <input
            id="preco"
            name="preco"
            type="number"
            value={{ old('preco', $produto->preco ?? '') }}
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
            
        />
        @error('preco')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="tipo" class="block text-sm font-medium text-zinc-900 dark:text-white">Tipo</label>
            <input
                type="text"
                id="tipo"
                name="tipo"
                value="{{ old('tipo', $produto->tipo ?? '') }}"
                required
                class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
            >
            @error('tipo')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="categoria" class="block text-sm font-medium text-zinc-900 dark:text-white">Categoria</label>
            <input
                type="text"
                id="categoria"
                name="categoria"
                value="{{ old('categoria', $produto->categoria ?? '') }}"
                required
                class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
            >
            @error('categoria')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <input type="hidden" name="locado" value="0">

    <label class="flex items-center gap-3 text-sm text-zinc-700 dark:text-zinc-300">
        <input
            type="checkbox"
            name="locado"
            value="1"
            @checked(old('locado', $produto->locado ?? false))
            class="rounded border-zinc-300 text-zinc-900 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900"
        >
        Produto locado
    </label>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200">
            {{ $buttonText ?? 'Salvar' }}
        </button>
        <a href="{{ route('produtos.index') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-900">
            Cancelar
        </a>
    </div>
</div>
