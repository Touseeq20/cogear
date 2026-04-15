@extends('layouts.main')

@section('title', 'Services - Specialized AI & Software Solutions')

@section('content')
<section class="pt-40 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-7xl font-bold text-slate-900 mb-8">Future-Proof <span class="text-blue-600">Services</span></h1>
        <p class="text-xl text-slate-500 max-w-3xl mx-auto">We provide high-end technical expertise to help businesses thrive in the era of Artificial Intelligence and digital transformation.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
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

                $all_services = [
                    ['title' => 'AI Development', 'desc' => 'Custom machine learning models and predictive analytics tailored to your unique data.', 'icon' => 'brain'],
                    ['title' => 'AI Agents', 'desc' => 'Autonomous intelligent agents that automate complex workflows and customer interactions.', 'icon' => 'robot'],
                    ['title' => 'Automation Systems', 'desc' => 'Enterprise-grade RPA and business process automation to maximize efficiency.', 'icon' => 'cog'],
                    ['title' => 'E-commerce Solutions', 'desc' => 'High-conversion, custom e-commerce platforms built with modern technology stacks.', 'icon' => 'shopping-cart'],
                    ['title' => 'Healthcare Solutions', 'desc' => 'Secure, HIPAA-compliant AI systems for diagnostic assistance and patient management.', 'icon' => 'heart'],
                    ['title' => 'Computer Vision', 'desc' => 'Advanced image processing and recognition systems for security, retail, and manufacturing.', 'icon' => 'eye'],
                    ['title' => 'LLM Applications', 'desc' => 'Specialized applications built on GPT-4, Claude, and Gemini for creative and analytical tasks.', 'icon' => 'chat'],
                    ['title' => 'RAG Systems', 'desc' => 'Retrieval Augmented Generation to give LLMs access to your proprietary business knowledge.', 'icon' => 'database'],
                    ['title' => 'Web Development', 'desc' => 'Blazing fast web applications using React, Next.js, and robust Laravel backends.', 'icon' => 'code'],
                    ['title' => 'Mobile Apps', 'desc' => 'Seamless cross-platform mobile experiences developed with React Native.', 'icon' => 'device-mobile'],
                    ['title' => 'WordPress Development', 'desc' => 'Premium, high-performance WordPress themes and custom plugin development.', 'icon' => 'wordpress'],
                ];
            @endphp

            @foreach($all_services as $service)
                <div class="p-10 rounded-[2.5rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500" data-aos="fade-up">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center text-white mb-8 shadow-lg shadow-blue-200">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icons[$service['icon']] ?? 'M13 10V3L4 14h7v7l9-11h-7z' }}" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $service['title'] }}</h3>
                    <p class="text-slate-600 leading-relaxed">{{ $service['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-slate-900 mb-8" data-aos="fade-up">Interested in a Custom Solution?</h2>
        <p class="text-lg text-slate-500 mb-12" data-aos="fade-up" data-aos-delay="100">Our engineers are ready to discuss your specific requirements and build a roadmap for your success.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-5 bg-blue-600 text-white rounded-full font-bold text-xl hover:bg-blue-700 transition shadow-xl" data-aos="zoom-in" data-aos-delay="200">
            Book a Free Consultation
        </a>
    </div>
</section>
@endsection
