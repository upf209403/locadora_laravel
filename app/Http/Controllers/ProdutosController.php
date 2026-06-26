<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $produtos = Produto::latest()->paginate(10);

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produto::create($this->validateProduto($request));

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($this->validateProduto($request, $produto));

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto removido com sucesso.');
    }

    private function validateProduto(Request $request, ?Produto $produto = null): array
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'preco' => ['required', 'numeric'],
            'tipo' => [ 'required', 'string'],
            'categoria' => ['required', 'string'],
            'locado' => ['sometimes', 'boolean'],
        ]);

        $validated['locado'] = $request->boolean('locado');

        return $validated;
    }
}
