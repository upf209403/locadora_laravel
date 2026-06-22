<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cliente::create($this->validateCliente($request));

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($this->validateCliente($request, $cliente));

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente removido com sucesso.');
    }

    private function validateCliente(Request $request, ?Cliente $cliente = null): array
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'endereco' => ['required', 'string', 'max:255'],
            'cpf' => [
                'required',
                'string',
                // Rule::unique('clientes', 'cpf')->ignore($cliente),
            ],
            'nascimento' => ['required', 'date', 'before_or_equal:today'],
            'inadimplente' => ['sometimes', 'boolean'],
        ]);

        $validated['inadimplente'] = $request->boolean('inadimplente');

        return $validated;
    }
}
