@csrf

<label for="nome">Nome do cliente</label>
<input
    type="text"
    id="nome"
    name="nome"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('nome', $cliente->nome ?? '') }}"
    required
>

<label for="endereco">Endereço</label>
<textarea
    id="endereco"
    name="endereco"
    rows="2"
    required
>{{ old('endereco', $cliente->endereco ?? '') }}</textarea>

<label for="cpf">CPF</label>
<input type="text" id="cpf" name="cpf" maxlength="11">

<label for="data_nascimento">Data de nascimento</label>
<input type="date" id="data_nascimento" name="data_nascimento">

<label for="inadimplente">Inadimplente</label>
<input type="checkbox" id="inadimplente" name="inadimplente">


<button type="submit" class="btn">{{ $buttonText ?? 'Salvar' }}</button>
<a href="{{ route('clientes.index') }}" style="margin-left: 8px;">Cancelar</a>