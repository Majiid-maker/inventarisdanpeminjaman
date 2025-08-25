<x-layout>
<section class="w-full px-4 py-10 bg-gray-100">
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($rooms as $room)
        <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            
            <!-- Bagian Gambar -->
            <div class="h-48 w-full overflow-hidden">
                <img src="{{ asset('storage/' . $room->gambar) }}" 
                     alt="{{ $room->nama_ruang }}" 
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </div>

            <!-- Bagian Teks -->
            <div class="p-5 flex flex-col flex-1">
                <h2 class="text-lg font-bold text-gray-800 mb-1">{{ $room->nama_ruang }}</h2>
                <p class="text-sm text-gray-500 mb-1">📍 {{ $room->lokasi }}</p>
                <p class="text-sm text-gray-500 mb-4">👥 Kapasitas: {{ $room->kapasitas }} orang</p>
                
                <div class="mt-auto">
                    <a href="{{ route('rooms.show', $room->id) }}" 
                       class="block text-center bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded-lg transition-colors duration-300">
                       Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
</x-layout>
