<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedores;

class FornecedoresController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedores::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'        => 'required|string|max:255|unique:fornecedores,nome',
            'cnpj'        => 'required|string|max:18|unique:fornecedores,cnpj',
            'email'       => 'required|email|max:255',
            'telefone'    => 'required|string|max:20',
            'endereco'    => 'required|string|max:255',
            'cidade'      => 'required|string|max:100',
            'estado'      => 'required|string|max:2',
            'cep'         => 'required|string|max:9',
            'observacoes' => 'nullable|string',
        ]);

        Fornecedores::create($request->all());

        return redirect()->route('fornecedores.index')
                         ->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    public function show(Fornecedores $fornecedore)
    {
        return view('fornecedores.show', ['fornecedor' => $fornecedore]);
    }

   // Trocar em show(), edit(), update() e destroy():
public function edit(Fornecedores $fornecedor)   // era $fornecedore
{
    return view('fornecedores.edit', compact('fornecedor'));
}

    public function update(Request $request, Fornecedores $fornecedore)
    {
        $request->validate([
            'nome'        => 'required|string|max:255|unique:fornecedores,nome,' . $fornecedore->id,
            'cnpj'        => 'required|string|max:18|unique:fornecedores,cnpj,' . $fornecedore->id,
            'email'       => 'required|email|max:255',
            'telefone'    => 'required|string|max:20',
            'endereco'    => 'required|string|max:255',
            'cidade'      => 'required|string|max:100',
            'estado'      => 'required|string|max:2',
            'cep'         => 'required|string|max:9',
            'observacoes' => 'nullable|string',
        ]);

        $fornecedore->update($request->all());

        return redirect()->route('fornecedores.index')
                         ->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Fornecedores $fornecedore)
    {
        $fornecedore->delete();

        return redirect()->route('fornecedores.index')
                         ->with('success', 'Fornecedor removido com sucesso!');
    }
}