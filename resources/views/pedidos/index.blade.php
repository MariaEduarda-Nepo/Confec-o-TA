{{-- resources/views/pedidos/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Lista de Pedidos</h3>
                    <a href="{{ route('pedidos.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Novo Pedido
                    </a>
                </div>

                <table class="w-full text-sm text-left text-gray-600 border-collapse">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 border">#</th>
                            <th class="px-4 py-3 border">Nº Pedido</th>
                            <th class="px-4 py-3 border">Data</th>
                            <th class="px-4 py-3 border">Valor Total</th>
                            <th class="px-4 py-3 border">Status</th>
                            <th class="px-4 py-3 border text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pedidos as $pedido)
                            @php
                                $statusColors = [
                                    'pendente'     => 'bg-yellow-100 text-yellow-800',
                                    'processando'  => 'bg-blue-100 text-blue-800',
                                    'concluído'    => 'bg-green-100 text-green-800',
                                    'cancelado'    => 'bg-red-100 text-red-800',
                                ];
                                $cor = $statusColors[$pedido->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border">{{ $pedido->id }}</td>
                                <td class="px-4 py-3 border font-medium">{{ $pedido->numero_pedido }}</td>
                                <td class="px-4 py-3 border">{{ \Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3 border">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                                <td class="px-4 py-3 border">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $cor }}">
                                        {{ ucfirst($pedido->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border text-center">
                                    <a href="{{ route('pedidos.show', $pedido->id) }}"
                                       class="text-blue-600 hover:underline mr-2">Ver</a>
                                    <a href="{{ route('pedidos.edit', $pedido->id) }}"
                                       class="text-yellow-600 hover:underline mr-2">Editar</a>
                                    <form action="{{ route('pedidos.destroy', $pedido->id) }}"
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Tem certeza que deseja remover este pedido?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 border text-center text-gray-400">
                                    Nenhum pedido cadastrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>