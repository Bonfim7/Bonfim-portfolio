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
                    Desenvolvedor em início de carreira, com experiência prática em desenvolvimento e manutenção de sistemas internos. Atuo atualmente como Programador de Sistemas de Informação na FutFanatics, utilizando PHP, Laravel, JavaScript, MySQL, HTML, CSS e GitHub.
                </p>
                <p>
                    Busco crescimento profissional na área de tecnologia, com foco em soluções eficientes, organização e aprendizado contínuo. Minha trajetória na logística me trouxe uma visão analítica única para resolver problemas de negócio através do código.
                </p>
            </div>
        </div>
    </section>



    <section id="skills" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-4 uppercase tracking-widest text-sm text-primary font-semibold" data-aos="fade-up">
                Tecnologias
            </div>
            <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Tecnologias que utilizo</h2>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @php $delay = 0; @endphp
                @foreach($technologies as $category => $techs)
                    @foreach($techs as $tech)
                        <div class="glass p-6 rounded-3xl flex flex-col items-center justify-center aspect-square group hover:-translate-y-2 hover:border-primary/50 hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] hover:shadow-primary/20 transition-all duration-300 cursor-default" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                            <div class="w-16 h-16 mb-4 flex items-center justify-center rounded-2xl bg-slate-800/50 group-hover:bg-primary/10 transition-colors duration-300">
                                <i class="{{ $tech->icon }} text-4xl text-slate-300 group-hover:text-primary transition-colors duration-300"></i>
                            </div>
                            <span class="font-semibold text-slate-300 group-hover:text-white transition-colors duration-300 text-center">{{ $tech->name }}</span>
                        </div>
                        @php $delay += 50; @endphp
                    @endforeach
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
            <div class="relative max-w-5xl mx-auto py-8">
                <!-- Linha do Tempo Vertical -->
                <div class="absolute left-[24px] md:left-1/2 transform md:-translate-x-1/2 top-0 bottom-0 w-1 bg-slate-800 rounded-full"></div>
                
                @foreach($experiences as $index => $exp)
                    <div class="relative flex items-center justify-between md:justify-normal w-full mb-12 {{ $index % 2 == 0 ? 'md:flex-row-reverse' : 'md:flex-row' }}">
                        <!-- Bolinha Conectora -->
                        <div class="absolute left-[24px] md:left-1/2 transform -translate-x-1/2 top-10 md:top-1/2 md:-translate-y-1/2 w-4 h-4 bg-primary rounded-full ring-[6px] ring-[#0f172a] z-10 shadow-[0_0_15px_rgba(59,130,246,0.5)]"></div>
                        
                        <!-- Conteúdo do Card -->
                        <div class="w-full pl-16 md:pl-0 md:w-[calc(50%-3rem)] {{ $index % 2 == 0 ? 'md:text-right' : 'md:text-left' }}" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                            <div class="glass p-8 rounded-3xl hover:border-primary/50 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                                <span class="inline-block text-primary text-sm font-bold uppercase tracking-widest mb-2">
                                    {{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'ATUALMENTE' : ($exp->end_date ? $exp->end_date->format('M Y') : '') }}
                                </span>
                                <h3 class="text-2xl font-bold mb-1">{{ $exp->role }}</h3>
                                <p class="text-slate-300 font-semibold mb-4">{{ $exp->company }}</p>
                                <p class="text-slate-400 text-sm leading-relaxed">{{ $exp->description }}</p>
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
