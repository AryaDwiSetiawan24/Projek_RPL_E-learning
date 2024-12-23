<x-admin-layout>
    <x-slot:title>{{ $title}}</x-slot:title>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
    
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('admin.storeSiswa') }}" method="POST">
            @csrf
    
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nama</label>
                <input type="text" id="name" name="name" class="w-full border-gray-300 rounded p-2" 
                       placeholder="Masukkan nama" value="{{ old('name') }}" required>
            </div>
    
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full border-gray-300 rounded p-2" 
                       placeholder="Masukkan email" value="{{ old('email') }}" required>
            </div>
    
            <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Tambah Siswa
            </button>
        </form>
    </div>
</x-admin-layout>