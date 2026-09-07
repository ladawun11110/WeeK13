<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Blog Application')</title>

    <!-- Google Fonts & Tailwind CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', '"Sarabun"', 'sans-serif'],
                        thai: ['"Sarabun"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Sarabun', sans-serif;
            background-color: #f8fafc;
        }
    </style>
</head>

<body class="min-h-full flex flex-col bg-slate-50/50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">
    <div id="app" class="flex flex-col min-h-screen">
        <!-- Modern Glass Navbar -->
        <nav class="sticky top-0 z-50 backdrop-blur-md bg-white/80 border-b border-slate-200/80 transition-all">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Brand Logo -->
                    <div class="flex items-center gap-8">
                        <a class="flex items-center gap-2.5 group" href="{{ url('/home') }}">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-500 flex items-center justify-center text-white shadow-md shadow-indigo-500/25 group-hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <span class="font-extrabold text-lg text-slate-900 tracking-tight group-hover:text-indigo-600 transition-colors">
                                Blog<span class="text-indigo-600">Space</span>
                            </span>
                        </a>

                        @auth
                        <!-- Desktop Navigation Links -->
                        <div class="hidden md:flex items-center gap-1">
                            <a href="{{ route('home') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('home') ? 'text-indigo-600 bg-indigo-50/70' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/60' }}">
                                หน้าแรก
                            </a>
                            <a href="{{ route('blog') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('blog') ? 'text-indigo-600 bg-indigo-50/70' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/60' }}">
                                คลังบทความ
                            </a>
                            <a href="{{ route('blog2') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('blog2') ? 'text-indigo-600 bg-indigo-50/70' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/60' }}">
                                จัดการระบบ
                            </a>
                        </div>
                        @endauth
                    </div>

                    <!-- Right Navigation Side -->
                    <div class="flex items-center gap-3">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-slate-700 hover:text-indigo-600 transition">
                                    {{ __('เข้าสู่ระบบ') }}
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm hover:shadow-indigo-500/25 transition">
                                    {{ __('สมัครสมาชิก') }}
                                </a>
                            @endif
                        @else
                            <!-- Action Button: Write Article -->
                            <a href="{{ route('create') }}" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-2 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm shadow-indigo-500/20 hover:shadow-indigo-500/35 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>เขียนบทความ</span>
                            </a>

                            <!-- User Profile Dropdown -->
                            <div class="relative dropdown">
                                <button id="navbarDropdown" class="flex items-center gap-2.5 p-1.5 pl-3 rounded-full border border-slate-200 hover:border-slate-300 bg-white hover:bg-slate-50 transition" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-sm font-semibold text-slate-700 max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white text-xs font-bold ring-2 ring-white">
                                        {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end shadow-xl border border-slate-100 rounded-2xl py-2 mt-2 w-56 text-sm bg-white" aria-labelledby="navbarDropdown">
                                    <div class="px-4 py-2 border-b border-slate-100 mb-1">
                                        <p class="text-xs text-slate-400 font-medium uppercase tracking-wider">บัญชีผู้ใช้</p>
                                        <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                                    </div>

                                    <a class="flex items-center gap-2.5 px-4 py-2 text-slate-700 hover:bg-indigo-50/70 hover:text-indigo-600 transition font-medium" href="{{ route('create') }}">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        เขียนบทความใหม่
                                    </a>

                                    <a class="flex items-center gap-2.5 px-4 py-2 text-slate-700 hover:bg-indigo-50/70 hover:text-indigo-600 transition font-medium" href="{{ route('blog2') }}">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                        จัดการบทความทั้งหมด
                                    </a>

                                    <div class="border-t border-slate-100 my-1"></div>

                                    <a class="flex items-center gap-2.5 px-4 py-2 text-rose-600 hover:bg-rose-50 transition font-medium"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        ออกจากระบบ
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content Section -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Minimalist Footer -->
        <footer class="border-t border-slate-200/80 bg-white/50 backdrop-blur-sm py-6 mt-16">
            <div class="max-w-7xl mx-auto px-4 text-center text-xs font-medium text-slate-500">
                &copy; {{ date('Y') }} <span class="text-slate-800 font-semibold">BlogSpace</span>. All rights reserved. ออกแบบอย่างประณีตเพื่อการอ่านและเขียนที่ดีที่สุด
            </div>
        </footer>
    </div>
</body>

</html>