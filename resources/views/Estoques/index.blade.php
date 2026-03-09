{{-- resources/views/estoques/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estoque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensagem de sucesso --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Itens em Estoque</h3>
                    <a href="{{ route('estoques.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Novo Item
                    </a>
                </div>

                <table class="w-full text-sm text-left text-gray-600 border-collapse">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 border">#</th>
                            <th class="px-4 py-3 border">Nome</th>
                            <th class="px-4 py-3 border">Descrição</th>
                            <th class="px-4 py-3 border">Quantidade</th>
                            <th class="px-4 py-3 border">Preço Unitário</th>
                            <th class="px-4 py-3 border text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estoques as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border">{{ $item->id }}</td>
                                <td class="px-4 py-3 border">{{ $item->nome }}</td>
                                <td class="px-4 py-3 border">{{ Str::limit($item->descricao, 50) }}</td>
                                <td class="px-4 py-3 border">{{ $item->quantidade }}</td>
                                <td class="px-4 py-3 border">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                                <td class="px-4 py-3 border text-center">
                                    <a href="{{ route('estoques.show', $item->id) }}"
                                       class="text-blue-600 hover:underline mr-2">Ver</a>
                                    <a href="{{ route('estoques.edit', $item->id) }}"
                                       class="text-yellow-600 hover:underline mr-2">Editar</a>
                                    <form action="{{ route('estoques.destroy', $item->id) }}"
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Tem certeza que deseja remover este item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 border text-center text-gray-400">
                                    Nenhum item cadastrado no estoque.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>