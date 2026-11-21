<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $homeContent = HomeContent::first();
        $images = Gallery::latest()->take(6)->get();
        
        return view('admin.home.index', compact('homeContent', 'images'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $homeContent = HomeContent::first();
        
        if (!$homeContent) {
            $homeContent = new HomeContent();
        }

        $homeContent->title = $request->title;
        $homeContent->description = $request->description;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($homeContent->image) {
                Storage::disk('public')->delete($homeContent->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('home', $imageName, 'public');
            $homeContent->image = 'home/' . $imageName;
        }

        $homeContent->save();

        return redirect()->route('admin.home.index')->with('success', 'Konten berhasil diperbarui');
    }
} 