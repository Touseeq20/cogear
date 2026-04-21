@extends('layouts.main')
@section('title', 'Portfolio - Featured Digital Works | Cogear')
@push('styles')
<style>
.p-hero { padding: 10rem 0 6rem; background: var(--bg-primary); text-align: center; }
.p-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; max-width: 1320px; margin: 0 auto; padding: 4rem 2rem; }
.p-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: 24px; overflow: hidden; transition: 0.3s; cursor: pointer; }
.p-card:hover { transform: translateY(-8px); border-color: var(--blue); }
.p-img { aspect-ratio: 16/10; background: #0c1220; display: flex; align-items: center; justify-content: center; overflow: hidden; }
.p-img img { width: 100%; height: 100%; object-fit: cover; }
.p-content { padding: 1.75rem; }
.p-tags { display: flex; gap: 0.5rem; margin-bottom: 1rem; }
.p-tag { font-size: 0.7rem; color: var(--cyan); background: rgba(59,130,246,0.1); padding: 0.2rem 0.6rem; border-radius: 100px; }
@media(max-width: 1024px) { .p-grid { grid-template-columns: 1fr 1fr; } }
@media(max-width: 600px) { .p-grid { grid-template-columns: 1fr; } }
</style>
@endpush
@section('content')
<section class="p-hero">
    <div class="reveal">
        <span class="section-tag">Case Studies</span>
        <h1>Our <span class="gradient-text">Showcase</span></h1>
    </div>
</section>
<section class="p-grid">
    @foreach($projects as $p)
    <div class="p-card reveal" onclick="window.location='{{ route('portfolio.show', $p->slug) }}'">
        <div class="p-img">
            @if($p->image_path)<img src="{{ asset('storage/'.$p->image_path) }}">@else<span style="font-size:2rem;opacity:0.1;">COGEAR</span>@endif
        </div>
        <div class="p-content">
            <div class="p-tags">@foreach(array_slice($p->tech_stack ?? [], 0, 3) as $t)<span class="p-tag">{{ $t }}</span>@endforeach</div>
            <h3 style="font-weight:800;margin-bottom:0.5rem;">{{ $p->title }}</h3>
            <p style="color:var(--text-secondary);font-size:0.9rem;line-height:1.6;">{{ Str::limit($p->description, 80) }}</p>
        </div>
    </div>
    @endforeach
</section>
@endsection
