@extends('layouts.main')

@section('title', 'Cogear - Premium AI & Software Agency')

@section('content')
@php
    $serviceIcons = [
        'ai development' => '<svg class="w-6 h-6 text-cyan-300" viewBox="0 0 24 24" fill="none"><path d="M12 3L19 7V17L12 21L5 17V7L12 3Z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.8"/><path d="M12 6V9M18 9L15.5 10.5M18 15L15.5 13.5M12 18V15M6 15L8.5 13.5M6 9L8.5 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
        'web development' => '<svg class="w-6 h-6 text-cyan-300" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="14" rx="2.5" stroke="currentColor" stroke-width="1.8"/><path d="M3 8H21" stroke="currentColor" stroke-width="1.8"/><path d="M10 21H14M12 18V21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M10 12L8 14L10 16M14 12L16 14L14 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'mobile app development' => '<svg class="w-6 h-6 text-cyan-300" viewBox="0 0 24 24" fill="none"><rect x="7" y="2.5" width="10" height="19" rx="2.4" stroke="currentColor" stroke-width="1.8"/><path d="M10.5 5.5H13.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="18.5" r="1" fill="currentColor"/><path d="M4 8.5L6 10.5L4 12.5M20 8.5L18 10.5L20 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'automation systems' => '<svg class="w-6 h-6 text-cyan-300" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.8"/><path d="M19 12H22M2 12H5M12 2V5M12 19V22M17.2 6.8L19.4 4.6M4.6 19.4L6.8 17.2M17.2 17.2L19.4 19.4M4.6 4.6L6.8 6.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M12 9V12L14 13.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'computer vision solutions' => '<svg class="w-6 h-6 text-cyan-300" viewBox="0 0 24 24" fill="none"><path d="M2.5 12C4.3 8.2 7.7 6 12 6C16.3 6 19.7 8.2 21.5 12C19.7 15.8 16.3 18 12 18C7.7 18 4.3 15.8 2.5 12Z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="2.7" stroke="currentColor" stroke-width="1.8"/><path d="M9.5 3.5L11 5M14.5 3.5L13 5M7 20.5L8.7 18.8M17 20.5L15.3 18.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
    ];

    $marketIcons = [
        'Startups' => '<svg class="w-7 h-7 text-cyan-300 mx-auto mb-3" viewBox="0 0 24 24" fill="none"><path d="M11 13L19 5M19 5H13M19 5V11" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/><path d="M19 14V18C19 19.1 18.1 20 17 20H6C4.9 20 4 19.1 4 18V7C4 5.9 4.9 5 6 5H10" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/></svg>',
        'Enterprises' => '<svg class="w-7 h-7 text-cyan-300 mx-auto mb-3" viewBox="0 0 24 24" fill="none"><path d="M3 21H21M5 21V7L12 3L19 7V21M9 10H10M14 10H15M9 14H10M14 14H15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
        'E-commerce' => '<svg class="w-7 h-7 text-cyan-300 mx-auto mb-3" viewBox="0 0 24 24" fill="none"><path d="M3 4H5L7 15H18L20 8H8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="9" cy="19" r="1.5" stroke="currentColor" stroke-width="1.8"/><circle cx="17" cy="19" r="1.5" stroke="currentColor" stroke-width="1.8"/></svg>',
        'SaaS Companies' => '<svg class="w-7 h-7 text-cyan-300 mx-auto mb-3" viewBox="0 0 24 24" fill="none"><path d="M4 8C4 6.3 5.3 5 7 5H17C18.7 5 20 6.3 20 8V16C20 17.7 18.7 19 17 19H7C5.3 19 4 17.7 4 16V8Z" stroke="currentColor" stroke-width="1.8"/><path d="M4 10H20M9 14H9.01M12 14H12.01M15 14H15.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
        'Sports Analytics' => '<svg class="w-7 h-7 text-cyan-300 mx-auto mb-3" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.8"/><path d="M6.5 9.5L9.5 8L12 9L14.5 8L17.5 9.5M6.5 14.5L9.5 16L12 15L14.5 16L17.5 14.5M12 3.5V20.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    ];
@endphp

<section id="home" class="relative min-h-screen pt-32 pb-20 overflow-hidden">
    <div id="hero-canvas" class="absolute inset-0 opacity-55"></div>
    <div class="hero-grid absolute inset-0"></div>
    <div class="section-shell relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="fade-up">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-white leading-tight mb-5">Building Intelligent Digital Experiences with AI & Modern Software</h1>
                <p class="text-slate-300 text-lg mb-8">Silicon-Valley style execution for startups and enterprises with AI engineering, automation, and full-stack delivery.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="btn-primary">View Projects</a>
                    <a href="#contact" class="btn-secondary">Contact Us</a>
                </div>
            </div>
            <div class="relative fade-up">
                <div class="device-3d rounded-3xl border border-white/10 bg-slate-900/70 p-4">
                    <div class="rounded-2xl border border-white/10 bg-slate-950/80 p-3">
                        <div class="aspect-[16/10] rounded-xl border border-cyan-300/20 bg-gradient-to-br from-cyan-500/20 via-blue-600/10 to-violet-500/20"></div>
                    </div>
                </div>
                <div class="absolute -bottom-8 -left-8 w-36 rounded-[1.5rem] border border-white/10 bg-slate-900/85 p-2 rotate-[-10deg]">
                    <div class="h-52 rounded-[1.1rem] border border-cyan-300/20 bg-gradient-to-b from-cyan-500/20 to-blue-600/10"></div>
                </div>
                <div class="absolute -right-2 -bottom-14 w-80 max-w-[85vw] rounded-2xl border border-cyan-300/30 bg-slate-950/90 terminal-scan">
                    <div class="flex items-center gap-2 px-4 py-3 border-b border-white/10">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    </div>
                    <div class="p-4 text-sm font-mono text-cyan-200 space-y-2">
                        <p>&gt; Cogear AI initializing...</p>
                        <p>&gt; Deploying intelligent systems...</p>
                        <p>&gt; Optimizing workflows...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about-us" class="premium-section">
    <div class="section-shell fade-up">
        <h2 class="section-title mb-4">Who We Are</h2>
        <p class="section-subtitle">Cogear is an AI-first software company delivering modern web, mobile, automation, and computer vision systems. We build scalable products with measurable business outcomes for fast-growing teams.</p>
    </div>
</section>

<section id="services" class="premium-section">
    <div class="section-shell">
        <h2 class="section-title mb-10 fade-up">Services</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <article class="card-glow p-6 fade-up">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-400/10 border border-cyan-300/20 flex items-center justify-center mb-4">
                        {!! $serviceIcons[strtolower(trim($service->name))] ?? '<svg class="w-6 h-6 text-cyan-300" viewBox="0 0 24 24" fill="none"><path d="M12 3L19 7V17L12 21L5 17V7L12 3Z" stroke="currentColor" stroke-width="1.8"/></svg>' !!}
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">{{ $service->name }}</h3>
                    <p class="text-slate-300 text-sm">{{ Str::limit($service->description, 110) }}</p>
                </article>
            @empty
                <article class="card-glow p-6 fade-up">
                    <h3 class="text-xl font-semibold text-white mb-2">AI Development</h3>
                    <p class="text-slate-300 text-sm">Custom AI solutions tailored for ambitious companies.</p>
                </article>
            @endforelse
        </div>
    </div>
</section>

<section id="projects" class="premium-section">
    <div class="section-shell">
        <div class="flex items-end justify-between mb-10">
            <h2 class="section-title fade-up">Projects</h2>
            <a href="{{ route('portfolio') }}" class="text-cyan-300 hover:text-cyan-200">Explore all</a>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <article class="card-glow tilt-card overflow-hidden fade-up" data-tilt-card>
                    <div class="aspect-video overflow-hidden border-b border-white/10">
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">{{ $project->title }}</h3>
                        <p class="text-slate-300 text-sm mb-4">{{ Str::limit($project->description, 90) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->tech_stack as $tech)
                                <span class="tech-chip">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="text-cyan-300 text-sm">Case Study -></a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="target-market" class="premium-section">
    <div class="section-shell">
        <h2 class="section-title mb-10 fade-up">Target Market</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4">
            @foreach(['Startups','Enterprises','E-commerce','SaaS Companies','Sports Analytics'] as $market)
                <div class="card-glow p-5 text-center fade-up">
                    {!! $marketIcons[$market] !!}
                    <p class="text-white font-medium">{{ $market }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="contact" class="premium-section pb-28">
    <div class="section-shell grid lg:grid-cols-2 gap-6">
        <div class="card-glow p-7 fade-up">
            <h2 class="section-title text-3xl mb-4">Contact Us</h2>
            <p class="text-slate-300 mb-6">Let's plan your next AI product or software platform.</p>
            <div class="space-y-3 text-slate-200">
                <p class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-cyan-300" viewBox="0 0 24 24" fill="none"><path d="M4 6L12 12L20 6M5 5H19C20.1 5 21 5.9 21 7V17C21 18.1 20.1 19 19 19H5C3.9 19 3 18.1 3 17V7C3 5.9 3.9 5 5 5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span>Email: mtouseeq20@gmail.com</span>
                </p>
                <p class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-cyan-300" viewBox="0 0 24 24" fill="none"><path d="M6.6 10.8C8.2 14 10 15.8 13.2 17.4L15.7 14.9C16 14.6 16.5 14.5 16.9 14.6C18 14.9 19.1 15 20.2 15C20.8 15 21.3 15.5 21.3 16.1V20.1C21.3 20.7 20.8 21.2 20.2 21.2C10.6 21.2 2.8 13.4 2.8 3.8C2.8 3.2 3.3 2.7 3.9 2.7H7.9C8.5 2.7 9 3.2 9 3.8C9 4.9 9.1 6 9.4 7.1C9.5 7.5 9.4 8 9.1 8.3L6.6 10.8Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span>Phone: +92 330 1540904</span>
                </p>
                <p class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-cyan-300" viewBox="0 0 24 24" fill="none"><path d="M12 21C16 16.7 18 13.4 18 10C18 6.7 15.3 4 12 4C8.7 4 6 6.7 6 10C6 13.4 8 16.7 12 21Z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="10" r="2.2" stroke="currentColor" stroke-width="1.8"/></svg>
                    <span>Location: Manchester, UK</span>
                </p>
            </div>
        </div>
        <div class="card-glow p-2 fade-up overflow-hidden">
            <iframe title="Cogear Location Map" src="https://maps.google.com/maps?q=Manchester%20M12%206FA&t=&z=13&ie=UTF8&iwloc=&output=embed" class="w-full h-[330px] rounded-2xl border-0"></iframe>
        </div>
    </div>
</section>
@endsection
