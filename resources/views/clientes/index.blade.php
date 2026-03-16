<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-rose-400 mb-1">Gestão de Clientes</p>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight" style="font-family: 'Playfair Display', serif;">
                    Nossa Confecção
                </h2>
            </div>
            <a href="{{ route('clientes.create') }}" class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white text-xs font-semibold uppercase tracking-widest rounded-full hover:bg-rose-500 transition-all duration-300 shadow-md hover:shadow-rose-200">
                <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:rotate-90 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Novo Cliente
            </a>
        </div>
    </x-slot>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body, .dm { font-family: 'DM Sans', sans-serif; }
        .card-cliente {
            animation: fadeUp 0.5s ease both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .card-cliente:nth-child(1) { animation-delay: 0.05s; }
        .card-cliente:nth-child(2) { animation-delay: 0.10s; }
        .card-cliente:nth-child(3) { animation-delay: 0.15s; }
        .card-cliente:nth-child(4) { animation-delay: 0.20s; }
        .card-cliente:nth-child(5) { animation-delay: 0.25s; }
        .card-cliente:nth-child(6) { animation-delay: 0.30s; }

        .avatar-ring {
            background: conic-gradient(from 180deg, #f43f5e, #fb923c, #facc15, #4ade80, #60a5fa, #a78bfa, #f43f5e);
        }
    </style>

    <div class="py-10 dm">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="flex items-center gap-3 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl shadow-sm text-sm font-medium animate-[fadeUp_0.4s_ease]">
                    <div class="w-7 h-7 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Contador --}}
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-400 font-medium">
                    {{ $clientes->count() }} {{ $clientes->count() === 1 ? 'cliente cadastrado' : 'clientes cadastrados' }}
                </span>
                <div class="flex-1 h-px bg-gray-100"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                @forelse ($clientes as $i => $cliente)
                    <div class="card-cliente group relative bg-white border border-gray-100 rounded-3xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                        {{-- Accent top bar --}}
                        <div class="absolute top-0 left-6 right-6 h-0.5 bg-gradient-to-r from-rose-400 to-orange-300 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        {{-- Avatar + Nome --}}
                        <div class="flex items-center gap-4 mb-5">
                            <div class="avatar-ring p-0.5 rounded-full flex-shrink-0">
                                <div class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-base" style="font-family: 'Playfair Display', serif;">
                                        {{ strtoupper(substr($cliente->nome, 0, 1)) }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base leading-tight">{{ $cliente->nome }}</h3>
                                <p class="text-xs text-gray-400 mt-0.5">Cliente</p>
                            </div>
                        </div>

                        {{-- Dados --}}
                        <div class="space-y-2.5">
                            <div class="flex items-center gap-2.5 text-sm">
                                <div class="w-7 h-7 bg-rose-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                                </div>
                                <span class="text-gray-500 font-mono text-xs tracking-wider">{{ $cliente->cpf }}</span>
                            </div>

                            <div class="flex items-center gap-2.5 text-sm">
                                <div class="w-7 h-7 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <span class="text-gray-600 font-medium">{{ $cliente->telefone }}</span>
                            </div>

                            <div class="flex items-center gap-2.5 text-sm">
                                <div class="w-7 h-7 bg-violet-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <span class="text-gray-600 truncate">{{ $cliente->email }}</span>
                            </div>

                            @if($cliente->endereco)
                            <div class="flex items-start gap-2.5 text-sm">
                                <div class="w-7 h-7 bg-amber-50 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <span class="text-gray-500 text-xs leading-relaxed">{{ $cliente->endereco }}</span>
                            </div>
                            @endif
                        </div>

                        {{-- Ações --}}
                        <div class="flex items-center justify-end mt-5 pt-4 border-t border-gray-100 gap-2">
                            <a href="{{ route('clientes.edit', $cliente->id) }}"
                               class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-indigo-100 hover:text-indigo-700 rounded-full transition-all duration-200">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Editar
                            </a>

                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir {{ $cliente->nome }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded-full transition-all duration-200">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 flex flex-col items-center justify-center text-center">
                        <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mb-5 border-2 border-dashed border-gray-200">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <p class="text-gray-400 font-medium">Nenhum cliente cadastrado</p>
                        <p class="text-gray-300 text-sm mt-1">Clique em "Novo Cliente" para começar</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>