<header class="sticky top-0 z-50 shadow-md bg-white">
    <nav class="border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="https://dti.dinus.ac.id/" target="_blank" class="flex items-center">
                        <img src="{{asset('img/logodti.png')}}" class="h-10 lg:h-12" alt="UDINUS Logo" />
                    </a>
                    <div class="hidden md:block ml-4 border-l border-gray-300 h-8"></div>
                </div>
               
                <!-- Right buttons -->
                <div class="flex items-center">
                    @guest('user')
                    <!-- Desktop Login Button -->
                    <a href="{{ route('login') }}" 
                    class="hidden md:inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700">
                        <i class="fas fa-sign-in-alt mr-2"></i> Log in
                    </a>
                    
                    <!-- Mobile Login Button - Visible only on mobile -->
                    <a href="{{ route('login') }}" 
                    class="md:hidden inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700">
                        <i class="fas fa-sign-in-alt mr-2"></i> Log in
                    </a>
                    @endguest

                    <!-- Kalau sudah login -->
                    @auth('user')
                    <div class="relative" x-data="{ open: false }">
                        <button x-on:click="open = !open"
                            class="flex items-center text-sm text-gray-700 hover:text-primary-600 transition">
                            
                            <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center font-semibold mr-2">
                                {{ substr(Auth::guard('user')->user()->name, 0, 1) }}
                            </div>
                            <span class="hidden md:block">{{ Auth::guard('user')->user()->name }}</span>
                            
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-900">{{ Auth::guard('user')->user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::guard('user')->user()->email }}</p>
                                </div>
                                <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user-circle mr-2 text-gray-500"></i> Profile
                                </a>
                                <a href="{{ route('history') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-history mr-2 text-gray-500"></i> History
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form action="{{ route('logout') }}" method="GET">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>

<style>
[x-cloak] { display: none !important; }
</style>