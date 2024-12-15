<x-guru-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full max-w-3xl mx-auto bg-white shadow-md rounded-lg p-8" style="margin: 0 20%;">
        <form action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="post_slug" class="block text-sm font-medium text-gray-700">Pilih Kelas</label>
                <select name="post_slug" id="post_slug" class="w-full border border-gray-300 rounded-md p-2">
                    @foreach ($posts as $slug => $slug)
                        <option value="{{ $slug }}" {{ $material->post_slug == $slug ? 'selected' : '' }}>
                            {{ $slug }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $material->title) }}"
                    class="w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-md p-2">{{ old('description', $material->description) }}</textarea>
            </div>

            {{-- <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">File PDF</label>
                <input type="file" name="file" id="file" class="w-full border border-gray-300 rounded-md p-2"
                    required>
                <p class="text-sm text-gray-500">Unggah file PDF baru. Maksimal 2MB.</p>
            </div> --}}

            <div class="mb-4">
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
