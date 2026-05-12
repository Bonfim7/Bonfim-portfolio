@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold">Editar Experiência</h2>
    <p class="text-slate-500">Atualize os detalhes da sua trajetória.</p>
</div>

<div class="max-w-4xl">
    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="bg-slate-900 border border-white/5 p-8 rounded-2xl space-y-6">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Empresa</label>
                <input type="text" name="company" value="{{ $experience->company }}" required class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
            
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Cargo</label>
                <input type="text" name="role" value="{{ $experience->role }}" required class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Descrição das Atividades</label>
            <textarea name="description" rows="4" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">{{ $experience->description }}</textarea>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Data de Início</label>
                <input type="date" name="start_date" value="{{ $experience->start_date->format('Y-m-d') }}" required class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
            
            <div class="space-y-2">
                <label class="block text-sm font-medium text-slate-300">Data de Término</label>
                <input type="date" name="end_date" value="{{ $experience->end_date ? $experience->end_date->format('Y-m-d') : '' }}" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
            </div>

            <div class="flex items-end pb-4">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_current" value="1" {{ $experience->is_current ? 'checked' : '' }} class="w-4 h-4 rounded border-white/10 bg-slate-700 text-primary focus:ring-primary">
                    <span class="text-sm text-slate-400">Emprego Atual</span>
                </label>
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-slate-300">Localização (ex: São Paulo, SP)</label>
            <input type="text" name="location" value="{{ $experience->location }}" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-primary/50 outline-none">
        </div>

        <div class="pt-4 flex justify-end space-x-4">
            <a href="{{ route('admin.experiences.index') }}" class="px-6 py-3 border border-white/10 rounded-xl font-semibold hover:bg-white/5 transition">Cancelar</a>
            <button type="submit" class="px-6 py-3 bg-primary hover:bg-blue-600 rounded-xl font-semibold transition">Atualizar Experiência</button>
        </div>
    </form>
</div>
@endsection
