<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ config('app.name') }}</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#020617',
                        primary: '#3b82f6',
                        sidebar: '#0f172a',
                    }
                }
            }
        }
    </script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #020617; color: #f8fafc; }
        .sidebar-link.active { background-color: #1e293b; border-left: 4px solid #3b82f6; }
    </style>
    @yield('styles')
</head>
<body class="flex">
    
    <!-- Sidebar -->
    <aside class="w-64 h-screen sticky top-0 bg-sidebar border-r border-white/5 flex flex-col">
        <div class="p-6">
            <h1 class="text-xl font-bold text-primary">Painel Admin</h1>
        </div>
        
        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line w-6"></i> Dashboard
            </a>
            <a href="{{ route('admin.projects.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fa-solid fa-laptop-code w-6"></i> Projetos
            </a>
            <a href="{{ route('admin.technologies.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
                <i class="fa-solid fa-code w-6"></i> Tecnologias
            </a>
            <a href="{{ route('admin.experiences.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                <i class="fa-solid fa-briefcase w-6"></i> Experiências
            </a>
        </nav>
        
        <div class="p-4 border-t border-white/5">
            <div class="flex items-center space-x-3 mb-6 px-4">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center font-bold">G</div>
                <div class="text-sm">
                    <p class="font-medium">Giovani Bonfim</p>
                    <p class="text-xs text-slate-500">Administrador</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-2 rounded-lg text-red-400 hover:bg-red-400/10 transition">
                    <i class="fa-solid fa-right-from-bracket w-6"></i> Sair
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: "{{ session('success') }}",
            timer: 3000,
            background: '#0f172a',
            color: '#fff'
        });
    </script>
    @endif

    @yield('scripts')
</body>
</html>
