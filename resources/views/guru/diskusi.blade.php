{{-- <x-guru-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Halaman Diskusi!</h3>
</x-guru-layout> --}}

<x-guru-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mx-auto px-4 py-6">
        <h3 class="text-xl font-bold mb-4">Halaman Diskusi</h3>

        <!-- Daftar Diskusi -->
        <div class="space-y-4">
            @forelse($diskusis as $diskusi)
                <div class="p-4 bg-white shadow rounded-lg">
                    <h4 class="text-lg font-semibold">{{ $diskusi->topik }}</h4>
                    <p class="text-sm text-gray-600 mt-2">{{ $diskusi->komentar }}</p>
                    <div class="mt-4 text-sm text-gray-500">
                        Ditambahkan oleh:
                        <span class="font-medium">{{ $diskusi->user->name ?? 'Anonim' }}</span>
                        pada <span class="italic">{{ $diskusi->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Belum ada diskusi yang tersedia.</p>
            @endforelse
        </div>

        <!-- Form Tambah Komentar -->
        <div class="mt-8 p-4 bg-gray-100 shadow rounded-lg">
            <h4 class="text-lg font-bold mb-4">Tambahkan Komentar Baru</h4>
            <form method="POST" 
            action="{{ route('guru.diskusi.store') }}"> {{-- buat tampilan  dan fungsi pada controller dan atur pada rute --}}
                @csrf
                <div class="mb-4">
                    <label for="topik" class="block text-sm font-medium text-gray-700">Topik</label>
                    <input type="text" id="topik" name="topik"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="komentar" class="block text-sm font-medium text-gray-700">Komentar</label>
                    <textarea id="komentar" name="komentar" rows="4"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required></textarea>
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Kirim
                </button>
            </form>
        </div>
    </div>
</x-guru-layout>
