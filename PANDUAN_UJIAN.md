# 🎓 Panduan Persiapan Ujian: Website Resmi SDN Manggisan 04

Dokumen ini disusun khusus sebagai bahan belajar cepat dan komprehensif bagi **Elz** untuk menghadapi ujian/sidang proyek besok. Dokumen ini merangkum semua informasi teknis, konsep arsitektur, database, alur kerja, hingga **prediksi pertanyaan dosen penguji** beserta jawaban terbaiknya.

---

## 📌 1. Deskripsi Umum Proyek
- **Nama Proyek**: Website Profil & Portal Informasi Resmi SDN Manggisan 04.
- **Tujuan**: Sebagai media informasi publik mengenai SDN Manggisan 04 (visi-misi, sejarah, guru, fasilitas, pengumuman, galeri) sekaligus menyediakan panel kontrol (admin) bagi staf/operator sekolah untuk memperbarui data secara mandiri tanpa menyentuh kode program.
- **Tipe Aplikasi**: Aplikasi Web Dinamis berbasis CMS (Content Management System) sederhana khusus sekolah.

---

## 💻 2. Arsitektur & Teknologi (Tech Stack)

Dosen sering menanyakan teknologi yang dipakai dan alasannya. Berikut detailnya:

1. **Framework Backend**: **Laravel 12.x**
   - *Alasan*: Menggunakan pola desain **MVC (Model-View-Controller)** yang membuat kode lebih terstruktur. Menyediakan fitur keamanan bawaan seperti proteksi CSRF, password hashing, dan ORM Eloquent yang mempermudah interaksi database.
2. **Framework Frontend**: **Tailwind CSS v4**
   - *Alasan*: Framework CSS modern utility-first yang super cepat, ringan, dan responsif. Membuat pengerjaan tampilan UI menjadi konsisten tanpa menulis banyak file CSS manual.
3. **Database**: **SQLite** (Default) / **MySQL** (Alternatif)
   - *Alasan*: SQLite sangat cocok untuk proyek skala kecil-menengah karena database-nya berupa satu file tunggal di dalam folder proyek, tanpa memerlukan instalasi database server eksternal.
4. **Vite**: Frontend build tool yang digunakan untuk mengompilasi dan mengoptimalkan aset CSS dan Javascript agar loading website lebih cepat.

---

## 📂 3. Konsep Kerja & Struktur Database

Database bawaan proyek ini adalah **SQLite** (file `database/database.sqlite`).

### 🗃️ Skema Tabel & Model Data:
Proyek ini memiliki beberapa tabel utama (direpresentasikan sebagai **Eloquent Models**):
- **`users` (Model User)**: Menyimpan data akun administrator (nama, email, password terenkripsi) untuk keperluan login.
- **`home_contents` (Model HomeContent)**: Menyimpan informasi dinamis di halaman depan (judul sambutan, teks deskripsi, dan foto utama).
- **`profiles` (Model Profile)**: Menyimpan profil sekolah, termasuk visi, misi, dan sejarah.
- **`facilities` (Model Facility)**: Menyimpan data fasilitas sekolah (nama, deskripsi, foto, guru penanggung jawab, jadwal pemakaian).
- **`extracurriculars` (Model Extracurricular)**: Menyimpan daftar kegiatan ekskul (nama ekskul, deskripsi, foto pembimbing, jadwal).
- **`teachers` (Model Teacher)**: Menyimpan daftar guru dan staf sekolah (nama, jabatan, foto).
- **`announcements` (Model Announcement)**: Menyimpan pengumuman penting (judul, isi pengumuman, tanggal terbit, foto).
- **`galleries` (Model Gallery)**: Menyimpan foto-foto dokumentasi sekolah.

### 🔄 Hubungan Model & Migrasi:
- **Migration**: Kumpulan berkas di folder `database/migrations` yang berfungsi seperti *version control* untuk database. Migration mendefinisikan struktur kolom tabel (tipe data seperti string, integer, text, timestamps).
- **Seeding & Seeders**: Mengisi database dengan data awal default (misal akun admin pertama kali menggunakan `AdminSeeder` dan konten sambutan awal menggunakan `HomeContentSeeder`).

