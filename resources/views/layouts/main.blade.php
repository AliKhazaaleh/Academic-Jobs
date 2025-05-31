<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Academian Jobs') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                            Academian Jobs
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 text-gray-700 hover:text-blue-600">
                            Home
                        </a>
                        <a href="{{ route('jobs.index') }}" class="inline-flex items-center px-1 pt-1 text-gray-700 hover:text-blue-600">
                            Find Jobs
                        </a>
                    </div>
                </div>

                <!-- Authentication Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-blue-600">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">Register</a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Home
                </a>
                <a href="{{ route('jobs.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Find Jobs
                </a>
                @auth
                    <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                            Log Out
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                            Register
                        </a>
                    @endif
                @endauth
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Jobs by Country -->
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

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.querySelector('.mobile-menu-button');
            const menu = document.querySelector('#mobile-menu');
            
            button.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
