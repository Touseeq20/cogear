@extends('layouts.main')
@section('title', 'Cogear - Innovating with AI & High-End Software')
@section('meta_description', 'Building the future of software with premium AI-driven solutions, 3D modern interfaces, and enterprise-grade scalability.')

@push('styles')
<style>
/* ── HERO SECTION ─────────────────────────── */
.hero {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    background: #06090f;
}
#hero-canvas {
    position: absolute; inset: 0; z-index: 1;
}
.hero-content {
    max-width: 1320px; width: 100%; margin: 0 auto; padding: 0 2rem;
    display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: center;
    position: relative; z-index: 10; margin-top: 4rem;
}
.hero-text h1 { font-size: clamp(2.5rem, 6vw, 5rem); font-weight: 900; line-height: 0.95; letter-spacing: -0.04em; margin-bottom: 2rem; }
.hero-text p { color: var(--text-secondary); font-size: 1.15rem; max-width: 500px; line-height: 1.8; margin-bottom: 3rem; }

/* ── 3D ELEMENTS ─────────────────────────── */
.hero-visual { position: relative; height: 600px; display: flex; align-items: center; justify-content: center; perspective: 2000px; }

/* 3D Laptop Mockup */
.laptop-3d {
    width: 480px; height: 300px; background: #222; border-radius: 12px; border: 4px solid #333;
    position: relative; transform-style: preserve-3d; transition: transform 0.1s ease-out;
    box-shadow: 0 50px 100px rgba(0,0,0,0.5);
}
.laptop-screen {
    position: absolute; inset: 5px; background: #000; border-radius: 4px; overflow: hidden;
    display: flex; flex-direction: column; padding: 1.5rem; color: #0f0; font-family: 'Courier New', Courier, monospace; font-size: 0.8rem;
}
.laptop-base {
    position: absolute; bottom: -15px; left: -10px; width: 500px; height: 15px; background: #444; border-radius: 4px;
    transform: rotateX(60deg) translateZ(-40px);
}

/* 3D Phone Mockup */
.phone-3d {
    width: 140px; height: 280px; background: #111; border: 6px solid #222; border-radius: 30px;
    position: absolute; right: 0; top: 100px; transform: rotateY(-20deg) rotateX(10deg);
    box-shadow: -20px 40px 60px rgba(0,0,0,0.4); animation: float-phone 6s ease-in-out infinite;
}
@keyframes float-phone { 0%, 100% { transform: translateY(0) rotateY(-20deg); } 50% { transform: translateY(-25px) rotateY(-15deg); } }

/* Terminal Typewriter */
.terminal-line { margin-bottom: 4px; opacity: 0; }
.typing { animation: typing-fade 0.3s forwards; }
@keyframes typing-fade { from { opacity: 0; transform: translateX(-5px); } to { opacity: 1; transform: translateX(0); } }

/* ── MISSION SECTION ──────────────────────── */
.mission-sec { padding: 10rem 0; background: var(--bg-primary); position: relative; }
.mission-grid { max-width: 1320px; margin: 0 auto; padding: 0 2rem; display: grid; grid-template-columns: 1fr 1fr; gap: 8rem; align-items: center; }
.mission-img {
    height: 500px; border-radius: 40px; background: linear-gradient(135deg, rgba(59,130,246,0.1), rgba(124,58,237,0.1));
    border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;
}
.mission-circle { position: absolute; width: 300px; height: 300px; border-radius: 50%; border: 2px dashed rgba(59,130,246,0.2); animation: spin 20s linear infinite; }
@keyframes spin { 100% { transform: rotate(360deg); } }

/* ── SERVICES BRIEF ───────────────────────── */
.sc-sec { padding: 10rem 0; background: var(--bg-secondary); }
.sc-grid { max-width: 1320px; margin: 0 auto; padding: 0 2rem; display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
.sc-card {
    background: var(--bg-card); border: 1px solid var(--border); border-radius: 28px; padding: 3rem;
    position: relative; transition: all 0.4s ease; overflow: hidden;
}
.sc-card:hover { border-color: rgba(59,130,246,0.25); transform: translateY(-8px); box-shadow: 0 30px 60px rgba(0,0,0,0.3); }
.sc-card::after { content: ''; position: absolute; right: -20px; bottom: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%); }
.sc-icon { width: 50px; height: 50px; color: var(--blue); margin-bottom: 2rem; }
.sc-card h3 { font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem; }
.sc-card p { color: var(--text-secondary); line-height: 1.7; }

