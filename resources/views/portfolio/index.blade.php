@extends('layouts.main')
@section('title', 'Portfolio - Featured Digital Works | Cogear')
@section('meta_description', 'Explore Cogear\'s portfolio of high-end software solutions, AI innovations, and world-class digital experiences.')

@push('styles')
<style>
/* Design tokens from global system */
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

.portfolio-hero {
    padding: 10rem 0 6rem;
    background: var(--bg-primary);
    position: relative; overflow: hidden;
    text-align: center;
}
.portfolio-hero::before { content:''; position:absolute; top:0; left:50%; transform:translateX(-50%); width:800px; height:500px; border-radius:50%; background:radial-gradient(ellipse,rgba(59,130,246,0.08) 0%,transparent 70%); pointer-events:none; }
.portfolio-hero-inner { max-width:1320px; margin:0 auto; padding:0 2rem; position:relative; z-index:1; }
.portfolio-hero h1 { font-size:clamp(2.5rem,5vw,4rem); font-weight:900; letter-spacing:-0.03em; margin:1.5rem 0; color: #fff; }
.portfolio-hero p { color:var(--text-secondary); font-size:1.05rem; max-width:600px; margin:0 auto; line-height:1.8; }

/* Filter UI */
.portfolio-filters { display:flex; justify-content:center; gap:0.75rem; flex-wrap:wrap; margin-top:3rem; }
.filter-btn {
    padding:0.6rem 1.5rem; border-radius:100px;
    background:rgba(255,255,255,0.04); border:1px solid var(--border);
    color:var(--text-secondary); font-size:0.85rem; font-weight:600;
    cursor:pointer; transition:all 0.3s ease;
}
.filter-btn:hover, .filter-btn.active {
    background:var(--blue); border-color:var(--blue); color:#fff;
    box-shadow:0 8px 24px rgba(59,130,246,0.3);
}

/* Portfolio Grid */
.portfolio-sec { padding:4rem 0 7rem; background:var(--bg-primary); }
.portfolio-inner { max-width:1320px; margin:0 auto; padding:0 2rem; }
.portfolio-grid { display:grid; grid-template-columns:repeat(3, 1fr); gap:1.5rem; }

/* A11y fix: Wrap card in <a> */
.portfolio-card {
    display: block;
    text-decoration: none;
    color: inherit;
    background: var(--bg-card); border: 1px solid var(--border);
    border-radius: 24px; overflow: hidden;
    transition: all 0.4s cubic-bezier(0.16,1,0.3,1);
    position: relative;
    backdrop-filter: blur(8px);
}
.portfolio-card:hover { transform:translateY(-8px); border-color:rgba(59,130,246,0.3); box-shadow:0 30px 60px rgba(0,0,0,0.4); }

.portfolio-img-wrap {
    aspect-ratio: 16/10; overflow:hidden; position:relative;
    background:linear-gradient(135deg, #0d1829, #111827);
    display:flex; align-items:center; justify-content:center;
}
.portfolio-img-wrap img { width:100%; height:100%; object-fit:cover; transition:transform 0.6s ease; }
.portfolio-card:hover .portfolio-img-wrap img { transform:scale(1.08); }

.portfolio-overlay {
    position:absolute; inset:0;
    background:linear-gradient(to bottom, transparent 40%, rgba(6,9,15,0.9) 100%);
    opacity:0; transition:opacity 0.4s ease;
    display:flex; align-items:flex-end; padding:2rem;
}
.portfolio-card:hover .portfolio-overlay { opacity:1; }

.portfolio-content { padding:1.75rem; }
.portfolio-tags { display:flex; flex-wrap:wrap; gap:0.4rem; margin-bottom:1rem; }
.p-tag {
    padding:0.25rem 0.75rem; border-radius:100px;
    background:rgba(59,130,246,0.1); border:1px solid rgba(59,130,246,0.2);
    color:var(--cyan); font-size:0.72rem; font-weight:700;
    text-transform:uppercase; letter-spacing:0.04em;
}
.portfolio-card h3 { font-size:1.25rem; font-weight:800; margin-bottom:0.75rem; transition:color 0.3s; color: #fff; }
.portfolio-card:hover h3 { color:var(--blue); }
.portfolio-card p { color:var(--text-secondary); font-size:0.9rem; line-height:1.65; margin-bottom:1.5rem; height:3rem; overflow:hidden; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; }

.portfolio-link {
    display:inline-flex; align-items:center; gap:0.5rem;
    color:var(--blue); font-size:0.9rem; font-weight:700;
    transition:gap 0.2s;
}
.portfolio-card:hover .portfolio-link { gap:0.75rem; }

/* Empty state */
.portfolio-empty { text-align:center; padding:5rem 2rem; background:var(--bg-card); border:1px dashed var(--border); border-radius:32px; }
.portfolio-empty svg { color:var(--border); margin-bottom:1.5rem; }

/* CTA Strip */
.portfolio-cta { padding:7rem 0; background:var(--bg-secondary); border-top:1px solid var(--border); }
.portfolio-cta-inner { max-width:1320px; margin:0 auto; padding:0 2rem; text-align:center; }
.portfolio-cta h2 { font-size:clamp(2rem,4vw,3.2rem); font-weight:900; margin-bottom:1.25rem; color: #fff; }
.portfolio-cta p { color:var(--text-secondary); font-size:1.05rem; max-width:520px; margin:0 auto 2.5rem; }

/* Responsive adjustments */
@media(max-width:1024px) { .portfolio-grid { grid-template-columns: 1fr 1fr; } }
@media(max-width:768px) {
    .portfolio-grid { grid-template-columns: 1fr; }
    .portfolio-hero h1 { font-size: 2.2rem; }
}

.gradient-text {
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.btn-primary {
    display: inline-flex;
    align-items: center;
    background: var(--blue);
    color: #fff;
    padding: 0.8rem 2rem;
    border-radius: 100px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4);
}
.btn-ghost {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--border);
    color: #fff;
    padding: 0.8rem 2rem;
    border-radius: 100px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s;
}
.btn-ghost:hover {
    background: rgba(255, 255, 255, 0.1);
}
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="portfolio-hero">
    <div class="portfolio-hero-inner" data-aos="fade-up">
        <span style="font-size:0.8rem; font-weight:800; color:var(--blue); text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:1rem;">Our Showcase</span>
        <h1>Creative <span class="gradient-text">Excellence</span> & Digital Innovation</h1>
        <p>Explore our track record of high-impact AI systems, enterprise software, and world-class digital products delivered globally.</p>

        <!-- Dynamic Category Filters (JS Powered) -->
        <div class="portfolio-filters" id="portfolio-filters">
            <button class="filter-btn active" data-filter="all">All Projects</button>
            <button class="filter-btn" data-filter="ai">AI & ML</button>
            <button class="filter-btn" data-filter="web">Web Apps</button>
            <button class="filter-btn" data-filter="mobile">Mobile</button>
            <button class="filter-btn" data-filter="automation">Automation</button>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="portfolio-sec">
    <div class="portfolio-inner">
        @if($projects->count() > 0)
            <div class="portfolio-grid" id="portfolio-grid">
                @foreach($projects as $project)
                    @php
                        // Map internal tags to filter categories
                        $tags = $project->tech_stack ?? [];
                        $categories = [];
                        if(collect($tags)->intersect(['AI', 'LLM', 'Machine Learning', 'GPT', 'PyTorch', 'TensorFlow'])->count() > 0) $categories[] = 'ai';
                        if(collect($tags)->intersect(['Laravel', 'React', 'Next.js', 'Web', 'API'])->count() > 0) $categories[] = 'web';
                        if(collect($tags)->intersect(['Mobile', 'iOS', 'Android', 'React Native'])->count() > 0) $categories[] = 'mobile';
                        if(collect($tags)->intersect(['Automation', 'Python', 'Scripting', 'RPA'])->count() > 0) $categories[] = 'automation';
                        $catClass = count($categories) > 0 ? implode(' ', $categories) : 'web';
                    @endphp
                    <a href="{{ route('portfolio.show', $project->slug) }}" class="portfolio-card project-item {{ $catClass }}" data-aos="fade-up">
                        <div class="portfolio-img-wrap">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" loading="lazy">
                            @else
                                <div style="width:100%; height:100%; background:#0c1220; display:flex; align-items:center; justify-content:center;">
                                    <span style="font-size:3rem;font-weight:900;color:rgba(255,255,255,0.05);">{{ strtoupper(substr($project->title,0,1)) }}</span>
                                </div>
                            @endif
                            <div class="portfolio-overlay">
                                <span class="btn-primary" style="padding:0.7rem 1.5rem;font-size:0.85rem">View Project</span>
                            </div>
                        </div>
                        <div class="portfolio-content">
                            <div class="portfolio-tags">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                    <span class="p-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <h3>{{ $project->title }}</h3>
                            <p>{{ $project->description ?? 'Innovative solution delivered by Cogear Agency.' }}</p>
                            <span class="portfolio-link">
                                Read Case Study
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

            @if($projects->hasPages())
                <div class="mt-16" data-aos="fade-up">
                    {{ $projects->links() }}
                </div>
            @endif
        @else
            <div class="portfolio-empty" data-aos="fade-up">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <h3 style="font-size:1.5rem;font-weight:700;margin-bottom:0.5rem; color: #fff;">Updating Portfolio</h3>
                <p style="color:var(--text-secondary)">We are currently documenting our latest breakthroughs. Check back specifically for our AI-First projects.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section class="portfolio-cta">
    <div class="portfolio-cta-inner" data-aos="fade-up">
        <h2>Have a Transformative<br><span class="gradient-text">Vision?</span></h2>
        <p>Let's collaborate to build your next market-leading digital solution. Our engineers are ready to take on your most complex challenges.</p>
        <div style="display:flex;gap:1.25rem;justify-content:center;flex-wrap:wrap">
            <a href="{{ route('contact') }}" class="btn-primary" style="font-size:1.05rem;padding:1.1rem 2.8rem">
                Start My Project
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('services') }}" class="btn-ghost" style="font-size:1.05rem;padding:1.1rem 2.8rem">Explore Capabilities</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filters = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.project-item');

    filters.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update UI
            filters.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            items.forEach(item => {
                if (filterValue === 'all' || item.classList.contains(filterValue)) {
                    item.style.display = 'block';
                    // Re-trigger AOS or use CSS for fade
                    item.style.opacity = '1';
                    item.style.transform = 'Scale(1)';
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'Scale(0.95)';
                    setTimeout(() => {
                        if (btn.getAttribute('data-filter') !== 'all' && !item.classList.contains(btn.getAttribute('data-filter'))) {
                            item.style.display = 'none';
                        }
                    }, 400);
                }
            });
        });
    });
});
</script>
@endpush
