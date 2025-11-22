# Website Donor Darah

Aplikasi website manajemen donor darah yang dibangun dengan Laravel 12, MySQL, dan Laravel Breeze untuk autentikasi. Aplikasi ini memiliki dua role utama: Admin dan Pendonor.

## Fitur

### Fitur Pendonor (User)
- Registrasi dan login
- Dashboard dengan statistik pribadi
- Lihat jadwal donor darah
- Lihat stok darah tersedia
- Lihat riwayat donor pribadi
- Notifikasi email pengingat (akan datang)

### Fitur Admin
- Dashboard dengan statistik lengkap
- CRUD Pendonor (Create, Read, Update, Delete)
- CRUD Stok Darah
- CRUD Jadwal Donor
- Cetak laporan PDF (Pendonor, Stok Darah, Riwayat Donor)
- Manajemen data donor

### API Endpoints
- `GET /api/v1/stok-darah` - Mendapatkan semua stok darah
- `GET /api/v1/stok-darah/{golonganDarah}` - Mendapatkan stok darah berdasarkan golongan
- `GET /api/v1/jadwal-donor` - Mendapatkan jadwal donor mendatang
- `GET /api/v1/jadwal-donor/{id}` - Mendapatkan detail jadwal donor

## Teknologi yang Digunakan

- **Framework**: Laravel 12.39.0
- **PHP**: 8.2.29
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **PDF Generation**: DomPDF
- **API**: Laravel Sanctum
- **Frontend**: Blade Templates + Tailwind CSS

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL >= 5.7
- Node.js & NPM (untuk asset compilation)
- Git

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/theoprapanca90/websitedonordarah.git
cd websitedonordarah
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
APP_NAME="Donor Darah"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOCALE=id
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=donor_darah
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Buat Database

Buat database MySQL dengan nama `donor_darah`:

```sql
CREATE DATABASE donor_darah CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

Perintah ini akan:
- Membuat semua tabel yang diperlukan
- Membuat akun admin default
- Membuat data sample untuk testing

### 7. Compile Assets

```bash
npm run dev
```

Atau untuk production:

```bash
npm run build
```

### 8. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Akun Default

Setelah menjalankan seeder, Anda dapat login dengan akun berikut:

### Admin
- **Email**: admin@donordarah.com
- **Password**: admin123

### Pendonor (Sample Users)
- **Email**: john@example.com | **Password**: password
- **Email**: jane@example.com | **Password**: password
- **Email**: bob@example.com | **Password**: password

## Struktur Database

### Tabel Users
- `id` - Primary key
- `name` - Nama lengkap
- `email` - Email (unique)
- `password` - Password (hashed)
- `role` - Role (admin/pendonor)
- `golongan_darah` - Golongan darah (A+, A-, B+, B-, AB+, AB-, O+, O-)
- `tanggal_lahir` - Tanggal lahir
- `alamat` - Alamat lengkap
- `telepon` - Nomor telepon

### Tabel Stok Darah
- `id` - Primary key
- `golongan_darah` - Golongan darah (unique)
- `jumlah` - Jumlah kantong darah

### Tabel Jadwal Donor
- `id` - Primary key
- `lokasi` - Lokasi donor
- `tanggal` - Tanggal donor
- `jam_mulai` - Jam mulai
- `jam_selesai` - Jam selesai
- `keterangan` - Keterangan tambahan

### Tabel Riwayat Donor
- `id` - Primary key
- `user_id` - Foreign key ke users
- `tanggal` - Tanggal donor
- `lokasi` - Lokasi donor
- `status` - Status (selesai/dijadwalkan/dibatalkan)
- `catatan` - Catatan tambahan

## Struktur Folder

```
websitedonordarah/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Controller untuk admin
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── PendonorController.php
│   │   │   │   ├── StokDarahController.php
│   │   │   │   ├── JadwalDonorController.php
│   │   │   │   └── LaporanController.php
│   │   │   ├── User/           # Controller untuk pendonor
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── JadwalDonorController.php
│   │   │   │   ├── StokDarahController.php
│   │   │   │   └── RiwayatDonorController.php
│   │   │   └── Api/            # API Controllers
│   │   │       ├── StokDarahController.php
│   │   │       └── JadwalDonorController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── StokDarah.php
│       ├── JadwalDonor.php
│       └── RiwayatDonor.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2025_11_22_081329_create_stok_darah_table.php
│   │   ├── 2025_11_22_081329_create_jadwal_donor_table.php
│   │   └── 2025_11_22_081329_create_riwayat_donor_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── routes/
│   ├── web.php              # Web routes
│   └── api.php              # API routes
└── resources/
    └── views/               # Blade templates (akan dibuat)
```

## Penggunaan

### Sebagai Admin

1. Login dengan akun admin
2. Akses dashboard admin di `/admin/dashboard`
3. Kelola data pendonor di `/admin/pendonor`
4. Kelola stok darah di `/admin/stok-darah`
5. Kelola jadwal donor di `/admin/jadwal-donor`
6. Cetak laporan di `/admin/laporan`

### Sebagai Pendonor

1. Registrasi akun baru atau login
2. Akses dashboard pendonor di `/user/dashboard`
3. Lihat jadwal donor di `/user/jadwal-donor`
4. Lihat stok darah di `/user/stok-darah`
5. Lihat riwayat donor di `/user/riwayat-donor`

### Menggunakan API

Contoh request menggunakan curl:

```bash
# Mendapatkan semua stok darah
curl http://localhost:8000/api/v1/stok-darah

# Mendapatkan stok darah spesifik
curl http://localhost:8000/api/v1/stok-darah/A+

# Mendapatkan jadwal donor
curl http://localhost:8000/api/v1/jadwal-donor

# Mendapatkan detail jadwal donor
curl http://localhost:8000/api/v1/jadwal-donor/1
```

## Testing

Jalankan test dengan perintah:

```bash
php artisan test
```

## Troubleshooting

### Error: SQLSTATE[HY000] [1045] Access denied

Pastikan konfigurasi database di `.env` sudah benar dan MySQL service sudah berjalan.

### Error: No application encryption key has been specified

Jalankan:
```bash
php artisan key:generate
```

### Error: Class not found

Jalankan:
```bash
composer dump-autoload
```

### Assets tidak muncul

Jalankan:
```bash
npm run dev
```

## Kontribusi

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## Lisensi

Aplikasi ini menggunakan lisensi MIT. Lihat file `LICENSE` untuk detail lebih lanjut.

## Kontak

Theo Prapanca - theo.prapanca90@gmail.com

Project Link: [https://github.com/theoprapanca90/websitedonordarah](https://github.com/theoprapanca90/websitedonordarah)

## Catatan Pengembangan

Aplikasi ini dikembangkan menggunakan:
- Laravel 12.39.0
- PHP 8.2.29
- Composer 2.9.2
- MySQL untuk database
- Laravel Breeze untuk autentikasi
- DomPDF untuk generate PDF
- Laravel Sanctum untuk API authentication

Untuk informasi lebih lanjut tentang Laravel, kunjungi [dokumentasi Laravel](https://laravel.com/docs).
