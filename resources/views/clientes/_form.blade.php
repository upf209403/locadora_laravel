@csrf

<div class="space-y-5 rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
    <div>
        <label for="nome" class="block text-sm font-medium text-zinc-900 dark:text-white">Nome do cliente</label>
        <input
            type="text"
            id="nome"
            name="nome"
            {{-- Atributo "name" que vai identificar para passar para o controller --}}
            value="{{ old('nome', $cliente->nome ?? '') }}"
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        >
        @error('nome')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="endereco" class="block text-sm font-medium text-zinc-900 dark:text-white">Endereco</label>
        <textarea
            id="endereco"
            name="endereco"
            rows="3"
            required
            class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
        >{{ old('endereco', $cliente->endereco ?? '') }}</textarea>
        @error('endereco')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="cpf" class="block text-sm font-medium text-zinc-900 dark:text-white">CPF</label>
            <input
                type="text"
                id="cpf"
                name="cpf"
                maxlength="14"
                inputmode="numeric"
                placeholder="000.000.000-00"
                value="{{ old('cpf', $cliente->cpf ?? '') }}"
                required
                oninput="this.value = this.value.replace(/\D/g, '').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})$/, '$1-$2').slice(0, 14)"
                class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
            >
            @error('cpf')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nascimento" class="block text-sm font-medium text-zinc-900 dark:text-white">Data de nascimento</label>
            <input
                type="date"
                id="nascimento"
                name="nascimento"
                value="{{ old('nascimento', $cliente->nascimento ?? '') }}"
                required
                class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white"
            >
            @error('nascimento')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <input type="hidden" name="inadimplente" value="0">

    <label class="flex items-center gap-3 text-sm text-zinc-700 dark:text-zinc-300">
        <input
            type="checkbox"
            name="inadimplente"
            value="1"
            @checked(old('inadimplente', $cliente->inadimplente ?? false))
            class="rounded border-zinc-300 text-zinc-900 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-900"
        >
        Cliente inadimplente
    </label>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200">
            {{ $buttonText ?? 'Salvar' }}
        </button>
        <a href="{{ route('clientes.index') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-900">
            Cancelar
        </a>
    </div>
</div>
