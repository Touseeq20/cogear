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
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            scroll-behavior: smooth;
        }
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .dark-glass {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 transition-all duration-300 glass" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <svg class="h-10 w-10 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M12 15v4"></path>
                            <path d="M9.4 10.5l-3.4-2"></path>
                            <path d="M14.6 10.5l3.4-2"></path>
                        </svg>
                        <span class="ml-3 text-3xl font-bold tracking-tight text-slate-900">COGEAR<span class="text-blue-600">.</span></span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium hover:text-blue-600 transition">Home</a>
                    <a href="{{ route('services') }}" class="text-sm font-medium hover:text-blue-600 transition">Services</a>
                    <a href="{{ route('portfolio') }}" class="text-sm font-medium hover:text-blue-600 transition">Portfolio</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium hover:text-blue-600 transition">About</a>
                    <a href="{{ route('careers') }}" class="text-sm font-medium hover:text-blue-600 transition">Careers</a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 transition">
                        Contact Us
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button type="button" class="text-slate-600 hover:text-slate-900 focus:outline-none" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="hidden md:hidden absolute top-20 left-0 w-full glass p-6 space-y-4" id="mobile-menu">
            <a href="{{ route('home') }}" class="block text-lg font-medium">Home</a>
            <a href="{{ route('services') }}" class="block text-lg font-medium">Services</a>
            <a href="{{ route('portfolio') }}" class="block text-lg font-medium">Portfolio</a>
            <a href="{{ route('about') }}" class="block text-lg font-medium">About</a>
            <a href="{{ route('careers') }}" class="block text-lg font-medium">Careers</a>
            <a href="{{ route('contact') }}" class="block text-lg font-medium text-blue-600">Contact Us</a>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center mb-6">
                        <svg class="h-10 w-10 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M12 15v4"></path>
                            <path d="M9.4 10.5l-3.4-2"></path>
                            <path d="M14.6 10.5l3.4-2"></path>
                        </svg>
                        <span class="ml-3 text-3xl font-bold tracking-tight text-white uppercase">COGEAR<span class="text-blue-500">.</span></span>
                    </a>
                    <p class="text-slate-400 max-w-sm mb-8">
                        Innovating the future with AI and cutting-edge software solutions. Committed to excellence and international standards.
                    </p>
                    <div class="flex space-x-4">
                        <!-- Social Icons Placeholder -->
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Explore</h4>
                    <ul class="space-y-4 text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Home</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-blue-400 transition">Services</a></li>
                        <li><a href="{{ route('portfolio') }}" class="hover:text-blue-400 transition">Portfolio</a></li>
                        <li><a href="{{ route('careers') }}" class="hover:text-blue-400 transition">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Contact</h4>
                    <ul class="space-y-4 text-slate-400">
                        <li>24, SOL House, Dark Lane</li>
                        <li>Manchester M12 6FA</li>
                        <li>mtouseeq20@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="mt-20 pt-10 border-t border-slate-800 text-center text-slate-500 text-sm">
                <p>&copy; {{ date('Y') }} Cogear Agency. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/923301540904" target="_blank" class="fixed bottom-8 right-8 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all z-50">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>

    <script>
        const nav = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                nav.classList.add('shadow-md');
                nav.style.height = '70px';
            } else {
                nav.classList.remove('shadow-md');
                nav.style.height = '80px';
            }
        });

        const menuBtn = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
