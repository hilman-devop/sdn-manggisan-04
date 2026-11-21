<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Mengimpor semua model database yang diperlukan untuk mengambil data dinamis sekolah
use App\Models\HomeContent;
use App\Models\Gallery;
use App\Models\Announcement;
use App\Models\Extracurricular;
use App\Models\Profile;
use App\Models\Facility;
use App\Models\Teacher;

/**
 * Controller utama untuk melayani halaman publik (yang diakses pengunjung umum/siswa).
 */
class SchoolController extends Controller
{
    /**
     * Menampilkan Halaman Utama (Beranda)
     * Mengambil teks sambutan, daftar fasilitas, kegiatan ekskul, pengumuman terbaru, dan data guru.
     */
    public function index()
    {
        $homeContent = HomeContent::first(); // Mengambil satu baris data sambutan beranda
        $facilities = Facility::all(); // Mengambil seluruh data fasilitas sekolah
        $extracurriculars = Extracurricular::all(); // Mengambil semua jenis ekstrakurikuler
        $announcements = Announcement::latest()->take(6)->get(); // Mengambil 6 pengumuman terbaru
        $teachers = Teacher::all(); // Mengambil data seluruh guru & staf
        
        // Merender view 'school.home' dan mengirimkan semua variabel data di atas ke template view
        return view('school.home', compact('homeContent', 'facilities', 'extracurriculars', 'announcements', 'teachers'));
    }

    /**
     * Menampilkan Halaman Visi & Misi Sekolah
     */
    public function vision()
    {
        $homeContent = HomeContent::first(); // Mengambil data profil beranda untuk visi-misi
        return view('school.vision', compact('homeContent'));
    }

    /**
     * Menampilkan Halaman Berita / Blog Sekolah
     * (Saat ini mengambil data dari tabel pengumuman terbaru dengan batasan 6 item per halaman)
     */
    public function news()
    {
        $announcements = Announcement::latest()->paginate(6); // Pagination 6 data per halaman
        return view('school.news', compact('announcements'));
    }

    /**
     * Menampilkan Halaman Galeri Foto Kegiatan Sekolah
     * Mengambil data dokumentasi foto dengan sistem pagination (12 foto per halaman)
     */
    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('school.gallery', compact('galleries'));
    }

    /**
     * Menampilkan Halaman List Pengumuman Sekolah
     * Menampilkan semua pengumuman yang diurutkan dari yang terbaru (10 pengumuman per halaman)
     */
    public function announcements()
    {
        $announcements = Announcement::latest()->paginate(10);
        return view('school.announcements', compact('announcements'));
    }

    /**
     * Menampilkan Halaman Profil Singkat/Sejarah Sekolah
     */
    public function profile()
    {
        $homeContent = HomeContent::first();
        return view('school.profile', compact('homeContent'));
    }

    /**
     * Menampilkan Halaman Daftar Fasilitas Sekolah
     * Mengambil data semua fasilitas (ruang kelas, lapangan, perpustakaan, lab)
     */
    public function facilities()
    {
        $facilities = Facility::paginate(12);
        return view('school.facilities', compact('facilities'));
    }

    /**
     * Menampilkan Halaman Daftar Kegiatan Ekstrakurikuler
     */
    public function extracurricular()
    {
        $extracurriculars = Extracurricular::paginate(12);
        return view('school.extracurricular', compact('extracurriculars'));
    }
}