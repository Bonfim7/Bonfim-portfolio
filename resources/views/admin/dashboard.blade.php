@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold">Resumo Geral</h2>
    <p class="text-slate-500">Bem-vindo de volta ao seu painel de controle.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    <div class="bg-slate-900 border border-white/5 p-6 rounded-2xl">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-500 text-sm font-medium">Projetos Ativos</p>
                <h3 class="text-3xl font-bold mt-1">{{ $stats['total_projects'] }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-500">
                <i class="fa-solid fa-laptop-code text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-slate-900 border border-white/5 p-6 rounded-2xl">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-500 text-sm font-medium">Tecnologias</p>
                <h3 class="text-3xl font-bold mt-1">{{ $stats['total_techs'] }}</h3>
            </div>
            <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center text-purple-500">
                <i class="fa-solid fa-code text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-slate-900 border border-white/5 p-6 rounded-2xl">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-500 text-sm font-medium">Experiências</p>
                <h3 class="text-3xl font-bold mt-1">{{ $stats['total_experiences'] }}</h3>
            </div>
            <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-500">
                <i class="fa-solid fa-briefcase text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-slate-900 border border-white/5 p-8 rounded-2xl">
        <h4 class="text-lg font-bold mb-6">Tecnologias por Categoria</h4>
        <div class="h-64">
            <canvas id="techChart"></canvas>
        </div>
    </div>
    
    <div class="bg-slate-900 border border-white/5 p-8 rounded-2xl">
        <h4 class="text-lg font-bold mb-6">Status do Portfólio</h4>
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <span class="text-slate-400">SEO Score</span>
                <span class="text-emerald-400 font-bold">98/100</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-slate-400">Performance</span>
                <span class="text-emerald-400 font-bold">95/100</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-slate-400">Tempo de Resposta</span>
                <span class="text-blue-400 font-bold">45ms</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const ctx = document.getElementById('techChart').getContext('2d');
    const techChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($techsByCategory->pluck('category')) !!},
            datasets: [{
                data: {!! json_encode($techsByCategory->pluck('total')) !!},
                backgroundColor: [
                    '#3b82f6',
                    '#a855f7',
                    '#10b981',
                    '#f59e0b',
                    '#ef4444'
                ],
                borderWidth: 0,
                spacing: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#94a3b8',
                        usePointStyle: true,
                        padding: 20
                    }
                }
            }
        }
    });
</script>
@endsection
