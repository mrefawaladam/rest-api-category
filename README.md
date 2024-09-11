# Backend Assessment - JOGJACAMP

## Deskripsi Proyek
JOGJACAMP adalah aplikasi backend yang dirancang untuk mengelola kategori dalam sistem. Proyek ini merupakan bagian dari penilaian backend yang bertujuan untuk mengevaluasi keterampilan dalam menggunakan Laravel, terutama dalam mengelola operasi CRUD (Create, Read, Update, Delete) melalui API.

## Fitur Utama
- **CRUD Kategori**: Aplikasi memungkinkan pengguna untuk melakukan operasi CRUD pada kategori.
- **Notifikasi Email**: Mengirim notifikasi email saat kategori ditambahkan atau dihapus.
- **Pengujian**: Menambahkan kategori baru ke sistem.
- **Seeder**:  Mengisi data awal kategori untuk kebutuhan pengujian atau pengembangan.

## Prerequisites
- **PHP**: Versi 7.4 atau lebih tinggi
- **Laravel**: Versi 8.x
- **Composer**: Alat manajemen dependensi PHP
- **Database**: SQLite (untuk pengujian), MYSQL (untuk pengembangan)

## Instalasi

### Clone Repositori
1. Salin repositori ini ke lokal Anda dengan perintah:

```bash
git clone <URL_REPOSITORI>
```
2. Instal Dependensi Jalankan perintah berikut untuk menginstal semua dependensi yang diperlukan:
```bash
composer install
```
3. Konfigurasi Lingkungan Salin file .env.example menjadi .env:
```bash
cp .env.example .env
```
4. Generate Key Aplikasi
```bash
php artisan key:generate
```
5. Migrasi dan Seeder Database Untuk menjalankan migrasi dan mengisi database dengan data awal, jalankan:
```bash
php artisan migrate --seed
```
6. Akses CRUD Category
- Buka browser dan masuk ke alamat http://localhost:8000/category/

## Dokumentasi API
API menyediakan endpoint untuk mengelola kategori. Dokumentasi API dapat diakses melalui Swagger setelah menjalankan server aplikasi.

### Endpoint Utama
- **GET /api/categories**: Mengambil daftar semua kategori.
- **POST /api/categories**: Membuat kategori baru.
- **GET /api/categories/{id}**: Mengambil detail kategori berdasarkan ID.
- **PUT /api/categories/{id}**: Memperbarui kategori berdasarkan ID.
- **DELETE /api/categories/{id}**: Menghapus kategori berdasarkan ID.

Dokumentasi API lengkap dapat ditemukan di /api/documentation (menggunakan Swagger).

## Arsitektur Aplikasi
Aplikasi ini dibangun menggunakan arsitektur MVC (Model-View-Controller) dengan beberapa komponen tambahan:

- **Controller**: Mengatur logika rute dan validasi permintaan.
- **Model**: Mengelola logika bisnis dan interaksi database.
- **Form Requests**: Digunakan untuk validasi data masuk.
- **Repository Pattern**: Digunakan untuk memisahkan logika bisnis dari akses data, membuat kode lebih terstruktur dan mudah diuji.
- **Service Layer**: Mengelola logika bisnis yang lebih kompleks, seperti pengiriman notifikasi.
### Struktur Direktori
- **app/Models**: Model untuk tabel database.
- **app/Http/Controllers**: Controller untuk menangani logika permintaan.
- **app/Http/Requests**: File form request untuk validasi data.
- **app/Services**: Layanan khusus yang menangani logika bisnis tambahan.
- **app/Repositories**: Repositori yang menangani akses data dari model.
- **routes/api.php**: Berisi definisi rute API.

