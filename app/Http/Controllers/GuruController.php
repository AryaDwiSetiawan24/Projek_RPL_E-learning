<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Diskusi;
use App\Models\Material;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.dashboard', ['title' => 'Halaman Guru']);
    }

    public function kelas()
    {
        // Ambil username dari user yang sedang login
        $loggedInUsername = auth()->user()->username;

        // Filter data berdasarkan username user yang login
        $posts = Post::with('author')
            ->whereHas('author', function ($query) use ($loggedInUsername) {
                $query->where('username', $loggedInUsername);
            })
            ->filter(request(['search', 'category', 'author']))
            ->latest()
            ->paginate()
            ->withQueryString();

        return view('guru.posts', [
            'title' => 'Semua Kelas',
            'posts' => $posts,
        ]);
    }

    // tampilkan kelas dan materi
    public function single(Post $post)
    {
        // Ambil data materi
        $materials = Material::where('post_slug', $post->slug) // Filter materi berdasarkan post_slug
            ->with('uploader')
            ->latest()
            ->get();

        return view('guru.post', ['title' => 'Halaman Kelas', 'post' => $post], compact('materials'));
    }

    // Form untuk mengunggah materi
    public function createMaterial()
    {
        $slugs = Post::pluck('slug', 'id'); // Ambil slug dari tabel posts

        $loggedInUsername = auth()->user()->username; // Ambil username dari user yang sedang login

        // Filter data berdasarkan username user yang login
        $posts = Post::with('author')
            ->whereHas('author', function ($query) use ($loggedInUsername) {
                $query->where('username', $loggedInUsername);
            });

        return view('guru.create', ['title' => 'Unggah Materi', 'posts' => $posts, 'slugs' => $slugs]);
    }

    // diskusi
    public function diskusi()
    {
        $diskusis = Diskusi::with('user')->latest()->paginate();
        return view('guru/diskusi', ['title' => 'Diskusi', 'diskusis' => $diskusis]);
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
            'user_id' => auth()->id(),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('guru.diskusi')->with('success', 'Diskusi berhasil ditambahkan!');
    }

    // kontak
    public function contact()
    {
        return view('guru/contact', ['title' => 'Kontak']);
    }
}
