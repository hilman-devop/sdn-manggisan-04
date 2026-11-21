<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('gallery', $imageName, 'public');

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'gallery/' . $imageName,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'status' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete('public/' . $gallery->image);
            
            // Upload gambar baru
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/gallery', $imageName);
            
            $gallery->image = 'gallery/' . $imageName;
        }

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'status' => $request->status ?? true
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::delete('public/' . $gallery->image);
        }
        
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil dihapus');
    }
} 