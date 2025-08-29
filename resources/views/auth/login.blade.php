 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lab Data Mining</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/udinus.png')}}">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Masuk ke Akun Anda</h1>
            <p class="text-gray-600 mt-2">Silakan masukkan email dan kata sandi Anda</p>
        </div>

        <!-- Form Login -->
        <form action="{{ route('auth.verify') }}" method="POST" class="space-y-6">
            <!-- Email Input -->
            @csrf
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
                        placeholder="nama@contoh.com" 
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        required
                    >
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lupa kata sandi?</a>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Masukkan kata sandi" 
                        class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        required
                    >
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="remember"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                >
                <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
            </div>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition shadow-md hover:shadow-lg"
            >
                Masuk
            </button>
        </form>

        <!-- Divider -->
        {{-- <div class="my-6 flex items-center">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="mx-4 text-gray-500 text-sm">atau lanjutkan dengan</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div> --}}

        <!-- Social Login -->
        {{-- <div class="grid grid-cols-2 gap-4">
            <button class="py-2 px-4 bg-white border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition flex items-center justify-center">
                <i class="fab fa-google text-red-500 mr-2"></i> Google
            </button>
            <button class="py-2 px-4 bg-white border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition flex items-center justify-center">
                <i class="fab fa-facebook text-blue-600 mr-2"></i> Facebook
            </button>
        </div> --}}

        <!-- Sign Up Link -->
        <div class="text-center mt-6">
            <p class="text-gray-600">Belum punya akun? 
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>