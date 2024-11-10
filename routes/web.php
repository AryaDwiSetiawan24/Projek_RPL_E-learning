<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

// mengembalikan ke halaman dashboard sesuail usertype
Route::get('dashboard', function () {
})->middleware(['auth', 'verified', 'RoleMiddleware'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/posts', function () {
        return view('admin/posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);
    });
    
    Route::get('admin/posts/{post:slug}', function (Post $post) {
        return view('admin/post', ['title' => 'Single Post', 'post' => $post]);
    });
    
    Route::get('admin/about', function () {
        return view('admin/about', ['name' => 'Arya Dwi Setiawan', 'title' => 'About']);
    });
    
    Route::get('admin/contact', function () {
        return view('admin/contact', ['title' => 'Contact']);
    });
});

Route::middleware(['auth', 'guru'])->group(function () {
    Route::get('guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('guru/posts', [GuruController::class, 'kelas'])->name('guru.kelas');
    Route::get('guru/posts/{post:slug}', [GuruController::class, 'single'])->name('guru.single');
    Route::get('guru/diskusi', [GuruController::class, 'diskusi'])->name('guru.diskusi');
    Route::get('guru/contact', [GuruController::class, 'contact'])->name('guru.contact');
});

Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('siswa/posts', [SiswaController::class, 'kelas'])->name('siswa.kelas');
    Route::get('siswa/posts/{post:slug}', [SiswaController::class, 'single'])->name('siswa.single');
    Route::get('siswa/diskusi', [SiswaController::class, 'diskusi'])->name('siswa.diskusi');
    Route::get('siswa/contact', [SiswaController::class, 'contact'])->name('siswa.contact');
});
 
require __DIR__.'/auth.php';