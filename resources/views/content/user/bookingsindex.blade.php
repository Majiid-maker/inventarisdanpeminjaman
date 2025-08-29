<x-layout>
   

<div class="max-w-5xl mx-auto px-4 py-8">
    <!-- Header dengan back button -->
    <div class="flex items-center mb-8">
        <a href="{{ route('rooms.index') }}" class="flex items-center text-primary-600 hover:text-primary-800 transition">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali ke Beranda</span>
        </a> 
    </div>

    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">History Booking</h1> 
    </div>

    <!-- Filter Options -->
    <div class="bg-white rounded-2xl shadow-sm p-5 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 md:mb-0">Filter Booking</h2>
            
            <div class="flex flex-wrap gap-3 mb-4">
                <a href="{{ request()->fullUrlWithQuery(['status' => '']) }}" class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('status') || request('status') == 'Semua' ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }}">
                    Semua <span class="bg-blue-200 text-blue-800 px-2 py-0.5 rounded-full ml-1 text-xs">{{ $total }}</span>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'diproses']) }}" class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('status') == 'diproses' ? 'bg-yellow-600 text-white' : 'bg-yellow-100 text-yellow-800' }}">
                    Diproses <span class="bg-yellow-200 text-yellow-800 px-2 py-0.5 rounded-full ml-1 text-xs">{{ $counts['diproses'] ?? 0 }}</span>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'disetujui']) }}" class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('status') == 'disetujui' ? 'bg-green-600 text-white' : 'bg-green-100 text-green-800' }}">
                    Disetujui <span class="bg-green-200 text-green-800 px-2 py-0.5 rounded-full ml-1 text-xs">{{ $counts['disetujui'] ?? 0 }}</span>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'ditolak']) }}" class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('status') == 'ditolak' ? 'bg-red-600 text-white' : 'bg-red-100 text-red-800' }}">
                    Ditolak <span class="bg-red-200 text-red-800 px-2 py-0.5 rounded-full ml-1 text-xs">{{ $counts['ditolak'] ?? 0 }}</span>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'selesai']) }}" class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('status') == 'selesai' ? 'bg-purple-600 text-white' : 'bg-purple-100 text-purple-800' }}">
                    Selesai <span class="bg-purple-200 text-purple-800 px-2 py-0.5 rounded-full ml-1 text-xs">{{ $counts['selesai'] ?? 0 }}</span>
                </a>
            </div>
 
            
 
        </div>
    </div>
 
    @if($bookings->count() > 0)
    <!-- Booking Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        @foreach ($bookings as $b)
            <!-- Card 1 -->
            <div class="booking-card bg-white" data-status="{{ $b->status }}">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="text-gray-500 text-sm">ID: {{ $b->id }}</span>
                            <h3 class="text-xl font-semibold text-gray-800 mt-1">{{ $b->room->nama_ruang }}</h3>
                        </div>
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
                
                    <span class="status-badge {{ $class }}">
                        {{ ucfirst($b->status) }}
                    </span>
                    </div>
                    
                    <div class="flex items-center text-gray-600 mb-4">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span>{{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center text-gray-600 mb-4">
                        <i class="far fa-clock mr-2"></i>
                        <span>{{ \Carbon\Carbon::parse($b->waktu_mulai)->format('H.i') }} - {{ \Carbon\Carbon::parse($b->waktu_selesai)->format('H.i') }}
                        </span>
                    </div> 
                </div>
                
                <div class="border-t border-gray-100 px-6 py-4 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('booking.show', $b->id) }}" class="text-blue-600 font-medium flex items-center">
                            <i class="fas fa-eye mr-2"></i> Detail
                        </a>
                        <div class="flex space-x-2">
                            <button class="p-2 text-gray-500 hover:text-blue-600">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="p-2 text-gray-500 hover:text-blue-600">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex space-x-1">
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
    </div>
            @else
                <div class=" grid bg-white rounded-lg shadow-md p-8 text-center">
                    <i class="far fa-folder-open text-4xl text-gray-300 mb-3"></i>
                    <h3 class="text-lg font-medium text-gray-600">Tidak ada data booking</h3>
                    <p class="text-gray-500 mt-1">Anda belum memiliki booking ruangan</p>
                </div>
            @endif

    
    

    
    {{-- {{ $bookings->onEachSide(1)->links('vendor.pagination.custom') }} --}}


    
</div>

<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            // set active button
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            let filter = this.dataset.filter;
            let cards = document.querySelectorAll('.booking-card');

            cards.forEach(card => {
                let status = card.dataset.status;

                if (filter === "Semua" || status === filter) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
</script>
</x-layout>