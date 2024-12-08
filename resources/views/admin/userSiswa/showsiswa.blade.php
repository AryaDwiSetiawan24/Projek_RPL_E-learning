<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <button class="bg-gray-800 text-white py-2 px-4 rounded hover:bg-indigo-700">
        <a href="/admin/siswa/add">
            Tambah Siswa
        </a>
    </button>

    <table class="table-auto w-full bg-white shadow-md rounded my-4">
        <thead class="bg-blue-100">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="border-b">
                    <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->usertype }}</td>
                    <td class="px-4 py-2 text-center">
                        <div class="flex space-x-2" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.editSiswa', $user->id) }}" type="button"
                                class="bg-gray-200 text-gray-800 py-1 px-3 rounded hover:bg-gray-300">Edit</a>
                            {{-- delete siswa --}}
                            <form action="{{ route('admin.deleteSiswa', $user->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-4 py-2 text-center" colspan="5">User not found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-admin-layout>