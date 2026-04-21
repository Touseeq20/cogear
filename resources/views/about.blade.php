@extends('layouts.main')
@section('title', 'About Cogear – Our Story, Team & Mission')
@section('meta_description', 'Discover Cogear\'s journey from a vision to a high-end AI and software engineering agency. Meet our principles and explore our process.')

@push('styles')
<style>
/* ── HERO ─────────────────────────────────── */
.about-hero {
    padding: 10rem 0 6rem;
    background: var(--bg-primary);
    position: relative; overflow: hidden;
}
.about-hero-inner { max-width:1320px; margin:0 auto; padding:0 2rem; }
.about-hero h1 { font-size:clamp(2.5rem,5vw,4rem); font-weight:900; letter-spacing:-0.03em; line-height:1.1; margin:1.5rem 0; width:100%; }
.about-hero p { color:var(--text-secondary); font-size:1.1rem; max-width:600px; line-height:1.8; }

/* ── STATS STRIP ──────────────────────────── */
.about-stats { background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border); padding:4rem 0; }
.stats-grid { max-width:1320px; margin:0 auto; padding:0 2rem; display:grid; grid-template-columns:repeat(4,1fr); gap:2rem; }
.stat-item { text-align:center; }
.stat-num { display:block; font-size:3rem; font-weight:900; background:linear-gradient(135deg,var(--blue),var(--cyan)); -webkit-background-clip:text; -webkit-text-fill-color:transparent; margin-bottom:0.5rem; }
.stat-label { font-size:0.75rem; font-weight:700; color:var(--text-dim); text-transform:uppercase; letter-spacing:0.1em; }

/* ── STORY SECTION ────────────────────────── */
.story-sec { padding:8rem 0; background:var(--bg-primary); }
.story-inner { max-width:1320px; margin:0 auto; padding:0 2rem; display:grid; grid-template-columns:1fr 1.2fr; gap:6rem; align-items:center; }
.story-content h2 { font-size:2.5rem; font-weight:900; margin-bottom:2rem; }
.story-content p { color:var(--text-secondary); font-size:1.05rem; line-height:1.8; margin-bottom:1.5rem; }

/* Map card */
.map-card {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:32px; padding:2rem; position:relative; overflow:hidden;
    box-shadow:0 30px 60px rgba(0,0,0,0.3);
}
.about-map { height:350px; border-radius:20px; overflow:hidden; border:1px solid var(--border); }
.about-map iframe { width:100%; height:100%; border:none; filter:invert(0.9) hue-rotate(180deg) contrast(1.2) brightness(0.8); }
.map-info { margin-top:1.5rem; display:flex; justify-content:space-between; align-items:center; }
.map-loc h4 { font-size:0.95rem; font-weight:700; margin-bottom:0.2rem; }
.map-loc p { font-size:0.85rem; color:var(--text-secondary); }

/* ── CORE VALUES ─────────────────────────── */
.values-sec { padding:8rem 0; background:var(--bg-secondary); }
.values-grid { max-width:1320px; margin:0 auto; padding:0 2rem; display:grid; grid-template-columns:repeat(3,1fr); gap:2rem; margin-top:4rem; }
.value-card {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:24px; padding:3rem 2.5rem; transition:all 0.4s ease;
}
.value-card:hover { transform:translateY(-8px); border-color:rgba(59,130,246,0.25); box-shadow:0 20px 50px rgba(0,0,0,0.3); }
.value-icon { width:54px; height:54px; border-radius:14px; background:rgba(59,130,246,0.1); border:1px solid rgba(59,130,246,0.2); display:flex; align-items:center; justify-content:center; margin-bottom:2rem; }
.value-icon svg { color:var(--blue); }
.value-card h3 { font-size:1.4rem; font-weight:800; margin-bottom:1rem; }
.value-card p { color:var(--text-secondary); font-size:0.95rem; line-height:1.7; }

/* ── TECH STACK GRID ────────────────────── */
.tech-sec { padding:8rem 0; background:var(--bg-primary); }
.tech-inner { max-width:1320px; margin:0 auto; padding:0 2rem; text-align:center; }
.tech-grid { display:grid; grid-template-columns:repeat(6,1fr); gap:1.5rem; margin-top:4rem; }
.tech-item {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:20px; padding:2rem 1rem; display:flex; flex-direction:column;
    align-items:center; gap:1rem; transition:all 0.3s ease;
}
.tech-item:hover { border-color:var(--blue); transform:translateY(-4px); background:rgba(59,130,246,0.05); }
.tech-icon { width:40px; height:40px; display:flex; align-items:center; justify-content:center; }
.tech-icon svg, .tech-icon img { width:100%; height:100%; }
.tech-name { font-size:0.8rem; font-weight:700; color:var(--text-secondary); letter-spacing:0.04em; }

