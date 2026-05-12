<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Portfólio') }}</title>
    <!-- SEO -->
    <meta name="description" content="Portfólio Profissional de Giovani Bonfim - Desenvolvedor Full Stack especializado em sistemas internos e dashboards.">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#0f172a',
                        primary: '#3b82f6',
                        secondary: '#64748b',
                    }
                }
            }
        }
    </script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-dark: #0f172a;
            --color-primary: #3b82f6;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-dark);
            color: #f8fafc;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--color-dark);
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }

        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .gradient-text {
            background: linear-gradient(135deg, #60a5fa 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--color-primary);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
    @yield('styles')
</head>
<body class="antialiased">
    
    <nav class="fixed top-0 w-full z-50 glass">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-bold gradient-text">GB.dev</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="nav-link px-3 py-2 rounded-md text-sm font-medium hover:text-primary transition">Home</a>
                        <a href="#about" class="nav-link px-3 py-2 rounded-md text-sm font-medium hover:text-primary transition">Sobre</a>
                        <a href="#skills" class="nav-link px-3 py-2 rounded-md text-sm font-medium hover:text-primary transition">Habilidades</a>
                        <a href="#experience" class="nav-link px-3 py-2 rounded-md text-sm font-medium hover:text-primary transition">Experiência</a>
                        <a href="#projects" class="nav-link px-3 py-2 rounded-md text-sm font-medium hover:text-primary transition">Projetos</a>
                        <a href="#contact" class="nav-link px-3 py-2 rounded-md text-sm font-medium hover:text-primary transition">Contato</a>
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="ml-4 px-4 py-2 bg-primary text-white rounded-lg text-sm">Admin</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 z-50 w-12 h-12 bg-primary rounded-full text-white shadow-lg hidden flex items-center justify-center hover:bg-blue-600 transition-all duration-300">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-white/10 py-12" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-8">
                <span class="text-2xl font-bold gradient-text">Giovani Bonfim</span>
                <p class="text-slate-400 mt-2">Desenvolvedor Full Stack & Especialista em Sistemas</p>
            </div>
            <div class="flex justify-center space-x-6 mb-8">
                <a href="https://github.com/Bonfim7" target="_blank" class="text-slate-400 hover:text-primary text-2xl transition"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/giovani-bonfim-6a71b6354/" target="_blank" class="text-slate-400 hover:text-primary text-2xl transition"><i class="fa-brands fa-linkedin"></i></a>
                <a href="mailto:giovani.mini5@gmail.com" class="text-slate-400 hover:text-primary text-2xl transition"><i class="fa-solid fa-envelope"></i></a>
            </div>
            <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} Giovani Bonfim. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 900,
            once: true,
            offset: 100
        });

        const backToTopBtn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTopBtn.classList.remove('hidden');
            } else {
                backToTopBtn.classList.add('hidden');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
