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
                <button class="filter-btn active bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium" data-filter="Semua">
                    Semua
                </button>
                <button class="filter-btn bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full text-sm font-medium" data-filter="diproses">
                    Diproses
                </button>
                <button class="filter-btn bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium" data-filter="disetujui">
                    Disetujui
                </button>
                <button class="filter-btn bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-medium" data-filter="ditolak">
                    Ditolak
                </button>
                <button class="filter-btn bg-blue-300 text-white-400 px-4 py-2 rounded-full text-sm font-medium" data-filter="selesai">
                    Selesai
                </button>
            </div>

            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <input type="text" placeholder="Cari booking..." class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full md:w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-5 mb-8">
        <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">
            <div class="room-icon bg-blue-100 text-blue-600 mr-4">
                <i class="fas fa-calendar-check text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Booking</p>
                <p class="text-2xl font-bold text-gray-800">{{ $total }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">
            <div class="room-icon bg-yellow-100 text-yellow-600 mr-4">
                <i class="fas fa-clock text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Diproses</p>
                <p class="text-2xl font-bold text-gray-800">{{ $counts['diproses'] ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">
            <div class="room-icon bg-green-100 text-green-600 mr-4">
                <i class="fas fa-check-circle text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Disetujui</p>
                <p class="text-2xl font-bold text-gray-800">{{ $counts['disetujui'] ?? 0 }}</p>
            </div>
        </div>
 
        <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">
            <div class="room-icon bg-red-100 text-red-600 mr-4">
                <i class="fas fa-times-circle text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Ditolak</p>
                <p class="text-2xl font-bold text-gray-800">{{ $counts['ditolak'] ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">
            <div class="room-icon bg-blue-300 text-grey-100 mr-4">
                <i class="fas fa-check text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Selesai</p>
                <p class="text-2xl font-bold text-gray-800">{{ $counts['selesai'] ?? 0 }}</p>
            </div>
        </div>
    </div>

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