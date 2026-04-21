<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Cogear - AI & Software Agency')</title>
    <meta name="description" content="@yield('meta_description', 'Cogear is a premium software agency specializing in AI, LLMs, and modern web applications.')">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    <!-- Navigation -->
    <nav class="fixed inset-x-0 top-0 z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-3 md:mt-5 h-16 md:h-20 px-5 md:px-7 rounded-2xl glass flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <svg class="h-10 w-10 logo-mark text-cyan-300" viewBox="0 0 64 64" fill="none">
                            <defs>
                                <linearGradient id="cogearLogoGradient" x1="4" y1="4" x2="60" y2="60" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#22D3EE"/>
                                    <stop offset="1" stop-color="#6366F1"/>
                                </linearGradient>
                            </defs>
                            <path d="M32 6L52 17.5V40.5L32 52L12 40.5V17.5L32 6Z" stroke="url(#cogearLogoGradient)" stroke-width="3"/>
                            <circle cx="32" cy="30" r="8" stroke="url(#cogearLogoGradient)" stroke-width="3"/>
                            <path d="M24 42L32 34L40 42" stroke="url(#cogearLogoGradient)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="ml-3 text-2xl md:text-3xl font-semibold tracking-tight text-white">COGEAR<span class="text-cyan-300">.</span></span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}#home" class="nav-link">Home</a>
                    <a href="{{ route('home') }}#about-us" class="nav-link">About Us</a>
                    <a href="{{ route('home') }}#services" class="nav-link">Services</a>
                    <a href="{{ route('home') }}#projects" class="nav-link">Projects</a>
                    <a href="{{ route('home') }}#target-market" class="nav-link">Target Market</a>
                    <a href="{{ route('home') }}#contact" class="btn-primary text-sm px-5 py-2.5">
                        Contact Us
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button type="button" class="text-white/90 hover:text-cyan-300 focus:outline-none" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="hidden md:hidden mt-2 rounded-2xl glass p-6 space-y-4" id="mobile-menu">
            <a href="{{ route('home') }}#home" class="block text-lg text-slate-100">Home</a>
            <a href="{{ route('home') }}#about-us" class="block text-lg text-slate-100">About Us</a>
            <a href="{{ route('home') }}#services" class="block text-lg text-slate-100">Services</a>
            <a href="{{ route('home') }}#projects" class="block text-lg text-slate-100">Projects</a>
            <a href="{{ route('home') }}#target-market" class="block text-lg text-slate-100">Target Market</a>
            <a href="{{ route('home') }}#contact" class="block text-lg text-cyan-300">Contact Us</a>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="pt-20 pb-10 border-t border-white/10 bg-slate-950/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center mb-6">
                        <svg class="h-10 w-10 logo-mark text-cyan-300" viewBox="0 0 64 64" fill="none">
                            <path d="M32 6L52 17.5V40.5L32 52L12 40.5V17.5L32 6Z" stroke="currentColor" stroke-width="3"/>
                            <circle cx="32" cy="30" r="8" stroke="currentColor" stroke-width="3"/>
                            <path d="M24 42L32 34L40 42" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="ml-3 text-3xl font-semibold tracking-tight text-white uppercase">COGEAR<span class="text-cyan-300">.</span></span>
                    </a>
                    <p class="text-slate-300 max-w-sm mb-8">
                        Innovating the future with AI and cutting-edge software solutions. Committed to excellence and international standards.
                    </p>
                    <div class="flex space-x-4">
                        <a class="social-icon" href="#" aria-label="LinkedIn">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.94 8.5H3.56V20h3.38V8.5zm.22-3.55A1.95 1.95 0 1 0 3.26 5a1.95 1.95 0 0 0 3.9-.05zM20.44 13.44c0-3.38-1.8-4.95-4.2-4.95a3.65 3.65 0 0 0-3.3 1.82h-.05V8.5H9.52V20h3.38v-6.02c0-1.58.3-3.11 2.25-3.11 1.92 0 1.95 1.79 1.95 3.21V20h3.34l.01-6.56z"/></svg>
                        </a>
                        <a class="social-icon" href="#" aria-label="Facebook">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 9H16V6h-2.5C10.74 6 9 7.74 9 10.5V13H7v3h2v5h3v-5h2.2l.4-3H12v-2.5c0-.83.67-1.5 1.5-1.5z"/></svg>
                        </a>
                        <a class="social-icon" href="#" aria-label="Instagram">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg>
                        </a>
                        <a class="social-icon" href="#" aria-label="X">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M18.9 3h2.9l-6.33 7.24L23 21h-5.88l-4.6-6.12L7.1 21H4.2l6.77-7.74L1 3h6.03l4.16 5.55L18.9 3z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Explore</h4>
                    <ul class="space-y-4 text-slate-300">
                        <li><a href="{{ route('home') }}#home" class="hover:text-cyan-300 transition">Home</a></li>
                        <li><a href="{{ route('home') }}#services" class="hover:text-cyan-300 transition">Services</a></li>
                        <li><a href="{{ route('home') }}#projects" class="hover:text-cyan-300 transition">Projects</a></li>
                        <li><a href="{{ route('home') }}#target-market" class="hover:text-cyan-300 transition">Target Market</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Contact</h4>
                    <ul class="space-y-4 text-slate-300">
                        <li>24, SOL House, Dark Lane</li>
                        <li>Manchester M12 6FA</li>
                        <li>mtouseeq20@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="mt-20 pt-10 border-t border-white/10 text-center text-slate-400 text-sm">
                <p>&copy; {{ date('Y') }} Cogear Agency. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
