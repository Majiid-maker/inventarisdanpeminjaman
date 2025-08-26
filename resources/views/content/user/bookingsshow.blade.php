<x-layout>
 
<div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Header dengan Tombol Back -->
        <div class="flex items-center mb-8">
            <a href="{{ route('history') }}" class="flex items-center text-blue-600 font-medium">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke History
            </a>
        </div>

        <!-- Judul Halaman -->
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Detail Booking</h1> 
        </div>

        <!-- Card Detail Booking -->
        <div class="detail-card bg-white">
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <span class="text-blue-800 font-semibold">ID: {{ $booking->id }}</span>
                        <h2 class="text-2xl font-bold text-gray-800 mt-1">{{ $booking->room->nama_ruang }}</h2>
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
                    $class = $statusClasses[strtolower($booking->status)] ?? $statusClasses['default'];
                @endphp
        
            <span class="status-badge {{ $class }}">
                {{ ucfirst($booking->status) }}
            </span>
                </div>
            </div>

            <!-- Informasi Booking -->
            <div class="p-6">
                <!-- Tanggal & Waktu -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="info-item">
                        <div class="flex items-center mb-2">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-calendar-day text-blue-600"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Tanggal</h3>
                        </div>
                        <p class="text-gray-700 ml-11">{{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('d F Y') }}
                        </p>
                    </div>

                    <div class="info-item">
                        <div class="flex items-center mb-2">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-clock text-blue-600"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Waktu</h3>
                        </div>
                        <p class="text-gray-700 ml-11">{{ $booking->waktu_mulai }} - {{ $booking->waktu_selesai }}</p>
                    </div>
                </div>

                <!-- Kepentingan -->
                <div class="info-item">
                    <div class="flex items-center mb-2">
                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                            <i class="fas fa-clipboard-list text-blue-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Kepentingan</h3>
                    </div>
                    <p class="text-gray-700 ml-11">{{ $booking->kepentingan }}</p>
                </div>

                <!-- Status -->
                <div class="info-item">
                    <div class="flex items-center mb-2">
                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                            <i class="fas fa-info-circle text-blue-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Status</h3>
                    </div>
                    <div class="ml-11">
                        @php
                            $statusClasses = [
                                'disetujui' => 'bg-green-100 text-green-800',
                                'diproses'   => 'bg-yellow-100 text-yellow-800',
                                'ditolak'   => 'bg-red-100 text-red-800',
                                'default'   => 'bg-blue-100 text-blue-800',
                            ];
                            $class = $statusClasses[strtolower($booking->status)] ?? $statusClasses['default'];
                        @endphp
                
                        <span class="status-badge {{ $class }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                
                        {{-- kalau status disetujui --}}
                        @if(strtolower($booking->status) === 'disetujui')
                            <p class="text-gray-600 text-sm mt-2">
                                Pemesanan Anda telah disetujui oleh admin
                                pada {{ \Carbon\Carbon::parse($booking->updated_at)->translatedFormat('d F Y \p\u\k\u\l H:i') }}
                            </p>
                        @endif
                    </div>
                </div>
                

                <!-- Informasi Tambahan -->
                <div class="info-item">
                    <div class="flex items-center mb-2">
                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                            <i class="fas fa-info-circle text-blue-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Informasi Tambahan</h3>
                    </div>
                    <div class="ml-11">
                        <p class="text-gray-700">{{ $booking->catatan }}</p> 
                    </div>
                </div>
            </div>

            <!-- Footer Card -->
            <div class="border-t border-gray-100 px-6 py-4 bg-gray-50 flex flex-col sm:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm mb-4 sm:mb-0">
                    <i class="far fa-clock mr-1"></i> 
                    Dibuat pada: {{ \Carbon\Carbon::parse($booking->created_at)->translatedFormat('j F Y, H:i') }}
                </p>
                <div class="flex space-x-3">
                    <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 flex items-center">
                        <i class="fas fa-download mr-2"></i> Unduh
                    </button>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center">
                        <i class="fas fa-print mr-2"></i> Cetak
                    </button>
                </div>
            </div>
        </div>

        <!-- Info Kontak -->
        <div class="mt-8 bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Butuh Bantuan?</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start">
                    <div class="bg-blue-100 p-3 rounded-lg mr-4">
                        <i class="fas fa-user-circle text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Admin Ruangan</h4>
                        <p class="text-gray-600">Budi Santoso</p>
                        <p class="text-blue-600 mt-1">budi.santoso@company.com</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-blue-100 p-3 rounded-lg mr-4">
                        <i class="fas fa-phone-alt text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Hubungi Kami</h4>
                        <p class="text-gray-600">Ext: 1234</p>
                        <p class="text-blue-600 mt-1">+62 21 1234 5678</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk tombol back
        document.querySelector('a').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Kembali ke halaman history booking');
            // Dalam implementasi sebenarnya, ini akan mengarahkan kembali ke halaman history
        });
    </script> 
</x-layout>