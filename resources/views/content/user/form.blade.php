
<x-layout>
    <section class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen flex items-center justify-center p-4">
<div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl overflow-hidden">
        <div class="md:flex">
            <!-- Illustration Section -->
            <div class="md:w-2/5 bg-gradient-to-br from-primary-1000 to-secondary-1000 hidden md:flex flex-col justify-center items-center p-8 text-white">
                <div class="w-full max-w-xs mb-6">
                    <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M158.5,383.5Q143,417,115,395.5Q87,374,69,347.5Q51,321,47,285.5Q43,250,63.5,221Q84,192,91,155.5Q98,119,124,103Q150,87,175,99.5Q200,112,225,105Q250,98,275,104.5Q300,111,319,128.5Q338,146,348,169Q358,192,367,215.5Q376,239,376.5,269.5Q377,300,356,321.5Q335,343,315,361Q295,379,266,386.5Q237,394,208,389.5Q179,385,158.5,383.5Z" fill="rgba(255,255,255,0.15)" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-center mb-4">Pemesanan Ruangan</h2>
                <p class="text-center text-blue-100 text-sm">Booking ruangan untuk meeting, seminar, atau kegiatan lainnya dengan mudah dan cepat.</p>
                <div class="mt-8 bg-white bg-opacity-20 p-4 rounded-lg">
                    <h3 class="font-semibold mb-2">Info Penting:</h3>
                    <ul class="text-xs space-y-1">
                        <li class="flex items-start">
                            <i class="fas fa-info-circle mr-2 mt-0.5"></i>
                            <span>Booking minimal 2 jam sebelum waktu penggunaan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle mr-2 mt-0.5"></i>
                            <span>Durasi pemesanan maksimal 8 jam</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle mr-2 mt-0.5"></i>
                            <span>Konfirmasi akan dikirim via email</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Form Section -->
            <div class="md:w-3/5 p-6 md:p-8">
                <div class="text-center mb-6">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Form Pemesanan Ruangan</h1>
                    <p class="text-gray-600 mt-2">Isi form berikut untuk melakukan booking</p>
                </div>

                <form class="space-y-5" id="bookingForm">
                    <!-- Room Selection -->
                    <div>
                        <label for="room" class="block text-sm font-medium text-gray-700 mb-1">Pilih Ruangan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-door-open text-gray-400"></i>
                            </div>
                            <select 
                                id="room" 
                                name="room"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition appearance-none"
                                required
                            >
                                <option value="" disabled selected>Pilih Ruangan</option>
                                <option value="room1">Ruang Meeting A (Kapasitas: 10 orang)</option>
                                <option value="room2">Ruang Meeting B (Kapasitas: 15 orang)</option>
                                <option value="room3">Ruang Seminar (Kapasitas: 50 orang)</option>
                                <option value="room4">Ruang Rapat Direksi (Kapasitas: 20 orang)</option>
                                <option value="room5">Ruang Training (Kapasitas: 30 orang)</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- User Name -->
                    <div>
                        <label for="user_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pemesan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="user_name" 
                                name="user_name" 
                                placeholder="Masukkan nama lengkap"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Booking</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-day text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="date" 
                                name="date" 
                                placeholder="Pilih tanggal"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition flatpickr-input"
                                required
                            >
                        </div>
                    </div>

                    <!-- Time Range -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-clock text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="start_time" 
                                    name="start_time" 
                                    placeholder="Pilih waktu"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition flatpickr-input"
                                    required
                                >
                            </div>
                        </div>
                        <div>
                            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-clock text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="end_time" 
                                    name="end_time" 
                                    placeholder="Pilih waktu"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition flatpickr-input"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Duration Display -->
                    <div class="bg-blue-50 p-3 rounded-lg hidden" id="durationDisplay">
                        <div class="flex items-center text-blue-700">
                            <i class="fas fa-hourglass-half mr-2"></i>
                            <span class="text-sm font-medium">Durasi: <span id="durationText">0</span> jam</span>
                        </div>
                    </div>

                    <!-- Purpose -->
                    <div>
                        <label for="purpose" class="block text-sm font-medium text-gray-700 mb-1">Kepentingan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                <i class="fas fa-file-alt text-gray-400"></i>
                            </div>
                            <textarea 
                                id="purpose" 
                                name="purpose" 
                                rows="3"
                                placeholder="Jelaskan tujuan penggunaan ruangan"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            ></textarea>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input 
                                type="checkbox" 
                                id="terms"
                                class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                                required
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-700">
                                Saya menyetujui <a href="#" class="text-primary hover:underline">Syarat & Ketentuan</a> pemesanan ruangan
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-primary to-secondary text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary flex items-center justify-center"
                        id="submitButton"
                    >
                        <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                    </button>
                </form>

                <!-- Info Section for Mobile -->
                <div class="mt-6 bg-blue-50 p-4 rounded-lg md:hidden">
                    <h3 class="font-semibold text-blue-800 mb-2">Info Penting:</h3>
                    <ul class="text-xs text-blue-700 space-y-1">
                        <li class="flex items-start">
                            <i class="fas fa-info-circle mr-2 mt-0.5"></i>
                            <span>Booking minimal 2 jam sebelum waktu penggunaan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle mr-2 mt-0.5"></i>
                            <span>Durasi pemesanan maksimal 8 jam</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle mr-2 mt-0.5"></i>
                            <span>Konfirmasi akan dikirim via email</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-6 md:p-8 max-w-md mx-4">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-circle text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Pemesanan Berhasil!</h3>
                <p class="text-gray-600 mb-6">Ruangan telah berhasil dipesan. Detail pemesanan telah dikirim ke email Anda.</p>
                <div class="bg-gray-50 p-4 rounded-lg mb-6 text-left">
                    <h4 class="font-medium text-gray-700 mb-2">Detail Pemesanan:</h4>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li><span class="font-medium">Ruangan:</span> <span id="modalRoom">-</span></li>
                        <li><span class="font-medium">Tanggal:</span> <span id="modalDate">-</span></li>
                        <li><span class="font-medium">Waktu:</span> <span id="modalTime">-</span></li>
                    </ul>
                </div>
                <button id="closeModal" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Oke, Mengerti
                </button>
            </div>
        </div>
    </div>

    <script>
        // Initialize date picker
        const datePicker = flatpickr("#date", {
            locale: "id",
            minDate: "today",
            dateFormat: "d M Y",
            disableMobile: true
        });

        // Initialize time pickers
        const startTimePicker = flatpickr("#start_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minuteIncrement: 30,
            disableMobile: true,
            onChange: function(selectedDates, dateStr, instance) {
                calculateDuration();
            }
        });

        const endTimePicker = flatpickr("#end_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minuteIncrement: 30,
            disableMobile: true,
            onChange: function(selectedDates, dateStr, instance) {
                calculateDuration();
            }
        });

        // Calculate duration function
        function calculateDuration() {
            const startTime = startTimePicker.selectedDates[0];
            const endTime = endTimePicker.selectedDates[0];
            
            if (startTime && endTime) {
                const diffMs = endTime - startTime;
                const diffHrs = Math.floor((diffMs % 86400000) / 3600000);
                
                if (diffHrs > 0) {
                    document.getElementById('durationDisplay').classList.remove('hidden');
                    document.getElementById('durationText').textContent = diffHrs;
                } else {
                    document.getElementById('durationDisplay').classList.add('hidden');
                }
            }
        }

        // Form submission
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const room = document.getElementById('room').value;
            const userName = document.getElementById('user_name').value;
            const date = document.getElementById('date').value;
            const startTime = document.getElementById('start_time').value;
            const endTime = document.getElementById('end_time').value;
            const purpose = document.getElementById('purpose').value;
            const terms = document.getElementById('terms').checked;
            
            if (!room || !userName || !date || !startTime || !endTime || !purpose || !terms) {
                alert('Harap isi semua field yang diperlukan dan setujui syarat & ketentuan.');
                return;
            }
            
            // Show success modal with details
            document.getElementById('modalRoom').textContent = document.getElementById('room').options[document.getElementById('room').selectedIndex].text;
            document.getElementById('modalDate').textContent = date;
            document.getElementById('modalTime').textContent = `${startTime} - ${endTime}`;
            
            document.getElementById('successModal').classList.remove('hidden');
        });

        // Close modal
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('successModal').classList.add('hidden');
        });

        // Close modal when clicking outside
        document.getElementById('successModal').addEventListener('click', function(e) {
            if (e.target === this) {
                document.getElementById('successModal').classList.add('hidden');
            }
        });
    </script>
</section>
</x-layout>