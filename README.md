JOGJACAMP Backend Assessment
Deskripsi Proyek
JOGJACAMP adalah aplikasi manajemen kategori yang bertujuan untuk menyediakan API CRUD (Create, Read, Update, Delete) untuk mengelola kategori. Proyek ini dikembangkan menggunakan Laravel 8 dan menggunakan PHPUnit untuk pengujian unit dan fitur.

Fitur Utama
CRUD Kategori: Menyediakan endpoint API untuk membuat, membaca, memperbarui, dan menghapus kategori.
Pengujian Unit: Menggunakan PHPUnit untuk menguji fungsionalitas API tanpa menggunakan model factory.
Dokumentasi API: Mendokumentasikan API menggunakan OpenAPI (Swagger).
Struktur Proyek
app/Http/Controllers/Api/CategoryController.php: Kontroler yang menangani logika API untuk kategori.
app/Services/CategoryService.php: Layanan yang berisi logika bisnis untuk pengelolaan kategori.
app/Http/Requests/StoreCategoryRequest.php: Request untuk validasi data saat membuat kategori.
app/Http/Requests/UpdateCategoryRequest.php: Request untuk validasi data saat memperbarui kategori.
tests/Unit/CategoryApiTest.php: Pengujian unit untuk API kategori.
phpunit.xml: Konfigurasi PHPUnit untuk pengujian dan pelaporan cakupan kode.
Pengaturan Lingkungan
Untuk menjalankan proyek ini, Anda perlu mengatur beberapa variabel lingkungan di file .env. Berikut adalah contoh pengaturan yang diperlukan:

APP_ENV=testing
CACHE_DRIVER=array
MAIL_MAILER=array
QUEUE_CONNECTION=sync
SESSION_DRIVER=array
TELESCOPE_ENABLED=false
Jika Anda mengalami masalah dengan koneksi database, pastikan bahwa konfigurasi database Anda telah disesuaikan dengan benar. Untuk pengujian, Anda bisa menggunakan SQLite dalam memori dengan mengatur:

DB_CONNECTION=sqlite
DB_DATABASE=:memory:
Pengujian
Untuk menjalankan pengujian unit, gunakan perintah berikut:

bash
Copy code
php artisan test
Pastikan bahwa semua pengujian berhasil dijalankan. Jika ada kesalahan, periksa pesan kesalahan untuk mendapatkan petunjuk lebih lanjut.

Dokumentasi API
Dokumentasi API tersedia menggunakan Swagger di /api/documentation. Pastikan endpoint API Anda sesuai dengan dokumentasi yang disediakan.

Kontribusi
Jika Anda memiliki saran atau perbaikan, silakan ajukan masalah atau pull request di repositori ini.

