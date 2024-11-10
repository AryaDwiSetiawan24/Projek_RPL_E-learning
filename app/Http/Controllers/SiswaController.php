<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){return view('siswa.dashboard', ['title' => 'Halaman siswa']);}

    public function kelas(){return view('siswa.posts', ['title' => 'Halaman Kelas' , 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);}

    public function single(Post $post) {return view('siswa/post', ['title' => 'Single Post', 'post' => $post]);}

    public function diskusi() {return view('siswa/diskusi', ['title' => 'Diskusi']);}

    public function contact() {return view('siswa/contact', ['title' => 'Kontak']);}
}
