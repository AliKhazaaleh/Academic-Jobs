@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Filters Column (1/3) -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-b from-blue-50 to-white p-6 rounded-lg shadow-md border border-blue-100">
                <h2 class="text-2xl font-semibold text-blue-800 mb-6 text-center">Find Your Academic Position</h2>
                <form class="space-y-6">
                    <div class="space-y-6">
                        <!-- Category Filter -->
                        <div class="filter-group relative">
                            <label for="category" class="block text-lg font-semibold text-blue-900 mb-2">Category</label>
                            <select id="category" name="category" class="mt-1 block w-full rounded-md border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white hover:border-blue-300" onchange="addFilterLabel(this, 'selected-categories')">
                                <option value="">Select Category</option>
                                <option value="professor">Professor</option>
                                <option value="associate">Associate Professor</option>
                                <option value="assistant">Assistant Professor</option>
                                <option value="lecturer">Lecturer</option>
                                <option value="researcher">Researcher</option>
                                <option value="postdoc">Postdoctoral Fellow</option>
                            </select>
                            <div id="selected-categories" class="flex flex-wrap gap-2 mt-4">
                                <!-- Selected categories will appear here -->
                            </div>                        </div>

                        <div class="border-b border-gray-200 my-6"></div>

                        <!-- Country Filter -->
                        <div class="filter-group relative">
                            <label for="country" class="block text-lg font-semibold text-blue-900 mb-2">Country</label>
                            <select id="country" name="country" class="mt-1 block w-full rounded-md border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white hover:border-blue-300" onchange="addFilterLabel(this, 'selected-countries')">
                                <option value="">Select Country</option>
                                <option value="usa">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="australia">Australia</option>
                                <option value="canada">Canada</option>
                                <option value="germany">Germany</option>
                                <option value="france">France</option>
                                <option value="china">China</option>
                                <option value="japan">Japan</option>
                            </select>
                            <div id="selected-countries" class="flex flex-wrap gap-2 mt-4">
                                <!-- Selected countries will appear here -->
                            </div>                        </div>

                        <div class="border-b border-gray-200 my-6"></div>

                        <!-- City Filter -->
                        <div class="filter-group relative">
                            <label for="city" class="block text-lg font-semibold text-blue-900 mb-2">City</label>
                            <select id="city" name="city" class="mt-1 block w-full rounded-md border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white hover:border-blue-300" onchange="addFilterLabel(this, 'selected-cities')">
                                <option value="">Select City</option>
                                <option value="newyork">New York</option>
                                <option value="london">London</option>
                                <option value="sydney">Sydney</option>
                                <option value="toronto">Toronto</option>
                                <option value="berlin">Berlin</option>
                                <option value="paris">Paris</option>
                            </select>
                            <div id="selected-cities" class="flex flex-wrap gap-2 mt-4">
                                <!-- Selected cities will appear here -->
                            </div>                        </div>

                        <div class="border-b border-gray-200 my-6"></div>

                        <!-- Specialization Filter -->
                        <div class="filter-group relative">
                            <label for="specialization" class="block text-lg font-semibold text-blue-900 mb-2">Specialization</label>
                            <select id="specialization" name="specialization" class="mt-1 block w-full rounded-md border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white hover:border-blue-300" onchange="addFilterLabel(this, 'selected-specializations')">
                                <option value="">Select Specialization</option>
                                <option value="computer_science">Computer Science</option>
                                <option value="engineering">Engineering</option>
                                <option value="physics">Physics</option>
                                <option value="mathematics">Mathematics</option>
                                <option value="biology">Biology</option>
                                <option value="chemistry">Chemistry</option>
                                <option value="business">Business</option>
                                <option value="humanities">Humanities</option>
                                <option value="social_sciences">Social Sciences</option>
                                <option value="medicine">Medicine</option>
                            </select>
                            <div id="selected-specializations" class="flex flex-wrap gap-2 mt-4">
                                <!-- Selected specializations will appear here -->
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 w-full">
                            Search Jobs
                        </button>
                    </div>
                </form>
            </div>

            <script>
                function addFilterLabel(select, containerId) {
                    const value = select.value;
                    const text = select.options[select.selectedIndex].text;
                    if (!value) return;
                    
                    const container = document.getElementById(containerId);
                    // Prevent duplicate labels
                    if ([...container.children].some(child => child.dataset.value === value)) return;
                    
                    // Create label
                    const label = document.createElement('span');
                    label.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mr-2 mb-2';
                    label.dataset.value = value;
                    label.innerHTML = `${text} <button type="button" onclick="this.parentElement.remove()" class="ml-2 text-blue-600 hover:text-blue-800 focus:outline-none">&times;</button>`;
                    container.appendChild(label);
                    select.value = '';
                }
            </script>
        </div>

        <!-- Jobs List Column (2/3) -->
        <div class="lg:col-span-2">
            <div class="space-y-6">
                <!-- Sample Job Card -->
                <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition-shadow duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 hover:text-blue-600">
                                <a href="#">Assistant Professor of Computer Science</a>
                            </h2>
                            <p class="text-lg text-gray-600 mt-1">Stanford University</p>
                            <div class="mt-2 space-y-2">
                                <p class="text-gray-600"><span class="font-medium">Location:</span> Stanford, California</p>
                                <p class="text-gray-600"><span class="font-medium">Salary:</span> Competitive</p>
                                <p class="text-gray-600"><span class="font-medium">Type:</span> Full-time</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                New
                            </span>
                            <p class="text-sm text-gray-500 mt-2">Posted 2 days ago</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600">Join our world-class faculty in the Computer Science department. We're looking for innovative researchers and educators in AI, Machine Learning, and Software Engineering.</p>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                Computer Science
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                Faculty
                            </span>
                        </div>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                            Apply Now
                        </a>
                    </div>
                </div>

                <!-- Another Sample Job Card -->
                <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition-shadow duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 hover:text-blue-600">
                                <a href="#">Associate Professor of Psychology</a>
                            </h2>
                            <p class="text-lg text-gray-600 mt-1">University of Oxford</p>
                            <div class="mt-2 space-y-2">
                                <p class="text-gray-600"><span class="font-medium">Location:</span> Oxford, UK</p>
                                <p class="text-gray-600"><span class="font-medium">Salary:</span> £65,000 - £80,000</p>
                                <p class="text-gray-600"><span class="font-medium">Type:</span> Full-time</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-sm text-gray-500">Posted 5 days ago</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600">Seeking an experienced academic to join our Psychology department, specializing in cognitive psychology and neuroscience research.</p>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                Psychology
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                Faculty
                            </span>
                        </div>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                            Apply Now
                        </a>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    <nav class="flex justify-center">
                        <ul class="flex space-x-2">
                            <li>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    Previous
                                </a>
                            </li>
                            <li>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                    1
                                </a>
                            </li>
                            <li>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    2
                                </a>
                            </li>
                            <li>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
