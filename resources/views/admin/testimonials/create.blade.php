@extends('layouts.admin')

@section('header', 'New Testimonial')

@section('content')
<div class="max-w-4xl px-4">
    <div class="mb-8 flex items-center">
        <a href="{{ route('admin.testimonials.index') }}" class="text-slate-500 hover:text-slate-800 transition mr-4">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h3 class="text-2xl font-bold text-slate-800">Add Client Review</h3>
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-10 px-4">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Client Name</label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                    @error('client_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Company Name (Optional)</label>
                    <input type="text" name="company" value="{{ old('company') }}" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Rating (1-5)</label>
                    <select name="rating" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                        @for($i=5; $i>=1; $i--)
                            <option value="{{ $i }}">{{ $i }} Stars</option>
                        @endfor
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Message</label>
                    <textarea name="message" rows="5" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex justify-end px-4">
                <button type="submit" class="px-10 py-4 bg-blue-600 text-white rounded-2xl font-bold text-lg hover:bg-blue-700 transition shadow-xl shadow-blue-100">
                    Save Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