---

## 🔄 4. Alur Kerja Sistem (System Workflow)

Dosen menyukai visualisasi alur data. Berikut adalah alur proses utama aplikasi:

### A. Alur Publik (Pengunjung Umum)
1. **Pengunjung** mengakses URL `/`.
2. **Router** (`routes/web.php`) menerima permintaan dan meneruskannya ke `SchoolController@index`.
3. **Controller** menarik data sambutan, fasilitas, ekskul, dll. dari database.
4. Data tersebut dikirim ke template view `school/home.blade.php`.
5. Browser merender HTML+CSS hasil kompilasi server untuk pengunjung.

### B. Alur Admin (CRUD - Contoh Tambah Fasilitas)
1. **Admin** mengisi form di halaman `/admin/facilities/create` (View).
2. Data dikirim menggunakan metode HTTP POST ke rute `/admin/facilities` (Routes).
3. **`FacilityController@store`** menerima data tersebut dan melakukan:
   - **Validasi**: Memastikan nama, deskripsi, dan gambar valid (misal gambar maksimal 2MB).
   - **Upload File**: File gambar diunggah ke folder `storage/app/public/gallery/` dengan nama unik (menggunakan `time()`).
   - **Save DB**: Menyimpan nama teks dan path lokasi gambar ke database SQLite.
4. Admin dialihkan kembali ke daftar fasilitas dengan pesan sukses.

---

## 🛠️ 5. Panduan Instalasi & Setup di Berbagai Lingkungan

Pastikan Anda hafal cara instalasi ini jika ditanya dosen tentang *deployment* proyek.

### Prasyarat Wajib (Semua Environment)
1. NodeJS & NPM (Untuk mengompilasi CSS/Tailwind menggunakan Vite).
2. Composer (Dependency Manager untuk mengunduh package PHP Laravel).

---

### Skenario A: Menggunakan PHP Biasa (CLI & Manual)
1. **Instal Dependensi**:
   ```bash
   composer install --ignore-platform-reqs
   npm install
   ```
2. **Setup Konfigurasi (.env)**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. **Aktifkan Extension di `php.ini`**:
   Buka file `php.ini` dari folder instalasi PHP Anda, cari dan hilangkan tanda titik koma (`;`) pada baris berikut:
   ```ini
   extension_dir = "ext"
   extension=pdo_sqlite
   extension=sqlite3
   extension=openssl
   extension=fileinfo
   extension=gd
   ```
4. **Migrasi Database & Seed**:
   ```bash
   php artisan migrate:fresh --seed
   ```
5. **Jalankan Aplikasi**:
   ```bash
   php composer.phar dev   # Atau buka 2 terminal: 'php artisan serve' & 'npm run dev'
   ```

---

### Skenario B: Menggunakan Laragon
Laragon adalah tool terbaik untuk Windows karena sudah otomatis menyediakan PHP, Composer, dan terminal khusus.
1. Salin folder proyek `SDN-Manggisan-04` ke direktori root Laragon: `C:\laragon\www\SDN-Manggisan-04`.
2. Buka aplikasi Laragon, lalu klik tombol **Terminal**.
3. Di dalam terminal Laragon, ketik:
   ```bash
   cd SDN-Manggisan-04
   composer install
   npm install
   php artisan key:generate
   php artisan migrate:fresh --seed
   npm run dev
   ```
4. Jika ingin menggunakan **MySQL** bawaan Laragon:
   - Klik **Start All** di Laragon untuk menyalakan server MySQL.
   - Buka Database Manager di Laragon, buat database baru bernama `sdn_manggisan`.
   - Ubah berkas `.env` di proyek Anda:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=sdn_manggisan
     DB_USERNAME=root
     DB_PASSWORD=
     ```
   - Jalankan `php artisan migrate:fresh --seed`.

---

### Skenario C: Menggunakan XAMPP
XAMPP adalah server lokal tradisional. XAMPP biasanya tidak otomatis menyertakan Composer dan NodeJS, jadi Anda harus menginstalnya secara terpisah.
1. Salin folder proyek ke `C:\xampp\htdocs\SDN-Manggisan-04`.
2. Nyalakan **Apache** dan **MySQL** di XAMPP Control Panel.
3. Buka browser, akses `http://localhost/phpmyadmin`, buat database baru bernama `sdn_manggisan`.
4. Buka Command Prompt (CMD) di folder proyek tersebut (`htdocs/SDN-Manggisan-04`):
   ```bash
   composer install
   npm install
   ```
