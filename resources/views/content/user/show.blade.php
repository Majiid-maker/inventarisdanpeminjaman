<x-layout>

  <!-- Section Katalog & Jadwal -->
  <section class="w-full px-4 py-10 bg-gray-100">
    <div class="flex items-center mb-8">
      <a href="{{ route('rooms.index') }}" class="flex items-center text-primary-600 hover:text-primary-800 transition">
          <i class="fas fa-arrow-left mr-2"></i>
          <span>Kembali ke Beranda</span>
      </a> 
  </div>
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Katalog Lokasi -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <img src="{{ asset('storage/' . $room->gambar) }}" alt="{{ $room->nama_ruang }}" class="w-full h-64 object-cover">
        <div class="p-6">
          <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $room->nama_ruang }}</h2>
          <p class="text-sm text-gray-500 mb-1">📍 Lokasi: {{ $room->lokasi }}</p>
          <p class="text-gray-700 text-sm mb-2">
            {{ $room->deskripsi }}
          </p>
          <p class="text-sm text-gray-500 mb-4">👥 Kapasitas: Maksimal {{ $room->kapasitas }} orang</p>
          <a href="{{ route('rooms.form', $room->id) }}">
          <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded">
            Booking Sekarang
          </button></a>
        </div>
      </div>

      <!-- Jadwal Pemakaian -->
      <div class="bg-white rounded-lg shadow p-6">
        {{-- <h3 class="text-xl font-semibold mb-4">Jadwal Pemakaian - {{ \Carbon\Carbon::create()->month($bulanSekarang)->translatedFormat('F Y') }}</h3> --}}
        
        <!-- Dropdown Filter Bulan -->
        <div class="mb-4 flex items-center gap-3">
          <label for="bulan" class="text-sm font-medium text-gray-700">Filter Bulan:</label>
          <select id="bulan" name="bulan"
            onchange="location = this.value"
            class="border border-gray-300 text-sm rounded px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach(range(1, 12) as $bulan)
              @php
                $bulanStr = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                $namaBulan = \Carbon\Carbon::create()->month((int)$bulan)->translatedFormat('F');
              @endphp
              <option value="{{ url()->current() . '?bulan=' . $bulanStr }}" {{ $bulanStr == $bulanSekarang ? 'selected' : '' }}>
                {{ $namaBulan }}
              </option>
            @endforeach
          </select>
        </div>

        <ul class="divide-y divide-gray-200 text-sm">
          @foreach($jadwal as $j)
            <li class="py-2 flex justify-between">
              <span>{{ \Carbon\Carbon::parse($j->tanggal)->translatedFormat('j F') }}</span>
              <span>{{ $j->kepentingan }}</span>
              <span class="text-green-600">({{ $j->waktu_mulai }}–{{ $j->waktu_selesai }})</span>
            </li>
          @endforeach
          @if($jadwal->isEmpty())
            <li class="py-2 text-center text-gray-500 italic">Tidak ada jadwal</li>
          @endif
        </ul>
      </div>

    </div>
  </section>

  <!-- Section Tabel Inventaris -->
  <section class="overflow-x-auto p-4 bg-white rounded shadow mt-8">
    <table class="min-w-[1200px] border border-gray-300 text-sm">
      <thead>
        <tr>
          <th rowspan="2" class="border px-2 py-1 text-center">No</th>
          <th rowspan="2" class="border px-2 py-1 text-center">Barang / Inventaris</th>
          <th rowspan="2" class="border px-2 py-1 text-center">Spesifikasi</th>
          <th rowspan="2" class="border px-2 py-1 text-center">Deskripsi</th>
          <th colspan="3" class="border px-2 py-1 text-center">Maret 2025</th>
          <th colspan="3" class="border px-2 py-1 text-center">Agustus 2025</th>
        </tr>
        <tr>
          <th class="border px-2 py-1 text-center">Jumlah</th>
          <th class="border px-2 py-1 text-center">Kondisi</th>
          <th class="border px-2 py-1 text-center">Keterangan</th>
          <th class="border px-2 py-1 text-center">Jumlah</th>
          <th class="border px-2 py-1 text-center">Kondisi</th>
          <th class="border px-2 py-1 text-center">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($inventaris as $index => $item)
          <tr>
            <td class="border px-2 py-1 text-center">{{ $index + 1 }}</td>
            <td class="border px-2 py-1">{{ $item->nama_barang }}</td>
            <td class="border px-2 py-1">{{ $item->spesifikasi }}</td>
            <td class="border px-2 py-1">{{ $item->deskripsi }}</td>
            <td class="border px-2 py-1 text-center">{{ $maretLogs[$item->id]->jumlah ?? '' }}</td>
            <td class="border px-2 py-1">{{ $maretLogs[$item->id]->kondisi ?? '' }}</td>
            <td class="border px-2 py-1">{{ $maretLogs[$item->id]->keterangan ?? '' }}</td>
            <td class="border px-2 py-1 text-center">{{ $agustusLogs[$item->id]->jumlah ?? '' }}</td>
            <td class="border px-2 py-1">{{ $agustusLogs[$item->id]->kondisi ?? '' }}</td>
            <td class="border px-2 py-1">{{ $agustusLogs[$item->id]->keterangan ?? '' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>

</x-layout>
