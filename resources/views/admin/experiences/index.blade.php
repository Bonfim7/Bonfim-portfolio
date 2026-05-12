@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-2xl font-bold">Gerenciar Experiências</h2>
        <p class="text-slate-500">Histórico profissional exibido no portfólio.</p>
    </div>
    <a href="{{ route('admin.experiences.create') }}" class="bg-primary hover:bg-blue-600 px-6 py-2 rounded-xl font-semibold transition">
        <i class="fa-solid fa-plus mr-2"></i> Nova Experiência
    </a>
</div>

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-800/50 border-b border-white/5">
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Empresa</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Cargo</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300">Período</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @foreach($experiences as $exp)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4 font-medium">{{ $exp->company }}</td>
                <td class="px-6 py-4 text-slate-400">{{ $exp->role }}</td>
                <td class="px-6 py-4 text-slate-400">
                    {{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Atualmente' : ($exp->end_date ? $exp->end_date->format('M Y') : '') }}
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="p-2 text-blue-400 hover:bg-blue-400/10 rounded-lg transition">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" onsubmit="return confirm('Excluir esta experiência?')">
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
