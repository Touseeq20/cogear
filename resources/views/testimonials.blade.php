@extends('layouts.main')
@section('title', 'Client Testimonials - What They Say About Cogear')
@push('styles')
<style>
.t-hero { padding: 10rem 0 6rem; background: var(--bg-primary); text-align: center; }
.t-grid { column-count: 2; column-gap: 1.5rem; max-width: 1320px; margin: 0 auto; padding: 4rem 2rem; }
.t-box { break-inside: avoid; margin-bottom: 1.5rem; background: var(--bg-card); border: 1px solid var(--border); border-radius: 28px; padding: 2.5rem; }
.t-stars { display: flex; gap: 4px; margin-bottom: 1.5rem; color: #f59e0b; }
.t-author { display: flex; align-items: center; gap: 1rem; border-top: 1px solid var(--border); padding-top: 1.5rem; }
.t-avatar { width: 44px; height: 44px; border-radius: 50%; background: var(--blue); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; }
@media(max-width: 820px) { .t-grid { column-count: 1; } }
</style>
@endpush
@section('content')
<section class="t-hero">
    <div class="reveal">
        <span class="section-tag">Success Stories</span>
        <h1>What Our <span class="gradient-text">Clients Say</span></h1>
    </div>
</section>
<section class="t-grid">
    @foreach($testimonials as $t)
    <div class="t-box reveal">
        <div class="t-stars">@for($i=0;$i<5;$i++) ★ @endfor</div>
        <p style="color:var(--text-secondary);font-size:1.1rem;font-style:italic;margin-bottom:2rem;">"{{ $t->message }}"</p>
        <div class="t-author">
            <div class="t-avatar">{{ substr($t->client_name, 0, 1) }}</div>
            <div><strong>{{ $t->client_name }}</strong><br><span style="font-size:0.8rem;color:var(--cyan);">{{ $t->company }}</span></div>
        </div>
    </div>
    @endforeach
</section>
@endsection
