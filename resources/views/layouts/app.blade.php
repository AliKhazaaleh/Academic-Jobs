<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Academian Jobs') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-3xl font-bold text-blue-600">
                            Academian Jobs
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 text-lg text-gray-700 hover:text-blue-600">
                            Home
                        </a>
                        <a href="{{ route('jobs.index') }}" class="inline-flex items-center px-1 pt-1 text-lg text-gray-700 hover:text-blue-600">
                            Jobs
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Home
                </a>
                <a href="{{ route('jobs.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Find Jobs
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">                <!-- Jobs by Country -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Jobs by Country</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">USA Academic Jobs</a></li>
                        <li><a href="#" class="hover:text-blue-400">UK Academic Jobs</a></li>
                        <li><a href="#" class="hover:text-blue-400">Australia Academic Jobs</a></li>
                        <li><a href="#" class="hover:text-blue-400">Canada Academic Jobs</a></li>
                    </ul>
                </div>

                <!-- Jobs by University -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Jobs by University</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Harvard University</a></li>
                        <li><a href="#" class="hover:text-blue-400">Oxford University</a></li>
                        <li><a href="#" class="hover:text-blue-400">Stanford University</a></li>
                        <li><a href="#" class="hover:text-blue-400">MIT</a></li>
                    </ul>
                </div>

                <!-- About -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">About</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                        <li><a href="#" class="hover:text-blue-400">Contact</a></li>
                        <li><a href="#" class="hover:text-blue-400">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-400">Terms of Service</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-700 text-center">
                <p class="text-sm">© {{ date('Y') }} Academian Jobs. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
