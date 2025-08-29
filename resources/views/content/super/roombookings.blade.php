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
            <!-- Recent Bookings Table -->
            <div class="bg-white rounded-xl shadow-sm mb-8">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 md:mb-0">Booking Management</h2>
                    
                    
                    <!-- Filter Status Buttons -->
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ request()->fullUrlWithQuery(['status' => '']) }}" 
                           class="px-3 py-1.5 rounded-full text-sm border {{ !request('status') ? 'bg-blue-100 text-blue-800 border-blue-200' : 'bg-gray-100 text-gray-700 border-gray-200' }} hover:bg-blue-50 transition-colors">
                            Semua
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'diproses']) }}" 
                           class="px-3 py-1.5 rounded-full text-sm border {{ request('status') == 'diproses' ? 'bg-yellow-100 text-yellow-800 border-yellow-200' : 'bg-gray-100 text-gray-700 border-gray-200' }} hover:bg-yellow-50 transition-colors">
                            Diproses
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'disetujui']) }}" 
                           class="px-3 py-1.5 rounded-full text-sm border {{ request('status') == 'disetujui' ? 'bg-green-100 text-green-800 border-green-200' : 'bg-gray-100 text-gray-700 border-gray-200' }} hover:bg-green-50 transition-colors">
                            Disetujui
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'ditolak']) }}" 
                           class="px-3 py-1.5 rounded-full text-sm border {{ request('status') == 'ditolak' ? 'bg-red-100 text-red-800 border-red-200' : 'bg-gray-100 text-gray-700 border-gray-200' }} hover:bg-red-50 transition-colors">
                            Ditolak
                        </a>
                    </div>
                    <button class="text-primary hover:text-secondary">
                        <i class="fas fa-plus"></i> Add New
                    </button>
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
                        <a href="{{ $bookings->appends(request()->query())->previousPageUrl() }}" 
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
                            <a href="{{ $bookings->appends(request()->query())->url(1) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == 1 ? 'border-blue-500 bg-blue-500 text-white' : '' }}">1</a>
                            @if ($start > 2)
                                <span class="px-3 py-2">...</span>
                            @endif
                        @endif
                    
                        {{-- Page range --}}
                        @for ($i = $start; $i <= $end; $i++)
                            <a href="{{ $bookings->appends(request()->query())->url($i) }}" 
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
                            <a href="{{ $bookings->appends(request()->query())->url($last) }}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $current == $last ? 'border-blue-500 bg-blue-500 text-white' : '' }}">{{ $last }}</a>
                        @endif
                    
                        {{-- Tombol selanjutnya --}}
                        <a href="{{ $bookings->appends(request()->query())->nextPageUrl() }}" 
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ !$bookings->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layoutadmin>