<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    /**
     * Lista todos os itens do estoque.
     */
    public function index()
    {
        $estoques = Estoque::all();
        return view('estoques.index', compact('estoques'));
    }

    /**
     * Exibe o formulário de criação.
     */
    public function create()
    {
        return view('estoques.create');
    }

    /**
     * Salva um novo item no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'           => 'required|string|max:255',
            'descricao'      => 'nullable|string',
            'quantidade'     => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0',
        ]);

        Estoque::create($request->all());

        return redirect()->route('estoques.index')
                         ->with('success', 'Item adicionado ao estoque com sucesso!');
    }

    /**
     * Exibe um item específico.
     */
    public function show(Estoque $estoque)
    {
        return view('estoques.show', compact('estoque'));
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(Estoque $estoque)
    {
        return view('estoques.edit', compact('estoque'));
    }

    /**
     * Atualiza um item no banco de dados.
     */
    public function update(Request $request, Estoque $estoque)
    {
        $request->validate([
            'nome'           => 'required|string|max:255',
            'descricao'      => 'nullable|string',
            'quantidade'     => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0',
        ]);

        $estoque->update($request->all());

        return redirect()->route('estoques.index')
                         ->with('success', 'Item atualizado com sucesso!');
    }

    /**
     * Remove um item do banco de dados.
     */
    public function destroy(Estoque $estoque)
    {
        $estoque->delete();

        return redirect()->route('estoques.index')
                         ->with('success', 'Item removido do estoque com sucesso!');
    }
}