<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('produtos.index') }}" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-violet-500">Produtos</p>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family:'Playfair Display',serif;">Novo Produto</h2>
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
        .field-input:focus{border-color:#7c3aed;background:#fff;box-shadow:0 0 0 4px rgba(124,58,237,.08);}
        .field-input::placeholder{color:#9ca3af;}
        .field-icon{position:absolute;left:.875rem;top:50%;transform:translateY(-50%);color:#9ca3af;pointer-events:none;transition:color .2s;}
        .field-group:focus-within .field-icon{color:#7c3aed;}
        .field-label{display:block;font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:#6b7280;margin-bottom:.375rem;}
        .section-divider{display:flex;align-items:center;gap:.75rem;margin:.25rem 0;}
        .section-divider span{font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.15em;color:#d1d5db;white-space:nowrap;}
        .section-divider::before,.section-divider::after{content:'';flex:1;height:1px;background:#f3f4f6;}
        textarea.field-input{padding-top:.75rem;resize:none;}
        .textarea-icon{top:1rem;transform:none;}
        select.field-input{appearance:none;cursor:pointer;}
    </style>

    <div class="py-10 dm">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="form-wrap bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="h-1.5 bg-gradient-to-r from-violet-500 to-purple-500"></div>
                <div class="p-8">
                    <form action="{{ route('produtos.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="field-label">Nome do Produto</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg></div>
                                    <input type="text" name="nome" value="{{ old('nome') }}" class="field-input" placeholder="Ex: Camiseta Básica" required>
                                </div>
                                @error('nome')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="field-label">Código (SKU)</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg></div>
                                    <input type="text" name="codigo" value="{{ old('codigo') }}" class="field-input" placeholder="CAM-001">
                                </div>
                                @error('codigo')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="field-label">Categoria</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg></div>
                                    <input type="text" name="categoria" value="{{ old('categoria') }}" class="field-input" placeholder="Roupas, Tecidos...">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Descrição</label>
                            <div class="field-group">
                                <div class="field-icon textarea-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg></div>
                                <textarea name="descricao" class="field-input" rows="3" placeholder="Descrição detalhada do produto...">{{ old('descricao') }}</textarea>
                            </div>
                        </div>

                        <div class="section-divider"><span>Preço & Estoque</span></div>

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="field-label">Preço (R$)</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                                    <input type="number" name="preco" value="{{ old('preco', '0.00') }}" class="field-input" step="0.01" min="0" required>
                                </div>
                                @error('preco')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="field-label">Est. Mínimo</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg></div>
                                    <input type="number" name="estoque_minimo" value="{{ old('estoque_minimo', 0) }}" class="field-input" min="0" required>
                                </div>
                            </div>
                            <div>
                                <label class="field-label">Unidade</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div>
                                    <input type="text" name="unidade" value="{{ old('unidade') }}" class="field-input" placeholder="un, m, kg..." required>
                                </div>
                            </div>
                        </div>

                        <div class="section-divider"><span>Status & Obs.</span></div>

                        <div>
                            <label class="field-label">Status</label>
                            <div class="field-group">
                                <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                                <select name="status" class="field-input" required>
                                    <option value="ativo"   {{ old('status', 'ativo') === 'ativo'   ? 'selected' : '' }}>Ativo</option>
                                    <option value="inativo" {{ old('status') === 'inativo' ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Observações</label>
                            <div class="field-group">
                                <div class="field-icon textarea-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg></div>
                                <textarea name="observacoes" class="field-input" rows="2" placeholder="Informações adicionais...">{{ old('observacoes') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <a href="{{ route('produtos.index') }}" class="text-sm text-gray-400 hover:text-gray-600 font-medium transition">← Cancelar</a>
                            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gray-900 text-white text-sm font-semibold rounded-full hover:bg-violet-600 transition-all duration-300 shadow-md hover:shadow-violet-200 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Salvar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>