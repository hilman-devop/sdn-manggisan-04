<?php

// Mengimpor komponen router dari Laravel
use Illuminate\Support\Facades\Route;

// Mengimpor semua controller yang digunakan untuk mengatur logika tampilan
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ExtracurricularController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\School\ProfileController;
use App\Http\Controllers\School\GalleryController as SchoolGalleryController;
use App\Http\Controllers\School\AnnouncementController as SchoolAnnouncementController;
use App\Http\Controllers\Admin\FacilityController;

/*
|--------------------------------------------------------------------------
| rute Autentikasi (Login / Logout)
|--------------------------------------------------------------------------
*/
// Rute untuk tamu (user yang belum login)
Route::middleware('guest')->group(function () {
    // Menampilkan halaman form login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    // Memproses data login yang dikirim oleh user
    Route::post('login', [LoginController::class, 'login']);
});

// Memproses logout (hanya bisa diakses oleh admin yang sudah login)
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Rute Publik (Akses Pengunjung Website)
|--------------------------------------------------------------------------
*/
// Halaman utama / beranda sekolah
Route::get('/', [SchoolController::class, 'index'])->name('home');

// Halaman visi dan misi sekolah
Route::get('/visi-misi', [SchoolController::class, 'vision'])->name('vision');

// Halaman galeri foto kegiatan sekolah
Route::get('/galeri', [SchoolGalleryController::class, 'index'])->name('gallery');

// Halaman daftar pengumuman sekolah
Route::get('/pengumuman', [SchoolAnnouncementController::class, 'index'])->name('announcements');

// Halaman profil singkat sekolah
Route::get('/profil', [SchoolController::class, 'profile'])->name('profile');

// Halaman detail profil sekolah secara dinamis
Route::get('/profile', [ProfileController::class, 'show'])->name('school.profile');


/*
|--------------------------------------------------------------------------
| Rute Administrator (Halaman Dashboard & Kelola Konten)
|--------------------------------------------------------------------------
| Diproteksi oleh middleware 'auth' agar hanya admin yang sudah login yang bisa masuk.
| Menggunakan prefix '/admin' untuk semua URL rute di dalam grup ini.
*/
Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    // Halaman utama Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Manajemen Halaman Utama (Mengubah teks sambutan dan deskripsi beranda)
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home.index');
    Route::put('/home', [HomeController::class, 'update'])->name('admin.home.update');
    
    // Manajemen Profil Sekolah (Visi, Misi, Sejarah) - menggunakan RESTful Resource
    Route::resource('profiles', ProfileController::class)->names('admin.profiles');
    
    // Manajemen Galeri Foto Sekolah (Unggah dan Hapus dokumentasi)
    Route::resource('gallery', GalleryController::class)->names('admin.gallery');
    
    // Manajemen Pengumuman Sekolah (Tulis dan publish informasi penting)
    Route::resource('announcements', AnnouncementController::class)->names('admin.announcements');
    
    // Manajemen Fasilitas Sekolah (Kelola data ruang kelas, lab, lapangan, dll.)
    Route::resource('facilities', FacilityController::class)->names('admin.facilities');
    
    // Manajemen Kegiatan Ekstrakurikuler (Seni, olahraga, pramuka, dll.)
    Route::resource('extracurricular', ExtracurricularController::class)->names('admin.extracurricular');
    
    // Manajemen Tenaga Pendidik & Staf (Foto, nama, dan jabatan guru)
    Route::resource('teachers', App\Http\Controllers\Admin\TeacherController::class, ['as' => 'admin']);
});