@media(max-width:1024px) { .stats-grid{grid-template-columns:1fr 1fr;} .tech-grid{grid-template-columns:repeat(4,1fr);} .story-inner{grid-template-columns:1fr; gap:4rem;} }
@media(max-width:600px) { .tech-grid{grid-template-columns:repeat(3,1fr);} .stats-grid{grid-template-columns:1fr;} }
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="about-hero">
    <div class="about-hero-inner reveal">
        <span class="section-tag">About Cogear</span>
        <h1>Engineering the <span class="gradient-text">Impossible</span> Through Intelligence</h1>
        <p>We are a high-end software agency specializing in AI integration, complex web architectures, and premium digital products that scale.</p>
    </div>
</section>

<!-- Stats -->
<section class="about-stats">
    <div class="stats-grid">
        <div class="stat-item reveal d1">
            <span class="stat-num">50+</span>
            <span class="stat-label">Projects Delivered</span>
        </div>
        <div class="stat-item reveal d2">
            <span class="stat-num">12+</span>
            <span class="stat-label">Global Partners</span>
        </div>
        <div class="stat-item reveal d3">
            <span class="stat-num">9+</span>
            <span class="stat-label">AI Innovations</span>
        </div>
        <div class="stat-item reveal d4">
            <span class="stat-num">99%</span>
            <span class="stat-label">Client Satisfaction</span>
        </div>
    </div>
</section>

<!-- Story -->
<section class="story-sec">
    <div class="story-inner">
        <div class="story-content reveal-left">
            <h2>Our <span class="gradient-text">Journey</span></h2>
            <p>Founded with a mission to bridge the gap between complex software engineering and high-end visual design, Cogear has evolved into a leading AI-first agency.</p>
            <p>We believe that code is more than just logic — it's the foundation of modern business success. Our team of elite developers and designers work at the intersection of performance and aesthetics.</p>
            <div style="display:flex;gap:1rem;margin-top:2.5rem;">
                <a href="{{ route('portfolio') }}" class="btn-primary">View Success Stories</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Work With Us</a>
            </div>
        </div>
        <div class="reveal-right">
            <div class="map-card">
                <div class="about-map">
                    <iframe src="https://maps.google.com/maps?q=Manchester+UK&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
                <div class="map-info">
                    <div class="map-loc">
                        <h4>Headquarters</h4>
                        <p>Manchester, United Kingdom</p>
                    </div>
                    <div class="map-status">
                        <span style="display:inline-flex;align-items:center;gap:0.5rem;font-size:0.8rem;color:#b4ff39;">
                            <span style="width:8px;height:8px;border-radius:50%;background:#b4ff39;box-shadow:0 0 10px #b4ff39;"></span>
                            Online for Global Collaboration
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="values-sec">
    <div class="tech-inner reveal">
        <span class="section-tag">Core Principles</span>
        <h2 class="sec-title">The <span class="gradient-text">Cogear Way</span></h2>
        <div class="values-grid">
            <div class="value-card reveal d1">
                <div class="value-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
                <h3>Uncompromising Security</h3>
                <p>Every line of code is written with security-first principles to protect your intellectual property and user data.</p>
            </div>
            <div class="value-card reveal d2">
                <div class="value-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
                <h3>Agile Velocity</h3>
                <p>We combine rapid development sprints with deep architectural planning to deliver high-quality products on schedule.</p>
            </div>
            <div class="value-card reveal d3">
                <div class="value-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
                <h3>AI-First Innovation</h3>
                <p>We don't just add AI — we rethink your entire problem space through the lens of modern machine intelligence.</p>
            </div>
        </div>
    </div>
</section>

<!-- Tech Stack -->
<section class="tech-sec">
    <div class="tech-inner">
        <div class="reveal">
            <span class="section-tag">Our Arsenal</span>
            <h2 class="sec-title">Technologies We <span class="gradient-text">Master</span></h2>
            <p class="sec-sub">Elite-tier stacks for high-performance applications.</p>
        </div>
        <div class="tech-grid">
            @php
            $techs = [
                ['Laravel','https://simpleicons.org/icons/laravel.svg'],
                ['React','https://simpleicons.org/icons/react.svg'],
                ['Next.js','https://simpleicons.org/icons/nextdotjs.svg'],
                ['Tailwind','https://simpleicons.org/icons/tailwindcss.svg'],
                ['Python','https://simpleicons.org/icons/python.svg'],
                ['OpenAI','https://simpleicons.org/icons/openai.svg'],
                ['PostgreSQL','https://simpleicons.org/icons/postgresql.svg'],
                ['Docker','https://simpleicons.org/icons/docker.svg'],
                ['AWS','https://simpleicons.org/icons/amazonwebservices.svg'],
                ['TypeScript','https://simpleicons.org/icons/typescript.svg'],
                ['Node.js','https://simpleicons.org/icons/nodedotjs.svg'],
                ['GitHub','https://simpleicons.org/icons/github.svg'],
            ];
            @endphp
            @foreach($techs as $i => $tech)
            <div class="tech-item reveal d{{ ($i % 6) + 1 }}">
                <div class="tech-icon">
                    <img src="{{ $tech[1] }}" alt="{{ $tech[0] }} Icon" loading="lazy" style="filter:invert(0.8);">
                </div>
                <span class="tech-name">{{ $tech[0] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
