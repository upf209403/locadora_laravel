    <form action="{{ route('clientes.store') }}" method="POST">
        @include('clientes._form', ['buttonText' => 'Salvar cliente'])
    </form>

