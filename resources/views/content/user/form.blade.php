<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50 p-6">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Form Booking Ruangan</h1>

            {{-- Alert success --}}
            <div id="alertSuccess" class="hidden bg-green-100 text-green-800 p-3 rounded mb-4"></div>

            <form id="bookingForm" action="{{ route('booking') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Room (readonly) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ruangan</label>
                    <input type="text" value="{{ $room->nama_ruang }}" readonly
                        class="w-full border rounded-lg px-3 py-2 bg-gray-100 cursor-not-allowed">
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                </div>

                <!-- User (readonly) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemesan</label>
                    <input type="text" value="{{ Auth::user()->name }}" readonly
                        class="w-full border rounded-lg px-3 py-2 bg-gray-100 cursor-not-allowed">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                </div>

                <!-- Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" required
                        class="w-full border rounded-lg px-3 py-2">
                </div>

                <!-- Time -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai</label>
                        <input type="time" id="waktu_mulai" name="waktu_mulai" required
                            class="w-full border rounded-lg px-3 py-2"
                            min="09:00" max="16:00">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai</label>
                        <input type="time" id="waktu_selesai" name="waktu_selesai" required
                            class="w-full border rounded-lg px-3 py-2"
                            min="09:00" max="16:00">
                    </div>
                </div>

                <!-- Purpose -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kepentingan</label>
                    <textarea id="kepentingan" name="kepentingan" rows="3" required
                        class="w-full border rounded-lg px-3 py-2"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Booking Sekarang
                </button>
            </form>
        </div>
    </section>

    <script>
        // Set min date = besok
        const today = new Date();
        today.setDate(today.getDate() + 1); // tambah 1 hari
        const minDate = today.toISOString().split("T")[0];
        document.getElementById('tanggal').setAttribute("min", minDate);

        // AJAX submit
        document.getElementById('bookingForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": form.querySelector('[name=_token]').value,
                        "Accept": "application/json"
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    document.getElementById('alertSuccess').textContent = result.message;
                    document.getElementById('alertSuccess').classList.remove('hidden');
                    form.reset();
                    // reset ulang min date karena reset() menghapusnya
                    document.getElementById('tanggal').setAttribute("min", minDate);
                } else {
                    alert("Gagal menyimpan booking!");
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Terjadi kesalahan.");
            }
        });
    </script>
</x-layout>
