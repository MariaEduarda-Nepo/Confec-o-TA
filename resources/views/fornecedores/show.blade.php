{{-- resources/views/fornecedores/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Fornecedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                    <div class="md:col-span-2">
                        <span class="block text-gray-500 text-sm">Nome</span>
                        <span class="text-gray-800 font-semibold text-lg">{{ $fornecedor->nome }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">CNPJ</span>
                        <span class="text-gray-800">{{ $fornecedor->cnpj }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Email</span>
                        <span class="text-gray-800">{{ $fornecedor->email }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Telefone</span>
                        <span class="text-gray-800">{{ $fornecedor->telefone }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">CEP</span>
                        <span class="text-gray-800">{{ $fornecedor->cep }}</span>
                    </div>

                    <div class="md:col-span-2">
                        <span class="block text-gray-500 text-sm">Endereço</span>
                        <span class="text-gray-800">{{ $fornecedor->endereco }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Cidade</span>
                        <span class="text-gray-800">{{ $fornecedor->cidade }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Estado</span>
                        <span class="text-gray-800">{{ $fornecedor->estado }}</span>
                    </div>

                    @if($fornecedor->observacoes)
                    <div class="md:col-span-2">
                        <span class="block text-gray-500 text-sm">Observações</span>
                        <span class="text-gray-800">{{ $fornecedor->observacoes }}</span>
                    </div>
                    @endif

                </div>

                <div class="flex gap-3">
                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                        Editar
                    </a>
                    <a href="{{ route('fornecedores.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                        Voltar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>