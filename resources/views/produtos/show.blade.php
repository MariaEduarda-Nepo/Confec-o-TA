{{-- resources/views/produtos/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                    <div class="md:col-span-2">
                        <span class="block text-gray-500 text-sm">Nome</span>
                        <span class="text-gray-800 font-semibold text-lg">{{ $produto->nome }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Código</span>
                        <span class="text-gray-800 font-mono">{{ $produto->codigo ?? '—' }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Categoria</span>
                        <span class="text-gray-800">{{ $produto->categoria ?? '—' }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Preço</span>
                        <span class="text-gray-800 font-semibold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Estoque Mínimo</span>
                        <span class="text-gray-800">{{ $produto->estoque_minimo }} {{ $produto->unidade }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Status</span>
                        @if($produto->status === 'ativo')
                            <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Ativo</span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">Inativo</span>
                        @endif
                    </div>

                    @if($produto->descricao)
                    <div class="md:col-span-2">
                        <span class="block text-gray-500 text-sm">Descrição</span>
                        <span class="text-gray-800">{{ $produto->descricao }}</span>
                    </div>
                    @endif

                    @if($produto->observacoes)
                    <div class="md:col-span-2">
                        <span class="block text-gray-500 text-sm">Observações</span>
                        <span class="text-gray-800">{{ $produto->observacoes }}</span>
                    </div>
                    @endif

                </div>

                <div class="flex gap-3">
                    <a href="{{ route('produtos.edit', $produto->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                        Editar
                    </a>
                    <a href="{{ route('produtos.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                        Voltar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>