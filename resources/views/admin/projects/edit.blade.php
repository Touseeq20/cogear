@extends('layouts.admin')

@section('header', 'Edit Project')

@section('content')
<div class="max-w-4xl px-4">
    <div class="mb-8 flex items-center">
        <a href="{{ route('admin.projects.index') }}" class="text-slate-500 hover:text-slate-800 transition mr-4">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h3 class="text-2xl font-bold text-slate-800">Edit Project: {{ $project->title }}</h3>
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-10 px-4">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PATCH')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Project Title</label>
                    <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                    <textarea name="description" rows="5" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">{{ old('description', $project->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tech Stack (Comma separated)</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack', implode(', ', $project->tech_stack)) }}" placeholder="Laravel, React, Three.js" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                    <p class="text-xs text-slate-400 mt-2 italic">Ex: React, Next.js, AI Agents</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Demo Link (Optional)</label>
                    <input type="url" name="demo_link" value="{{ old('demo_link', $project->demo_link) }}" placeholder="https://..." class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Main Image (Keep empty to leave as is, Max 2MB)</label>
                    <input type="file" name="image" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                    <div class="mt-4 flex items-center">
                        <span class="text-xs text-slate-500 mr-2 uppercase tracking-wide">Current:</span>
                        <img src="{{ asset('storage/' . $project->image_path) }}" class="w-20 h-14 object-cover rounded-lg border border-slate-200">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Gallery Images (Optional)</label>
                    <input type="file" name="gallery[]" multiple class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex justify-end px-4">
                <button type="submit" class="px-10 py-4 bg-blue-600 text-white rounded-2xl font-bold text-lg hover:bg-blue-700 transition shadow-xl shadow-blue-100">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
