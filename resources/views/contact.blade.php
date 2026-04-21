@extends('layouts.main')
@section('title', 'Contact Cogear – Get a Free Project Consultation')
@section('meta_description', 'Contact Cogear AI & Software Agency. Send us a message, find us on the map, or connect via social media.')

@push('styles')
<style>
.contact-hero { padding: 10rem 0 5rem; background: var(--bg-primary); text-align: center; }
.contact-hero h1 { font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; margin: 1.5rem 0; }
.contact-main { padding: 5rem 0 7rem; background: var(--bg-primary); }
.contact-main-inner { max-width: 1320px; margin: 0 auto; padding: 0 2rem; display: grid; grid-template-columns: 1fr 1.4fr; gap: 3rem; }
.contact-info-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: 20px; padding: 1.75rem; display: flex; gap: 1rem; margin-bottom: 1.5rem; }
.contact-form { background: var(--bg-card); border: 1px solid var(--border); border-radius: 24px; padding: 2.5rem; }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
.form-field.full { grid-column: span 2; }
.form-input, .form-textarea { background: rgba(255,255,255,0.04); border: 1px solid var(--border); border-radius: 12px; padding: 0.85rem 1rem; color: var(--text-primary); width: 100%; outline: none; }
.form-input:focus, .form-textarea:focus { border-color: var(--blue); }
.form-submit { width: 100%; padding: 1rem; border-radius: 12px; background: linear-gradient(135deg, var(--blue), var(--violet)); color: #fff; font-weight: 700; cursor: pointer; border: none; margin-top: 1rem; }
@media(max-width: 900px) { .contact-main-inner { grid-template-columns:1fr; } }
</style>
@endpush

@section('content')
<section class="contact-hero">
    <div class="reveal">
        <span class="section-tag">Get In Touch</span>
        <h1>Let's Build Something<br><span class="gradient-text">Extraordinary</span></h1>
    </div>
</section>

<section class="contact-main">
    <div class="contact-main-inner">
        <div class="reveal-left">
            <div class="contact-info-card">
                <div><strong>Email</strong><br><a href="mailto:mtouseeq20@gmail.com">mtouseeq20@gmail.com</a></div>
            </div>
            <div class="contact-info-card">
                <div><strong>WhatsApp</strong><br><a href="https://wa.me/923301540904">+92 330 154 0904</a></div>
            </div>
            <div style="height:300px;border-radius:20px;overflow:hidden;border:1px solid var(--border);">
                <iframe src="https://maps.google.com/maps?q=Manchester+UK&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;filter:invert(0.9) hue-rotate(180deg);" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="reveal-right">
            <div class="contact-form">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-field"><input type="text" name="name" class="form-input" placeholder="Name" required></div>
                        <div class="form-field"><input type="email" name="email" class="form-input" placeholder="Email" required></div>
                        <div class="form-field full"><input type="text" name="subject" class="form-input" placeholder="Subject" required></div>
                        <div class="form-field full"><textarea name="message" class="form-textarea" rows="5" placeholder="Message" required></textarea></div>
                    </div>
                    <button type="submit" class="form-submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
