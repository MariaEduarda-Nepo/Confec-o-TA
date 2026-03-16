<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('fornecedores.index') }}" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-500">Fornecedores</p>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family:'Playfair Display',serif;">Novo Fornecedor</h2>
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
        .field-input:focus{border-color:#3b82f6;background:#fff;box-shadow:0 0 0 4px rgba(59,130,246,.08);}
        .field-input::placeholder{color:#9ca3af;}
        .field-icon{position:absolute;left:.875rem;top:50%;transform:translateY(-50%);color:#9ca3af;pointer-events:none;transition:color .2s;}
        .field-group:focus-within .field-icon{color:#3b82f6;}
        .field-label{display:block;font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:#6b7280;margin-bottom:.375rem;}
        .section-divider{display:flex;align-items:center;gap:.75rem;margin:.25rem 0;}
        .section-divider span{font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.15em;color:#d1d5db;white-space:nowrap;}
        .section-divider::before,.section-divider::after{content:'';flex:1;height:1px;background:#f3f4f6;}
        textarea.field-input{padding-top:.75rem;resize:none;}
        .textarea-icon{top:1rem;transform:none;}
        select.field-input{appearance:none;}
    </style>

    <div class="py-10 dm">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="form-wrap bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="h-1.5 bg-gradient-to-r from-blue-400 to-indigo-500"></div>
                <div class="p-8">
                    <form action="{{ route('fornecedores.store') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Nome --}}
                        <div>
                            <label class="field-label">Nome / Razão Social</label>
                            <div class="field-group">
                                <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg></div>
                                <input type="text" name="nome" value="{{ old('nome') }}" class="field-input" placeholder="Ex: Têxtil Brasil Ltda." required>
                            </div>
                            @error('nome')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="section-divider"><span>Identificação Fiscal</span></div>

                        {{-- CNPJ --}}
                        <div>
                            <label class="field-label">CNPJ</label>
                            <div class="field-group">
                                <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>
                                <input type="text" name="cnpj" value="{{ old('cnpj') }}" class="field-input" placeholder="00.000.000/0001-00" required>
                            </div>
                            @error('cnpj')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="section-divider"><span>Contato</span></div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="field-label">E-mail</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div>
                                    <input type="email" name="email" value="{{ old('email') }}" class="field-input" placeholder="contato@empresa.com" required>
                                </div>
                                @error('email')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="field-label">Telefone</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg></div>
                                    <input type="text" name="telefone" value="{{ old('telefone') }}" class="field-input" placeholder="(11) 99999-9999" required>
                                </div>
                            </div>
                        </div>

                        <div class="section-divider"><span>Endereço</span></div>

                        <div>
                            <label class="field-label">Endereço</label>
                            <div class="field-group">
                                <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                                <input type="text" name="endereco" value="{{ old('endereco') }}" class="field-input" placeholder="Rua, número, complemento" required>
                            </div>
                            @error('endereco')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-1">
                                <label class="field-label">CEP</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg></div>
                                    <input type="text" name="cep" value="{{ old('cep') }}" class="field-input" placeholder="00000-000" required>
                                </div>
                                @error('cep')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="col-span-1">
                                <label class="field-label">Cidade</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div>
                                    <input type="text" name="cidade" value="{{ old('cidade') }}" class="field-input" placeholder="São Paulo" required>
                                </div>
                                @error('cidade')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="field-label">UF</label>
                                <div class="field-group">
                                    <div class="field-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg></div>
                                    <input type="text" name="estado" value="{{ old('estado') }}" class="field-input" placeholder="SP" maxlength="2" required>
                                </div>
                                @error('estado')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="section-divider"><span>Observações</span></div>

                        <div>
                            <label class="field-label">Observações</label>
                            <div class="field-group">
                                <div class="field-icon textarea-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg></div>
                                <textarea name="observacoes" class="field-input" rows="3" placeholder="Informações adicionais...">{{ old('observacoes') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <a href="{{ route('fornecedores.index') }}" class="text-sm text-gray-400 hover:text-gray-600 font-medium transition">← Cancelar</a>
                            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gray-900 text-white text-sm font-semibold rounded-full hover:bg-blue-600 transition-all duration-300 shadow-md hover:shadow-blue-200 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Salvar Fornecedor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>