/* ── TARGET MARKET ────────────────────────── */
.tm-sec { padding: 10rem 0; background: var(--bg-primary); }
.tm-grid { max-width: 1320px; margin: 0 auto; padding: 0 2rem; display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; }
.tm-box {
    background: linear-gradient(135deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
    border: 1px solid var(--border); border-radius: 24px; padding: 2.5rem; display: flex; gap: 1.5rem;
}
.tm-num { font-size: 0.9rem; font-weight: 800; color: var(--blue); opacity: 0.5; }

@media(max-width: 1024px) {
    .hero-content { grid-template-columns: 1fr; text-align: center; margin-top: 6rem; }
    .hero-text p { margin: 0 auto 3rem; }
    .hero-visual { display: none; }
    .mission-grid { grid-template-columns: 1fr; gap: 4rem; }
    .tm-grid, .sc-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="hero">
    <canvas id="hero-canvas"></canvas>
    <div class="hero-content">
        <div class="hero-text reveal">
            <span class="section-tag">AI-Powered Agency</span>
            <h1>Intelligence<br>Redefined by<br><span class="gradient-text">Cogear.</span></h1>
            <p>We build high-end software solutions that integrate advanced AI with breathtaking visual experiences for transformative brands.</p>
            <div style="display:flex;gap:1rem;flex-wrap:wrap;">
                <a href="{{ route('contact') }}" class="btn-primary" style="font-size:1rem;padding:1.1rem 2.8rem;">Start a Project</a>
                <a href="{{ route('portfolio') }}" class="btn-ghost" style="font-size:1rem;padding:1.1rem 2.8rem;">See Our Work</a>
            </div>
            
            <!-- Quick Stats -->
            <div style="margin-top:4rem;display:flex;gap:3rem;border-top:1px solid var(--border);padding-top:2rem;">
                <div><span style="display:block;font-size:1.5rem;font-weight:900;">50+</span><span style="font-size:0.75rem;color:var(--text-dim);text-transform:uppercase;letter-spacing:0.1em;">Delivered</span></div>
                <div><span style="display:block;font-size:1.5rem;font-weight:900;">12+</span><span style="font-size:0.75rem;color:var(--text-dim);text-transform:uppercase;letter-spacing:0.1em;">Countries</span></div>
                <div><span style="display:block;font-size:1.5rem;font-weight:900;">99%</span><span style="font-size:0.75rem;color:var(--text-dim);text-transform:uppercase;letter-spacing:0.1em;">Satisfaction</span></div>
            </div>
        </div>

        <!-- 3D Mockups -->
        <div class="hero-visual reveal-right">
            <!-- Laptop -->
            <div class="laptop-3d" id="main-laptop">
                <div class="laptop-screen">
                    <div id="terminal-content"></div>
                </div>
                <div class="laptop-base"></div>
            </div>
            <!-- Phone -->
            <div class="phone-3d">
                <div style="padding:1.5rem">
                    <div style="width:20px;height:2px;background:#333;margin:0 auto 1.5rem;border-radius:2px;"></div>
                    <div style="width:100%;height:140px;background:rgba(59,130,246,0.1);border-radius:12px;margin-bottom:1rem;"></div>
                    <div style="width:60%;height:10px;background:#222;border-radius:4px;margin-bottom:10px;"></div>
                    <div style="width:85%;height:6px;background:#222;border-radius:4px;margin-bottom:6px;"></div>
                    <div style="width:40%;height:6px;background:#222;border-radius:4px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Who We Are -->
<section class="mission-sec">
    <div class="mission-grid">
        <div class="reveal-left">
            <div class="mission-img">
                <div class="mission-circle"></div>
                <svg width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.8" style="color:rgba(59,130,246,0.3)"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"/><path d="M12 6a6 6 0 1 0 6 6 6 6 0 0 0-6-6z"/></svg>
                <div style="position:absolute;bottom:30px;left:30px;right:30px;padding:1.5rem;background:rgba(0,0,0,0.6);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.1);border-radius:20px;">
                    <p style="font-size:0.85rem;font-weight:700;color:var(--blue);margin-bottom:0.25rem">ESTABLISHED 2024</p>
                    <p style="font-size:0.9rem;margin:0;">Building from Manchester, UK to the World.</p>
                </div>
            </div>
        </div>
        <div class="reveal-right">
            <span class="section-tag">High-End Engineers</span>
            <h2 class="sec-title">We Don't Build Apps.<br>We Build <span class="gradient-text">Power Systems.</span></h2>
            <p class="sec-sub" style="text-align:left;margin:1.5rem 0 2.5rem;">Cogear was founded on the principle that modern business problems require intelligent, autonomous solutions. We bridge the gap between "good enough" and "world class."</p>
            <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:1rem;">
                <li style="display:flex;gap:1rem;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#a8ff78" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> <span>Custom AI Models & LLM Integration</span></li>
                <li style="display:flex;gap:1rem;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#a8ff78" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> <span>Real-time Computer Vision Solutions</span></li>
                <li style="display:flex;gap:1rem;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#a8ff78" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> <span>Enterprise Cloud Architectures</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="sc-sec">
    <div class="sec-center reveal">
        <span class="section-tag">Capabilities</span>
        <h2 class="sec-title">Core <span class="gradient-text">Specializations</span></h2>
        <p class="sec-sub">Expertise scaled for global impact.</p>
    </div>
    <div class="sc-grid">
        <div class="sc-card reveal d1">
            <svg class="sc-icon" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M12 2a2 2 0 0 1 2 2v1a7 7 0 0 1 7 7v2a7 7 0 0 1-7 7v1a2 2 0 0 1-4 0v-1a7 7 0 0 1-7-7v-2a7 7 0 0 1 7-7V4a2 2 0 0 1 2-2z"/></svg>
            <h3>AI Development</h3>
            <p>From predictive analytics to custom GPT agents, we embed intelligence into your core business flows.</p>
        </div>
        <div class="sc-card reveal d2">
            <svg class="sc-icon" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
            <h3>Web Platforms</h3>
            <p>Scalable, high-performance web applications built with Laravel, React, and Next.js.</p>
        </div>
        <div class="sc-card reveal d3">
            <svg class="sc-icon" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
            <h3>Mobile Systems</h3>
            <p>Native-quality cross-platform mobile experiences developed with React Native and Expo.</p>
        </div>
    </div>
</section>

<!-- Target Market -->
<section class="tm-sec">
    <div class="sec-center reveal">
        <span class="section-tag">For Whom</span>
        <h2 class="sec-title">Our <span class="gradient-text">Target Market</span></h2>
    </div>
    <div class="tm-grid">
        <div class="tm-box reveal d1">
            <span class="tm-num">01</span>
            <div>
                <h4 style="font-weight:800;margin-bottom:0.5rem">Scale-Ups & Startups</h4>
                <p style="color:var(--text-secondary);font-size:0.9rem;">Fast-tracking MVPs to market-ready products with robust, scalable foundations.</p>
            </div>
        </div>
        <div class="tm-box reveal d2">
            <span class="tm-num">02</span>
            <div>
                <h4 style="font-weight:800;margin-bottom:0.5rem">Modern Enterprises</h4>
                <p style="color:var(--text-secondary);font-size:0.9rem;">Modernizing legacy systems with AI bridges and cloud-native microservices.</p>
            </div>
        </div>
        <div class="tm-box reveal d3">
            <span class="tm-num">03</span>
            <div>
                <h4 style="font-weight:800;margin-bottom:0.5rem">E-commerce Brands</h4>
                <p style="color:var(--text-secondary);font-size:0.9rem;">Driving conversions through intelligent product recommendations and custom checkouts.</p>
            </div>
        </div>
        <div class="tm-box reveal d4">
            <span class="tm-num">04</span>
            <div>
                <h4 style="font-weight:800;margin-bottom:0.5rem">Tech Pioneers</h4>
                <p style="color:var(--text-secondary);font-size:0.9rem;">Building experimental R&D prototypes and proof-of-concepts for the next big thing.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="padding:8rem 0;background:var(--bg-secondary);">
    <div class="sec-center reveal">
        <h2 style="font-size:3rem;font-weight:900;margin-bottom:2rem;">Ready to <span class="gradient-text">Elevate?</span></h2>
        <a href="{{ route('contact') }}" class="btn-primary" style="font-size:1.1rem;padding:1.2rem 3rem;">Start Your Journey</a>
    </div>
</section>

@endsection

@push('scripts')
<script>
// Particle Background Hero
const canvas = document.getElementById('hero-canvas');
const ctx = canvas.getContext('2d');
let particles = [];

function initParticles() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    particles = [];
    for(let i=0; i<80; i++) {
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * 2 + 1,
            speedX: Math.random() * 0.5 - 0.25,
            speedY: Math.random() * 0.5 - 0.25,
            color: 'rgba(59, 130, 246, ' + (Math.random() * 0.3 + 0.1) + ')'
        });
    }
}

