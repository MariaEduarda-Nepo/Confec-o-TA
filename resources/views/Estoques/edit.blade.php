{{-- resources/views/estoques/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Item do Estoque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('estoques.update', $estoque->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nome --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-1" for="nome">Nome *</label>
                        <input type="text" name="nome" id="nome"
                               value="{{ old('nome', $estoque->nome) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nome') border-red-500 @enderror">
                        @error('nome')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Descrição --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-1" for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="3"
                                  class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('descricao') border-red-500 @enderror">{{ old('descricao', $estoque->descricao) }}</textarea>
                        @error('descricao')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Quantidade --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-1" for="quantidade">Quantidade *</label>
                        <input type="number" name="quantidade" id="quantidade" min="0"
                               value="{{ old('quantidade', $estoque->quantidade) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('quantidade') border-red-500 @enderror">
                        @error('quantidade')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Preço Unitário --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-1" for="preco_unitario">Preço Unitário (R$) *</label>
                        <input type="number" name="preco_unitario" id="preco_unitario" step="0.01" min="0"
                               value="{{ old('preco_unitario', $estoque->preco_unitario) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('preco_unitario') border-red-500 @enderror">
                        @error('preco_unitario')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                            Atualizar
                        </button>
                        <a href="{{ route('estoques.index') }}"
                           class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>