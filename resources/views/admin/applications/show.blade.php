@extends('layouts.admin')

@section('header', 'Application Details')

@section('content')
<div class="max-w-4xl px-4">
    <div class="mb-8 flex items-center">
        <a href="{{ route('admin.applications.index') }}" class="text-slate-500 hover:text-slate-800 transition mr-4">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h3 class="text-2xl font-bold text-slate-800">Review: {{ $application->name }}</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-8">
            <!-- Applicant Info -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-10 px-4">
                <h4 class="text-lg font-bold text-slate-900 mb-8 border-b border-slate-50 pb-4 px-4">Candidate Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
                    <div>
                        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Email Address</span>
                        <span class="text-slate-800 font-medium">{{ $application->email }}</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Phone Number</span>
                        <span class="text-slate-800 font-medium">{{ $application->phone }}</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Field of Interest</span>
                        <span class="text-blue-600 font-bold">{{ $application->field_of_interest }}</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Applied On</span>
                        <span class="text-slate-800 font-medium">{{ $application->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                <div class="mt-10 px-4">
                    <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-2">Message</span>
                    <div class="bg-slate-50 p-6 rounded-2xl text-slate-700 leading-relaxed italic">
                        "{!! nl2br(e($application->message)) !!}"
                    </div>
                </div>
            </div>

            <!-- CV Download -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-10 flex items-center justify-between px-4">
                <div class="flex items-center px-4">
                    <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center text-red-600 mr-4">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Curriculum Vitae</h4>
                        <p class="text-sm text-slate-400">Application Document (PDF)</p>
                    </div>
                </div>
                <div class="px-4">
                    <a href="{{ route('admin.applications.download-cv', $application) }}" class="px-8 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition">
                        Download CV
                    </a>
                </div>
            </div>
        </div>

        <!-- Status Management -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-10 px-4">
                <h4 class="text-lg font-bold text-slate-900 mb-8 px-4">Manage Status</h4>
                <form action="{{ route('admin.applications.status', $application) }}" method="POST" class="space-y-6 px-4">
                    @csrf
                    @method('PATCH')
                    
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Application Status</label>
                        <select name="status" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition">
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="shortlisted" {{ $application->status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Internal Notes</label>
                        <textarea name="admin_notes" rows="6" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition" placeholder="Add private notes for the team...">{{ old('admin_notes', $application->admin_notes) }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100">
                        Update Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
