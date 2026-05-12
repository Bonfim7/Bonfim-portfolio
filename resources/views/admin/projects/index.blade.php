@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-2xl font-bold">Gerenciar Projetos</h2>
        <p class="text-slate-500">Adicione ou edite seus trabalhos em destaque.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="bg-primary hover:bg-blue-600 px-6 py-2 rounded-xl font-semibold transition">
        <i class="fa-solid fa-plus mr-2"></i> Novo Projeto
    </a>
</div>

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-800/50 border-b border-white/5">
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Título</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Ordem</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Tecnologias</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @foreach($projects as $project)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-slate-800 rounded flex items-center justify-center">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" class="w-full h-full object-cover rounded">
                            @else
                                <i class="fa-solid fa-image text-slate-600"></i>
                            @endif
                        </div>
                        <span class="font-medium">{{ $project->title }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-slate-400">{{ $project->order }}</td>
                <td class="px-6 py-4">
                    <div class="flex flex-wrap gap-1">
                        @foreach($project->technologies as $tech)
                            <span class="px-2 py-0.5 bg-slate-800 text-[10px] rounded text-slate-400">{{ $tech->name }}</span>
                        @endforeach
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 text-blue-400 hover:bg-blue-400/10 rounded-lg transition">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Excluir este projeto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-400 hover:bg-red-400/10 rounded-lg transition">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
