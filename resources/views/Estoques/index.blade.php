<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-500 mb-1">Gestão</p>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight" style="font-family: 'Playfair Display', serif;">
                    Estoque
                </h2>
            </div>
            <a href="{{ route('estoques.create') }}" class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white text-xs font-semibold uppercase tracking-widest rounded-full hover:bg-emerald-600 transition-all duration-300 shadow-md hover:shadow-emerald-200">
                <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Novo Item
            </a>
        </div>
    </x-slot>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body, .dm { font-family: 'DM Sans', sans-serif; }
        .row-item { animation: fadeUp 0.4s ease both; }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .row-item:nth-child(1) { animation-delay: 0.04s; }
        .row-item:nth-child(2) { animation-delay: 0.08s; }
        .row-item:nth-child(3) { animation-delay: 0.12s; }
        .row-item:nth-child(4) { animation-delay: 0.16s; }
        .row-item:nth-child(5) { animation-delay: 0.20s; }
        .row-item:nth-child(6) { animation-delay: 0.24s; }
        .badge-ok   { background:#d1fae5; color:#065f46; }
        .badge-low  { background:#fef3c7; color:#92400e; }
        .badge-zero { background:#fee2e2; color:#991b1b; }
    </style>

    <div class="py-10 dm">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">

            @if (session('success'))
                <div class="flex items-center gap-3 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl shadow-sm text-sm font-medium">
                    <div class="w-7 h-7 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Stats rápidos --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white rounded-2xl border border-gray-100 p-4 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Total de Itens</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1" style="font-family:'Playfair Display',serif;">{{ $estoques->count() }}</p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 p-4 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Qtd. Total</p>
                    <p class="text-3xl font-bold text-emerald-600 mt-1" style="font-family:'Playfair Display',serif;">{{ $estoques->sum('quantidade') }}</p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 p-4 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Sem estoque</p>
                    <p class="text-3xl font-bold text-red-500 mt-1" style="font-family:'Playfair Display',serif;">{{ $estoques->where('quantidade', 0)->count() }}</p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 p-4 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Valor Total</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1" style="font-family:'Playfair Display',serif;">R$ {{ number_format($estoques->sum(fn($e) => $e->quantidade * $e->preco_unitario), 2, ',', '.') }}</p>
                </div>
            </div>

            {{-- Tabela --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="h-1 bg-gradient-to-r from-emerald-400 to-teal-400"></div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-100">
                                <th class="text-left px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">Item</th>
                                <th class="text-left px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">Descrição</th>
                                <th class="text-center px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">Quantidade</th>
                                <th class="text-right px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">Preço Unit.</th>
                                <th class="text-right px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">Total</th>
                                <th class="text-right px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($estoques as $estoque)
                                <tr class="row-item hover:bg-gray-50/70 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                            <span class="font-semibold text-gray-900">{{ $estoque->nome }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 max-w-xs truncate">{{ $estoque->descricao ?? '—' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($estoque->quantidade == 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold badge-zero">{{ $estoque->quantidade }}</span>
                                        @elseif($estoque->quantidade <= 5)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold badge-low">{{ $estoque->quantidade }}</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold badge-ok">{{ $estoque->quantidade }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right font-medium text-gray-700">R$ {{ number_format($estoque->preco_unitario, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-right font-semibold text-gray-900">R$ {{ number_format($estoque->quantidade * $estoque->preco_unitario, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('estoques.edit', $estoque->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-emerald-100 hover:text-emerald-700 rounded-full transition-all">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                Editar
                                            </a>
                                            <form action="{{ route('estoques.destroy', $estoque->id) }}" method="POST" onsubmit="return confirm('Remover {{ $estoque->nome }} do estoque?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded-full transition-all">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    Remover
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center mb-4 border-2 border-dashed border-gray-200">
                                                <svg class="w-7 h-7 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                            <p class="text-gray-400 font-medium">Estoque vazio</p>
                                            <p class="text-gray-300 text-xs mt-1">Adicione itens para começar</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>