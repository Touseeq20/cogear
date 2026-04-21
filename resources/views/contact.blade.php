@extends('layouts.main')
@section('title', 'Contact Cogear – Get a Free Project Consultation')
@section('meta_description', 'Contact Cogear AI & Software Agency. Send us a message, find us on the map, or connect via WhatsApp. Manchester UK.')

@push('styles')
<style>
/* Contact Page Design Tokens */
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

.contact-hero {
    padding: 10rem 0 5rem;
    background: var(--bg-primary);
    position: relative; overflow: hidden;
    text-align: center;
}
.contact-hero::before { content:''; position:absolute; top:0; left:50%; transform:translateX(-50%); width:800px; height:500px; border-radius:50%; background:radial-gradient(ellipse,rgba(59,130,246,0.08) 0%,transparent 70%); pointer-events:none; }
.contact-hero-inner { max-width:1320px; margin:0 auto; padding:0 2rem; position:relative; z-index:1; }
.contact-hero h1 { font-size:clamp(2.5rem,5vw,4rem); font-weight:900; letter-spacing:-0.03em; margin:1.5rem 0; color: #fff; }
.contact-hero p { color:var(--text-secondary); font-size:1.05rem; max-width:520px; margin:0 auto; line-height:1.8; }

/* Quick contact chips */
.contact-chips { display:flex; justify-content:center; gap:1rem; flex-wrap:wrap; margin-top:2.5rem; }
.chip {
    display:inline-flex; align-items:center; gap:0.6rem;
    padding:0.6rem 1.25rem; border-radius:100px;
    background:var(--bg-card); border:1px solid var(--border);
    color:var(--text-secondary); font-size:0.88rem; font-weight:500;
    text-decoration:none; transition:all 0.3s ease;
}
.chip:hover { border-color:var(--blue); color:var(--text-primary); transform:translateY(-2px); box-shadow:0 8px 24px rgba(59,130,246,0.15); }
.chip svg { color:var(--blue); }

/* Main contact grid */
.contact-main { padding:5rem 0 7rem; background:var(--bg-primary); }
.contact-main-inner { max-width:1320px; margin:0 auto; padding:0 2rem; display:grid; grid-template-columns:1fr 1.4fr; gap:3rem; align-items:start; }

/* Info cards */
.contact-info { display:flex; flex-direction:column; gap:1.5rem; }
.contact-info-card {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:20px; padding:1.75rem;
    display:flex; align-items:flex-start; gap:1rem;
    transition:all 0.3s ease;
}
.contact-info-card:hover { border-color:rgba(59,130,246,0.25); transform:translateX(4px); }
.info-icon {
    width:46px; height:46px; border-radius:12px; flex-shrink:0;
    background:linear-gradient(135deg,rgba(59,130,246,0.12),rgba(124,58,237,0.08));
    border:1px solid rgba(59,130,246,0.2);
    display:flex; align-items:center; justify-content:center;
}
.info-icon svg { color:var(--blue); }
.info-label { font-size:0.72rem; font-weight:700; color:var(--blue); letter-spacing:0.1em; text-transform:uppercase; margin-bottom:0.25rem; }
.info-value { font-size:0.93rem; color:var(--text-primary); font-weight:500; line-height:1.6; }
.info-value a { color:var(--text-primary); text-decoration:none; transition:color 0.2s; }
.info-value a:hover { color:var(--blue); }

/* Social */
.contact-social { background:var(--bg-card); border:1px solid var(--border); border-radius:20px; padding:1.75rem; }
.contact-social h4 { font-size:0.9rem; font-weight:700; margin-bottom:1.25rem; color: #fff; }
.social-links { display:flex; gap:0.75rem; flex-wrap:wrap; }
.social-link {
    display:inline-flex; align-items:center; gap:0.5rem;
    padding:0.5rem 1rem; border-radius:10px; font-size:0.82rem; font-weight:600;
    background:rgba(255,255,255,0.04); border:1px solid var(--border);
    color:var(--text-secondary); text-decoration:none; transition:all 0.3s ease;
}
.social-link:hover { color:#fff; transform:translateY(-2px); }
.social-link.linkedin:hover { background:#0a66c2; border-color:#0a66c2; box-shadow:0 8px 20px rgba(10,102,194,0.4); }
.social-link.whatsapp:hover { background:#25d366; border-color:#25d366; box-shadow:0 8px 20px rgba(37,211,102,0.4); }

/* Map */
.contact-map { background:var(--bg-card); border:1px solid var(--border); border-radius:20px; overflow:hidden; }
.map-header { padding:1rem 1.5rem; display:flex; align-items:center; gap:0.75rem; border-bottom:1px solid var(--border); }
.map-pulse { width:10px; height:10px; border-radius:50%; background:#22c55e; box-shadow:0 0 8px #22c55e; animation:map-pulse 2s infinite; flex-shrink:0; }
@keyframes map-pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.6;transform:scale(0.85)} }
.map-header-text strong { display:block; font-size:0.88rem; font-weight:700; color: #fff; }
.map-header-text span { font-size:0.75rem; color:var(--text-secondary); }
.map-embed { height:220px; }
.map-embed iframe { width:100%; height:100%; border:none; filter:invert(0.9) hue-rotate(185deg) brightness(0.75) contrast(1.2) saturate(0.8); }

/* Form */
.contact-form-card {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:24px; padding:2.5rem;
    box-shadow:0 20px 60px rgba(0,0,0,0.2);
    backdrop-filter: blur(12px);
}
.form-header { margin-bottom:2rem; }
.form-header h2 { font-size:1.6rem; font-weight:800; letter-spacing:-0.02em; color: #fff; }
.form-header p { color:var(--text-secondary); font-size:0.9rem; margin-top:0.4rem; }

.form-grid { display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; }
.form-field { display:flex; flex-direction:column; gap:0.4rem; }
.form-field.full { grid-column:span 2; }
.form-label { font-size:0.8rem; font-weight:700; color:var(--text-secondary); letter-spacing:0.04em; }

.form-input, .form-textarea, .form-select {
    background:rgba(255,255,255,0.04); border:1px solid var(--border);
    border-radius:12px; padding:0.85rem 1rem;
    color:var(--text-primary); font-size:0.93rem; font-family:inherit;
    outline:none; width:100%; transition:all 0.3s ease;
}
.form-input:focus, .form-textarea:focus, .form-select:focus {
    border-color:var(--blue); background:rgba(59,130,246,0.08);
    box-shadow:0 0 0 3px rgba(59,130,246,0.1);
}
.form-textarea { resize:vertical; min-height:130px; }
.form-select option { background:#0c1220; color:var(--text-primary); }

.submit-btn {
    width:100%; padding:1rem; border-radius:12px; border:none;
    background:linear-gradient(135deg,var(--blue),var(--violet));
    color:#fff; font-weight:700; font-size:1rem; font-family:inherit;
    cursor:pointer; display:flex; align-items:center; justify-content:center; gap:0.5rem;
    transition:all 0.3s ease; margin-top:0.5rem;
    box-shadow:0 8px 24px rgba(59,130,246,0.35);
}
.submit-btn:hover { transform:translateY(-2px); box-shadow:0 16px 40px rgba(59,130,246,0.55); }

/* Alert */
.alert-success { padding:1rem 1.25rem; border-radius:12px; background:rgba(34,197,94,0.1); border:1px solid rgba(34,197,94,0.25); color:#86efac; font-size:0.9rem; margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem; }

@media(max-width:900px) { .contact-main-inner { grid-template-columns:1fr; gap:4rem; } }
@media(max-width:600px) { .form-grid { grid-template-columns:1fr; } .form-field.full { grid-column:span 1; } }

.gradient-text {
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="contact-hero">
    <div class="contact-hero-inner" data-aos="fade-up">
        <span style="font-size:0.8rem; font-weight:800; color:var(--blue); text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:1rem;">Contact Us</span>
        <h1>Let's Build Something<br><span class="gradient-text">Extraordinary.</span></h1>
        <p>Whether you have a fully-scoped project or just an idea — we'd love to hear from you. Our team typically responds within 24 hours.</p>
        
        <div class="contact-chips">
            <a href="mailto:mtouseeq20@gmail.com" class="chip">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                mtouseeq20@gmail.com
            </a>
            <a href="https://wa.me/923301540904" target="_blank" rel="noopener noreferrer" class="chip">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                WhatsApp Us
            </a>
            <span class="chip">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                Response < 24hrs
            </span>
        </div>
    </div>
</section>

<!-- Main -->
<section class="contact-main">
    <div class="contact-main-inner">

        <!-- Left: Info -->
        <div class="contact-info" data-aos="fade-right">
            
            <div class="contact-info-card">
                <div class="info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div>
                    <div class="info-label">Address</div>
                    <div class="info-value">24, SOL House, Dark Lane<br>Manchester M12 6FA<br>United Kingdom</div>
                </div>
            </div>

            <div class="contact-info-card">
                <div class="info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <div>
                    <div class="info-label">Email</div>
                    <div class="info-value"><a href="mailto:mtouseeq20@gmail.com">mtouseeq20@gmail.com</a></div>
                </div>
            </div>

            <div class="contact-social">
                <h4>Connect with Us</h4>
                <div class="social-links">
                    <a href="https://linkedin.com/company/cogear" target="_blank" rel="noopener noreferrer" class="social-link linkedin">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                        LinkedIn
                    </a>
                    <a href="https://wa.me/923301540904" target="_blank" rel="noopener noreferrer" class="social-link whatsapp">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        WhatsApp
                    </a>
                </div>
            </div>

            <div class="contact-map">
                <div class="map-header">
                    <div class="map-pulse"></div>
                    <div class="map-header-text">
                        <strong>Cogear HQ</strong>
                        <span>Manchester, United Kingdom</span>
                    </div>
                </div>
                <div class="map-embed">
                    <iframe
                        src="https://maps.google.com/maps?q=Manchester+M12+6FA,+UK&t=&z=14&ie=UTF8&iwloc=&output=embed"
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Right: Form -->
        <div data-aos="fade-left">
            <div class="contact-form-card">
                <div class="form-header">
                    <h2>Send a Message</h2>
                    <p>Briefly describe your requirements and we'll get back to you within one business day.</p>
                </div>

                @if(session('success'))
                    <div class="alert-success">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="form-label" for="contact-name">Full Name</label>
                            <input type="text" id="contact-name" name="name" class="form-input" placeholder="John Doe" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="contact-email">Email Address</label>
                            <input type="email" id="contact-email" name="email" class="form-input" placeholder="john@company.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="contact-service">Service Needed</label>
                            <select id="contact-service" name="service" class="form-select">
                                <option value="" disabled {{ old('service') ? '' : 'selected' }}>Select a service...</option>
                                <option value="AI / LLMs" {{ old('service') == 'AI / LLMs' ? 'selected' : '' }}>AI / LLMs</option>
                                <option value="Web Apps" {{ old('service') == 'Web Apps' ? 'selected' : '' }}>Web Apps</option>
                                <option value="Automation" {{ old('service') == 'Automation' ? 'selected' : '' }}>Automation</option>
                                <option value="Other" {{ old('service') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="contact-subject">Subject</label>
                            <input type="text" id="contact-subject" name="subject" class="form-input" placeholder="How can we help?" value="{{ old('subject') }}" required>
                        </div>
                        <div class="form-field full">
                            <label class="form-label" for="contact-message">Your Message</label>
                            <textarea id="contact-message" name="message" class="form-textarea" placeholder="Tell us more about your project goals..." required>{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn" id="contact-submit">
                        Send Message
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                    </button>
                    <p style="text-align:center; color:var(--text-dim); font-size:0.75rem; margin-top:1rem;">Your privacy is our priority. We never share your details.</p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
