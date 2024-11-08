<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Navbar Start -->
        <nav class="bg-gray-800" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo and Links -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-9 w-8" src="https://1.bp.blogspot.com/-iPhCDfL8S_c/XohGexgk4jI/AAAAAAAAGaA/F7CsvkxOFRs0naEn_fl9ZNNQ_vaV_TZDgCLcBGAsYHQ/s1600/LOGO%2BUSMJAYA.png" alt="Logo">
                        </div>
                        <div class="hidden md:flex ml-10 space-x-4">
                            <x-nav-link href="/siswa/dashboard" :active="request()->is('/siswa/dashboard')">Dashboard</x-nav-link>
                            <x-nav-link href="/siswa/posts" :active="request()->is('/siswa/posts')">Kelas</x-nav-link>
                            <x-nav-link href="/siswa/about" :active="request()->is('/siswa/about')">About</x-nav-link>
                            <x-nav-link href="/siswa/contact" :active="request()->is('/siswa/contact')">Contact</x-nav-link>
                        </div>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="relative" x-data="{ isOpen: false }">
                            <button @click="isOpen = !isOpen" class="flex items-center focus:outline-none">
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile">
                            </button>
                            <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700">Log Out</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex md:hidden">
                        <button @click="isOpen = !isOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
                            <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18"/>
                            </svg>
                            <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header Start -->
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ $title }}</h1>
            </div>
        </header>
        <!-- Header End -->

        <!-- Main Content Start -->
        <main class="bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Widget Progres Pembelajaran -->
                    <section class="col-span-2 bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-4">Progres Pembelajaran</h2>
                        <p>Lihat perkembangan kelas yang sedang Anda ikuti.</p>
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div class="bg-blue-600 h-4 rounded-full" style="width: 60%;"></div>
                            </div>
                            <p class="text-sm text-gray-600 mt-2">60% dari kelas sudah selesai</p>
                        </div>
                    </section>

                    <!-- Widget Pengumuman -->
                    <section class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
                        <ul class="space-y-2">
                            <li class="text-gray-700">Pengumuman 1: Jadwal ujian akhir.</li>
                            <li class="text-gray-700">Pengumuman 2: Tugas baru tersedia.</li>
                        </ul>
                    </section>
                </div>

                <!-- Konten Utama -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold">Ini adalah halaman Home Page</h3>
                    <p class="mt-2 text-gray-600">Selamat datang di dashboard Anda.</p>
                </div>
            </div>
        </main>
        <!-- Main Content End -->
    </div>
</body>
</html>
