<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Diskusi;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){return view('guru.dashboard', ['title' => 'Halaman Guru']);}
    
    public function kelas(){return view('guru.posts', ['title' => 'Halaman Kelas' , 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);}

    public function single(Post $post) {return view('guru/post', ['title' => 'Single Post', 'post' => $post]);}

    public function diskusi() { $diskusis = Diskusi::with('user')->latest()->paginate(10);
        return view('guru/diskusi', ['title' => 'Diskusi','diskusis' => $diskusis]);}

    public function storeDiskusi(Request $request)
        {
            // Validasi input
            $validatedData = $request->validate([
                'topik' => 'required|string|max:255',
                'komentar' => 'required|string',
            ]);

            // Simpan data diskusi ke dalam database
            Diskusi::create([
                'topik' => $validatedData['topik'],
                'komentar' => $validatedData['komentar'],
                'user_id' => auth()->id(), // Asumsikan user harus login
                // 'user_id' => null, // Set ke null jika user_id opsional
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('guru.diskusi')->with('success', 'Diskusi berhasil ditambahkan!');
        }


    public function contact() {return view('guru/contact', ['title' => 'Kontak']);}
}
