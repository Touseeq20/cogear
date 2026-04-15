@extends('layouts.main')

@section('title', 'Portfolio - Featured Digital Works | Cogear')

@section('content')
<section class="pt-40 pb-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-7xl font-bold text-slate-900 mb-8">Creative <span class="text-blue-600">Showcase</span></h1>
        <p class="text-xl text-slate-500 max-w-3xl mx-auto">Explore our portfolio of high-end software solutions, AI innovations, and world-class digital experiences.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($projects as $project)
                    <div class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500" data-aos="fade-up">
                        <div class="aspect-[16/10] overflow-hidden">
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="p-8">
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($project->tech_stack as $tech)
                                    <span class="px-3 py-1 bg-slate-100 rounded-full text-xs font-medium text-slate-600">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">{{ $project->title }}</h3>
                            <p class="text-slate-600 mb-6 line-clamp-2">{{ $project->description }}</p>
                            <a href="{{ route('portfolio.show', $project->slug) }}" class="inline-flex items-center font-bold text-blue-600">
                                View Case Study <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-20">
                {{ $projects->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-300">
                <p class="text-slate-500 text-lg italic">We are currently updating our portfolio. Check back soon for our latest innovations.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-slate-900 mb-8" data-aos="fade-up">Have a Vision?</h2>
        <p class="text-lg text-slate-500 mb-12" data-aos="fade-up" data-aos-delay="100">Let's discuss how we can build your next award-winning digital solution.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-5 bg-blue-600 text-white rounded-full font-bold text-xl hover:bg-blue-700 transition shadow-xl" data-aos="zoom-in" data-aos-delay="200">
            Start Your Project
        </a>
    </div>
</section>
@endsection
