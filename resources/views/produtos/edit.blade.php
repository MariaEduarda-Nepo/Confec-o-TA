{{-- resources/views/produtos/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="nome">Nome *</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome', $produto->nome) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nome') border-red-500 @enderror">
                            @error('nome') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="codigo">Código</label>
                            <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $produto->codigo) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('codigo') border-red-500 @enderror">
                            @error('codigo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="categoria">Categoria</label>
                            <input type="text" name="categoria" id="categoria" value="{{ old('categoria', $produto->categoria) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('categoria') border-red-500 @enderror">
                            @error('categoria') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="preco">Preço (R$) *</label>
                            <input type="number" name="preco" id="preco" step="0.01" min="0" value="{{ old('preco', $produto->preco) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('preco') border-red-500 @enderror">
                            @error('preco') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="estoque_minimo">Estoque Mínimo *</label>
                            <input type="number" name="estoque_minimo" id="estoque_minimo" min="0" value="{{ old('estoque_minimo', $produto->estoque_minimo) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('estoque_minimo') border-red-500 @enderror">
                            @error('estoque_minimo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="unidade">Unidade *</label>
                            <select name="unidade" id="unidade"
                                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('unidade') border-red-500 @enderror">
                                @foreach(['un' => 'Unidade', 'kg' => 'Quilograma', 'l' => 'Litro', 'cx' => 'Caixa', 'm' => 'Metro'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('unidade', $produto->unidade) === $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('unidade') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="status">Status *</label>
                            <select name="status" id="status"
                                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('status') border-red-500 @enderror">
                                <option value="ativo" {{ old('status', $produto->status) === 'ativo' ? 'selected' : '' }}>Ativo</option>
                                <option value="inativo" {{ old('status', $produto->status) === 'inativo' ? 'selected' : '' }}>Inativo</option>
                            </select>
                            @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" rows="3"
                                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('descricao') border-red-500 @enderror">{{ old('descricao', $produto->descricao) }}</textarea>
                            @error('descricao') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="observacoes">Observações</label>
                            <textarea name="observacoes" id="observacoes" rows="2"
                                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('observacoes') border-red-500 @enderror">{{ old('observacoes', $produto->observacoes) }}</textarea>
                            @error('observacoes') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                    </div>

                    <div class="flex gap-3 mt-6">
                        <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                            Atualizar
                        </button>
                        <a href="{{ route('produtos.index') }}"
                           class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>