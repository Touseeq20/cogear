@extends('layouts.main')
@section('title', 'Services – Cogear AI & Software Agency')
@section('meta_description', 'Explore Cogear\'s full range of services: AI Development, Web & Mobile Apps, Automation, Computer Vision, and SaaS Platforms.')

@push('styles')
<style>
/* ── HERO ─────────────────────────────────── */
.svc-hero {
    padding: 10rem 0 6rem;
    background: var(--bg-primary);
    position: relative; overflow: hidden;
}
.svc-hero-inner { max-width:1320px; margin:0 auto; padding:0 2rem; text-align:center; }
.svc-hero h1 { font-size:clamp(2.5rem,5vw,4rem); font-weight:900; letter-spacing:-0.03em; line-height:1.1; margin:1.5rem 0; }
.svc-hero p { color:var(--text-secondary); font-size:1.05rem; max-width:580px; margin:0 auto; line-height:1.8; }

/* ── PROCESS STRIP ────────────────────────── */
.process-strip { background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border); padding:3rem 0; }
.process-inner { max-width:1320px; margin:0 auto; padding:0 2rem; display:grid; grid-template-columns:repeat(4,1fr); gap:0; }
.process-step { padding:1.5rem 2rem; position:relative; }
.process-step:not(:last-child)::after { content:'→'; position:absolute; right:-0.5rem; top:50%; transform:translateY(-50%); color:var(--blue); font-size:1.2rem; z-index:1; }
.process-num { font-size:0.75rem; font-weight:700; color:var(--blue); letter-spacing:0.1em; margin-bottom:0.5rem; }
.process-title { font-size:0.95rem; font-weight:700; margin-bottom:0.25rem; }
.process-desc { font-size:0.8rem; color:var(--text-secondary); line-height:1.5; }

/* ── SERVICES GRID ────────────────────────── */
.svc-list { padding:7rem 0; background:var(--bg-primary); }
.svc-list-inner { max-width:1320px; margin:0 auto; padding:0 2rem; }
.svc-items { display:flex; flex-direction:column; gap:2rem; }

.svc-row {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:24px; padding:2.5rem;
    display:grid; grid-template-columns:auto 1fr auto;
    gap:2rem; align-items:center;
    transition:all 0.4s ease; position:relative; overflow:hidden;
}
.svc-row:hover { border-color:rgba(59,130,246,0.25); transform:translateX(4px); box-shadow:0 20px 60px rgba(0,0,0,0.3); }
.svc-row-icon {
    width:70px; height:70px; border-radius:18px;
    background:linear-gradient(135deg,rgba(59,130,246,0.12),rgba(124,58,237,0.08));
    border:1px solid rgba(59,130,246,0.2);
    display:flex; align-items:center; justify-content:center;
}
.svc-row-icon svg { color:var(--blue); transition:color 0.3s ease; }
.svc-row:hover .svc-row-icon { background:linear-gradient(135deg,var(--blue),var(--violet)); }
.svc-row:hover .svc-row-icon svg { color:#fff; }
.svc-row-num { font-size:0.72rem; font-weight:700; color:var(--blue); letter-spacing:0.1em; margin-bottom:0.4rem; }
.svc-row-title { font-size:1.3rem; font-weight:700; margin-bottom:0.6rem; }
.svc-row-desc { color:var(--text-secondary); font-size:0.93rem; line-height:1.7; }
.svc-row-tags { display:flex; flex-wrap:wrap; gap:0.4rem; margin-top:0.8rem; }
.svc-row-tag { padding:0.2rem 0.75rem; border-radius:100px; background:rgba(59,130,246,0.07); border:1px solid rgba(59,130,246,0.15); color:var(--text-secondary); font-size:0.72rem; font-weight:600; }
.svc-row-cta a {
    display:inline-flex; align-items:center; gap:0.5rem;
    padding:0.75rem 1.5rem; border-radius:12px; font-weight:600; font-size:0.88rem;
    background:rgba(59,130,246,0.1); border:1px solid rgba(59,130,246,0.2);
    color:var(--blue); text-decoration:none;
}
.svc-row-cta a:hover { background:var(--blue); color:#fff; }

@media(max-width:1024px) { .svc-row { grid-template-columns:auto 1fr; } .svc-row-cta { grid-column:span 2; justify-self:start; } }
@media(max-width:768px) { .process-inner { grid-template-columns:1fr 1fr; } }
</style>
@endpush

@section('content')
<section class="svc-hero">
    <div class="svc-hero-inner reveal">
        <span class="section-tag">What We Offer</span>
        <h1>Intelligent Services for<br><span class="gradient-text">Exceptional Companies</span></h1>
        <p>From AI development to full-stack web applications, we deliver end-to-end digital solutions that move the needle for your business.</p>
    </div>
</section>

<div class="process-strip">
    <div class="process-inner">
        <div class="process-step reveal d1">
            <div class="process-num">STEP 01</div>
            <div class="process-title">Discovery</div>
            <div class="process-desc">Deep dive into your goals and constraints.</div>
        </div>
        <div class="process-step reveal d2">
            <div class="process-num">STEP 02</div>
            <div class="process-title">Architecture</div>
            <div class="process-desc">Design scalable blueprints.</div>
        </div>
        <div class="process-step reveal d3">
            <div class="process-num">STEP 03</div>
            <div class="process-title">Build & Iterate</div>
            <div class="process-desc">Agile development sprints.</div>
        </div>
        <div class="process-step reveal d4">
            <div class="process-num">STEP 04</div>
            <div class="process-title">Launch</div>
            <div class="process-desc">Production deployment and support.</div>
        </div>
    </div>
</div>

<section class="svc-list">
    <div class="svc-list-inner">
        <div class="svc-items">
            @php
            $services = [
                ['title'=>'AI Development','desc'=>'Custom machine learning models, predictive analytics, and autonomous AI agents tailored to your unique data.','num'=>'01','tags'=>['LLM','NLP','GenAI']],
                ['title'=>'Web Applications','desc'=>'High-performance, scalable web platforms built with Laravel, React, and Next.js for global reach.','num'=>'02','tags'=>['Cloud','Scale','Performance']],
                ['title'=>'Mobile Solutions','desc'=>'Seamless native-quality mobile experiences for iOS and Android using React Native.','num'=>'03','tags'=>['React Native','UX','App Store']],
                ['title'=>'Process Automation','desc'=>'Eliminate manual overhead with intelligent process automation and custom workflow engines.','num'=>'04','tags'=>['RPA','Automate','Efficiency']],
            ];
            @endphp
            @foreach($services as $i => $s)
            <div class="svc-row reveal d{{ ($i % 3) + 1 }}">
                <div class="svc-row-icon">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <div class="svc-row-num">{{ $s['num'] }}</div>
                    <h3 class="svc-row-title">{{ $s['title'] }}</h3>
                    <p class="svc-row-desc">{{ $s['desc'] }}</p>
                    <div class="svc-row-tags">
                        @foreach($s['tags'] as $tag)
                        <span class="svc-row-tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="svc-row-cta">
                    <a href="{{ route('contact') }}">Get Quote</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
