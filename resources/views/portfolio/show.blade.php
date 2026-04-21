@extends('layouts.main')
@section('title', $project->title . ' - Project Case Study | Cogear')
@section('meta_description', Str::limit($project->description ?? 'Innovative solution delivered by Cogear Agency.', 150))

@push('styles')
<style>
/* Design tokens */
:root {
    --bg-primary: #020617;
    --bg-secondary: #0f172a;
    --bg-card: rgba(30, 41, 59, 0.5);
    --border: rgba(255, 255, 255, 0.1);
    --text-primary: #f8fafc;
    --text-secondary: #94a3b8;
    --blue: #3b82f6;
    --cyan: #06b6d4;
    --violet: #8b5cf6;
}

.case-study-hero {
    padding: 12rem 0 6rem;
    background: var(--bg-primary);
    position: relative; overflow: hidden;
}
.cs-hero-glow {
    position: absolute; top:-100px; left:50%; transform:translateX(-50%);
    width:900px; height:600px; border-radius:50%;
    background: radial-gradient(ellipse, rgba(59,130,246,0.12) 0%, transparent 70%);
    pointer-events:none;
}
.cs-header { max-width:1320px; margin:0 auto; padding:0 2rem; position:relative; z-index:2; }
.cs-back {
    display:inline-flex; align-items:center; gap:0.5rem;
    color:var(--text-secondary); font-size:0.85rem; font-weight:600;
    text-decoration:none; margin-bottom:2.5rem; transition:color 0.2s;
}
.cs-back:hover { color:var(--blue); }
.cs-title { font-size:clamp(2.5rem, 5vw, 4.5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.1; margin-bottom:2rem; color: #fff; }

.cs-meta-grid { display:flex; flex-wrap:wrap; gap:3rem; margin-top:3rem; padding-top:3rem; border-top:1px solid var(--border); }
.cs-meta-item { display:flex; flex-direction:column; gap:0.5rem; }
.cs-meta-label { font-size:0.7rem; font-weight:700; color:var(--blue); letter-spacing:0.1em; text-transform:uppercase; }
.cs-meta-value { font-size:1.1rem; font-weight:600; color:var(--text-primary); }

.cs-main-img {
    max-width:1320px; margin:4rem auto; padding:0 2rem;
    perspective: 2000px;
}
.cs-img-container {
    border-radius:32px; overflow:hidden; border:1px solid var(--border);
    box-shadow: 0 40px 100px rgba(0,0,0,0.6);
}
.cs-img-container img { width:100%; height:auto; display:block; }

/* Content sections */
.cs-content { padding: 4rem 0 8rem; background: var(--bg-primary); color: var(--text-primary); }
.cs-content-inner { max-width:1320px; margin:0 auto; padding:0 2rem; display:grid; grid-template-columns:1fr 320px; gap:6rem; }

.cs-body { display:flex; flex-direction:column; gap:5rem; }
.cs-section h2 { font-size:2rem; font-weight:800; letter-spacing:-0.02em; margin-bottom:1.5rem; position:relative; padding-left:1.5rem; color: #fff; }
.cs-section h2::before { content:''; position:absolute; left:0; top:0.5rem; bottom:0.5rem; width:4px; background:var(--blue); border-radius:2px; }
.cs-text { color:var(--text-secondary); font-size:1.1rem; line-height:1.85; }
.cs-text p { margin-bottom:1.5rem; }

.cs-gallery { margin-top:4rem; }
.cs-gallery-grid { display:grid; grid-template-columns:1fr 1fr; gap:1.5rem; }
.cs-gallery-item {
    border-radius:24px; overflow:hidden; border:1px solid var(--border);
    transition: transform 0.4s ease;
}
.cs-gallery-item:hover { transform: scale(1.02); z-index:10; }
.cs-gallery-item img { width:100%; height:auto; display:block; }

/* Sidebar */
.cs-sidebar { position:sticky; top:120px; display:flex; flex-direction:column; gap:2rem; }
.cs-sidebar-card {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:24px; padding:2rem;
    backdrop-filter: blur(8px);
}
.cs-sidebar-card h3 { font-size:1.1rem; font-weight:700; margin-bottom:1.5rem; color: #fff; }
.cs-tech-pills { display:flex; flex-wrap:wrap; gap:0.6rem; }
.cs-tech-pill {
    padding:0.4rem 1rem; border-radius:100px;
    background:rgba(255,255,255,0.05); border:1px solid var(--border);
    color:var(--text-secondary); font-size:0.8rem; font-weight:600;
}
.cs-action-btn {
    display:flex; align-items:center; justify-content:center; gap:0.6rem;
    width:100%; padding:1.1rem; border-radius:16px;
    background:linear-gradient(135deg, var(--blue), var(--violet));
    color:#fff; font-weight:700; text-decoration:none;
    box-shadow: 0 12px 30px rgba(59,130,246,0.3);
    transition: all 0.3s ease;
}
.cs-action-btn:hover { transform: translateY(-3px); box-shadow: 0 20px 40px rgba(59,130,246,0.5); }

/* Navigation */
.cs-nav { padding:6rem 0; background:var(--bg-secondary); border-top:1px solid var(--border); }
.cs-nav-inner { max-width:1320px; margin:0 auto; padding:0 2rem; display:flex; justify-content:space-between; align-items:center; }
.cs-nav-btn { display:flex; flex-direction:column; gap:0.4rem; text-decoration:none; }
.cs-nav-label { font-size:0.75rem; font-weight:700; color:var(--blue); text-transform:uppercase; letter-spacing:0.1em; }
.cs-nav-title { font-size:1.2rem; font-weight:800; color:var(--text-primary); transition:color 0.2s; }
.cs-nav-btn:hover .cs-nav-title { color:var(--blue); }

@media(max-width:1024px) {
    .cs-content-inner { grid-template-columns:1fr; gap:4rem; }
    .cs-sidebar { position:static; }
}
@media(max-width:768px) {
    .cs-meta-grid { flex-direction:column; gap:1.5rem; }
    .cs-gallery-grid { grid-template-columns:1fr; }
    .cs-main-img { padding:0 1.25rem; }
}
</style>
@endpush

@section('content')

<!-- Case Study Hero -->
<section class="case-study-hero">
    <div class="cs-hero-glow"></div>
    <div class="cs-header" data-aos="fade-up">
        <a href="{{ route('portfolio') }}" class="cs-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back to Portfolio
        </a>
        <h1 class="cs-title">{{ $project->title }}</h1>
        
        <div class="cs-meta-grid">
            <div class="cs-meta-item">
                <span class="cs-meta-label">Client</span>
                <span class="cs-meta-value">Global Innovation Partner</span>
            </div>
            <div class="cs-meta-item">
                <span class="cs-meta-label">Category</span>
                <span class="cs-meta-value">{{ collect($project->tech_stack ?? [])->first() ?? 'Software' }}</span>
            </div>
        </div>
    </div>

    <!-- Main Image -->
    <div class="cs-main-img" data-aos="zoom-in">
        <div class="cs-img-container">
            @if($project->image_path)
                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}">
            @else
                <div style="aspect-ratio:16/9; background:#0c1220; display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:6rem;font-weight:900;color:rgba(255,255,255,0.03);">COGEAR</span>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Content -->
<section class="cs-content">
    <div class="cs-content-inner">
        
        <div class="cs-body">
            <!-- Overview -->
            <div class="cs-section" data-aos="fade-up">
                <h2>Project Overview</h2>
                <div class="cs-text">
                    {!! nl2br(e($project->description ?? 'Detailed documentation for this case study is being compiled.')) !!}
                </div>
            </div>

            <!-- Gallery -->
            @if($project->gallery && is_array($project->gallery) && count($project->gallery) > 0)
                <div class="cs-section" data-aos="fade-up">
                    <h2>Project Gallery</h2>
                    <div class="cs-gallery-grid">
                        @foreach($project->gallery as $img)
                            <div class="cs-gallery-item">
                                <img src="{{ asset('storage/' . $img) }}" alt="Gallery Image" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="cs-sidebar">
            <div class="cs-sidebar-card" data-aos="fade-left">
                <h3>Technologies Used</h3>
                <div class="cs-tech-pills">
                    @foreach($project->tech_stack ?? [] as $tech)
                        <span class="cs-tech-pill">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            @if($project->demo_link)
                <div data-aos="fade-left" data-aos-delay="100">
                    <a href="{{ $project->demo_link }}" target="_blank" rel="noopener noreferrer" class="cs-action-btn">
                        Launch Project
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/></svg>
                    </a>
                </div>
            @else
                <div data-aos="fade-left" data-aos-delay="100">
                    <a href="{{ route('contact') }}" class="cs-action-btn">
                        Discuss Similar Project
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            @endif

            <div class="cs-sidebar-card" data-aos="fade-left" data-aos-delay="200">
                <h3>Technical Excellence</h3>
                <ul class="cs-text" style="font-size:0.9rem; list-style:none; padding:0; display:flex; flex-direction:column; gap:0.75rem;">
                    <li style="display:flex; gap:0.6rem; align-items:flex-start;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#a8ff78" stroke-width="3" style="margin-top:4px;"><polyline points="20 6 9 17 4 12"/></svg> Future-proof architecture</li>
                    <li style="display:flex; gap:0.6rem; align-items:flex-start;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#a8ff78" stroke-width="3" style="margin-top:4px;"><polyline points="20 6 9 17 4 12"/></svg> Seamless Cloud Integration</li>
                    <li style="display:flex; gap:0.6rem; align-items:flex-start;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#a8ff78" stroke-width="3" style="margin-top:4px;"><polyline points="20 6 9 17 4 12"/></svg> Scalable AI Microservices</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Next/Prev Navigation -->
<section class="cs-nav">
    <div class="cs-nav-inner" data-aos="fade-up">
        <a href="{{ route('portfolio') }}" class="cs-nav-btn">
            <span class="cs-nav-label">Explore More</span>
            <span class="cs-nav-title">View All Projects</span>
        </a>
        <a href="{{ route('contact') }}" class="btn-primary">
            Start Your Journey
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

@endsection
