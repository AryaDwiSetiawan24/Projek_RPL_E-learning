<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- Edit Materi -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold">Edit Materi</h2>
            <p class="mt-2 text-gray-600">Hapus materi yang tidak sesuai kurikulum.</p>

            <table class="table-auto w-full my-4">
                <thead class="bg-blue-100">
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($materials as $material)
                        <tr>
                            <td>{{ $material->title }}</td>
                            <td>{{ Str::limit($material->description, 50) }}</td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.showMaterials', $material->id) }}" target="_blank">
                                        <button type="button"
                                            class="inline-flex items-center rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-800">Lihat</button></a>
                                    <form action="{{ route('admin.deleteMaterial', $material->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-4 text-center" colspan="5">
                                Belum ada materi!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Edit diskusi -->
        <section class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold">Edit Diskusi</h2>
            <p class="mt-2 text-gray-600">Hapus diskusi yang melanggar aturan atau spam.</p>
            <table class="table-auto w-full my-4">
                <thead class="bg-blue-100">
                    <tr>
                        <th>Topik</th>
                        <th>Deskripsi</th>
                        <th>Pengirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($diskusis as $diskusi)
                        <tr>
                            <td>{{ Str::limit($diskusi->topik, 100) }}</td>
                            <td>{{ Str::limit($diskusi->komentar, 100) }}</td>
                            <td>{{ $diskusi->user->name }}</td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2" role="group" aria-label="Basic example">
                                    <form action="{{ route('admin.deleteDiskusi', $diskusi->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-4 text-center" colspan="5">
                                Belum ada Diskusi!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </div>
</x-admin-layout>
