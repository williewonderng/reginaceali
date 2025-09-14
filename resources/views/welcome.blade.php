<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regina Caeli Catholic Chaplaincy</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-50">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

          <!-- Logo / Title -->
            <div class="flex items-center space-x-3">
                <!-- Virgin Mary Image -->
                <img src="{{ asset('images/mary.jpeg') }}" alt="Virgin Mary" class="h-10 w-10 object-contain">

                <!-- Site Name -->
                <div class="text-xl font-bold text-gray-900 tracking-wider uppercase">
                    Regina Caeli Catholic Chaplaincy
                    <span class="block text-xs font-medium text-gray-500 tracking-wide">Federal University Lokoja</span>
                </div>
            </div>


            <!-- Nav Links -->
            <nav class="hidden md:flex space-x-8 text-sm font-medium text-gray-700 items-center">



                <!-- Laravel Breeze Auth Links -->
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="ml-4 px-4 py-2 rounded-md bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="ml-4 text-gray-700 hover:text-emerald-600">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 px-4 py-2 rounded-md bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

   <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center text-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1600&q=80');">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/50"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-2xl mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight">
                Regina Caeli Catholic Chaplaincy
            </h1>
            <p class="mt-4 text-lg text-gray-200">
                A home of faith, fellowship, and spiritual growth in Christ.
            </p>

            <div class="mt-6 flex flex-col sm:flex-row gap-4 justify-center">
                <!-- Register Button -->
                <a href="{{ route('register') }}"
                class="inline-block px-8 py-3 rounded-full bg-emerald-600 text-white font-semibold hover:bg-emerald-700 shadow-lg transition">
                Register
                </a>

                <!-- Login Button -->
                <a href="{{ route('login') }}"
                class="inline-block px-8 py-3 rounded-full border border-white text-white font-semibold hover:bg-white hover:text-emerald-700 transition">
                Log in
                </a>
            </div>
        </div>
    </section>


</body>
</html>
