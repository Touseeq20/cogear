@extends('layouts.main')

@section('title', 'Cogear - Innovating with AI & High-End Software')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center overflow-hidden mesh-gradient">
    <div id="hero-canvas" class="absolute inset-0 z-0 opacity-40"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-24">
        <div class="max-w-4xl">
            <h1 class="text-6xl md:text-8xl font-bold tracking-tight text-white leading-[1.1] mb-8" data-aos="fade-right">
                Future-Ready <br><span class="text-blue-500">AI Solutions</span><br> for Modern Brands.
            </h1>
            <p class="text-xl md:text-2xl text-slate-300 mb-12 leading-relaxed max-w-2xl" data-aos="fade-right" data-aos-delay="100">
                Cogear is a global software agency crafting high-end artificial intelligence, automation, and full-stack applications that scale businesses into the 2026 digital era.
            </p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6" data-aos="fade-right" data-aos-delay="200">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-10 py-5 bg-blue-600 text-white rounded-full font-bold text-lg hover:bg-white hover:text-blue-600 transition-all shadow-2xl shadow-blue-500/20">
                    Get Started
                </a>
                <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center px-10 py-5 border-2 border-white/20 text-white rounded-full font-bold text-lg hover:bg-white/10 transition-all">
                    View Portfolio
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-bold text-slate-900 mb-4">Our Expertise</h2>
            <p class="text-slate-500 text-lg max-w-2xl mx-auto">We build intelligent systems that solve complex problems.</p>
        </div>
        
        @php
            $icons = [
                'brain' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                'robot' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
                'cog' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                'shopping-cart' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
                'heart' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                'eye' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z',
                'chat' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z',
                'database' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
                'code' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'device-mobile' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                'wordpress' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
            ];
        @endphp
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($services ?? [] as $service)
                <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50 hover:bg-white hover:shadow-2xl hover:shadow-blue-100 transition-all group" data-aos="fade-up">
                    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                        <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icons[strtolower($service->icon)] ?? 'M13 10V3L4 14h7v7l9-11h-7z' }}" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $service->name }}</h3>
                    <p class="text-slate-600 leading-relaxed mb-6">{{ Str::limit($service->description, 100) }}</p>
                    <a href="{{ route('services') }}" class="text-blue-600 font-semibold inline-flex items-center group-hover:underline">
                        Learn more 
                        <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </a>
                </div>
            @empty
                <div class="col-span-3 text-center text-slate-400 py-12 italic">Services information coming soon.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="py-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 px-4">
            <div>
                <h2 class="text-4xl font-bold text-slate-900 mb-4">Featured Work</h2>
                <p class="text-slate-500 text-lg">Impactful projects delivered globally.</p>
            </div>
            <a href="{{ route('portfolio') }}" class="mt-8 md:mt-0 inline-flex items-center text-blue-600 font-bold text-lg hover:underline transition">
                Explore all projects <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 px-4">
            @foreach($projects ?? [] as $project)
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="aspect-video overflow-hidden">
                        @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400 font-bold">IMAGE</div>
                        @endif
                    </div>
                    <div class="p-8">
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->tech_stack ?? [] as $tech)
                                <span class="px-3 py-1 bg-slate-100 rounded-full text-xs font-medium text-slate-600">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">{{ $project->title }}</h3>
                        <p class="text-slate-600 mb-6">{{ Str::limit($project->description ?? '', 80) }}</p>
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="inline-flex items-center font-bold text-blue-600">
                            Case Study <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Slider -->
<section class="py-32 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-bold text-slate-900 mb-4">Client Success Stories</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($testimonials ?? [] as $testimonial)
                <div class="bg-slate-50 p-10 rounded-[2.5rem] flex flex-col relative group hover:shadow-2xl hover:shadow-blue-900/5 hover:-translate-y-2 transition-all duration-300" data-aos="fade-up">
                    <div class="mb-6 text-blue-500">
                        <svg class="w-10 h-10 opacity-30 group-hover:opacity-100 transition-opacity duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9125 16 16.0171 16H19.0171C19.5694 16 20.0171 15.5523 20.0171 15V9C20.0171 8.44772 19.5694 8 19.0171 8H15.0171C14.4648 8 14.0171 7.55228 14.0171 7V4H21.0171C21.5694 4 22.0171 4.44772 22.0171 5V15C22.0171 18.3137 19.3308 21 16.0171 21H14.0171ZM3.01709 21L3.01709 18C3.01709 16.8954 3.91253 16 5.01709 16H8.01709C8.56937 16 9.01709 15.5523 9.01709 15V9C9.01709 8.44772 8.56937 8 8.01709 8H4.01709C3.46481 8 3.01709 7.55228 3.01709 7V4H10.0171C10.5694 4 11.0171 4.44772 11.0171 5V15C11.0171 18.3137 8.33075 21 5.01709 21H3.01709Z"/></svg>
                    </div>
                    <p class="text-lg text-slate-700 leading-relaxed mb-8 italic flex-grow">
                        "{{ $testimonial->message }}"
                    </p>
                    <div class="mt-auto border-t border-slate-200 pt-6">
                        <h4 class="text-lg font-bold text-slate-900">{{ $testimonial->client_name }}</h4>
                        <p class="text-sm text-blue-600 font-medium">{{ $testimonial->company }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center text-slate-500 py-10 italic">
                    More client stories coming soon.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 px-4 bg-white">
    <div class="max-w-7xl mx-auto p-12 md:p-24 rounded-[3.5rem] mesh-gradient text-center text-white relative overflow-hidden shadow-2xl shadow-blue-900/20" data-aos="zoom-in">
        <div class="relative z-10">
            <h2 class="text-4xl md:text-7xl font-bold mb-8 tracking-tight">Ready to Build <span class="text-blue-400">Something Incredible?</span></h2>
            <p class="text-xl text-blue-100/80 mb-12 max-w-2xl mx-auto leading-relaxed">Join us on the journey to innovate. Let's discuss your next breakthrough project today and redefine what's possible.</p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ route('contact') }}" class="px-12 py-5 bg-blue-600 text-white rounded-full font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 shadow-xl shadow-blue-500/20">Consultation Request</a>
                <a href="{{ route('careers') }}" class="px-12 py-5 border-2 border-white/20 text-white rounded-full font-bold text-lg hover:bg-white/10 hover:border-white transition-all duration-300">Join the Team</a>
            </div>
        </div>
        <!-- Ultra-premium decorative elements -->
        <div class="absolute -top-40 -left-40 w-[30rem] h-[30rem] bg-blue-500/10 rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-40 -right-40 w-[30rem] h-[30rem] bg-indigo-500/10 rounded-full blur-[100px]"></div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof initThreeBackground === 'function') {
            initThreeBackground('hero-canvas');
        }
    });
</script>
@endsection
