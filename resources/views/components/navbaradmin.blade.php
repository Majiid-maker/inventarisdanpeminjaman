<div class="sidebar fixed top-0 left-0 h-screen bg-dark text-white overflow-y-auto">
    <!-- Logo -->
    <div class="p-5 border-b border-gray-700 flex items-center justify-between">
        <a href="landing.html" class="text-xl font-bold flex items-center">
            <i class="fas fa-hotel mr-2 text-accent"></i>
            <span class="whitespace-nowrap">Data Mining</span>
        </a>
        <button id="closeSidebar" class="md:hidden">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="p-4">
        <div class="mb-6">
            <p class="text-gray-400 text-xs uppercase mb-3">Menu Utama</p>
            <ul>
                <li class="mb-2">
                    <a href="{{ route('super.dashboard') }}" class="flex items-center p-3 rounded-lg transition {{ Request::is('super/home*') ? 'bg-primary text-white' : 'hover:bg-gray-800' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('super.user') }}" class="flex items-center p-3 rounded-lg transition {{ Request::is('super/user*') ? 'bg-primary text-white' : 'hover:bg-gray-800' }}">
                        <i class="fas fa-users mr-3"></i>
                        <span>User Management</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('super.rooms') }}" class="flex items-center p-3 rounded-lg transition {{ Request::is('super/rooms*') ? 'bg-primary text-white' : 'hover:bg-gray-800' }}">
                        <i class="fas fa-bed mr-3"></i>
                        <span>Rooms Management</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('super.bookings') }}" class="flex items-center p-3 rounded-lg transition {{ Request::is('super/bookings*') ? 'bg-primary text-white' : 'hover:bg-gray-800' }}">
                        <i class="fas fa-calendar-check mr-3"></i>
                        <span>Booking Management</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('super.inventaris') }}" class="flex items-center p-3 rounded-lg transition {{ Request::is('super/inventaris*') ? 'bg-primary text-white' : 'hover:bg-gray-800' }}">
                        <i class="fas fa-boxes mr-3"></i>
                        <span>Inventory Management</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('super.logs') }}" class="flex items-center p-3 rounded-lg transition {{ Request::is('super/logs*') ? 'bg-primary text-white' : 'hover:bg-gray-800' }}">
                        <i class="fas fa-clipboard-list mr-3"></i>
                        <span>Inventory Logs</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <p class="text-gray-400 text-xs uppercase mb-3">Pengaturan</p>
            <ul>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 transition">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 transition">
                        <i class="fas fa-question-circle mr-3"></i>
                        <span>Help & Support</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Logout Button -->
    <div class="absolute bottom-0 w-full p-4 border-t border-gray-700">
        <a href="{{ route('logout') }}" class="flex items-center p-3 rounded-lg text-red-400 hover:bg-red-400 hover:text-white transition">
            <i class="fas fa-sign-out-alt mr-3"></i>
            <span>Logout</span>
        </a>
    </div>
</div>
