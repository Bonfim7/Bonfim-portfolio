@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-2xl font-bold">Gerenciar Tecnologias</h2>
        <p class="text-slate-500">Skills exibidas na seção de habilidades.</p>
    </div>
    <a href="{{ route('admin.technologies.create') }}" class="bg-primary hover:bg-blue-600 px-6 py-2 rounded-xl font-semibold transition">
        <i class="fa-solid fa-plus mr-2"></i> Nova Tecnologia
    </a>
</div>

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-800/50 border-b border-white/5">
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Tecnologia</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Categoria</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Nível</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @foreach($technologies as $tech)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <i class="{{ $tech->icon }} text-xl text-primary"></i>
                        <span class="font-medium">{{ $tech->name }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-slate-400 text-sm">{{ $tech->category }}</td>
                <td class="px-6 py-4">
                    <div class="w-32 bg-slate-800 rounded-full h-1.5">
                        <div class="bg-primary h-1.5 rounded-full" style="width: {{ $tech->level }}%"></div>
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.technologies.edit', $tech) }}" class="p-2 text-blue-400 hover:bg-blue-400/10 rounded-lg transition">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('admin.technologies.destroy', $tech) }}" method="POST" onsubmit="return confirm('Excluir esta tecnologia?')">
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
