<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('home');
});

// mengembalikan ke halaman dashboard sesuail usertype
Route::get('dashboard', function () {})->middleware(['auth', 'verified', 'RoleMiddleware'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/showguru', [AdminController::class, 'showguru'])->name('admin.showguru');
    Route::get('admin/showsiswa', [AdminController::class, 'showsiswa'])->name('admin.showsiswa');
    Route::get('admin/about', [AdminController::class, 'about'])->name('admin.about');
    // add guru
    Route::get('admin/guru/add', [AdminController::class, 'addGuru'])->name('admin.addGuru');
    Route::post('admin/guru/store', [AdminController::class, 'storeGuru'])->name('admin.storeGuru');
    Route::get('admin/guru/{id}/edit', [AdminController::class, 'editGuru'])->name('admin.editGuru');
    Route::put('admin/guru/{id}', [AdminController::class, 'updateGuru'])->name('admin.updateGuru');
    Route::delete('/admin/guru/{id}', [AdminController::class, 'deleteGuru'])->name('admin.deleteGuru');
    // add siswa
    Route::get('admin/siswa/add', [AdminController::class, 'addSiswa'])->name('admin.addSiswa');
    Route::post('admin/siswa/store', [AdminController::class, 'storeSiswa'])->name('admin.storeSiswa');
    Route::get('admin/siswa/{id}/edit', [AdminController::class, 'editSiswa'])->name('admin.editSiswa');
    Route::put('admin/siswa/{id}', [AdminController::class, 'updateSiswa'])->name('admin.updateSiswa');
    Route::delete('/admin/siswa/{id}', [AdminController::class, 'deleteSiswa'])->name('admin.deleteSiswa');
});

// Route Guru
Route::middleware(['auth', 'guru'])->group(function () {
    Route::get('guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('guru/posts', [GuruController::class, 'kelas'])->name('guru.kelas');
    Route::get('guru/posts/{post:slug}', [GuruController::class, 'single'])->name('guru.single');
    Route::get('guru/diskusi', [GuruController::class, 'diskusi'])->name('guru.diskusi');
    Route::post('guru/diskusi/store', [GuruController::class, 'storeDiskusi'])->name('guru.diskusi.store');
    Route::get('guru/contact', [GuruController::class, 'contact'])->name('guru.contact');
    // route materi
    Route::resource('guru', GuruController::class);
    Route::resource('materials', MaterialController::class);
    Route::get('materials/{material}/view', [MaterialController::class, 'show'])->name('materials.show');
    Route::get('guru/materials/{material}/edit', [MaterialController::class, 'editMaterial'])->name('materials.edit');
    Route::put('guru/materials/{material}', [MaterialController::class, 'updateMaterial'])->name('materials.update');
});

// Route Siswa
Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('siswa/posts', [SiswaController::class, 'kelas'])->name('siswa.kelas');
    Route::get('siswa/posts/{post:slug}', [SiswaController::class, 'single'])->name('siswa.single');
    Route::get('siswa/diskusi', [SiswaController::class, 'diskusi'])->name('siswa.diskusi');
    Route::post('siswa/diskusi/store', [SiswaController::class, 'storeDiskusi'])->name('siswa.diskusi.store');
    Route::get('siswa/contact', [SiswaController::class, 'contact'])->name('siswa.contact');
    // route materi
    Route::get('materials/{material}/view', [MaterialController::class, 'show'])->name('materials.show');
});

require __DIR__ . '/auth.php';
