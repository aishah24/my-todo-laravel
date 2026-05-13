<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pengurusan Tugasan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #e0e7ff, #ffffff);
            min-height: 100vh;
        }
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="antialiased">

    <nav class="p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center glass rounded-2xl px-8 py-4 shadow-sm">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <span class="text-xl font-extrabold text-gray-800 tracking-tight">TaskFlow</span>
            </div>

            @if (Route::has('login'))
    <div class="space-x-4">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-gray-600 font-semibold hover:text-blue-600 transition">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-gray-600 font-semibold hover:text-blue-600 transition">Log In</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                    Register
                </a>
            @endif
        @endauth
    </div>
@endif
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 pt-20 pb-20 text-center">
        <div class="inline-flex items-center space-x-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-full text-sm font-bold mb-8">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
            </span>
            <span>Kini dengan Dashboard Terkini</span>
        </div>

        <h1 class="text-6xl md:text-7xl font-extrabold text-gray-900 mb-6 leading-tight">
            Urus Tugasan Anda <br> <span class="text-blue-600 italic">Lebih Pantas.</span>
        </h1>
        
        <p class="text-xl text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed">
            Sistem pengurusan tugasan yang ringkas, cantik dan efisien untuk membantu anda kekal produktif setiap hari.
        </p>

        <div class="flex justify-center space-x-4">
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 transition shadow-xl shadow-blue-200">Mula Secara Percuma</a>
            <a href="#features" class="bg