<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::orderBy('nome')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'           => 'required|string|max:255',
            'codigo'         => 'nullable|string|max:50|unique:produtos,codigo',
            'descricao'      => 'nullable|string',
            'categoria'      => 'nullable|string|max:100',
            'preco'          => 'required|numeric|min:0',
            'estoque_minimo' => 'required|integer|min:0',
            'unidade'        => 'required|string|max:10',
            'status'         => 'required|in:ativo,inativo',
            'observacoes'    => 'nullable|string',
        ]);

        Produtos::create($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function show(Produtos $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produtos $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produtos $produto)
    {
        $request->validate([
            'nome'           => 'required|string|max:255',
            'codigo'         => 'nullable|string|max:50|unique:produtos,codigo,' . $produto->id,
            'descricao'      => 'nullable|string',
            'categoria'      => 'nullable|string|max:100',
            'preco'          => 'required|numeric|min:0',
            'estoque_minimo' => 'required|integer|min:0',
            'unidade'        => 'required|string|max:10',
            'status'         => 'required|in:ativo,inativo',
            'observacoes'    => 'nullable|string',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produtos $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto removido com sucesso!');
    }
}