<x-layoutadmin>
    <div class="main-content">
        <!-- Header -->
        <header class="bg-white shadow-sm p-4 flex items-center justify-between">
            <div class="flex items-center">
                <button id="toggleSidebar" class="md:hidden mr-4">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-2xl font-bold text-gray-800">{{ Auth::guard('super')->user()->name }} Dashboard</h1>
            </div>

            <div class="flex items-center">
                <div class="relative mr-4">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center">{{ $notif }}</span>
                    </button>
                </div>
                <div class="relative">
                    <button class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">{{ substr(Auth::guard('super')->user()->name, 0, 1) }}</div>
                        <span class="ml-2 text-gray-700">{{ Auth::guard('super')->user()->name }}</span>
                        {{-- <i class="fas fa-chevron-down ml-2 text-gray-500"></i> --}}
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-blue-100 text-primary">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Total Users</h2>
                            <p class="text-2xl font-bold">{{ $totaluser }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-green-100 text-green-500">
                            <i class="fas fa-computer text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Total Rooms</h2>
                            <p class="text-2xl font-bold">{{ $totalroom }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-purple-100 text-purple-500">
                            <i class="fas fa-calendar-check text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Active Bookings</h2>
                            <p class="text-2xl font-bold">{{ $totalbook }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-red-100 text-red-500">
                            <i class="fas fa-boxes text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Inventory Items</h2>
                            <p class="text-2xl font-bold">{{ $totalinventaris }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings Table -->
            <div class="bg-white rounded-xl shadow-sm mb-8">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800">Recent Bookings</h2>
                </div>
                <div class="table-container">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-500 text-sm font-medium">
                                <th class="p-4">ID</th>
                                <th class="p-4">Peminjam</th>
                                <th class="p-4">Ruangan</th>
                                <th class="p-4">Tanggal</th>
                                <th class="p-4">Waktu</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($bookings as $b)
                            <tr class="border-t border-gray-100 hover:bg-gray-50">
                                <td class="p-4">{{ $b->id }}</td>
                                <td class="p-4">{{ $b->user->name }}</td>
                                <td class="p-4">{{ $b->room->nama_ruang }}</td>
                                <td class="p-4">{{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="p-4">{{ \Carbon\Carbon::parse($b->waktu_mulai)->format('H.i') }} - {{ \Carbon\Carbon::parse($b->waktu_selesai)->format('H.i') }}</td>
                                @php
                            $statusClasses = [
                                'disetujui' => 'bg-green-100 text-green-800',
                                'diproses'   => 'bg-yellow-100 text-yellow-800',
                                'ditolak'   => 'bg-red-100 text-red-800',
                                'default'   => 'bg-blue-100 text-blue-800',
                            ];
                        @endphp
                        @php
                            $class = $statusClasses[strtolower($b->status)] ?? $statusClasses['default'];
                        @endphp
                 
                                <td class="p-4"><span class="px-3 py-1 rounded-full text-xs {{ $class }}">{{ ucfirst($b->status) }}</span></td>
                                <td class="p-4">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                    {{-- <div class="text-sm text-gray-500">Showing 1 to 4 of 42 results</div> --}}
                    <div class="flex space-x-2">
                        {{-- Tombol sebelumnya --}}
                        <a href="{{ $bookings->previousPageUrl() }}" 
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $bookings->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    
                        {{-- Nomor halaman --}}
                        @php
                            $current = $bookings->currentPage();
                            $last = $bookings->lastPage();
                            $start = max(1, $current - 1); 
                            $end = min($last, $current + 1); 
                        @endphp
                    
                        {{-- Always show first page --}}
                        @if ($start > 1)
                            <a href="{{ $bookings->url(1) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == 1 ? 'border-blue-500 bg-blue-500 text-white' : '' }}">1</a>
                            @if ($start > 2)
                                <span class="px-3 py-2">...</span>
                            @endif
                        @endif
                    
                        {{-- Page range --}}
                        @for ($i = $start; $i <= $end; $i++)
                            <a href="{{ $bookings->url($i) }}" 
                                class="px-4 py-2 rounded-lg border 
                                    {{ $i == $current 
                                        ? 'border-blue-500 bg-blue-500 text-white' 
                                        : 'border-gray-300 text-gray-600 hover:bg-gray-100' }}">
                                {{ $i }}
                            </a>
                        @endfor
                    
                        {{-- Always show last page --}}
                        @if ($end < $last)
                            @if ($end < $last - 1)
                                <span class="px-3 py-2">...</span>
                            @endif
                            <a href="{{ $bookings->url($last) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == $last ? 'border-blue-500 bg-blue-500 text-white' : '' }}">{{ $last }}</a>
                        @endif
                    
                        {{-- Tombol selanjutnya --}}
                        <a href="{{ $bookings->nextPageUrl() }}" 
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ !$bookings->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        {{-- <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Previous</button>
                        <button class="px-3 py-1 rounded-lg bg-primary text-white">1</button>
                        <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">2</button>
                        <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Next</button> --}}
                    </div>
                </div>
            </div>

            <!-- User Management & Inventory Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- User Management -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-800">User Management</h2>
                        <button class="text-primary hover:text-secondary">
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                    <div class="table-container">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-gray-500 text-sm font-medium">
                                    <th class="p-4">User</th>
                                    <th class="p-4">Role</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($users as $u)
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 text-primary flex items-center justify-center font-bold mr-3">{{ substr($u->name, 0, 1) }}</div>
                                            <div>{{ $u->name }}</div>
                                        </div>
                                    </td>
                                    <td class="p-4">{{ $u->role }}</td>
                                    <td class="p-4"> {{ $u->email }} </td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                        {{-- <div class="text-sm text-gray-500">Showing 1 to 4 of 42 results</div> --}}
                        <div class="flex space-x-2">
                            {{-- Tombol sebelumnya --}}
                            <a href="{{ $users->previousPageUrl() }}" 
                                class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $users->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        
                            {{-- Nomor halaman --}}
                            @php
                                $current = $users->currentPage();
                                $last = $users->lastPage();
                                $start = max(1, $current - 1); 
                                $end = min($last, $current + 1); 
                            @endphp
                        
                            {{-- Always show first page --}}
                            @if ($start > 1)
                                <a href="{{ $users->url(1) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == 1 ? 'border-blue-500 bg-blue-500 text-white' : '' }}">1</a>
                                @if ($start > 2)
                                    <span class="px-3 py-2">...</span>
                                @endif
                            @endif
                        
                            {{-- Page range --}}
                            @for ($i = $start; $i <= $end; $i++)
                                <a href="{{ $users->url($i) }}" 
                                    class="px-4 py-2 rounded-lg border 
                                        {{ $i == $current 
                                            ? 'border-blue-500 bg-blue-500 text-white' 
                                            : 'border-gray-300 text-gray-600 hover:bg-gray-100' }}">
                                    {{ $i }}
                                </a>
                            @endfor
                        
                            {{-- Always show last page --}}
                            @if ($end < $last)
                                @if ($end < $last - 1)
                                    <span class="px-3 py-2">...</span>
                                @endif
                                <a href="{{ $users->url($last) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == $last ? 'border-blue-500 bg-blue-500 text-white' : '' }}">{{ $last }}</a>
                            @endif
                        
                            {{-- Tombol selanjutnya --}}
                            <a href="{{ $users->nextPageUrl() }}" 
                                class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ !$users->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            {{-- <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 rounded-lg bg-primary text-white">1</button>
                            <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Next</button> --}}
                        </div>
                    </div>
                </div>

                <!-- Inventory Overview -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-800">Inventory Overview</h2>
                        <button class="text-primary hover:text-secondary">
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                    <div class="table-container">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-gray-500 text-sm font-medium">
                                    <th class="p-4">Barang</th>
                                    <th class="p-4">Spesifikasi</th>
                                    <th class="p-4">Deskripsi</th> 
                                    <th class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($inventaris as $i)
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">{{ $i->nama_barang }}</td>
                                    <td class="p-4">{{ $i->spesifikasi }}</td>
                                    <td class="p-4">{{ $i->deskripsi }}</td>
                                     <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                        {{-- <div class="text-sm text-gray-500">Showing 1 to 4 of 42 results</div> --}}
                        <div class="flex space-x-2">
                            {{-- Tombol sebelumnya --}}
                            <a href="{{ $inventaris->previousPageUrl() }}" 
                                class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $inventaris->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        
                            {{-- Nomor halaman --}}
                            @php
                                $current = $inventaris->currentPage();
                                $last = $inventaris->lastPage();
                                $start = max(1, $current - 1); 
                                $end = min($last, $current + 1); 
                            @endphp
                        
                            {{-- Always show first page --}}
                            @if ($start > 1)
                                <a href="{{ $inventaris->url(1) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == 1 ? 'border-blue-500 bg-blue-500 text-white' : '' }}">1</a>
                                @if ($start > 2)
                                    <span class="px-3 py-2">...</span>
                                @endif
                            @endif
                        
                            {{-- Page range --}}
                            @for ($i = $start; $i <= $end; $i++)
                                <a href="{{ $inventaris->url($i) }}" 
                                    class="px-4 py-2 rounded-lg border 
                                        {{ $i == $current 
                                            ? 'border-blue-500 bg-blue-500 text-white' 
                                            : 'border-gray-300 text-gray-600 hover:bg-gray-100' }}">
                                    {{ $i }}
                                </a>
                            @endfor
                        
                            {{-- Always show last page --}}
                            @if ($end < $last)
                                @if ($end < $last - 1)
                                    <span class="px-3 py-2">...</span>
                                @endif
                                <a href="{{ $inventaris->url($last) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == $last ? 'border-blue-500 bg-blue-500 text-white' : '' }}">{{ $last }}</a>
                            @endif
                        
                            {{-- Tombol selanjutnya --}}
                            <a href="{{ $inventaris->nextPageUrl() }}" 
                                class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ !$inventaris->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            {{-- <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 rounded-lg bg-primary text-white">1</button>
                            <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Next</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layoutadmin>