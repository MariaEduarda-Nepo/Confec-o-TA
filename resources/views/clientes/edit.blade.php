<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('clientes.index') }}" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition text-gray-500 hover:text-gray-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-400">Clientes</p>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight" style="font-family: 'Playfair Display', serif;">
                    Editar Cliente
                </h2>
            </div>
        </div>
    </x-slot>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* Existing styles */
        body, .dm { font-family: 'DM Sans', sans-serif; }

        .form-wrap { animation: slideUp 0.45s cubic-bezier(0.16, 1, 0.3, 1) both; }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .field-group { position: relative; }

        .field-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 0.875rem;
            font-size: 0.875rem;
            font-family: 'DM Sans', sans-serif;
            color: #111827;
            background: #fafafa;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }
        .field-input:focus {
            border-color: #6366f1;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(99,102,241,0.08);
        }
        .field-input::placeholder { color: #9ca3af; }

        .field-icon {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
            transition: color 0.2s;
        }
        .field-group:focus-within .field-icon { color: #6366f1; }

        .field-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
            margin-bottom: 0.375rem;
        }

        textarea.field-input { padding-top: 0.75rem; resize: none; }
        .textarea-icon { top: 1rem; transform: none; }

        .section-divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 0.25rem 0;
        }
        .section-divider span {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #d1d5db;
            white-space: nowrap;
        }
        .section-divider::before, .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #f3f4f6;
        }

        .avatar-ring {
            background: conic-gradient(from 180deg, #6366f1, #a78bfa, #818cf8, #6366f1);
        }
    </style>

    <div class="py-10 dm">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            {{-- Badge do cliente sendo editado --}}
            <div class="form-wrap mb-4 flex items-center gap-3 px-1">
                <div class="avatar-ring p-0.5 rounded-full">
                    <div class="w-9 h-9 bg-gray-900 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm" style="font-family:'Playfair Display',serif;">
                            {{ strtoupper(substr($cliente->nome, 0, 1)) }}
                        </span>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">{{ $cliente->nome }}</p>
                    <p class="text-xs text-gray-400">Editando dados do cliente</p>
                </div>
            </div>

            <div class="form-wrap bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden" style="animation-delay:0.05s">

                {{-- Header decorativo indigo --}}
                <div class="h-1.5 bg-gradient-to-r from-indigo-400 via-violet-400 to-blue-400"></div>

                <div class="p-8">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        {{-- Nome --}}
                        <div>
                            <label class="field-label">Nome Completo</label>
                            <div class="field-group">
                                <div class="field-icon">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}"
                                       class="field-input" required>
                            </div>
                            @error('nome') <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1"><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                        </div>

                        <div class="section-divider"><span>Identificação</span></div>

                        {{-- CPF + Telefone --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="field-label">CPF</label>
                                <div class="field-group">
                                    <div class="field-icon">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/></svg>
                                    </div>
                                    <input type="text" name="cpf" value="{{ old('cpf', $cliente->cpf) }}"
                                           class="field-input" required>
                                </div>
                                @error('cpf') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="field-label">Telefone</label>
                                <div class="field-group">
                                    <div class="field-icon">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </div>
                                    <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}"
                                           class="field-input" required>
                                </div>
                            </div>
                        </div>

                        <div class="section-divider"><span>Contato</span></div>

                        {{-- Email --}}
                        <div>
                            <label class="field-label">E-mail</label>
                            <div class="field-group">
                                <div class="field-icon">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input type="email" name="email" value="{{ old('email', $cliente->email) }}"
                                       class="field-input" required>
                            </div>
                            @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Endereço --}}
                        <div>
                            <label class="field-label">Endereço</label>
                            <div class="field-group">
                                <div class="field-icon textarea-icon">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <textarea name="endereco" class="field-input" rows="2">{{ old('endereco', $cliente->endereco) }}</textarea>
                            </div>
                        </div>

                        {{-- Ações --}}
                        <div class="flex items-center justify-between pt-2">
                            <a href="{{ route('clientes.index') }}"
                               class="text-sm text-gray-400 hover:text-gray-600 font-medium transition">
                                ← Cancelar
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-full hover:bg-indigo-700 transition-all duration-300 shadow-md hover:shadow-indigo-200 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                Atualizar Cliente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>