@extends('layouts.app')

@section('content')


    <section id="home" class="min-h-screen flex items-center pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-primary font-semibold tracking-wide uppercase mb-2">Olá, eu sou</h2>
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">Giovani Bonfim</h1>
                    <p class="text-xl md:text-2xl text-slate-400 mb-8 leading-relaxed">
                        Desenvolvedor Full Stack especializado na criação de <span class="text-white font-medium">sistemas corporativos</span>, dashboards operacionais e soluções para logística.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#projects" class="px-8 py-3 bg-primary hover:bg-blue-600 rounded-lg font-semibold transition">Ver Projetos</a>
                        <a href="/curriculo.pdf" target="_blank" class="px-8 py-3 border border-primary text-primary hover:bg-primary/10 rounded-lg font-semibold transition flex items-center">
                            <i class="fa-solid fa-file-pdf mr-2"></i> Baixar Currículo
                        </a>
                        <a href="#contact" class="px-8 py-3 border border-white/20 hover:bg-white/5 rounded-lg font-semibold transition">Falar Comigo</a>
                    </div>
                </div>
                <div class="flex justify-center relative" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-64 h-64 md:w-80 md:h-80 rounded-full bg-gradient-to-tr from-primary to-purple-500 p-1">
                        <div class="w-full h-full rounded-full bg-dark flex items-center justify-center overflow-hidden border-4 border-dark">
                            <img src="{{ asset('img/bonfimpicture.jpg') }}" alt="Giovani Bonfim" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-blue-500/20 rounded-full blur-xl"></div>
                    <div class="absolute -bottom-4 -left-4 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>



    <section id="about" class="py-24 bg-slate-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">Sobre Mim</h2>
                <div class="w-20 h-1 bg-primary mx-auto rounded-full"></div>
            </div>
            <div class="max-w-3xl mx-auto text-lg text-slate-400 leading-relaxed space-y-6" data-aos="fade-up" data-aos-delay="200">
                <p>
                    Com uma sólida trajetória vinda da área de operação e logística, realizei a transição para a tecnologia focando em resolver problemas reais de negócio. Minha experiência corporativa me permite entender as dores operacionais e transformá-las em sistemas eficientes.
                </p>
                <p>
                    Hoje, como desenvolvedor Full Stack, foco em stack PHP/Laravel para construir backends robustos e dashboards que facilitam a tomada de decisão. Tenho experiência em integrações ERP/WMS e automação de processos internos.
                </p>
            </div>
        </div>
    </section>



    <section id="skills" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">Minhas Habilidades</h2>
                <div class="w-20 h-1 bg-primary mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($technologies as $category => $techs)
                    <div class="glass p-8 rounded-2xl" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <h3 class="text-xl font-bold mb-6 flex items-center text-primary">
                            <i class="fa-solid fa-code mr-3"></i> {{ $category }}
                        </h3>
                        <div class="space-y-6">
                            @foreach($techs as $tech)
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="font-medium"><i class="{{ $tech->icon }} mr-2"></i> {{ $tech->name }}</span>
                                        <span class="text-slate-500">{{ $tech->level }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-800 rounded-full h-2">
                                        <div class="bg-primary h-2 rounded-full" style="width: {{ $tech->level }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section id="experience" class="py-24 bg-slate-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">Experiência Profissional</h2>
                <div class="w-20 h-1 bg-primary mx-auto rounded-full"></div>
            </div>
            <div class="relative border-l-2 border-slate-800 ml-4 md:ml-0 md:left-1/2 md:-translate-x-1/2">
                @foreach($experiences as $index => $exp)
                    <div class="mb-12 relative">
                        <!-- Dot -->
                        <div class="absolute -left-2 md:left-1/2 md:-translate-x-1/2 w-4 h-4 bg-primary rounded-full border-4 border-dark"></div>
                        
                        <div class="ml-8 md:ml-0 md:w-5/12 {{ $index % 2 == 0 ? 'md:mr-auto md:pr-12 text-right' : 'md:ml-auto md:pl-12' }}" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                            <div class="glass p-6 rounded-2xl hover:border-primary/50 transition">
                                <span class="text-primary text-sm font-bold uppercase tracking-wider">
                                    {{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Atualmente' : ($exp->end_date ? $exp->end_date->format('M Y') : '') }}
                                </span>
                                <h3 class="text-xl font-bold mt-2">{{ $exp->role }}</h3>
                                <p class="text-slate-300 font-medium">{{ $exp->company }}</p>
                                <p class="text-slate-400 mt-4 text-sm">{{ $exp->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section id="projects" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">Projetos em Destaque</h2>
                <div class="w-20 h-1 bg-primary mx-auto rounded-full mb-4"></div>
                <p class="text-slate-500 max-w-2xl mx-auto italic text-sm">
                    <i class="fa-solid fa-shield-halved mr-2"></i> 
                    Nota: Devido a políticas de **LGPD** e segurança corporativa (FutFanatics), os detalhes técnicos e dados sensíveis de sistemas internos foram omitidos ou anonimizados.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div class="group glass rounded-2xl overflow-hidden hover:scale-[1.02] transition-transform" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="h-48 bg-slate-800 relative overflow-hidden">


                            <div class="absolute inset-0 flex items-center justify-center p-12">
                                <img src="{{ asset('img/futfanatics.png') }}" alt="FutFanatics" class="w-full h-auto object-contain opacity-40 group-hover:opacity-100 transition-opacity">
                            </div>
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover absolute inset-0">
                            @endif
                            <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-4">
                                <a href="{{ $project->github_url }}" target="_blank" class="w-10 h-10 bg-dark rounded-full flex items-center justify-center hover:bg-primary transition"><i class="fa-brands fa-github"></i></a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold">{{ $project->title }}</h3>
                                @if(!$project->github_url)
                                    <span class="px-2 py-0.5 bg-slate-800 text-slate-500 text-[10px] rounded border border-white/5 uppercase tracking-wider">Corporativo</span>
                                @endif
                            </div>
                            <p class="text-slate-400 text-sm mb-6">
                                {!! nl2br(e($project->description)) !!}
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach($project->technologies as $tech)
                                    <span class="px-2 py-1 bg-primary/10 text-primary text-[10px] rounded font-semibold">{{ $tech->name }}</span>
                                @endforeach
                            </div>
                            <div class="flex justify-between items-center pt-4 border-t border-white/5">
                                <a href="{{ $project->github_url }}" target="_blank" class="text-slate-400 hover:text-white transition flex items-center text-sm">
                                    <i class="fa-brands fa-github mr-2 text-xl"></i> Ver no GitHub
                                </a>
                                
                                @if($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" class="text-primary hover:underline text-sm font-semibold">Live Demo <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-xs"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section id="contact" class="py-24 bg-slate-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Vamos Conversar?</h2>
                <p class="text-slate-400">Interessado em colaborar ou apenas quer trocar uma ideia?</p>
            </div>
            <div class="max-w-xl mx-auto">
                <div class="glass p-8 rounded-3xl">
                    <div class="space-y-6 text-center">
                        <a href="mailto:giovani.mini5@gmail.com" class="flex items-center justify-center p-4 bg-primary/10 rounded-2xl text-primary font-semibold hover:bg-primary/20 transition">
                            <i class="fa-solid fa-envelope mr-3"></i> giovani.mini5@gmail.com
                        </a>
                        <a href="https://www.linkedin.com/in/giovani-bonfim-6a71b6354/" target="_blank" class="flex items-center justify-center p-4 bg-primary/10 rounded-2xl text-primary font-semibold hover:bg-primary/20 transition">
                            <i class="fa-brands fa-linkedin mr-3"></i> linkedin.com/in/giovanibonfim
                        </a>
                        <p class="text-slate-500 text-sm pt-4 italic">
                            Disponível para novos desafios e projetos de impacto.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
