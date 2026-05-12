@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold">Novo Projeto</h2>
    <p class="text-slate-500">Preencha os dados para exibir um novo trabalho no portfólio.</p>
</div>

<div class="max-w-4xl">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-white/5 p-8 rounded-2xl space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Título do Projeto</label>
                <input type="text" name="title" required class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
            
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Ordem de Exibição</label>
                <input type="number" name="order" value="0" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Descrição</label>
            <textarea name="description" rows="4" required class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none"></textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Link GitHub</label>
                <input type="url" name="github_url" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
            
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Link Demo</label>
                <input type="url" name="demo_url" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Tecnologias</label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 p-4 bg-slate-800/50 rounded-xl border border-white/5">
                @foreach($technologies as $tech)
                    <label class="flex items-center space-x-2 cursor-pointer group">
                        <input type="checkbox" name="technologies[]" value="{{ $tech->id }}" class="w-4 h-4 rounded border-white/10 bg-slate-700 text-primary focus:ring-primary">
                        <span class="text-sm text-slate-400 group-hover:text-white transition">{{ $tech->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Imagem de Preview</label>
            <input type="file" name="image" class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition">
        </div>

        <div class="pt-4 flex justify-end space-x-4">
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 border border-white/10 rounded-xl font-semibold hover:bg-white/5 transition">Cancelar</a>
            <button type="submit" class="px-6 py-3 bg-primary hover:bg-blue-600 rounded-xl font-semibold transition">Salvar Projeto</button>
        </div>
    </form>
</div>
@endsection
