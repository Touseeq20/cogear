@extends('layouts.main')

@section('title', 'Client Testimonials - What They Say About Cogear')

@section('content')
<section class="pt-40 pb-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-7xl font-bold text-slate-900 mb-8">Client <span class="text-blue-600">Feedback</span></h1>
        <p class="text-xl text-slate-500 max-w-3xl mx-auto">We measure our success by the success of our clients. Here's what they have to say about working with Cogear.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($testimonials->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 px-4">
                @foreach($testimonials as $testimonial)
                    <div class="p-12 rounded-[2.5rem] bg-white shadow-sm hover:shadow-2xl transition-all duration-500 relative" data-aos="fade-up">
                        <div class="absolute -top-6 left-10 w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9125 16 16.0171 16H19.0171C19.5694 16 20.0171 15.5523 20.0171 15V9C20.0171 8.44772 19.5694 8 19.0171 8H15.0171C14.4648 8 14.0171 7.55228 14.0171 7V4H21.0171C21.5694 4 22.0171 4.44772 22.0171 5V15C22.0171 18.3137 19.3308 21 16.0171 21H14.0171ZM3.01709 21L3.01709 18C3.01709 16.8954 3.91253 16 5.01709 16H8.01709C8.56937 16 9.01709 15.5523 9.01709 15V9C9.01709 8.44772 8.56937 8 8.01709 8H4.01709C3.46481 8 3.01709 7.55228 3.01709 7V4H10.0171C10.5694 4 11.0171 4.44772 11.0171 5V15C11.0171 18.3137 8.33075 21 5.01709 21H3.01709Z"/></svg>
                        </div>
                        <div class="mb-8 flex">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-6 h-6 {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-xl text-slate-700 leading-relaxed mb-10 italic">"{{ $testimonial->message }}"</p>
                        <div class="border-t border-slate-100 pt-8">
                            <h4 class="text-xl font-bold text-slate-900">{{ $testimonial->client_name }}</h4>
                            <p class="text-blue-600 font-semibold">{{ $testimonial->company }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-20">
                {{ $testimonials->links() }}
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-[3rem] border border-dashed border-slate-200 shadow-sm" data-aos="zoom-in">
                <svg class="w-20 h-20 text-slate-200 mx-auto mb-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">No Testimonials Yet</h3>
                <p class="text-slate-500">We are in the process of gathering feedback from our amazing clients.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-slate-900 mb-8" data-aos="fade-up">Be Our Next Success Story</h2>
        <p class="text-lg text-slate-500 mb-12" data-aos="fade-up" data-aos-delay="100">Partner with Cogear and see how we can transform your digital presence.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-5 bg-blue-600 text-white rounded-full font-bold text-xl hover:bg-blue-700 transition shadow-xl" data-aos="zoom-in" data-aos-delay="200">
            Get in Touch
        </a>
    </div>
</section>
@endsection
