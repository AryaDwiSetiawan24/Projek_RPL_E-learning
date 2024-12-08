<x-siswa-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Konten Utama -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Ini adalah halaman Dashboard</h3>
                <p class="mt-2 text-gray-600">Selamat datang {{ Auth::user()->name }}.</p>
            </div>

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
    </div>
</x-siswa-layout>