5. Sesuaikan `.env` untuk koneksi MySQL (atur `DB_DATABASE=sdn_manggisan`, `DB_USERNAME=root`, `DB_PASSWORD=`).
6. Jalankan migrasi:
   ```bash
   php artisan migrate:fresh --seed
   ```
7. Jalankan compiler Tailwind:
   ```bash
   npm run dev
   ```
8. Buka website di browser via server bawaan XAMPP:
   `http://localhost/SDN-Manggisan-04/public`

---

## ⚡ 6. Analisis Command Runner: `composer dev` vs `php artisan serve`

Dosen Anda mungkin bertanya: *"Kenapa kamu menjalankan proyek ini dengan `composer dev` (atau `php composer.phar dev`), bukan `php artisan serve` biasa?"*

### 💡 Konsep Di Balik Layar:
Di dalam berkas `composer.json` proyek ini, terdapat skrip kustom yang didefinisikan sebagai berikut:
```json
"dev": [
    "Composer\\Config::disableProcessTimeout",
    "npx concurrently -c \"#93c5fd,#c4b5fd,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"npm run dev\" --names=server,queue,vite"
]
```
Saat Anda mengetik `php composer.phar dev`, perintah ini menggunakan library `concurrently` untuk memutar **3 proses background sekaligus** di dalam satu tab terminal Anda:
1. **`php artisan serve`**: Menyalakan server lokal PHP (backend) di port 8000.
2. **`npm run dev`**: Menyalakan compiler **Vite** yang mengompilasi assets CSS Tailwind v4 secara real-time.
3. **`php artisan queue:listen`**: Mendengarkan antrean tugas background jika ada proses asinkronus.

### ⚖️ Perbandingan Keunggulan & Kelemahan:

| Parameter | `php composer.phar dev` (Concurrent) | `php artisan serve` (Standard) |
| :--- | :--- | :--- |
| **Kemudahan** | **Sangat Praktis**. Cukup jalankan satu perintah, semua sistem (server & CSS compiler) langsung aktif bersamaan. | **Repot**. Hanya menyalakan server PHP saja. Anda harus membuka tab terminal baru dan mengetik `npm run dev` secara manual agar CSS Tailwind-nya termuat. |
| **Konsumsi Memori (RAM)** | Lebih tinggi, karena menjalankan 3 proses secara simultan di latar belakang. | Sangat ringan, hanya menjalankan proses tunggal server PHP. |
| **Kemudahan Debugging** | Agak membingungkan jika ada error, karena log keluaran dari Server, Vite, dan Queue bercampur menjadi satu di satu layar terminal. | Sangat mudah, log server terpisah rapi dari log compiler CSS/JS. |

---

## 📈 7. Analisis SWOT Proyek (Keunggulan & Kelemahan Sistem)

### 👍 Keunggulan Proyek:
1. **Sangat Modern (Up-to-Date)**: Menggunakan Laravel 12 dan Tailwind CSS v4 terbaru, menjamin performa tinggi, efisiensi kode, dan keamanan web standar industri masa kini.
2. **Dinamis & Bebas Hardcode**: Pengelola sekolah dapat memperbarui teks sambutan, pengumuman, sejarah, foto utama beranda, guru, hingga ekskul secara instan melalui dashboard admin tanpa mengubah sebaris kode pun.
3. **Database Tanpa Server (SQLite)**: Proses setup instan dan hemat memori karena database berbentuk file tunggal di dalam folder proyek, sangat mudah untuk dipindahkan atau didemonstrasikan saat sidang.

