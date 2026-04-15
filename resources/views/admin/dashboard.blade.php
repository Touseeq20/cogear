@extends('layouts.admin')

@section('header', 'Overview Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 px-4">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 px-4">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Applications</span>
        </div>
        <div class="text-3xl font-bold text-slate-800">{{ $stats['total_applications'] }}</div>
        <p class="text-sm text-slate-500 mt-1">{{ $stats['pending_applications'] }} pending review</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 px-4">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Projects</span>
        </div>
        <div class="text-3xl font-bold text-slate-800">{{ $stats['total_projects'] }}</div>
        <p class="text-sm text-slate-500 mt-1">Managed showcase</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 px-4">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Services</span>
        </div>
        <div class="text-3xl font-bold text-slate-800">{{ $stats['total_services'] }}</div>
        <p class="text-sm text-slate-500 mt-1">Active offerings</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 px-4">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            </div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Testimonials</span>
        </div>
        <div class="text-3xl font-bold text-slate-800">{{ $stats['total_testimonials'] }}</div>
        <p class="text-sm text-slate-500 mt-1">Client reviews</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-4">
    <!-- Recent Applications -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-slate-100">
        <div class="p-6 border-b border-slate-50 flex justify-between items-center px-4">
            <h3 class="font-bold text-slate-800">Recent Career Applications</h3>
            <a href="{{ route('admin.applications.index') }}" class="text-sm text-blue-600 font-semibold hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500">
                        <th class="py-4 px-6 font-semibold">Name</th>
                        <th class="py-4 px-6 font-semibold">Field</th>
                        <th class="py-4 px-6 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($recent_applications as $app)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-800">{{ $app->name }}</div>
                                <div class="text-xs text-slate-500">{{ $app->email }}</div>
                            </td>
                            <td class="py-4 px-6 text-slate-600">{{ $app->field_of_interest }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase
                                    @if($app->status == 'pending') bg-amber-100 text-amber-700
                                    @elseif($app->status == 'reviewed') bg-blue-100 text-blue-700
                                    @elseif($app->status == 'shortlisted') bg-emerald-100 text-emerald-700
                                    @else bg-red-100 text-red-700 @endif">
                                    {{ $app->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-10 text-center text-slate-400 italic">No applications received yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Projects -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-slate-100">
        <div class="p-6 border-b border-slate-50 flex justify-between items-center px-4">
            <h3 class="font-bold text-slate-800">Recently Added Projects</h3>
            <a href="{{ route('admin.projects.index') }}" class="text-sm text-blue-600 font-semibold hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500">
                        <th class="py-4 px-6 font-semibold">Title</th>
                        <th class="py-4 px-6 font-semibold">Tech Stack</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($recent_projects as $project)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-4 px-6 font-bold text-slate-800">{{ $project->title }}</td>
                            <td class="py-4 px-6">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($project->tech_stack as $tech)
                                        <span class="px-2 py-0.5 bg-slate-100 rounded text-[10px] font-bold text-slate-500">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="py-10 text-center text-slate-400 italic">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
