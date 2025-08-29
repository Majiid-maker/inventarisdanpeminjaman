<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Lab Data Mining</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/udinus.png')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl overflow-hidden">
        <div class="md:flex">
            <!-- Illustration Section -->
            <div class="md:w-1/2 bg-gradient-to-br from-blue-600 to-purple-600 hidden md:flex flex-col justify-center items-center p-12 text-white">
                <div class="w-full max-w-xs">
                    <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M158.5,383.5Q143,417,115,395.5Q87,374,69,347.5Q51,321,47,285.5Q43,250,63.5,221Q84,192,91,155.5Q98,119,124,103Q150,87,175,99.5Q200,112,225,105Q250,98,275,104.5Q300,111,319,128.5Q338,146,348,169Q358,192,367,215.5Q376,239,376.5,269.5Q377,300,356,321.5Q335,343,315,361Q295,379,266,386.5Q237,394,208,389.5Q179,385,158.5,383.5Z" fill="rgba(255,255,255,0.15)" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mt-8">Bergabung Dengan Kami</h2>
                <p class="mt-4 text-center text-blue-100">Daftarkan diri Anda untuk mengakses semua fitur dan layanan kami.</p>
            </div>
            
            <!-- Form Section -->
            <div class="md:w-1/2 p-8 md:p-12">
                <div class="text-center mb-8">
                    <a href="{{ url('/') }}" class="inline-flex items-center text-blue-600">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Halaman Utama
                    </a>
                    <h1 class="text-3xl font-bold text-gray-800 mt-4">Buat Akun Baru</h1>
                    <p class="text-gray-600 mt-2">Isi form berikut untuk mendaftar</p>
                </div>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- Name Input -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required 
                            >
                        </div>
                    </div>

                    <!-- Email Input -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="nama@contoh.com" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- NIM/NPP Input -->
                    <div class="mb-4">
                        <label for="nim_npp" class="block text-sm font-medium text-gray-700 mb-1">NIM / NPP</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="nim_npp" 
                                name="nim_npp" 
                                value="{{ old('nim_npp') }}"
                                placeholder="Masukkan NIM atau NPP" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- NIM/NPP Input -->
                    <div class="mb-4">
                        <label for="nim_npp" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-building text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="prodi" 
                                name="prodi" 
                                value="{{ old('prodi') }}"
                                placeholder="Masukkan program studi" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- Fakultas Input -->
                    <div class="mb-4">
                        <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-building text-gray-400"></i>
                            </div>
                            <select 
                                id="fakultas" 
                                name="fakultas"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition appearance-none"
                                required
                            >
                                <option value="" disabled selected>Pilih Fakultas</option>
                                <option value="Fakultas Ilmu Komputer" {{ old('fakultas') == 'Fakultas Ilmu Komputer' ? 'selected' : '' }}>Fakultas Ilmu Komputer</option>
                                <option value="Fakultas Teknik" {{ old('fakultas') == 'Fakultas Teknik' ? 'selected' : '' }}>Fakultas Teknik</option>
                                <option value="Fakultas Ekonomi dan Bisnis" {{ old('fakultas') == 'Fakultas Ekonomi dan Bisnis' ? 'selected' : '' }}>Fakultas Ekonomi dan Bisnis</option>
                                <option value="Fakultas Ilmu Budaya" {{ old('fakultas') == 'Fakultas Ilmu Budaya' ? 'selected' : '' }}>Fakultas Ilmu Budaya</option>
                                <option value="Fakultas Kedokteran" {{ old('fakultas') == 'Fakultas Kedokteran' ? 'selected' : '' }}>Fakultas Kedokteran</option>
                                <option value="Fakultas Kesehatan" {{ old('fakultas') == 'Fakultas Kesehatan' ? 'selected' : '' }}>Fakultas Kesehatan</option>
                                <option value="Lainnya" {{ old('fakultas') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- No HP Input -->
                    <div class="mb-4">
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor Handphone</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input 
                                type="tel" 
                                id="no_hp" 
                                name="no_hp" 
                                value="{{ old('no_hp') }}"
                                placeholder="Masukkan nomor handphone" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="Masukkan password" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- Password Confirmation Input -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                placeholder="Konfirmasi password" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required
                            >
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Daftar
                    </button>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <p class="text-gray-600">Sudah punya akun? 
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>