### 👎 Kelemahan Proyek:
1. **Keterbatasan Skalabilitas SQLite**: Jika website menerima trafik penulisan data secara bersamaan (misal ribuan pengguna mengisi form sekaligus), SQLite berpotensi mengalami *database locking error* karena SQLite mengunci seluruh file saat menulis data.
2. **Ketergantungan CDN Eksternal**: Beberapa komponen visual pada layout admin menggunakan pustaka Bootstrap & FontAwesome yang dipanggil dari CDN luar, sehingga membutuhkan koneksi internet agar tampilannya termuat dengan sempurna di server lokal.

---

## 🌐 8. Panduan Deployment (Cara Meng-online-kan ke Hosting/cPanel)

Dosen sering menguji pemahaman mahasiswa tentang cara merilis proyek ke internet. Berikut langkah-langkah men-deploy aplikasi Laravel 12 ke Shared Hosting (cPanel):

### Langkah 1: Persiapan File di Lokal
1. Jalankan perintah kompilasi produksi di lokal komputer Anda agar semua CSS & JS digabungkan secara permanen ke folder public:
   ```bash
   npm run build
   ```
2. Hapus folder `node_modules` (karena folder ini berukuran sangat besar dan tidak dibutuhkan lagi di server produksi).
3. Kompres seluruh folder proyek menjadi satu file arsip format **`.zip`** (misal: `website-sekolah.zip`).

### Langkah 2: Proses Unggah di cPanel
1. Masuk ke cPanel hosting Anda, buka **File Manager**.
2. Masuk ke folder root akun Anda (satu tingkat di luar folder `public_html`). Unggah file `website-sekolah.zip` di sini, lalu ekstrak (misal diekstrak ke folder `/home/username/SDN-Manggisan-04`).
3. Buka folder proyek tersebut di File Manager, masuk ke dalam folder `public/`. **Pindahkan/potong (cut) semua file di dalam folder `public` tersebut, lalu tempel (paste) ke dalam folder `public_html` hosting Anda.**

> [!IMPORTANT]
> **Mengapa dipisahkan?**
> Hal ini dilakukan demi keamanan. File konfigurasi sensitif (seperti berkas `.env` dan kode backend) diletakkan di luar folder `public_html` agar tidak bisa diakses secara langsung oleh pengunjung melalui browser. Hanya file aset publik (CSS, JS, index.php) yang berada di dalam `public_html`.

### Langkah 3: Menyesuaikan Path di `index.php`
Karena file backend dipisahkan dari folder `public_html`, kita harus memperbarui rujukan path di dalam file `public_html/index.php`:
1. Buka dan edit file `public_html/index.php` di File Manager cPanel.
2. Cari baris berikut (biasanya di baris 10-20):
   ```php
   require __DIR__.'/../vendor/autoload.php';
   $app = require_once __DIR__.'/../bootstrap/app.php';
   ```
3. Ubah path-nya agar mengarah ke lokasi folder backend yang diletakkan di luar `public_html` tadi:
   ```php
   require __DIR__.'/../SDN-Manggisan-04/vendor/autoload.php';
   $app = require_once __DIR__.'/../SDN-Manggisan-04/bootstrap/app.php';
   ```
4. Simpan perubahan.

