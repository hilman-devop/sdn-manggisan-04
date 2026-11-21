<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('admin.announcements.index', [
            'title' => 'Announcements Management',
            'announcements' => $announcements
        ]);
    }

    public function create()
    {
        return view('admin.announcements.create', [
            'title' => 'Add New Announcement'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('announcements', $imageName, 'public');
            $data['image'] = 'announcements/' . $imageName;
        }

        Announcement::create($data);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement added successfully');
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', [
            'title' => 'Edit Announcement',
            'announcement' => $announcement
        ]);
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($announcement->image) {
                Storage::disk('public')->delete($announcement->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('announcements', $imageName, 'public');
            $data['image'] = 'announcements/' . $imageName;
        }

        $announcement->update($data);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement updated successfully');
    }

    public function destroy(Announcement $announcement)
    {
        // Hapus gambar jika ada
        if ($announcement->image) {
            Storage::disk('public')->delete($announcement->image);
        }

        $announcement->delete();

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement deleted successfully');
    }
} 