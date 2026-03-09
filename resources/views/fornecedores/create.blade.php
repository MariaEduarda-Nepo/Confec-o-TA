{{-- resources/views/fornecedores/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Fornecedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('fornecedores.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- Nome --}}
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="nome">Nome *</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nome') border-red-500 @enderror">
                            @error('nome') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- CNPJ --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="cnpj">CNPJ *</label>
                            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}" placeholder="00.000.000/0000-00"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('cnpj') border-red-500 @enderror">
                            @error('cnpj') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="email">Email *</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Telefone --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="telefone">Telefone *</label>
                            <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('telefone') border-red-500 @enderror">
                            @error('telefone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- CEP --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="cep">CEP *</label>
                            <input type="text" name="cep" id="cep" value="{{ old('cep') }}" placeholder="00000-000"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('cep') border-red-500 @enderror">
                            @error('cep') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Endereço --}}
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="endereco">Endereço *</label>
                            <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('endereco') border-red-500 @enderror">
                            @error('endereco') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Cidade --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="cidade">Cidade *</label>
                            <input type="text" name="cidade" id="cidade" value="{{ old('cidade') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('cidade') border-red-500 @enderror">
                            @error('cidade') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Estado --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="estado">Estado (UF) *</label>
                            <input type="text" name="estado" id="estado" value="{{ old('estado') }}" maxlength="2" placeholder="SP"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('estado') border-red-500 @enderror">
                            @error('estado') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Observações --}}
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-1" for="observacoes">Observações</label>
                            <textarea name="observacoes" id="observacoes" rows="3"
                                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('observacoes') border-red-500 @enderror">{{ old('observacoes') }}</textarea>
                            @error('observacoes') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                    </div>

                    <div class="flex gap-3 mt-6">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                            Salvar
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