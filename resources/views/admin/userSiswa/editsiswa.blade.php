<x-admin-layout>
    <x-slot:title>{{ $title}}</x-slot:title>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">{{ $title }}</h2>
    
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
    
        <form action="{{ route('admin.updateSiswa', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nama</label>
                <input type="text" id="name" name="name" class="w-full border-gray-300 rounded p-2" 
                       value="{{ old('name', $user->name) }}" required>
            </div>
    
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" id="username" name="username" class="w-full border-gray-300 rounded p-2" 
                       value="{{ old('username', $user->username) }}" required>
            </div>
    
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full border-gray-300 rounded p-2" 
                       value="{{ old('email', $user->email) }}" required>
            </div>
    
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Perbarui Data
            </button>
        </form>
    </div>
</x-admin-layout>