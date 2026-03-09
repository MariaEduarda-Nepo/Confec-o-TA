{{-- resources/views/pedidos/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @php
                    $statusColors = [
                        'pendente'    => 'bg-yellow-100 text-yellow-800',
                        'processando' => 'bg-blue-100 text-blue-800',
                        'concluído'   => 'bg-green-100 text-green-800',
                        'cancelado'   => 'bg-red-100 text-red-800',
                    ];
                    $cor = $statusColors[$pedido->status] ?? 'bg-gray-100 text-gray-800';
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                    <div>
                        <span class="block text-gray-500 text-sm">Nº do Pedido</span>
                        <span class="text-gray-800 font-semibold text-lg">{{ $pedido->numero_pedido }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Status</span>
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $cor }}">
                            {{ ucfirst($pedido->status) }}
                        </span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Data do Pedido</span>
                        <span class="text-gray-800">{{ \Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y H:i') }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm">Valor Total</span>
                        <span class="text-gray-800 font-semibold">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</span>
                    </div>

                    @if($pedido->observacoes)
                    <div class="md:col-span-2">
                        <span class="block text-gray-500 text-sm">Observações</span>
                        <span class="text-gray-800">{{ $pedido->observacoes }}</span>
                    </div>
                    @endif

                </div>

                <div class="flex gap-3">
                    <a href="{{ route('pedidos.edit', $pedido->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                        Editar
                    </a>
                    <a href="{{ route('pedidos.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded">
                        Voltar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>