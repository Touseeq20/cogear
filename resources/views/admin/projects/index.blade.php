@extends('layouts.admin')

@section('header', 'Manage Projects')

@section('content')
<div class="mb-10 flex justify-between items-center px-4">
    <h3 class="text-2xl font-bold text-slate-800">Projects Showcase</h3>
    <a href="{{ route('admin.projects.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        New Project
    </a>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden px-4">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 uppercase text-xs font-bold tracking-wider">
                <th class="py-5 px-8">Project</th>
                <th class="py-5 px-8">Tech Stack</th>
                <th class="py-5 px-8">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            @forelse($projects as $project)
                <tr class="hover:bg-slate-50 transition">
                    <td class="py-6 px-8">
                        <div class="flex items-center">
                            <div class="w-16 h-12 rounded-lg overflow-hidden mr-4">
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <div class="font-bold text-slate-900">{{ $project->title }}</div>
                                <div class="text-sm text-slate-500">{{ Str::limit($project->description, 50) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-6 px-8">
                        <div class="flex flex-wrap gap-1">
                            @foreach($project->tech_stack as $tech)
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-[10px] font-bold">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="py-6 px-8">
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 bg-slate-100 text-slate-600 rounded-lg hover:bg-blue-100 hover:text-blue-600 transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-slate-100 text-slate-600 rounded-lg hover:bg-red-100 hover:text-red-600 transition">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-20 text-center text-slate-400 italic">No projects found. Add your first showcase!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-6">
        {{ $projects->links() }}
    </div>
</div>
@endsection
