{{-- resources/views/pedidos/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- Número do Pedido --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="numero_pedido">Nº do Pedido *</label>
                            <input type="text" name="numero_pedido" id="numero_pedido"
                                   value="{{ old('numero_pedido', 'PED-' . str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT)) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('numero_pedido') border-red-500 @enderror">
                            @error('numero_pedido') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Data do Pedido --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="data_pedido">Data do Pedido *</label>
                            <input type="datetime-local" name="data_pedido" id="data_pedido"
                                   value="{{ old('data_pedido', now()->format('Y-m-d\TH:i')) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('data_pedido') border-red-500 @enderror">
                            @error('data_pedido') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Valor Total --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="valor_total">Valor Total (R$) *</label>
                            <input type="number" name="valor_total" id="valor_total" step="0.01" min="0"
                                   value="{{ old('valor_total') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('valor_total') border-red-500 @enderror">
                            @error('valor_total') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Status --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="status">Status *</label>
                            <select name="status" id="status"
                                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('status') border-red-500 @enderror">
                                @foreach(['pendente', 'processando', 'concluído', 'cancelado'] as $s)
                                    <option value="{{ $s }}" {{ old('status', 'pendente') === $s ? 'selected' : '' }}>
                                        {{ ucfirst($s) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
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
                        <a href="{{ route('pedidos.index') }}"
                           class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>