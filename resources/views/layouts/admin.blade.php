<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cogear Admin') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased admin-shell text-slate-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-72 bg-slate-950/80 border-r border-white/10 text-white hidden md:block flex-shrink-0 backdrop-blur-xl">
            <div class="p-6">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold tracking-tight">
                    COGEAR <span class="text-cyan-300">CMS</span>
                </a>
            </div>
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-500/20 border border-cyan-300/30 text-cyan-200' : 'hover:bg-white/5 text-slate-200' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.projects.*') ? 'bg-cyan-500/20 border border-cyan-300/30 text-cyan-200' : 'hover:bg-white/5 text-slate-200' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    Projects
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.services.*') ? 'bg-cyan-500/20 border border-cyan-300/30 text-cyan-200' : 'hover:bg-white/5 text-slate-200' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Services
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.testimonials.*') ? 'bg-cyan-500/20 border border-cyan-300/30 text-cyan-200' : 'hover:bg-white/5 text-slate-200' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    Testimonials
                </a>
                <a href="{{ route('admin.applications.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.applications.*') ? 'bg-cyan-500/20 border border-cyan-300/30 text-cyan-200' : 'hover:bg-white/5 text-slate-200' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Applications
                </a>
                <div class="pt-10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-3 rounded-xl hover:bg-red-500/20 border border-transparent hover:border-red-400/30 transition text-slate-300 hover:text-red-200">
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="border-b border-white/10 bg-slate-950/50 backdrop-blur-xl p-6 flex justify-between items-center px-6">
                <h2 class="text-xl font-semibold text-white">@yield('header', 'Admin Dashboard')</h2>
                <div class="flex items-center">
                    <span class="text-sm text-slate-300 mr-4">{{ auth()->user()->name }}</span>
                    <div class="h-10 w-10 bg-cyan-400/20 rounded-full border border-cyan-300/30 flex items-center justify-center text-cyan-200 font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-500/15 border border-emerald-400/20 text-emerald-200 rounded-xl font-medium">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-500/15 border border-red-400/20 text-red-200 rounded-xl font-medium">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
