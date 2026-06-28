<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Locacao;
use App\Models\Cliente;
use App\Models\Produto;

class LocacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locacoes = Locacao::latest()->paginate(10);

        return view('locacoes.index', compact('locacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view('locacoes.create', compact('clientes', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Locacao::create($this->validateLocacao($request));

        return redirect()
            ->route('locacoes.index')
            ->with('success', 'Locação cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Locacao $locacao)
    {
        return view('locacoes.show', compact('locacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locacao $locacao)
    {

        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view('locacoes.edit', compact('locacao', 'clientes','produtos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Locacao $locacao)
    {
        $locacao->update($this->validateLocacao($request, $locacao));

        return redirect()
            ->route('locacoes.index')
            ->with('success', 'Locação atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locacao $locacao)
    {
        $locacao->delete();

        return redirect()
            ->route('locacoes.index')
            ->with('success', 'Locação removida com sucesso.');
    }

    private function validateLocacao(Request $request, ?Locacao $locacao = null): array{
        $validated = $request->validate([
            'data_locacao' => ['required', 'date'],
            'data_retorno' => ['required', 'date', 'after_or_equal:data_locacao'],
            'desconto' => ['required', 'numeric'],
            'cliente_id' => ['required', 'exists:clientes,id'],
            'produto_id' => ['required', 'exists:produtos,id'],
        ]);

        return $validated;
    }
}
