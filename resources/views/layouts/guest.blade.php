<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Login</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=be-vietnam-pro:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#0a192f] font-sans antialiased text-gray-300">

        <div class="min-h-screen flex">

            <div class="flex-1 flex flex-col justify-center items-center p-6 lg:px-8">
                <div class="w-full sm:max-w-md">
                    <div class="text-center mb-8">
                        <a href="{{ route('home') }}">
                            <h1 class="text-3xl font-bold text-indigo-400">MyPortfolio - Admin</h1>
                        </a>
                    </div>

                    <div class="w-full px-6 py-8 bg-[#112240] shadow-2xl shadow-black/50 overflow-hidden sm:rounded-lg">
                        {{ $slot }} </div>
                </div>
            </div>

            <div class="hidden lg:flex flex-1 items-center justify-center p-12 bg-gradient-to-br from-indigo-800 to-purple-900 relative overflow-hidden">
                <div class="text-center z-10">
                    <h2 class="text-4xl font-bold text-white" data-aos="fade-up">
                        Selamat Datang Kembali
                    </h2>
                    <p class="mt-4 text-lg text-indigo-200" data-aos="fade-up" data-aos-delay="100">
                        Kelola portofolio Anda dengan mudah melalui panel ini.
                    </p>
                </div>
                <div class="absolute inset-0 opacity-10 z-0">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="a" patternUnits="userSpaceOnUse" width="40" height="40" patternTransform="scale(2) rotate(45)"><path d="M0 10h40M10 0v40" stroke="white" stroke-width="0.5"/></pattern></defs><rect width="100%" height="100%" fill="url(#a)"/></svg>
                </div>
            </div>

        </div>
    </body>
</html>
