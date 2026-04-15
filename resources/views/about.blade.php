@extends('layouts.main')

@section('title', 'About Cogear - Our Story & Experience')

@section('content')
<section class="pt-40 pb-32 bg-slate-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl" data-aos="fade-right">
            <h1 class="text-5xl md:text-7xl font-bold text-slate-900 mb-8 leading-tight">Crafting Excellence for the <span class="text-blue-600">Digital Era</span>.</h1>
            <p class="text-xl text-slate-600 leading-relaxed mb-12">Cogear is more than just a software agency. We are a collective of dreamers, builders, and innovators dedicated to pushing the boundaries of what's possible with technology.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-20">
            <div class="bg-white p-8 rounded-3xl shadow-sm" data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                <div class="text-slate-500 font-medium">Global Projects</div>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm" data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl font-bold text-blue-600 mb-2">5+</div>
                <div class="text-slate-500 font-medium">Years Experience</div>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm" data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl font-bold text-blue-600 mb-2">10+</div>
                <div class="text-slate-500 font-medium">Expert Engineers</div>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm" data-aos="fade-up" data-aos-delay="400">
                <div class="text-4xl font-bold text-blue-600 mb-2">99%</div>
                <div class="text-slate-500 font-medium">Client Satisfaction</div>
            </div>
        </div>
    </div>
    <div class="absolute -right-20 top-40 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
</section>

<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-bold text-slate-900 mb-8">Our Journey</h2>
                <div class="space-y-8 text-slate-600 text-lg leading-relaxed">
                    <p>Founded with a vision to simplify complexity, Cogear has grown from a small team of passionate developers into a multi-disciplinary agency serving clients across the UK and internationally.</p>
                    <p>Located in the heart of Manchester, we leverage local talent and global perspectives to deliver software that doesn't just work, but inspires. We specialize in AI systems, LLM integrations, and modern full-stack architectures.</p>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="aspect-square bg-slate-100 rounded-[3rem] overflow-hidden">
                    <img src="{{ asset('assets/office.png') }}" alt="Cogear Office in Manchester" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
                <div class="absolute -bottom-10 -left-10 glass p-8 rounded-3xl" data-aos="zoom-in" data-aos-delay="300">
                    <p class="text-2xl font-bold text-slate-900">Manchester, UK</p>
                    <p class="text-slate-500">Our Home Base</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-32 bg-slate-50 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-blue-100 rounded-full blur-[120px] opacity-30"></div>
        <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-indigo-100 rounded-full blur-[120px] opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-6xl font-black text-slate-900 mb-6 px-4" data-aos="fade-up">
                Technologies We <span class="text-blue-600">Master</span>
            </h2>
            <p class="text-slate-500 text-xl max-w-2xl mx-auto px-4" data-aos="fade-up" data-aos-delay="100">
                Our team stays at the forefront of digital innovation using the world's most powerful and scalable tools.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 md:gap-8">
            @php 
                $technologies = [
                    ['name' => 'Laravel', 'color' => 'FF2D20', 'slug' => 'laravel'],
                    ['name' => 'React', 'color' => '61DAFB', 'slug' => 'react'],
                    ['name' => 'Next.js', 'color' => '000000', 'slug' => 'nextdotjs'],
                    ['name' => 'Python', 'color' => '3776AB', 'slug' => 'python'],
                    ['name' => 'Three.js', 'color' => '000000', 'slug' => 'threedotjs'],
                    ['name' => 'PyTorch', 'color' => 'EE4C2C', 'slug' => 'pytorch'],
                    ['name' => 'Node.js', 'color' => '339933', 'slug' => 'nodedotjs'],
                    ['name' => 'TensorFlow', 'color' => 'FF6F00', 'slug' => 'tensorflow'],
                    ['name' => 'React Native', 'color' => '61DAFB', 'slug' => 'react'],
                    ['name' => 'GitHub', 'color' => '181717', 'slug' => 'github'],
                    ['name' => 'Docker', 'color' => '2496ED', 'slug' => 'docker'],
                    ['name' => 'PostgreSQL', 'color' => '4169E1', 'slug' => 'postgresql'],
                ];
            @endphp
            @foreach($technologies as $tech)
                <div class="group flex flex-col items-center p-8 rounded-[2rem] bg-white/60 backdrop-blur-xl border border-white/40 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-2xl hover:bg-white hover:-translate-y-3 transition-all duration-500 cursor-default" data-aos="zoom-in">
                    <div class="w-16 h-16 flex items-center justify-center mb-6 p-3 rounded-2xl bg-slate-50 group-hover:bg-white transition-colors duration-500">
                        <img src="https://cdn.simpleicons.org/{{ $tech['slug'] }}/{{ $tech['color'] }}" 
                             alt="{{ $tech['name'] }}" 
                             class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="text-slate-900 font-black text-lg tracking-tight group-hover:text-blue-600 transition-colors duration-300">{{ $tech['name'] }}</div>
                    
                    <!-- Premium hover highlight -->
                    <div class="mt-4 w-12 h-1 bg-transparent group-hover:bg-blue-600/20 rounded-full transition-all duration-500 scale-0 group-hover:scale-100"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
