<header class="sticky top-0 z-50 shadow-md bg-white">
        <nav class="border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="https://dinus.ac.id/" target="_blank" class="flex items-center">
                            <img src="{{asset('img/logodti.png')}}" class="h-10 lg:h-12" alt="UDINUS Logo" />
                        </a>
                        <div class="hidden md:block ml-4 border-l border-gray-300 h-8"></div>
                         
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-1">
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 transition nav-link {{ Request::is('/') ? 'active text-primary-700 font-semibold' : '' }}">
                            Beranda
                        </a>
                        
                        <div class="relative group">
                            <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 transition flex items-center nav-link {{ Request::is('profile/*') ? 'active text-primary-700 font-semibold' : '' }}">
                                Profil
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-10">
                                <div class="py-1">
                                    <a href="/profile/sambutan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('profile/sambutan') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Sambutan Ketua Progdi</a>
                                    <a href="/profile/visi_misi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('profile/visi_misi') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Visi dan Misi</a>
                                    <a href="/profile/tujuan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('profile/tujuan') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Tujuan dan Sasaran</a>
                                    <a href="/profile/fasilitas" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('profile/fasilitas') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Fasilitas</a>
                                    <a href="/profile/akreditasi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('profile/akreditasi') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Akreditasi</a>
                                    <a href="/profile/mitra" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('profile/mitra') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Mitra</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="relative group">
                            <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 transition flex items-center nav-link {{ Request::is('akademik/*') ? 'active text-primary-700 font-semibold' : '' }}">
                                Akademik
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-10">
                                <div class="py-1">
                                    <a href="/akademik/kurikulum" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('akademik/kurikulum') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Kurikulum</a>
                                    <a href="/akademik/suasana-akademik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('akademik/suasana-akademik') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Suasana Akademik</a>
                                    <a href="/akademik/dosen" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('akademik/dosen') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Dosen</a>
                                    <a href="/sistem-monitoring-mahasiswa" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('sistem-monitoring-mahasiswa') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Sistem Monitoring</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="relative group">
                            <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 transition flex items-center nav-link {{ Request::is('publikasi/*') ? 'active text-primary-700 font-semibold' : '' }}">
                                Publikasi
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-10">
                                <div class="py-1">
                                    <a href="/publikasi/berita" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('publikasi/berita') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Berita</a>
                                    <a href="/agenda" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('agenda') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Agenda</a>
                                    <a href="/galeri" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('galeri') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Galeri</a>
                                    <a href="/publikasi/karya" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('publikasi/karya') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Karya</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="relative group">
                            <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 transition flex items-center nav-link {{ Request::is('kemahasiswaan/*') ? 'active text-primary-700 font-semibold' : '' }}">
                                Kemahasiswaan
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-10">
                                <div class="py-1">
                                    <a href="/himpunan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('himpunan') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">HM-DTI</a>
                                    <a href="/kemahasiswaan/alumni" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Request::is('kemahasiswaan/alumni') ? 'font-medium text-primary-700 bg-blue-50' : '' }}">Alumni</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right buttons -->
                    <div class="flex items-center">
                        <!-- Search button -->
                        <button class="p-2 rounded-full text-gray-500 hover:text-primary-600 hover:bg-gray-100 mr-2">
                            <i class="fas fa-search"></i>
                        </button>
                        
                        @guest('user')
                        <a href="{{ route('login') }}" 
                        class="hidden md:inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700">
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
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
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
                        
                        <!-- Mobile menu button -->
                        <button class="lg:hidden ml-2 p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state -->
            <div class="lg:hidden hidden mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                    <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 {{ Request::is('/') ? 'text-primary-700 bg-blue-50' : '' }}">Beranda</a>
                    
                    <div class="relative">
                        <button class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 flex items-center justify-between {{ Request::is('profile/*') ? 'text-primary-700 bg-blue-50' : '' }}">
                            Profil
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="pl-4 mt-1 space-y-1">
                            <a href="/profile/sambutan" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 {{ Request::is('profile/sambutan') ? 'text-primary-700 bg-blue-50' : '' }}">Sambutan Ketua Progdi</a>
                            <a href="/profile/visi_misi" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 {{ Request::is('profile/visi_misi') ? 'text-primary-700 bg-blue-50' : '' }}">Visi dan Misi</a>
                            <a href="/profile/tujuan" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 {{ Request::is('profile/tujuan') ? 'text-primary-700 bg-blue-50' : '' }}">Tujuan dan Sasaran</a>
                            <a href="/profile/fasilitas" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 {{ Request::is('profile/fasilitas') ? 'text-primary-700 bg-blue-50' : '' }}">Fasilitas</a>
                            <a href="/profile/akreditasi" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 {{ Request::is('profile/akreditasi') ? 'text-primary-700 bg-blue-50' : '' }}">Akreditasi</a>
                            <a href="/profile/mitra" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-100 {{ Request::is('profile/mitra') ? 'text-primary-700 bg-blue-50' : '' }}">Mitra</a>
                        </div>
                    </div>
                    
                    <!-- Other mobile menu items would follow the same pattern -->
                    
                    <div class="pt-4 pb-2">
                        <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700">
                            <i class="fas fa-sign-in-alt mr-2"></i> Log in
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    