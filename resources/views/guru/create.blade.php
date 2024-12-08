<x-guru-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- pesan jika terkirim --}}
    @if (session('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full max-w-3xl mx-auto bg-white shadow-md rounded-lg p-8" style="margin: 0 20%;">
        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="post_slug" class="block text-sm font-medium text-gray-700">Pilih Kelas</label>
                <select name="post_slug" id="post_slug"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
                    <option value="" disabled selected>-- Pilih Kelas --</option>
                    @foreach ($slugs as $id => $slug)
                        <option value="{{ $slug }}">{{ $slug }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File Materi (PDF) *max: 2mb</label>
                <input type="file" name="file" id="file"
                    class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200"
                    required>
            </div>
            <div>
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Unggah
                </button>
                <a href="{{ route('guru.kelas') }}"
                    class="inline-flex justify-center rounded-md border border-gray-300 bg-gray-100 py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                    Kembali
                </a>
            </div>
        </form>
    </div>

</x-guru-layout>
