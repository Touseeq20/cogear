@extends('layouts.main')

@section('title', 'Careers - Join the Cogear Team')

@section('content')
<section class="pt-40 pb-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-7xl font-bold text-slate-900 mb-8">Build the <span class="text-blue-600">Future</span> With Us</h1>
        <p class="text-xl text-slate-500 max-w-3xl mx-auto">We are looking for passionate individuals who want to work on real-world AI and software projects. No fake certificates, just real learning.</p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-bold text-slate-900 mb-10">Our Programs</h2>
                <div class="space-y-8">
                    <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Project-Based Internships</h3>
                        <p class="text-slate-600 mb-6">Gain hands-on experience by working on live projects for international clients. You'll be part of a team and learn the full software development lifecycle.</p>
                        <ul class="space-y-3 text-slate-500">
                            <li class="flex items-center"><svg class="w-5 h-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Real Client Work</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Mentorship from Senior Leads</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Potential for Full-time Offer</li>
                        </ul>
                    </div>
                    
                    <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Course-Based Learning</h3>
                        <p class="text-slate-600 mb-6">Intensive training programs focused on modern stacks (React, Laravel, AI Integration). Not just theory, but building actual applications.</p>
                        <ul class="space-y-3 text-slate-500">
                            <li class="flex items-center"><svg class="w-5 h-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Industry-Standard Coding</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Project Portfolio Building</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Modern Tech-First Approach</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="glass p-10 md:p-14 rounded-[3rem] shadow-2xl" data-aos="fade-left">
                <h2 class="text-3xl font-bold text-slate-900 mb-10">Application Form</h2>
                
                @if(session('success'))
                    <div class="mb-8 p-6 bg-green-100 text-green-700 rounded-2xl font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('apply') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Full Name</label>
                            <input type="text" name="name" placeholder="John Doe" required class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" required class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Phone Number</label>
                            <input type="text" name="phone" placeholder="+44 20 7123" required class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Field of Interest</label>
                            <div class="relative">
                                <select name="field_of_interest" required class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 text-slate-900 rounded-xl appearance-none focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none cursor-pointer pr-12" style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 fill%3D%22none%22 viewBox%3D%220 0 24 24%22 stroke%3D%22%2364748b%22 stroke-width%3D%222%22%3E%3Cpath stroke-linecap%3D%22round%22 stroke-linejoin%3D%22round%22 d%3D%22M19 9l-7 7-7-7%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 1.25rem center; background-size: 1.25rem;">
                                    <option value="" disabled selected>Select an area...</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="AI / LLMs">AI / LLMs</option>
                                    <option value="Mobile Apps">Mobile Apps</option>
                                    <option value="E-commerce">E-commerce</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="group relative">
                        <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Upload Resumé (PDF only)</label>
                        <div class="relative flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-2xl p-8 hover:border-blue-500 hover:bg-blue-50/50 transition-all duration-300 cursor-pointer group/upload">
                            <input type="file" name="cv" accept=".pdf" required class="absolute inset-0 opacity-0 cursor-pointer z-10" onchange="this.nextElementSibling.querySelector('.file-name').textContent = this.files[0].name; this.nextElementSibling.querySelector('.upload-icon').classList.add('text-blue-600')">
                            <div class="text-center pointer-events-none">
                                <div class="upload-icon w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover/upload:bg-blue-100 group-hover/upload:text-blue-600 transition-all">
                                    <svg class="w-6 h-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                </div>
                                <p class="file-name text-sm text-slate-600 font-bold">Click to upload or drag and drop</p>
                                <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest font-semibold text-[10px]">PDF (Max 5MB)</p>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-sm font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Cover Letter / Message</label>
                        <textarea name="message" rows="4" required class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 text-slate-900 rounded-xl focus:bg-white focus:ring-4 focus:ring-blue-600/10 focus:border-blue-600 hover:border-blue-300 transition-all outline-none resize-y" placeholder="Briefly introduce yourself..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-5 mt-4 bg-slate-900 text-white rounded-xl font-black text-xl hover:bg-blue-600 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-500/40 transition-all duration-300 flex justify-center items-center">
                        Submit Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
