<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){return view('guru.dashboard', ['title' => 'Halaman Guru']);}
    
    public function kelas(){return view('guru.posts', ['title' => 'Halaman Kelas' , 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);}

    public function single(Post $post) {return view('guru/post', ['title' => 'Single Post', 'post' => $post]);}

    public function diskusi() {return view('guru/diskusi', ['title' => 'Diskusi']);}

    public function contact() {return view('guru/contact', ['title' => 'Kontak']);}
}
