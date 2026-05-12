@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full glass p-10 rounded-3xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold gradient-text mb-2">Acesso Restrito</h1>
            <p class="text-slate-400">Painel Administrativo do Portfólio</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-slate-300 mb-2">E-mail</label>
                <input type="email" name="email" id="email" required 
                    class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition"
                    placeholder="admin@portfolio.com">
                @error('email')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Senha</label>
                <input type="password" name="password" id="password" required 
                    class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-primary/50 transition"
                    placeholder="••••••••">
            </div>

            <button type="submit" class="w-full bg-primary hover:bg-blue-600 text-white font-bold py-3 rounded-xl transition">
                Entrar no Painel
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-primary"><i class="fa-solid fa-arrow-left mr-2"></i> Voltar ao site</a>
        </div>
    </div>
</div>
@endsection
