{{-- resources/views/estoques/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="mb-4">
                    <span class="block text-gray-500 text-sm">Nome</span>
                    <span class="text-gray-800 font-semibold text-lg">{{ $estoque->nome }}</span>
                </div>

                <div class="mb-4">
                    <span class="block text-gray-500 text-sm">Descrição</span>
                    <span class="text-gray-800">{{ $estoque->descricao ?? '—' }}</span>
                </div>

                <div class="mb-4">
                    <span class="block text-gray-500 text-sm">Quantidade</span>
                    <span class="text-gray-800 font-semibold">{{ $estoque->quantidade }}</span>
                </div>

                <div class="mb-6">
                    <span class="block text-gray-500 text-sm">Preço Unitário</span>
                    <span class="text-gray-800 font-semibold">
                        R$ {{ number_format($estoque->preco_unitario, 2, ',', '.') }}
                    </span>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('estoques.edit', $estoque->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                        Editar
                    </a>
                    <a href="{{ route('estoques.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                        Voltar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>