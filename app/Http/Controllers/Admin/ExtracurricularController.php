<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::latest()->get();
        return view('admin.extracurricular.index', [
            'title' => 'Extracurricular Management',
            'extracurriculars' => $extracurriculars
        ]);
    }

    public function create()
    {
        return view('admin.extracurricular.create', [
            'title' => 'Add New Extracurricular'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'coach' => 'required',
            'schedule' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('gallery', $imageName, 'public');

        Extracurricular::create([
            'name' => $request->name,
            'description' => $request->description,
            'coach' => $request->coach,
            'schedule' => $request->schedule,
            'image_path' => 'gallery/' . $imageName
        ]);

        return redirect()->route('admin.extracurricular.index')
            ->with('success', 'Extracurricular activity added successfully');
    }

    public function edit(Extracurricular $extracurricular)
    {
        return view('admin.extracurricular.edit', [
            'title' => 'Edit Extracurricular',
            'extracurricular' => $extracurricular
        ]);
    }

    public function update(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'coach' => 'required',
            'schedule' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/' . $extracurricular->image_path);
            
            // Store new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('gallery', $imageName, 'public');
            
            $extracurricular->image_path = 'gallery/' . $imageName;
        }

        $extracurricular->update([
            'name' => $request->name,
            'description' => $request->description,
            'coach' => $request->coach,
            'schedule' => $request->schedule
        ]);

        return redirect()->route('admin.extracurricular.index')
            ->with('success', 'Extracurricular activity updated successfully');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        Storage::delete('public/' . $extracurricular->image_path);
        $extracurricular->delete();

        return redirect()->route('admin.extracurricular.index')
            ->with('success', 'Extracurricular activity deleted successfully');
    }
} 