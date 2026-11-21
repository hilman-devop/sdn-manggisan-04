# Website SDN Manggisan 04

> Website profil sekolah dengan halaman publik dan dashboard admin untuk mengelola seluruh konten.

## ✨ Fitur

- Halaman publik: beranda, visi-misi, galeri, pengumuman, ekskul, guru
- Dashboard admin CRUD untuk semua konten
- Autentikasi login
- SQLite / MySQL
- Tema Tailwind v4

## 🛠 Tech Stack

"Laravel 12" "Tailwind CSS v4" "Vite" "Blade" "SQLite"

## 🚀 Menjalankan

```
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## 📌 Catatan

Proyek ini merupakan bagian dari portofolio pribadi. Kode disusun untuk kebutuhan nyata,
bukan sekadar demo, sehingga sebagian konfigurasi spesifik lingkungan mungkin perlu
disesuaikan sebelum dijalankan.
