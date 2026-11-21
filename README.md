# Website SDN Manggisan 04

![Laravel 12](https://img.shields.io/badge/Laravel_12-2f81f7?style=flat) ![PHP](https://img.shields.io/badge/PHP-2f81f7?style=flat) ![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-2f81f7?style=flat) ![Vite](https://img.shields.io/badge/Vite-2f81f7?style=flat) ![Blade](https://img.shields.io/badge/Blade-2f81f7?style=flat) ![SQLite](https://img.shields.io/badge/SQLite-2f81f7?style=flat)

> CMS sekolah untuk mengelola informasi publik, galeri, pengumuman, kegiatan, dan data guru.

## Tentang proyek

CMS sekolah untuk mengelola informasi publik, galeri, pengumuman, kegiatan, dan data guru. Dokumentasi ini dibuat sebagai panduan singkat untuk memahami ruang lingkup proyek, menjalankannya secara lokal, dan membaca batasan penggunaannya.

## Fitur utama

- Halaman publik visi-misi, galeri, pengumuman, dan ekskul
- Dashboard admin CRUD
- Autentikasi pengguna
- SQLite untuk pengembangan lokal
- UI responsif dengan Tailwind CSS

## Teknologi

- Laravel 12
- PHP
- Tailwind CSS
- Vite
- Blade
- SQLite

## Menjalankan secara lokal

Prasyarat dan konfigurasi dapat berbeda menurut sistem operasi. Contoh langkah utama:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Struktur dan pengembangan

Mulai dari entry point dan folder konfigurasi proyek. Pisahkan credential lokal dari source code, tambahkan test untuk perubahan penting, dan gunakan environment variable untuk konfigurasi deployment.

## Keamanan

- Jangan commit API key, password, token, session ID, atau data pribadi.
- Gunakan file environment lokal dan contoh konfigurasi tanpa nilai rahasia.
- Uji perubahan pada environment development sebelum deployment.

## Status

Proyek ini merupakan bagian dari portofolio **Hilman Arifin Ilham** dan dapat dikembangkan sesuai kebutuhan penggunaan.

> **Catatan:** Hapus data contoh dan atur permission/authentication dengan benar sebelum deployment ke lingkungan sekolah.

## Lisensi

Belum ada lisensi open-source yang dinyatakan di repository ini. Hubungi pemilik repository sebelum menggunakan ulang atau mendistribusikan kode.

---

Dibuat oleh [Hilman Arifin Ilham](https://github.com/hilman-devop).
