@extends('layouts.main')

@section('title', 'Contact Cogear - Software Agency Manchester')

@section('content')
<section class="pt-40 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-7xl font-bold text-slate-900 mb-8">Let's <span class="text-blue-600">Connect</span></h1>
        <p class="text-xl text-slate-500 max-w-3xl mx-auto">Have a project in mind? We'd love to hear from you. Our team is ready to bring your vision to life.</p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <div data-aos="fade-right">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
                    <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 mb-4 uppercase tracking-wider">Address</h3>
                        <p class="text-slate-600">24, SOL House, Dark Lane<br>Manchester M12 6FA<br>United Kingdom</p>
                    </div>
                    <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 mb-4 uppercase tracking-wider">Email</h3>
                        <p class="text-slate-600">mtouseeq20@gmail.com</p>
                    </div>
                </div>

                <!-- QR Code & Mini Info -->
                <div class="flex flex-col md:flex-row items-center p-10 rounded-[2.5rem] bg-blue-600 text-white shadow-2xl shadow-blue-200">
                    <div class="mb-8 md:mb-0 md:mr-10">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(url('/')) }}" alt="Website QR Code" class="rounded-2xl bg-white p-2">
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold mb-4">Scan Our Website</h3>
                        <p class="text-blue-100 mb-0 opacity-80">Quickly access our portfolio and services on your mobile device by scanning this QR code.</p>
                    </div>
                </div>
                
                <!-- Google Maps Embed -->
                <div class="mt-12 rounded-[2.5rem] overflow-hidden grayscale contrast-125 border border-slate-100 h-80 relative group">
                    <iframe src="https://maps.google.com/maps?q=Manchester,%20UK&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div class="absolute inset-0 bg-blue-600/5 pointer-events-none group-hover:bg-transparent transition-colors duration-500"></div>
                </div>
            </div>

            <div class="p-10 md:p-14 rounded-[3rem] bg-slate-50 border border-slate-100 shadow-sm" data-aos="fade-left">
                <h2 class="text-3xl font-bold text-slate-900 mb-10">Send a Message</h2>
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="group">
                        <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Full Name</label>
                        <input type="text" name="name" placeholder="John Doe" required class="w-full px-5 py-4 bg-white border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none">
                    </div>
                    <div class="group">
                        <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Email Address</label>
                        <input type="email" name="email" placeholder="john@example.com" required class="w-full px-5 py-4 bg-white border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none">
                    </div>
                    <div class="group">
                        <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Subject</label>
                        <input type="text" name="subject" placeholder="How can we help?" required class="w-full px-5 py-4 bg-white border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none">
                    </div>
                    <div class="group">
                        <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Message</label>
                        <textarea name="message" rows="6" required class="w-full px-5 py-4 bg-white border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none resize-y" placeholder="Tell us about your project..."></textarea>
                    </div>
                    <button type="submit" class="w-full py-5 mt-4 bg-slate-900 text-white rounded-xl font-bold text-lg hover:bg-blue-600 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-300 flex justify-center items-center group/btn">
                        Send Message
                        <svg class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    <p class="text-center text-slate-400 text-sm mt-4 italic">Response normally within 24 hours.</p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
