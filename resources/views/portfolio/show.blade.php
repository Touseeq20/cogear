@extends('layouts.main')
@section('title', $project->title . ' - Project Details')
@push('styles')
<style>
.detailed-hero { padding: 12rem 0 6rem; background: var(--bg-primary); }
.detailed-inner { max-width: 1320px; margin: 0 auto; padding: 0 2rem; display: grid; grid-template-columns: 1fr 320px; gap: 4rem; }
.detailed-img { border-radius: 32px; overflow: hidden; border: 1px solid var(--border); box-shadow: 0 40px 100px rgba(0,0,0,0.5); margin-bottom: 4rem; }
.detailed-img img { width: 100%; height: auto; }
.sidebar-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: 20px; padding: 2rem; margin-bottom: 2rem; }
</style>
@endpush
@section('content')
<section class="detailed-hero">
    <div class="detailed-inner">
        <div class="reveal-left">
            <h1 style="font-size:3.5rem;font-weight:900;margin-bottom:2rem;">{{ $project->title }}</h1>
            <div class="detailed-img">
                @if($project->image_path)<img src="{{ asset('storage/'.$project->image_path) }}">@endif
            </div>
            <div style="font-size:1.1rem; line-height:1.8; color:var(--text-secondary);">
                {!! nl2br(e($project->description)) !!}
            </div>
        </div>
        <div class="sidebar reveal-right">
            <div class="sidebar-card">
                <h4 style="margin-bottom:1rem;">Technologies</h4>
                <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
                    @foreach($project->tech_stack ?? [] as $t)<span style="background:rgba(255,255,255,0.05);padding:0.4rem 0.8rem;border-radius:100px;font-size:0.8rem;">{{ $t }}</span>@endforeach
                </div>
            </div>
            <a href="{{ route('contact') }}" class="btn-primary" style="width:100%;text-align:center;">Start Similar Project</a>
        </div>
    </div>
</section>
@endsection
