<div class="bg-white rounded-2xl shadow-sm p-5 flex flex-col sm:flex-row items-center justify-between">
    <!-- Info hasil -->
    <div class="text-sm text-gray-700 mb-4 sm:mb-0">
        Menampilkan 
        <span class="font-medium">{{ $bookings->firstItem() }}</span> 
        hingga 
        <span class="font-medium">{{ $bookings->lastItem() }}</span> 
        dari 
        <span class="font-medium">{{ $bookings->total() }}</span> hasil
    </div>

    <!-- Pagination -->
    <div class="flex space-x-1">
        {{-- Tombol sebelumnya --}}
        <a href="{{ $bookings->previousPageUrl() }}" 
           class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ $bookings->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
            <i class="fas fa-chevron-left"></i>
        </a>

        {{-- Tombol nomor halaman --}}
        @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
            <a href="{{ $url }}" 
               class="px-4 py-2 rounded-lg border 
                      {{ $page == $bookings->currentPage() 
                          ? 'border-blue-500 bg-blue-500 text-white' 
                          : 'border-gray-300 text-gray-600 hover:bg-gray-100' }}">
                {{ $page }}
            </a>
        @endforeach

        {{-- Tombol selanjutnya --}}
        <a href="{{ $bookings->nextPageUrl() }}" 
           class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 {{ !$bookings->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</div>