function animateParticles() {
    ctx.clearRect(0,0, canvas.width, canvas.height);
    particles.forEach(p => {
        p.x += p.speedX; p.y += p.speedY;
        if(p.x < 0 || p.x > canvas.width) p.speedX *= -1;
        if(p.y < 0 || p.y > canvas.height) p.speedY *= -1;
        ctx.fillStyle = p.color;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        ctx.fill();
    });
    requestAnimationFrame(animateParticles);
}

window.addEventListener('resize', initParticles);
initParticles();
animateParticles();

// Terminal Animation
const terminal = document.getElementById('terminal-content');
const commands = [
    '> Initializing Cogear AI core...',
    '> Connecting to global neural networks...',
    '> Syncing user interface components...',
    '> Loading high-performance modules...',
    '> Building scalable structures...',
    '> System Ready. Welcome to the future.',
    '',
    '> cogear --version',
    '> v4.2.0-stable',
    '> cogear start-project',
    '> [SUCCESS] Digital evolution initiated.'
];

let lineIdx = 0;
function typeTerminal() {
    if(lineIdx < commands.length) {
        const line = document.createElement('div');
        line.className = 'terminal-line typing';
        line.textContent = commands[lineIdx];
        terminal.appendChild(line);
        lineIdx++;
        setTimeout(typeTerminal, 1200);
    }
}
setTimeout(typeTerminal, 1500);

// Tilt Laptop
const laptop = document.getElementById('main-laptop');
document.addEventListener('mousemove', (e) => {
    let x = (window.innerWidth / 2 - e.pageX) / 50;
    let y = (window.innerHeight / 2 - e.pageY) / 50;
    laptop.style.transform = `rotateY(${x}deg) rotateX(${-y}deg)`;
});
</script>
@endpush
