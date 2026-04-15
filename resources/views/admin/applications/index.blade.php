@extends('layouts.admin')

@section('header', 'Career Applications')

@section('content')
<div class="mb-10 px-4">
    <h3 class="text-2xl font-bold text-slate-800">Review Applications</h3>
    <p class="text-slate-500">Manage and evaluate potential candidates for Cogear programs.</p>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden px-4">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 uppercase text-xs font-bold tracking-wider">
                <th class="py-5 px-8">Applicant</th>
                <th class="py-5 px-8">Field</th>
                <th class="py-5 px-8">Status</th>
                <th class="py-5 px-8">Date</th>
                <th class="py-5 px-8">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            @forelse($applications as $app)
                <tr class="hover:bg-slate-50 transition">
                    <td class="py-6 px-8">
                        <div class="font-bold text-slate-900">{{ $app->name }}</div>
                        <div class="text-sm text-slate-500">{{ $app->email }}</div>
                    </td>
                    <td class="py-6 px-8 text-slate-600">
                        {{ $app->field_of_interest }}
                    </td>
                    <td class="py-6 px-8">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase
                            @if($app->status == 'pending') bg-amber-100 text-amber-700
                            @elseif($app->status == 'reviewed') bg-blue-100 text-blue-700
                            @elseif($app->status == 'shortlisted') bg-emerald-100 text-emerald-700
                            @else bg-red-100 text-red-700 @endif">
                            {{ $app->status }}
                        </span>
                    </td>
                    <td class="py-6 px-8 text-slate-500 text-sm">
                        {{ $app->created_at->format('M d, Y') }}
                    </td>
                    <td class="py-6 px-8">
                        <a href="{{ route('admin.applications.show', $app) }}" class="inline-flex items-center px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-blue-600 hover:text-white transition font-bold text-sm">
                            View Details
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-20 text-center text-slate-400 italic">No applications received yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-6">
        {{ $applications->links() }}
    </div>
</div>
@endsection
