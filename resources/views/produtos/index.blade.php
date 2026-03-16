<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-violet-500 mb-1">Gestão</p>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight" style="font-family: 'Playfair Display', serif;">
                    Produtos
                </h2>
            </div>
            <a href="{{ route('produtos.create') }}" class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white text-xs font-semibold uppercase tracking-widest rounded-full hover:bg-violet-600 transition-all duration-300 shadow-md hover:shadow-violet-200">
                <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Novo Produto
            </a>
        </div>
    </x-slot>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body,.dm{font-family:'DM Sans',sans-serif;}
        .card-item{animation:fadeUp .5s ease both;}
        @keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        .card-item:nth-child(1){animation-delay:.05s}.card-item:nth-child(2){animation-delay:.10s}
        .card-item:nth-child(3){animation-delay:.15s}.card-item:nth-child(4){animation-delay:.20s}
        .card-item:nth-child(5){animation-delay:.25s}.card-item:nth-child(6){animation-delay:.30s}
        .badge-ativo{background:#ede9fe;color:#5b21b6;}
        .badge-inativo{background:#f3f4f6;color:#6b7280;}
    </style>

    <div class="py-10 dm">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">

            @if (session('success'))
                <div class="flex items-center gap-3 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-medium">
                    <div class="w-7 h-7 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-400 font-medium">{{ $produtos->count() }} {{ $produtos->count() === 1 ? 'produto' : 'produtos' }}</span>
                <div class="flex-1 h-px bg-gray-100"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse ($produtos as $produto)
                    <div class="card-item group bg-white border border-gray-100 rounded-3xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute top-0 left-6 right-6 h-0.5 bg-gradient-to-r from-violet-400 to-purple-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        {{-- Header do card --}}
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 bg-violet-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 leading-tight">{{ $produto->nome }}</h3>
                                    @if($produto->codigo)
                                        <p class="text-xs text-gray-400 font-mono">{{ $produto->codigo }}</p>
                                    @endif
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $produto->status === 'ativo' ? 'badge-ativo' : 'badge-inativo' }}">
                                {{ ucfirst($produto->status) }}
                            </span>
                        </div>

                        {{-- Categoria --}}
                        @if($produto->categoria)
                            <div class="mb-3">
                                <span class="inline-flex items-center gap-1 text-xs text-violet-600 bg-violet-50 px-2.5 py-1 rounded-full font-medium">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                    {{ $produto->categoria }}
                                </span>
                            </div>
                        @endif

                        {{-- Descrição --}}
                        @if($produto->descricao)
                            <p class="text-xs text-gray-500 mb-4 leading-relaxed line-clamp-2">{{ $produto->descricao }}</p>
                        @endif

                        {{-- Dados --}}
                        <div class="grid grid-cols-3 gap-2 p-3 bg-gray-50 rounded-2xl mb-4">
                            <div class="text-center">
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Preço</p>
                                <p class="text-sm font-bold text-gray-900 mt-0.5">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                            </div>
                            <div class="text-center border-x border-gray-200">
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Unid.</p>
                                <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $produto->unidade }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Est. Min.</p>
                                <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $produto->estoque_minimo }}</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-3 border-t border-gray-100 gap-2">
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-violet-100 hover:text-violet-700 rounded-full transition-all">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Editar
                            </a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Remover {{ $produto->nome }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded-full transition-all">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 flex flex-col items-center">
                        <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mb-5 border-2 border-dashed border-gray-200">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        </div>
                        <p class="text-gray-400 font-medium">Nenhum produto cadastrado</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>