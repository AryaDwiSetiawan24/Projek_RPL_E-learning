<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Diskusi;
use App\Models\Material;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.dashboard', ['title' => 'Halaman siswa']);
    }

    public function kelas()
    {
        // Ambil user yang sedang login
        $loggedInUser = auth()->user();

        // Filter postingan berdasarkan kategori user yang login
        $posts = Post::with('category')
            ->whereHas('category', function ($query) use ($loggedInUser) {
                $query->where('id', $loggedInUser->category_id);
            })
            ->filter(request(['search', 'category', 'author'])) // Filter tambahan jika diperlukan
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('siswa.posts', [
            'title' => 'Semua Kelas',
            'posts' => $posts,
        ]);
    }

    public function single(Post $post)
    {
        // Ambil data materi
        $materials = Material::where('post_slug', $post->slug) // Filter materi berdasarkan post_slug
            ->with('uploader')
            ->latest()
            ->get();

        return view('siswa/post', ['title' => 'Halaman Kelas', 'post' => $post], compact('materials'));
    }

    public function diskusi()
    {
        $diskusis = Diskusi::with('user')->latest()->paginate();
        return view('siswa/diskusi', ['title' => 'Diskusi', 'diskusis' => $diskusis]);
    }

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
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('siswa.diskusi')->with('success', 'Diskusi berhasil ditambahkan!');
    }

    public function contact()
    {
        return view('siswa/contact', ['title' => 'Kontak']);
    }
}
