<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Your App</title> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body>
    @if (Auth::check())
        <div x-data="{ isOpen: false }">
            <!-- Navbar -->
            <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="flex justify-between h-16">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center object-cover">
                            <a href="/index" class="flex items-center">
                                <!-- Ganti dengan path logo Anda -->
                                <img class="object-cover " src="/image/logoGW.png" alt="Logo" width="75px" height="75px">
                            </a>
                        </div>
    
                        <!-- Hamburger Menu -->
                        <div class="flex items-center">
                            <button 
                                @click= "isOpen = !isOpen"
                                class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none"
                            >
                                <svg 
                                    class="h-6 w-6" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path 
                                        x-show="!isOpen"
                                        stroke-linecap="round" 
                                        stroke-linejoin="round" 
                                        stroke-width="2" 
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path 
                                        x-show="isOpen"
                                        stroke-linecap="round" 
                                        stroke-linejoin="round" 
                                        stroke-width="2" 
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
    
            <!-- Profile Sidebar -->
            <div
                x-show="isOpen"
                @click.away="isOpen = false"
                class="fixed top-1 right-0 w-72 h-fit bg-white shadow-lg transform transition-transform duration-300 ease-in-out z-auto"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform ease-in duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
            >
                <div class="p-6 mt-10">
                    <!-- Profile Section -->
                    <div class="flex items-center mb-6 pt-10">
                        {{-- <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden">
                            <!-- Ganti dengan gambar profile user -->
                            <img 
                                src="{{ Auth::user()->profile_photo ?? asset('images/default-avatar.png') }}" 
                                alt="Profile Photo"
                                class="w-full h-full object-cover"
                            >
                        </div> --}}
                        <div class="ml-4">
                            <h2 class="text-lg font-semibold text-gray-800">{{ Auth::user()->username }}</h2>
                            <p class="text-sm text-gray-600">{{ Auth::user()->email  }}</p>
                        </div>
                    </div>
    
                    <!-- Navigation Menu -->
                    <nav class="space-y-1">
                        {{-- @foreach ($users as $user) --}}
                            <a href="{{ route('user.profile', Auth::user()->id) }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-md">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Edit Profile
                            </a>
                        {{-- @endforeach --}}
    
                        
    
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-md">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    @endif
    
            <!-- Main Content -->


    <main class="">
        <div>
            @yield('section')
        </div>
    </main>

    <!-- Alpine.js -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>