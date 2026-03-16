<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('estoques.index') }}" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-500">Estoque</p>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family:'Playfair Display',serif;">Novo Item</h2>
            </div>
        </div>
    </x-slot>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body,.dm{font-family:'DM Sans',sans-serif;}
        .form-wrap{animation:slideUp 0.45s cubic-bezier(.16,1,.3,1) both;}
        @keyframes slideUp{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
        .field-group{position:relative;}
        .field-input{width:100%;padding:.75rem 1rem .75rem 2.75rem;border:1.5px solid #e5e7eb;border-radius:.875rem;font-size:.875rem;font-family:'DM Sans',sans-serif;color:#111827;background:#fafafa;transition:border-color .2s,box-shadow .2s,background .2s;outline:none;}
        .field-input:focus{border-color:#10b981;background:#fff;box-shadow:0 0 0 4px rgba(16,185,129,.08);}
        .field-input::placeholder{color:#9ca3af;}
        .field-icon{position:absolute;left:.875rem;top:50%;transform:translateY(-50%);color:#9ca3af;pointer-events:none;transition:color .2s;}
        .field-group:focus-within .field-icon{color:#10b981;}
        .field-label{display:block;font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:#6b7280;margin-bottom:.375rem;}
        .section-divider{display:flex;align-items:center;gap:.75rem;margin:.25rem 0;}
        .section-divider span{font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.15em;color:#d1d5db;white-space:nowrap;}
        .section-divider::before,.section-divider::after{content:'';flex:1;height:1px;background:#f3f4f6;}
        textarea.field-input{padding-top:.75rem;resize:none;}
        .textarea-icon{top:1rem;transform:none;}
    </style>

    <div class="py-10 dm">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="form-wrap bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="h-1.5 bg-gradient-to-r from-emerald-400 to-teal-400"></div>
                <div class="p-8">
                    <form action="{{ route('estoques.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="field-label">Nome do Item</label>
                            <div class="field-group">
                                <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></div>
                                <input type="text" name="nome" value="{{ old('nome') }}" class="field-input" placeholder="Ex: Tecido de Algodão" required>
                            </div>
                            @error('nome')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="field-label">Descrição</label>
                            <div class="field-group">
                                <div class="field-icon textarea-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg></div>
                                <textarea name="descricao" class="field-input" rows="3" placeholder="Detalhes sobre o item...">{{ old('descricao') }}</textarea>
                            </div>
                        </div>

                        <div class="section-divider"><span>Quantidade & Valor</span></div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="field-label">Quantidade</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg></div>
                                    <input type="number" name="quantidade" value="{{ old('quantidade', 0) }}" class="field-input" min="0" required>
                                </div>
                                @error('quantidade')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="field-label">Preço Unitário (R$)</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                                    <input type="number" name="preco_unitario" value="{{ old('preco_unitario', '0.00') }}" class="field-input" step="0.01" min="0" required>
                                </div>
                                @error('preco_unitario')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <a href="{{ route('estoques.index') }}" class="text-sm text-gray-400 hover:text-gray-600 font-medium transition">← Cancelar</a>
                            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gray-900 text-white text-sm font-semibold rounded-full hover:bg-emerald-600 transition-all duration-300 shadow-md hover:shadow-emerald-200 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Salvar Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>