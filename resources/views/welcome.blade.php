@extends('layouts.main')

@section('content')

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center my-24">
        <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">
            Welcome to Academian Jobs
        </h1>
        <p class="mt-4 text-xl text-gray-600">
            Find your dream academic position from thousands of opportunities worldwide
        </p>
        <div class="flex justify-center mt-12">
            <a href="{{ route('jobs.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-200 text-lg w-56 text-center">
                Find a Job
            </a>
        </div>
    </div>
    <div class="my-24 text-center">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Featured Job Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-xl font-semibold text-gray-800">Professor Positions</h3>
                <p class="mt-2 text-gray-600">Explore top professor roles at leading universities.</p>
                <a href="{{ route('jobs.index', ['category' => 'professor']) }}" class="mt-4 inline-block text-blue-600 hover:text-blue-700">Browse Jobs</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-xl font-semibold text-gray-800">Research Positions</h3>
                <p class="mt-2 text-gray-600">Find exciting research opportunities in various fields.</p>
                <a href="{{ route('jobs.index', ['category' => 'researcher']) }}" class="mt-4 inline-block text-blue-600 hover:text-blue-700">Browse Jobs</a>
            </div>
        </div>
    </div>

</div>

@endsection