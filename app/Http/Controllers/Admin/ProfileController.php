<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->paginate(10);
        return view('admin.profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profiles.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'history' => 'required|string',
            'facilities' => 'required|array',
            'achievements' => 'required|array',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/profile', $imageName);
            $data['image'] = 'profile/' . $imageName;
        }

        Profile::create($data);

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    public function edit(Profile $profile)
    {
        return view('admin.profiles.form', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'history' => 'required|string',
            'facilities' => 'required|array',
            'achievements' => 'required|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            
            // Upload gambar baru
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/profile', $imageName);
            $data['image'] = 'profile/' . $imageName;
        }

        $profile->update($data);

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    public function destroy(Profile $profile)
    {
        try {
            // Hapus gambar dari storage
            if ($profile->image) {
                $imagePath = 'public/' . $profile->image;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }
            
            // Hapus data profil dari database
            $profile->delete();

            return redirect()->route('admin.profiles.index')
                ->with('success', 'Profil sekolah berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.profiles.index')
                ->with('error', 'Gagal menghapus profil sekolah: ' . $e->getMessage());
        }
    }
} 