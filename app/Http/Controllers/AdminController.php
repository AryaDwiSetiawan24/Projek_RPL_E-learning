<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', ['title' => 'Halaman Admin']);
    }

    // Fitur show Guru
    public function showguru(Request $request)
    {
        $users = User::where('usertype', 'guru')
            ->orderBy('id', 'desc')
            ->get();

        $total = User::where('usertype', 'guru')->count();

        return view('admin.userGuru.showguru', [
            'title' => 'Daftar Guru',
            'users' => $users,
            'total' => $total,
        ]);
    }

    // Fitur add Guru
    public function addGuru()
    {
        return view('admin.userGuru.addGuru', [
            'title' => 'Tambah Guru Baru'
        ]);
    }

    public function storeGuru(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Tambahkan data user baru dengan usertype 'guru'
        User::create([
            'name' => $validated['name'],
            'username' => strtolower(str_replace(' ', '', $validated['name'])),
            'email' => $validated['email'],
            'email_verified_at' => now(),
            'usertype' => 'guru',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        return redirect()->route('admin.showguru')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function editGuru($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Tampilkan halaman edit
        return view('admin.userGuru.editguru', [
            'title' => 'Edit Data Guru',
            'user' => $user,
        ]);
    }

    public function updateGuru(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui data user
        $user->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('admin.showguru')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function deleteGuru($id)
    {
        // Cari user berdasarkan ID dan hapus
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.showguru')->with('success', 'Data guru berhasil dihapus!');
    }

    // Fitur add Siswa
    public function showsiswa(Request $request)
    {
        $users = User::where('usertype', 'siswa')
            ->orderBy('id', 'desc')
            ->get();

        $total = User::where('usertype', 'siswa')->count();

        return view('admin.userSiswa.showsiswa', [
            'title' => 'Daftar Siswa',
            'users' => $users,
            'total' => $total,
        ]);
    }

    // Fitur add Siswa
    public function addSiswa()
    {
        return view('admin.userSiswa.addSiswa', [
            'title' => 'Tambah Siswa Baru'
        ]);
    }

    public function storeSiswa(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Tambahkan data user baru dengan usertype 'Siswa'
        User::create([
            'name' => $validated['name'],
            'username' => strtolower(str_replace(' ', '', $validated['name'])),
            'email' => $validated['email'],
            'email_verified_at' => now(),
            'usertype' => 'siswa',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        return redirect()->route('admin.showsiswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function editSiswa($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Tampilkan halaman edit
        return view('admin.userSiswa.editsiswa', [
            'title' => 'Edit Data Siswa',
            'user' => $user,
        ]);
    }

    public function updateSiswa(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui data user
        $user->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('admin.showsiswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function deleteSiswa($id)
    {
        // Cari user berdasarkan ID dan hapus
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.showsiswa')->with('success', 'Data siswa berhasil dihapus!');
    }

    public function about()
    {
        return view('admin.about', ['title' => 'Halaman About']);
    }
}
