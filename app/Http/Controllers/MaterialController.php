<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    // Menampilkan file
    public function show(Material $material)
    {
        $filePath = storage_path("app/public/{$material->file_path}");

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->file($filePath);
    }

    // Menyimpan materi ke database
    public function store(Request $request)
    {
        $request->validate([
            'post_slug' => 'required|exists:posts,slug',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:2048', // Hanya file PDF, maksimal 2MB
        ]);

        $filePath = $request->file('file')->store('materials', 'public');

        Material::create([
            'post_slug' => $request->post_slug,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()->route('guru.createMaterial')->with('success', 'Materi berhasil diunggah!');
    }

    // edit material
    public function edit($id)
    {
        // Cari material berdasarkan ID
        $material = Material::findOrFail($id);
        $slugs = Post::pluck('slug', 'id');
        // Ambil semua slug post yang relevan untuk dropdown
        $loggedInUsername = auth()->user()->username;
        $posts = Post::with('author')
            ->whereHas('author', function ($query) use ($loggedInUsername) {
                $query->where('username', $loggedInUsername);
            })
            ->pluck('title', 'slug');

        return view('guru.editMaterial', [
            'title' => 'Edit Materi',
            'material' => $material,
            'posts' => $posts,
            'slugs' => $slugs,
        ]);
    }

    // update material
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'post_slug' => 'required|exists:posts,slug',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:2048', // File baru wajib diunggah
        ]);

        // Cari material berdasarkan ID
        $material = Material::findOrFail($id);

        // Hapus file lama
        if (Storage::exists("public/{$material->file_path}")) {
            Storage::delete("public/{$material->file_path}");
        }

        // Simpan file baru
        $filePath = $request->file('file')->store('materials', 'public');

        // Update data material
        $material->update([
            'post_slug' => $validated['post_slug'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('materials.edit', $material->id)->with('success', 'Materi berhasil diperbarui!');
    }
}
