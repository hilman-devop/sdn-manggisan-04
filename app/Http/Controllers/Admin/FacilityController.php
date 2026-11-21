<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Mengimpor Model Facility dan Facade Storage untuk manipulasi file gambar
use App\Models\Facility;
use Illuminate\Support\Facades\Storage;

/**
 * Controller Admin untuk mengelola data Fasilitas Sekolah (CRUD).
 * Diproteksi oleh middleware autentikasi admin.
 */
class FacilityController extends Controller
{
    /**
     * Menampilkan daftar semua fasilitas di panel admin.
     * Diurutkan dari data yang terbaru diunggah.
     */
    public function index()
    {
        $facilities = Facility::latest()->get(); // Mengambil data fasilitas terbaru dari database
        
        // Merender view halaman index fasilitas admin dan mengirimkan data fasilitas
        return view('admin.facilities.index', [
            'title' => 'Facilities Management',
            'facilities' => $facilities
        ]);
    }

    /**
     * Menampilkan form halaman tambah fasilitas baru.
     */
    public function create()
    {
        return view('admin.facilities.create', [
            'title' => 'Add New Facility'
        ]);
    }

    /**
     * Memproses dan menyimpan data fasilitas baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input yang dikirim dari form tambah
        $request->validate([
            'name' => 'required', // Nama fasilitas wajib diisi
            'description' => 'required', // Deskripsi wajib diisi
            'teacher' => 'required', // Guru penanggung jawab wajib diisi
            'schedule' => 'required', // Jadwal wajib diisi
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // File gambar wajib, tipe gambar, max 2MB
        ]);

        // 2. Memproses file gambar yang diunggah
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension(); // Membuat nama file unik berdasarkan waktu saat ini
        $image->storeAs('gallery', $imageName, 'public'); // Menyimpan file gambar ke disk public/gallery

        // 3. Menyimpan record baru ke database menggunakan data form
        Facility::create([
            'name' => $request->name,
            'description' => $request->description,
            'teacher' => $request->teacher,
            'schedule' => $request->schedule,
            'image_path' => 'gallery/' . $imageName // Menyimpan path relatif gambar
        ]);

        // 4. Mengalihkan kembali ke halaman utama fasilitas dengan pesan sukses
        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility added successfully');
    }

    /**
     * Menampilkan form halaman edit fasilitas.
     * Laravel otomatis melakukan Route Model Binding (mencocokkan ID di rute dengan data Facility).
     */
    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', [
            'title' => 'Edit Facility',
            'facility' => $facility
        ]);
    }

    /**
     * Memproses dan menyimpan pembaruan data fasilitas yang diedit.
     */
    public function update(Request $request, Facility $facility)
    {
        // 1. Validasi input form edit
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'teacher' => 'required',
            'schedule' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Gambar bersifat opsional saat edit
        ]);

        // 2. Memproses unggahan gambar baru (jika admin memilih untuk mengganti gambar)
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari penyimpanan fisik jika ada
            if ($facility->image_path) {
                Storage::disk('public')->delete($facility->image_path);
            }
            
            // Simpan gambar baru
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('gallery', $imageName, 'public');
            $facility->image_path = 'gallery/' . $imageName; // Perbarui path gambar di model
        }

        // 3. Memperbarui teks atribut lainnya di database
        $facility->name = $request->name;
        $facility->description = $request->description;
        $facility->teacher = $request->teacher;
        $facility->schedule = $request->schedule;
        $facility->save(); // Simpan perubahan ke database

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility updated successfully');
    }

    /**
     * Menghapus data fasilitas beserta file gambar fisiknya dari sistem.
     */
    public function destroy(Facility $facility)
    {
        // Hapus file gambar dari disk penyimpanan fisik jika ada
        if ($facility->image_path) {
            Storage::disk('public')->delete($facility->image_path);
        }
        
        // Hapus record data dari database
        $facility->delete();
        
        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility deleted successfully');
    }
}