### Langkah 4: Konfigurasi Database & Environment di Server
1. Buat database MySQL baru beserta user database-nya melalui menu **MySQL Databases** di cPanel.
2. Edit file `.env` di dalam folder backend (`SDN-Manggisan-04/.env`):
   - Ubah `APP_ENV=production`
   - Ubah `APP_DEBUG=false` (sangat penting agar pesan error sistem yang sensitif tidak tampil ke publik)
   - Ubah konfigurasi database ke MySQL yang baru dibuat di cPanel:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nama_database_cpanel
     DB_USERNAME=user_database_cpanel
     DB_PASSWORD=password_database_cpanel
     ```
3. Jalankan migrasi database di hosting menggunakan fitur Terminal cPanel (jika tersedia), atau buat cron job sementara yang memicu perintah: `php /home/username/SDN-Manggisan-04/artisan migrate --seed`.

---

## ❓ 9. Prediksi Pertanyaan Ujian & Jawaban Terbaik (FAQ)

Gunakan jawaban ini saat berhadapan langsung dengan dosen penguji:

#### Q1: "Jelaskan konsep MVC pada aplikasi yang kamu buat ini!"
> **Jawaban**: 
> Proyek ini menggunakan arsitektur MVC (Model-View-Controller) bawaan Laravel:
> 1. **Model**: Berfungsi merepresentasikan tabel di database dan mengatur logika data (misal: `app/Models/Facility.php`).
> 2. **View**: Berfungsi mengatur tampilan antarmuka yang dilihat pengguna menggunakan Blade Engine (misal: `resources/views/school/home.blade.php`).
> 3. **Controller**: Berfungsi sebagai jembatan penghubung yang memproses permintaan pengguna, mengambil data dari Model, dan mengirimkannya ke View (misal: `app/Http/Controllers/SchoolController.php`).

#### Q2: "Mengapa kamu memilih SQLite sebagai database default, bukan MySQL?"
> **Jawaban**: 
> SQLite dipilih karena efisiensi dan kepraktisannya untuk aplikasi berskala kecil hingga menengah seperti website profil sekolah. SQLite tidak membutuhkan server database eksternal yang terus berjalan (seperti MySQL di port 3306), melainkan disimpan dalam bentuk berkas tunggal (`.sqlite`) di dalam folder proyek. Hal ini mempermudah proses deployment, backup, dan menghemat konsumsi memori server lokal saat pengembangan. Namun, sistem ini tetap siap beralih ke MySQL sewaktu-waktu hanya dengan mengganti driver koneksi di file `.env`.

#### Q3: "Bagaimana cara kerja pengunggahan file dan apa fungsi dari `php artisan storage:link`?"
> **Jawaban**: 
> Demi alasan keamanan, Laravel melarang akses browser secara langsung ke folder `storage/app/public` (tempat file terunggah disimpan). Folder publik yang bisa diakses langsung oleh browser hanyalah folder `public/`. 
> Oleh karena itu, perintah `php artisan storage:link` digunakan untuk membuat **Symbolic Link** (semacam folder shortcut/jembatan) bernama `public/storage` yang secara fisik merujuk ke folder rahasia `storage/app/public`. Dengan begitu, file yang diunggah admin bisa ditampilkan di browser secara aman melalui URL `asset('storage/nama_file.jpg')`.

#### Q4: "Bagaimana aplikasi ini mencegah serangan SQL Injection dan Cross-Site Scripting (XSS)?"
> **Jawaban**:
> 1. **SQL Injection**: Dicegah secara otomatis oleh ORM Eloquent Laravel yang menggunakan fitur *PDO Parameter Binding* (menghilangkan input berbahaya sebelum dieksekusi sebagai query database).
> 2. **CSRF (Cross-Site Request Forgery)**: Setiap form input di aplikasi ini wajib menyertakan token `@csrf` yang memverifikasi bahwa pengiriman data benar-benar berasal dari pengguna resmi di web tersebut, bukan skrip berbahaya dari situs luar.
> 3. **XSS**: Blade Templating Laravel menggunakan sintaks `{{ $data }}` yang otomatis melakukan *HTML Escaping* (mengubah karakter tag script seperti `<script>` menjadi teks biasa `&lt;script&gt;`) sehingga kode jahat tidak bisa dieksekusi di browser.

#### Q5: "Apa gunanya file `composer.json` dan `package.json`?"
> **Jawaban**:
> - **`composer.json`**: Menyimpan daftar dependensi library PHP yang digunakan oleh Laravel (backend) beserta versinya.
> - **`package.json`**: Menyimpan daftar dependensi library Javascript dan CSS (seperti Vite, Tailwind CSS, Axios) untuk keperluan kompilasi dan optimasi tampilan frontend.

---

🌟 **Tips Ujian**: Jawablah pertanyaan dosen dengan tenang, percaya diri, dan selalu kaitkan jawaban Anda dengan struktur kode yang telah dibuat (tunjukkan bahwa Anda paham letak file-nya). Semoga sukses ujiannya besok, Elz! Kamu pasti bisa! 💪⚡
