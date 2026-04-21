@extends('layouts.main')
@section('title', 'Testimonials - Client Success Stories | Cogear')
@section('meta_description', 'Read what our clients say about Cogear AI and Software Agency. Real results, real satisfaction.')

@push('styles')
<style>
/* Testimonials Design Tokens */
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

.testimonials-hero {
    padding: 10rem 0 6rem;
    background: var(--bg-primary);
    position: relative; overflow: hidden;
    text-align: center;
}
.testimonials-hero::before { content:''; position:absolute; top:0; left:50%; transform:translateX(-50%); width:800px; height:500px; border-radius:50%; background:radial-gradient(ellipse,rgba(59,130,246,0.08) 0%,transparent 70%); pointer-events:none; }
.testimonials-hero-inner { max-width:1320px; margin:0 auto; padding:0 2rem; position:relative; z-index:1; }
.testimonials-hero h1 { font-size:clamp(2.5rem,5vw,4.5rem); font-weight:900; letter-spacing:-0.03em; margin:1.5rem 0; color: #fff; }
.testimonials-hero p { color:var(--text-secondary); font-size:1.1rem; max-width:600px; margin:0 auto; line-height:1.8; }

.testimonials-sec { padding:4rem 0 8rem; background:var(--bg-primary); }
.testimonials-inner { max-width:1320px; margin:0 auto; padding:0 2rem; }

/* Masonry grid */
.testimonials-grid {
    columns: 3;
    column-gap: 1.5rem;
}
@media(max-width:1024px) { .testimonials-grid { columns: 2; } }
@media(max-width:640px) { .testimonials-grid { columns: 1; } }

.testimonial-card {
    break-inside: avoid;
    margin-bottom: 1.5rem;
    background: var(--bg-card); border: 1px solid var(--border);
    border-radius: 24px; padding: 2.2rem;
    backdrop-filter: blur(8px);
    transition: all 0.3s ease;
    display: flex; flex-direction: column; gap: 1.5rem;
}
.testimonial-card:hover { transform: translateY(-5px); border-color: rgba(59, 130, 246, 0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.3); }

.quote-icon { color: var(--blue); opacity: 0.2; margin-bottom: -1rem; }
.testimonial-text { color: var(--text-primary); font-size: 1rem; line-height: 1.75; font-style: italic; position: relative; z-index: 1; }
.testimonial-author { display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem; padding-top: 1.5rem; border-top: 1px solid var(--border); }
.author-avatar {
    width: 48px; height: 48px; border-radius: 50%;
    background: linear-gradient(135deg, var(--blue), var(--violet));
    display: flex; align-items: center; justify-content: center;
    font-weight: 900; color: #fff; font-size: 0.9rem; flex-shrink: 0;
}
.author-info h4 { font-size: 1rem; font-weight: 700; margin-bottom: 0.15rem; color: #fff; }
.author-info p { font-size: 0.8rem; color: var(--blue); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }

.stars { display: flex; gap: 0.25rem; color: #fbbf24; }

.gradient-text {
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="testimonials-hero">
    <div class="testimonials-hero-inner" data-aos="fade-up">
        <span style="font-size:0.8rem; font-weight:800; color:var(--blue); text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:1rem;">Success Stories</span>
        <h1>What Our Clients <span class="gradient-text">Believe.</span></h1>
        <p>Real feedback from partners who transformed their operations with Cogear. We measure our success by their results.</p>
    </div>
</section>

<!-- Main -->
<section class="testimonials-sec">
    <div class="testimonials-inner">
        @if($testimonials->count() > 0)
            <div class="testimonials-grid">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-card" data-aos="fade-up">
                        <div class="quote-icon">
                            <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9125 16 16.0171 16H19.0171C19.5694 16 20.0171 15.5523 20.0171 15V9C20.0171 8.44772 19.5694 8 19.0171 8H15.0171C14.4648 8 14.0171 7.55228 14.0171 7V4H21.0171C21.5694 4 22.0171 4.44772 22.0171 5V15C22.0171 18.3137 19.3308 21 16.0171 21H14.0171ZM3.01709 21L3.01709 18C3.01709 16.8954 3.91253 16 5.01709 16H8.01709C8.56937 16 9.01709 15.5523 9.01709 15V9C9.01709 8.44772 8.56937 8 8.01709 8H4.01709C3.46481 8 3.01709 7.55228 3.01709 7V4H10.0171C10.5694 4 11.0171 4.44772 11.0171 5V15C11.0171 18.3137 8.33075 21 5.01709 21H3.01709Z"/></svg>
                        </div>
                        
                        <div class="stars">
                            @for($i=0; $i<5; $i++)
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>

                        <div class="testimonial-text">
                            "{{ $testimonial->message ?? 'Excellent digital transformation delivered by the team at Cogear.' }}"
                        </div>

                        <div class="testimonial-author">
                            <div class="author-avatar">
                                {{ strtoupper(substr($testimonial->client_name ?? 'C', 0, 1)) }}
                            </div>
                            <div class="author-info">
                                <h4>{{ $testimonial->client_name ?? 'Client Partner' }}</h4>
                                <p>{{ $testimonial->company ?? 'Innovation Enterprise' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($testimonials->hasPages())
                <div class="mt-16" data-aos="fade-up">
                    {{ $testimonials->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-20" data-aos="fade-up" style="background:var(--bg-card); border:1px dashed var(--border); border-radius:32px;">
                <p style="color:var(--text-secondary); font-style:italic;">New success stories are being documented. Check back soon.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section style="padding:7rem 0; background:var(--bg-secondary); border-top:1px solid var(--border);">
    <div style="max-width:1320px; margin:0 auto; padding:0 2rem; text-align:center;" data-aos="fade-up">
        <h2 style="font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 900; margin-bottom: 1.25rem; color: #fff;">Become Our Next<br><span class="gradient-text">Success Story</span></h2>
        <p style="color:var(--text-secondary); font-size:1.05rem; max-width:520px; margin:0 auto 2.5rem;">Join the growing list of brands that have revolutionized their business with our AI-powered solutions.</p>
        <a href="{{ route('contact') }}" class="btn-primary" style="display:inline-flex; align-items:center; background:var(--blue); color:#fff; padding:1.1rem 2.8rem; border-radius:100px; font-weight:700; text-decoration:none; transition:all 0.3s; font-size:1.05rem;">
            Start My Journey
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:0.5rem;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
// No extra scripts needed for masonry yet as CSS columns handles it.
</script>
@endpush
