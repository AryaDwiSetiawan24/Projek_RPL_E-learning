<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});
 
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
});

Route::middleware(['auth', 'guru'])->group(function () {
    Route::get('guru/dashboard', [GuruController::class, 'index']);
});

Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('siswa/dashboard', [SiswaController::class, 'index']);
});
 
require __DIR__.'/auth.php';
 
// tampilan admin

Route::get('admin/posts', function () {
    return view('admin/posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);
});

Route::get('admin/posts/{post:slug}', function (Post $post) {
    return view('admin/post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('admin/authors/{user:username}', function (User $user) {
    return view('admin/posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('admin/categories/{category:slug}', function (Category $category) {
    return view('admin/posts', ['title' => count($category->posts) . ' Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('admin/about', function () {
    return view('admin/about', ['name' => 'Arya Dwi Setiawan', 'title' => 'About']);
});

Route::get('admin/contact', function () {
    return view('admin/contact', ['title' => 'Contact']);
});

// tampilan guru

Route::get('guru/posts', function () {
    return view('guru/posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);
});

Route::get('guru/posts/{post:slug}', function (Post $post) {
    return view('guru/post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('guru/authors/{user:username}', function (User $user) {
    return view('guru/posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('guru/categories/{category:slug}', function (Category $category) {
    return view('guru/posts', ['title' => count($category->posts) . ' Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('guru/about', function () {
    return view('guru/about', ['name' => 'Arya Dwi Setiawan', 'title' => 'About']);
});

Route::get('guru/contact', function () {
    return view('guru/contact', ['title' => 'Contact']);
});

// tampilan siswa

Route::get('siswa/posts', function () {
    return view('siswa/posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);
});

Route::get('siswa/posts/{post:slug}', function (Post $post) {
    return view('siswa/post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('siswa/authors/{user:username}', function (User $user) {
    return view('siswa/posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('siswa/categories/{category:slug}', function (Category $category) {
    return view('siswa/posts', ['title' => count($category->posts) . ' Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('siswa/about', function () {
    return view('siswa/about', ['name' => 'Arya Dwi Setiawan', 'title' => 'About']);
});

Route::get('siswa/contact', function () {
    return view('siswa/contact', ['title' => 'Contact']);
});