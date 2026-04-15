@extends('layouts.admin')

@section('header', 'Manage Testimonials')

@section('content')
<div class="mb-10 flex justify-between items-center px-4">
    <h3 class="text-2xl font-bold text-slate-800">Client Reviews</h3>
    <a href="{{ route('admin.testimonials.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        New Testimonial
    </a>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden px-4">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 uppercase text-xs font-bold tracking-wider">
                <th class="py-5 px-8">Client</th>
                <th class="py-5 px-8">Rating</th>
                <th class="py-5 px-8">Message Snippet</th>
                <th class="py-5 px-8">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            @forelse($testimonials as $testimonial)
                <tr class="hover:bg-slate-50 transition">
                    <td class="py-6 px-8">
                        <div class="font-bold text-slate-900">{{ $testimonial->client_name }}</div>
                        <div class="text-sm text-slate-500">{{ $testimonial->company }}</div>
                    </td>
                    <td class="py-6 px-8">
                        <div class="flex text-yellow-400">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            @endfor
                        </div>
                    </td>
                    <td class="py-6 px-8 text-slate-500">
                        {{ Str::limit($testimonial->message, 80) }}
                    </td>
                    <td class="py-6 px-8">
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-2 bg-slate-100 text-slate-600 rounded-lg hover:bg-blue-100 hover:text-blue-600 transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
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
                    <td colspan="4" class="py-20 text-center text-slate-400 italic">No testimonials added yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-6">
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
