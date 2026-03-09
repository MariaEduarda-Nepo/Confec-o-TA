{{-- resources/views/produtos/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Lista de Produtos</h3>
                    <a href="{{ route('produtos.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Novo Produto
                    </a>
                </div>

                <table class="w-full text-sm text-left text-gray-600 border-collapse">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 border">#</th>
                            <th class="px-4 py-3 border">Código</th>
                            <th class="px-4 py-3 border">Nome</th>
                            <th class="px-4 py-3 border">Categoria</th>
                            <th class="px-4 py-3 border">Preço</th>
                            <th class="px-4 py-3 border">Unidade</th>
                            <th class="px-4 py-3 border">Status</th>
                            <th class="px-4 py-3 border text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produtos as $produto)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border">{{ $produto->id }}</td>
                                <td class="px-4 py-3 border font-mono text-xs">{{ $produto->codigo ?? '—' }}</td>
                                <td class="px-4 py-3 border font-medium">{{ $produto->nome }}</td>
                                <td class="px-4 py-3 border">{{ $produto->categoria ?? '—' }}</td>
                                <td class="px-4 py-3 border">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td class="px-4 py-3 border">{{ $produto->unidade }}</td>
                                <td class="px-4 py-3 border">
                                    @if($produto->status === 'ativo')
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Ativo</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">Inativo</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 border text-center">
                                    <a href="{{ route('produtos.show', $produto->id) }}"
                                       class="text-blue-600 hover:underline mr-2">Ver</a>
                                    <a href="{{ route('produtos.edit', $produto->id) }}"
                                       class="text-yellow-600 hover:underline mr-2">Editar</a>
                                    <form action="{{ route('produtos.destroy', $produto->id) }}"
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Tem certeza que deseja remover este produto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-6 border text-center text-gray-400">
                                    Nenhum produto cadastrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>