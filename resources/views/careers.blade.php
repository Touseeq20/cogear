@extends('layouts.main')
@section('title', 'Careers - Join the Cogear Team')
@section('meta_description', 'Building the future with Cogear – Professional internships and course learning programs.')

@push('styles')
<style>
/* Careers Design Tokens */
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

.careers-hero {
    padding: 10rem 0 6rem;
    background: var(--bg-primary);
    position: relative; overflow: hidden;
    text-align: center;
}
.careers-hero::before { content:''; position:absolute; top:0; left:50%; transform:translateX(-50%); width:800px; height:500px; border-radius:50%; background:radial-gradient(ellipse,rgba(59,130,246,0.08) 0%,transparent 70%); pointer-events:none; }
.careers-hero-inner { max-width:1320px; margin:0 auto; padding:0 2rem; position:relative; z-index:1; }
.careers-hero h1 { font-size:clamp(2.5rem,5vw,4.5rem); font-weight:900; letter-spacing:-0.03em; margin:1.5rem 0; color: #fff; }
.careers-hero p { color:var(--text-secondary); font-size:1.1rem; max-width:620px; margin:0 auto; line-height:1.8; }

/* Grid layout */
.careers-main { padding:4rem 0 8rem; background:var(--bg-primary); }
.careers-main-inner { max-width:1320px; margin:0 auto; padding:0 2rem; display:grid; grid-template-columns:1fr 1.2fr; gap:5rem; align-items:start; }

/* Program cards */
.programs-col { display:flex; flex-direction:column; gap:2.5rem; }
.program-card {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:28px; padding:2.5rem;
    transition:all 0.4s ease; position:relative; overflow:hidden;
    backdrop-filter: blur(8px);
}
.program-card::after {
    content:''; position:absolute; right:0; top:0; width:120px; height:120px;
    background:radial-gradient(circle at top right, rgba(59,130,246,0.1), transparent 70%);
}
.program-card:hover { border-color:rgba(59,130,246,0.3); transform:translateY(-5px); box-shadow:0 20px 50px rgba(0,0,0,0.3); }

.prog-icon {
    width:56px; height:56px; border-radius:16px;
    background:linear-gradient(135deg,rgba(59,130,246,0.12),rgba(124,58,237,0.08));
    display:flex; align-items:center; justify-content:center;
    margin-bottom:1.5rem; border:1px solid rgba(59,130,246,0.2);
}
.prog-icon svg { color:var(--blue); }
.program-card h3 { font-size:1.5rem; font-weight:800; margin-bottom:1rem; color: #fff; }
.program-card p { color:var(--text-secondary); line-height:1.75; margin-bottom:2rem; font-size:0.95rem; }

.prog-benefits { list-style:none; padding:0; display:flex; flex-direction:column; gap:0.9rem; }
.prog-benefit { display:flex; align-items:center; gap:0.75rem; font-size:0.9rem; color:var(--text-primary); font-weight:500; }
.prog-benefit svg { color:#a8ff78; flex-shrink:0; }

/* Application Form */
.apply-form-wrap {
    background:var(--bg-card); border:1px solid var(--border);
    border-radius:32px; padding:3rem;
    box-shadow:0 30px 80px rgba(0,0,0,0.4);
    position:relative; z-index:2;
    backdrop-filter: blur(12px);
}
.apply-header { margin-bottom:2.5rem; }
.apply-header h2 { font-size:1.8rem; font-weight:900; margin-bottom:0.5rem; color: #fff; }
.apply-header p { color:var(--text-secondary); font-size:0.9rem; }

.form-grid { display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; }
.form-field { display:flex; flex-direction:column; gap:0.5rem; }
.form-field.full { grid-column:span 2; }
.form-label { font-size:0.8rem; font-weight:700; color:var(--text-secondary); letter-spacing:0.04em; text-transform:uppercase; }

.form-input, .form-select, .form-textarea {
    background:rgba(255,255,255,0.04); border:1px solid var(--border);
    border-radius:12px; padding:0.9rem 1.1rem;
    color:var(--text-primary); font-size:0.93rem; font-family:inherit;
    outline:none; width:100%; transition:all 0.3s ease;
}
.form-input:focus, .form-select:focus, .form-textarea:focus {
    border-color:var(--blue); background:rgba(59,130,246,0.06);
    box-shadow:0 0 0 4px rgba(59,130,246,0.1);
}
.form-textarea { min-height:120px; resize:vertical; }

/* File Upload */
.file-upload-block {
    position:relative; border:2px dashed var(--border);
    border-radius:16px; padding:2rem; text-align:center;
    transition:all 0.3s ease; cursor:pointer;
}
.file-upload-block:hover { border-color:var(--blue); background:rgba(59,130,246,0.04); }
.file-upload-block input[type="file"] { position:absolute; inset:0; opacity:0; cursor:pointer; }
.upload-icon {
    width:44px; height:44px; border-radius:50%; background:rgba(59,130,246,0.1);
    display:flex; align-items:center; justify-content:center;
    margin:0 auto 1rem; color:var(--blue);
}
.upload-text { font-size:0.9rem; font-weight:700; color:var(--text-primary); }
.upload-sub { font-size:0.75rem; color:var(--text-dim); margin-top:0.25rem; }

.apply-btn {
    width:100%; padding:1.1rem; border-radius:16px; border:none;
    background:linear-gradient(135deg, var(--blue), var(--violet));
    color:#fff; font-weight:800; font-size:1.1rem; font-family:inherit;
    cursor:pointer; transition:all 0.3s ease; margin-top:1rem;
    box-shadow:0 10px 30px rgba(59,130,246,0.3);
}
.apply-btn:hover { transform:translateY(-2px); box-shadow:0 20px 50px rgba(59,130,246,0.5); }

.alert-success { padding:1.25rem; border-radius:16px; background:rgba(34,197,94,0.1); border:1px solid rgba(34,197,94,0.2); color:#86efac; box-shadow:0 10px 30px rgba(0,0,0,0.1); margin-bottom:2rem; }

@media(max-width:1024px) {
    .careers-main-inner { grid-template-columns:1fr; gap:5rem; }
    .apply-form-wrap { max-width:800px; margin:0 auto; }
}
@media(max-width:600px) {
    .form-grid { grid-template-columns:1fr; }
    .form-field.full { grid-column:span 1; }
    .apply-form-wrap { padding:1.75rem; }
}

.gradient-text {
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="careers-hero">
    <div class="careers-hero-inner" data-aos="fade-up">
        <span style="font-size:0.8rem; font-weight:800; color:var(--blue); text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:1rem;">Join Cogear</span>
        <h1>Build the Future<br><span class="gradient-text">With Us.</span></h1>
        <p>We are looking for passionate, high-potential individuals ready to work on live AI and software projects. Real experience, no fake certificates.</p>
    </div>
</section>

<!-- Main -->
<section class="careers-main">
    <div class="careers-main-inner">
        
        <!-- Left: Programs -->
        <div class="programs-col" data-aos="fade-right">
            <h2 style="font-size:2rem;font-weight:900;margin-bottom:2.5rem; color: #fff;">Our Professional <span class="gradient-text">Programs</span></h2>
            
            <!-- Program 1 -->
            <div class="program-card">
                <div class="prog-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2v11z"/></svg>
                </div>
                <h3>Project-Based Internships</h3>
                <p>Gain high-impact experience by working on live projects for international partners. Join an agile team and master the full software lifecycle.</p>
                <ul class="prog-benefits">
                    <li class="prog-benefit"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> Live Client Production Work</li>
                    <li class="prog-benefit"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> Mentorship from Senior Leads</li>
                    <li class="prog-benefit"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> Direct Full-time Hiring Potential</li>
                </ul>
            </div>

            <!-- Program 2 -->
            <div class="program-card">
                <div class="prog-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <h3>Course-Based Learning</h3>
                <p>Intensive, industry-standard training programs focused on modern stacks — AI/LLM integration, React 19, and advanced Laravel 11 engineering.</p>
                <ul class="prog-benefits">
                    <li class="prog-benefit"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> Silicon Valley Standards</li>
                    <li class="prog-benefit"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> Robust Project Portfolio Building</li>
                    <li class="prog-benefit"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> Expert Technical Certification</li>
                </ul>
            </div>
        </div>

        <!-- Right: Apply -->
        <div data-aos="fade-left">
            <div class="apply-form-wrap">
                <div class="apply-header">
                    <h2>Apply Now</h2>
                    <p>Complete the form below and attach your resumé to start your journey.</p>
                </div>

                @if(session('success'))
                    <div class="alert-success">
                        <div style="display:flex;gap:0.75rem;align-items:center;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    </div>
                @endif

                <form action="{{ route('apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="form-label" for="apply-name">Full Name</label>
                            <input type="text" id="apply-name" name="name" class="form-input" placeholder="John Doe" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="apply-email">Email Address</label>
                            <input type="email" id="apply-email" name="email" class="form-input" placeholder="john@email.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="apply-phone">Phone</label>
                            <input type="text" id="apply-phone" name="phone" class="form-input" placeholder="+44 20 7123" value="{{ old('phone') }}" required>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="apply-interest">Interest</label>
                            <select id="apply-interest" name="field_of_interest" class="form-select" required>
                                <option value="" disabled selected>Select an area...</option>
                                <option value="Web Development" {{ old('field_of_interest') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                <option value="AI / LLMs" {{ old('field_of_interest') == 'AI / LLMs' ? 'selected' : '' }}>AI / LLMs</option>
                                <option value="Mobile Apps" {{ old('field_of_interest') == 'Mobile Apps' ? 'selected' : '' }}>Mobile Apps</option>
                                <option value="Full Stack" {{ old('field_of_interest') == 'Full Stack' ? 'selected' : '' }}>Full Stack</option>
                            </select>
                        </div>
                        
                        <div class="form-field full">
                            <label class="form-label" for="apply-cv">Resumé (PDF)</label>
                            <div class="file-upload-block" id="file-upload-container">
                                <input type="file" id="apply-cv" name="cv" accept=".pdf" required onchange="handleFileChange(this)">
                                <div class="upload-content">
                                    <div class="upload-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
                                    </div>
                                    <p class="upload-text" id="file-name-display">Click to upload PDF</p>
                                    <p class="upload-sub">Max file size 5MB</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-field full">
                            <label class="form-label" for="apply-message">Introduce Yourself</label>
                            <textarea id="apply-message" name="message" class="form-textarea" placeholder="Tell us why you want to join Cogear..." required>{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="apply-btn">
                        Submit Application
                    </button>
                    <p style="text-align:center;color:var(--text-dim);font-size:0.75rem;margin-top:1rem;">Your data is protected under GDPR guidelines.</p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function handleFileChange(input) {
    const display = document.getElementById('file-name-display');
    const container = document.getElementById('file-upload-container');
    
    // Robust check for file selection or cancellation
    if (input.files && input.files.length > 0) {
        display.textContent = input.files[0].name;
        container.style.borderColor = 'var(--blue)';
        container.style.backgroundColor = 'rgba(59, 130, 246, 0.05)';
    } else {
        // Reset if canceled or no file
        display.textContent = 'Click to upload PDF';
        container.style.borderColor = '';
        container.style.backgroundColor = '';
    }
}
</script>
@endpush
