@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold">Nova Tecnologia</h2>
    <p class="text-slate-500">Adicione uma nova habilidade ao seu set técnico.</p>
</div>

<div class="max-w-xl">
    <form action="{{ route('admin.technologies.store') }}" method="POST" class="bg-slate-900 border border-white/5 p-8 rounded-2xl space-y-6">
        @csrf

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Nome da Tecnologia</label>
            <input type="text" name="name" placeholder="Ex: PHP, Laravel, Docker" required class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Ícone (Classe FontAwesome)</label>
            <input type="text" name="icon" placeholder="Ex: fa-brands fa-laravel" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Categoria</label>
            <select name="category" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
                <option value="Backend">Backend</option>
                <option value="Frontend">Frontend</option>
                <option value="Database">Database</option>
                <option value="DevOps">DevOps</option>
                <option value="Mobile">Mobile</option>
                <option value="Outros">Outros</option>
            </select>
        </div>

        <div class="space-y-2">
            <div class="flex justify-between">
                <label class="block text-sm font-medium text-slate-300">Nível de Domínio (%)</label>
                <span id="level-val" class="text-primary font-bold text-sm">80%</span>
            </div>
            <input type="range" name="level" min="0" max="100" value="80" 
                oninput="document.getElementById('level-val').innerText = this.value + '%'"
                class="w-full h-2 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-primary">
        </div>

        <div class="pt-4 flex justify-end space-x-4">
            <a href="{{ route('admin.technologies.index') }}" class="px-6 py-3 border border-white/10 rounded-xl font-semibold hover:bg-white/5 transition">Cancelar</a>
            <button type="submit" class="px-6 py-3 bg-primary hover:bg-blue-600 rounded-xl font-semibold transition">Salvar Tecnologia</button>
        </div>
    </form>
</div>
@endsection
