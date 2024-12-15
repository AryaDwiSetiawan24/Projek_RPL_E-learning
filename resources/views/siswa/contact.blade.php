<x-siswa-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Konten Utama -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Ini adalah halaman Kontak</h3>
                <p class="mt-2 text-gray-600">Selamat datang <span
                        class="text-gray-900 underline">{{ Auth::user()->name }}</span>. Anda dapat menghubungi kontak
                    yang tertera apabila anda mengalami masalah.</p>
            </div>

            <!-- Widget Progres Pembelajaran -->
            <section class="col-span-2 bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Kontak Admin</h2>
                <p>Harap hubungi kontak dibawah ini apabila anda mengalami masalah!</p>
                <ul class="my-4 space-y-2">
                    <li class="text-gray-900">Email: admin@gmail.com</li>
                    <li class="text-gray-900">Telepon: +6285-8375-923</li>
                    <li class="text-gray-900">WahatsApp: 085-8475-927</li>
                </ul>
            </section>

            <!-- Widget Pengumuman -->
            <section class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">FAQ</h2>
                <ul class="space-y-2">
                    <li class="text-gray-700">
                        <p class="font-semibold text-gray-900">Bagaimana cara login?</p> Dengan memasukkan email dan
                        password yang sudar terdaftar oleh admin.
                    </li>
                    <li class="text-gray-700">
                        <p class="font-semibold text-gray-900">Bagaimana cara melakukan diskusi?</p> Dengan menuju
                        kehalaman diskusi lalu masukkan topik yang ingin dibahas dan berikan rincian di kolom komentar.
                    </li>
                </ul>
            </section>
        </div>
    </div>
</x-siswa-layout>
