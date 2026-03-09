{{-- resources/views/fornecedores/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Fornecedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="nome">Nome *</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome', $fornecedor->nome) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nome') border-red-500 @enderror">
                            @error('nome') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="cnpj">CNPJ *</label>
                            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj', $fornecedor->cnpj) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('cnpj') border-red-500 @enderror">
                            @error('cnpj') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="email">Email *</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $fornecedor->email) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="telefone">Telefone *</label>
                            <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $fornecedor->telefone) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('telefone') border-red-500 @enderror">
                            @error('telefone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="cep">CEP *</label>
                            <input type="text" name="cep" id="cep" value="{{ old('cep', $fornecedor->cep) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('cep') border-red-500 @enderror">
                            @error('cep') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="endereco">Endereço *</label>
                            <input type="text" name="endereco" id="endereco" value="{{ old('endereco', $fornecedor->endereco) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('endereco') border-red-500 @enderror">
                            @error('endereco') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="cidade">Cidade *</label>
                            <input type="text" name="cidade" id="cidade" value="{{ old('cidade', $fornecedor->cidade) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('cidade') border-red-500 @enderror">
                            @error('cidade') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="estado">Estado (UF) *</label>
                            <input type="text" name="estado" id="estado" value="{{ old('estado', $fornecedor->estado) }}" maxlength="2"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('estado') border-red-500 @enderror">
                            @error('estado') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="observacoes">Observações</label>
                            <textarea name="observacoes" id="observacoes" rows="3"
                                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('observacoes') border-red-500 @enderror">{{ old('observacoes', $fornecedor->observacoes) }}</textarea>
                            @error('observacoes') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                    </div>

                    <div class="flex gap-3 mt-6">
                        <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                            Atualizar
                        </button>
                        <a href="{{ route('fornecedores.index') }}"
                           class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>