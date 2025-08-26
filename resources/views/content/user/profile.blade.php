<x-layout> 
    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Header dengan back button -->
        <div class="flex items-center mb-8">
            <a href="{{ route('rooms.index') }}" class="flex items-center text-primary-600 hover:text-primary-800 transition">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>Kembali ke Beranda</span>
            </a> 
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Profile header -->
            <div class="bg-gradient-to-r from-primary-500 to-primary-700 p-6 text-white">
                <div class="flex items-center">
                    <div class="w-20 h-20 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
                        <i class="fas fa-user-circle text-4xl"></i>
                    </div>
                    <div class="ml-6">
                        <h2 class="text-xl font-bold" id="profileName">{{ old('name', Auth::user()->name) }}</h2>
                        <p class="text-primary-100" id="profileEmail">{{ old('email', Auth::user()->email) }}</p>
                        <p class="text-primary-100 text-sm mt-1" id="profileRole">{{ old('role', Auth::user()->role) }}</p>
                    </div>
                </div>
            </div>

            <!-- Form section -->
            <form class="p-6 space-y-6" id="profileForm" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name', Auth::user()->name) }}"
                                disabled
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', Auth::user()->email) }}"
                                disabled
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- NIM/NPP -->
                    <div>
                        <label for="nim_npp" class="block text-sm font-medium text-gray-700 mb-1">NIM / NPP</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="nim_npp" 
                                name="nim_npp" 
                                value="{{ old('nim_npp', Auth::user()->nim_npp) }}"
                                disabled
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- Prodi -->
                    <div>
                        <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-graduation-cap text-gray-400"></i>
                            </div>
                            <input
                                type="text"
                                id="prodi" 
                                name="prodi"
                                value="{{ old('prodi', Auth::user()->prodi) }}"
                                disabled
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition appearance-none"
                                required
                            >  
                        </div>
                    </div>

                    <!-- Fakultas -->
                    <div>
                        <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-building text-gray-400"></i>
                            </div> 
                            <select 
                                id="fakultas" 
                                name="fakultas"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition appearance-none"
                                required
                                disabled
                            >
                                <option value="">Pilih Fakultas</option>
                                <option value="Fakultas Ilmu Komputer" {{ old('fakultas', Auth::user()->fakultas) == 'Fakultas Ilmu Komputer' ? 'selected' : '' }}>Fakultas Ilmu Komputer</option>
                                <option value="Fakultas Teknik" {{ old('fakultas', Auth::user()->fakultas) == 'Fakultas Teknik' ? 'selected' : '' }}>Fakultas Teknik</option>
                                <option value="Fakultas Ekonomi dan Bisnis" {{ old('fakultas', Auth::user()->fakultas) == 'Fakultas Ekonomi dan Bisnis' ? 'selected' : '' }}>Fakultas Ekonomi dan Bisnis</option>
                                <option value="Fakultas Ilmu Budaya" {{ old('fakultas', Auth::user()->fakultas) == 'Fakultas Ilmu Budaya' ? 'selected' : '' }}>Fakultas Ilmu Budaya</option>
                                <option value="Fakultas Kesehatan" {{ old('fakultas', Auth::user()->fakultas) == 'Fakultas Kesehatan' ? 'selected' : '' }}>Fakultas Kesehatan</option>
                                <option value="Fakultas Kedokteran" {{ old('fakultas', Auth::user()->fakultas) == 'Fakultas Kedokteran' ? 'selected' : '' }}>Fakultas Kedokteran</option> 
                                <option value="Lainnya" {{ old('fakultas', Auth::user()->fakultas) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option> 
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- No HP -->
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor Handphone</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input 
                                type="tel" 
                                id="no_hp" 
                                name="no_hp" 
                                value="081234567890"
                                disabled
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row justify-between pt-6 border-t border-gray-200 space-y-4 sm:space-y-0">
                    <div class="flex space-x-3">
                        <button 
                            type="button" 
                            id="editButton"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            <i class="fas fa-edit mr-2"></i> Edit Profil
                        </button>
                        <button 
                            type="button" 
                            id="changePasswordButton"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            <i class="fas fa-key mr-2"></i> Ganti Password
                        </button>
                    </div>
                    
                    <div class="hidden space-x-3" id="saveCancelButtons">
                        <button 
                            type="button" 
                            id="cancelButton"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit" 
                            id="saveButton"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                        >
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Change Password Modal -->
        <div id="changePasswordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-xl p-6 md:p-8 max-w-md w-full mx-4">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Ganti Password</h3>
                    <button id="closePasswordModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form id="passwordForm" class="space-y-4" method="POST" action="{{ route('changePassword') }}">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="currentPassword" class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="currentPassword" 
                                name="currentPassword" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>
                    
                    <div>
                        <label for="newPassword" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="newPassword" 
                                name="newPassword" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>
                    
                    <div>
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="confirmPassword" 
                                name="confirmPassword" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                required
                            >
                        </div>
                    </div>
                    
                    <div class="flex justify-end pt-4">
                        <button 
                            type="button" 
                            id="cancelPasswordChange"
                            class="mr-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            <i class="fas fa-save mr-2"></i> Simpan Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle edit mode
        const editButton = document.getElementById('editButton');
        const saveCancelButtons = document.getElementById('saveCancelButtons');
        const cancelButton = document.getElementById('cancelButton');
        const saveButton = document.getElementById('saveButton');
        const changePasswordButton = document.getElementById('changePasswordButton');
        const changePasswordModal = document.getElementById('changePasswordModal');
        const closePasswordModal = document.getElementById('closePasswordModal');
        const cancelPasswordChange = document.getElementById('cancelPasswordChange');
        const passwordForm = document.getElementById('passwordForm');
        
        const inputs = document.querySelectorAll('input, select');
        const originalValues = {};
        
        // Store original values
        inputs.forEach(input => {
            originalValues[input.id] = input.value;
        });
        
        // Enable edit mode
        editButton.addEventListener('click', () => {
            inputs.forEach(input => {
                input.disabled = false;
            });
            
            editButton.classList.add('hidden');
            saveCancelButtons.classList.remove('hidden');
        });
        
        // Cancel edit mode
        cancelButton.addEventListener('click', () => {
            inputs.forEach(input => {
                input.value = originalValues[input.id];
                input.disabled = true;
            });
            
            editButton.classList.remove('hidden');
            saveCancelButtons.classList.add('hidden');
        });
        
        // Save changes
        saveButton.addEventListener('click', (e) => {
            // e.preventDefault();
            
            // Update profile header
            document.getElementById('profileName').textContent = document.getElementById('name').value;
            document.getElementById('profileEmail').textContent = document.getElementById('email').value;
            
            // Simulate saving (in a real app, you would send data to server)
            setTimeout(() => {
                alert('Profil berhasil diperbarui!');
                
                inputs.forEach(input => {
                    input.disabled = true;
                });
                
                editButton.classList.remove('hidden');
                saveCancelButtons.classList.add('hidden');
            }, 500);
        });

        // Submit password form
passwordForm.addEventListener('submit', (e) => {
    e.preventDefault(); // cegah reload

    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (newPassword !== confirmPassword) {
        alert('Password baru dan konfirmasi password tidak cocok!');
        return;
    }

    fetch('/user/change-password', { // route Laravel
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            password: newPassword,
            password_confirmation: confirmPassword
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Password berhasil diubah!');
            changePasswordModal.classList.add('hidden');
            passwordForm.reset();
        } else {
            alert(data.message || 'Gagal mengubah password!');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan server!');
    });
});

        
        // Open change password modal
        changePasswordButton.addEventListener('click', () => {
            changePasswordModal.classList.remove('hidden');
        });
        
        // Close change password modal
        closePasswordModal.addEventListener('click', () => {
            changePasswordModal.classList.add('hidden');
            passwordForm.reset();
        });
        
        cancelPasswordChange.addEventListener('click', () => {
            changePasswordModal.classList.add('hidden');
            passwordForm.reset();
        });
        
        // Submit password form
        passwordForm.addEventListener('submit', (e) => {
            // e.preventDefault();
            
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (newPassword !== confirmPassword) {
                alert('Password baru dan konfirmasi password tidak cocok!');
                return;
            }
            
            // Simulate password change (in a real app, you would send data to server)
            setTimeout(() => {
                alert('Password berhasil diubah!');
                changePasswordModal.classList.add('hidden');
                passwordForm.reset();
            }, 500);
        });
        
        // Close modal when clicking outside
        changePasswordModal.addEventListener('click', (e) => {
            if (e.target === changePasswordModal) {
                changePasswordModal.classList.add('hidden');
                passwordForm.reset();
            }
        });
    </script> 
</x-layout>