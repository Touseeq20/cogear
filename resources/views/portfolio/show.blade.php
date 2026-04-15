@extends('layouts.main')

@section('title', $project->title . ' - Project Case Study | Cogear')

@section('content')
<section class="pt-40 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="inline-flex items-center text-blue-600 font-semibold hover:underline mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Portfolio
            </a>
            <h1 class="text-4xl md:text-6xl font-bold text-slate-900 leading-tight mb-6">{{ $project->title }}</h1>
            <div class="flex flex-wrap gap-3">
                @foreach($project->tech_stack as $tech)
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-full text-sm font-semibold uppercase tracking-wider">{{ $tech }}</span>
                @endforeach
            </div>
        </div>

        <div class="rounded-[3rem] overflow-hidden shadow-2xl mb-20" data-aos="zoom-in">
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-auto">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-20">
            <div class="lg:col-span-2 space-y-12" data-aos="fade-right">
                <section>
                    <h2 class="text-3xl font-bold text-slate-900 mb-6 px-4">Project Overview</h2>
                    <div class="text-slate-600 text-lg leading-relaxed space-y-6 px-4">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </section>

                @if($project->gallery && count($project->gallery) > 0)
                    <section>
                        <h2 class="text-3xl font-bold text-slate-900 mb-10 px-4">Project Gallery</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
                            @foreach($project->gallery as $image)
                                <div class="rounded-3xl overflow-hidden shadow-lg">
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $project->title }} Gallery" class="w-full h-auto">
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <div class="lg:col-span-1" data-aos="fade-left">
                <div class="glass p-10 rounded-[2.5rem] sticky top-32">
                    <h3 class="text-2xl font-bold text-slate-900 mb-8 px-4">Details</h3>
                    <ul class="space-y-6">
                        <li class="px-4">
                            <span class="block text-slate-500 text-sm font-semibold uppercase tracking-wider mb-1">Company</span>
                            <span class="text-slate-900 font-bold text-lg">Cogear Agency Partner</span>
                        </li>
                        <li class="px-4">
                            <span class="block text-slate-500 text-sm font-semibold uppercase tracking-wider mb-1">Services Provided</span>
                            <span class="text-slate-900 font-bold text-lg">AI Integrated Solutions</span>
                        </li>
                        @if($project->demo_link)
                            <li class="px-10">
                                <a href="{{ $project->demo_link }}" target="_blank" class="block w-full py-4 bg-blue-600 text-white text-center rounded-2xl font-bold hover:bg-blue-700 transition shadow-xl shadow-blue-100">
                                    Live Demo
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
