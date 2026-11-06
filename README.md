# MEDICARE — Sistem Manajemen Apotek Terintegrasi

**MEDICARE** merupakan aplikasi berbasis web yang dikembangkan untuk membantu pengelolaan data dan operasional administrasi apotek secara terintegrasi. Aplikasi ini dibangun menggunakan framework **Laravel** dengan **MySQL** sebagai sistem basis data serta REST API untuk mendukung pertukaran data dalam format JSON.

Project ini dikembangkan sebagai tugas kelompok mata kuliah **Teknologi Sistem Terintegrasi** di Politeknik Negeri Lhokseumawe.

## Fitur Utama

- **Manajemen Pelanggan** — Mengelola identitas pelanggan, alamat, dan nomor telepon.
- **Manajemen Staf** — Menyimpan dan memperbarui informasi staf apotek, termasuk data kelahiran dan kontak.
- **Manajemen Obat** — Mengelola kode obat, nama, kategori, merek, harga, jumlah stok, serta tanggal kedaluwarsa.
- **Pengelolaan Inventaris** — Mencatat aktivitas stok masuk dan stok keluar secara terstruktur.
- **Riwayat Pergerakan Stok** — Menampilkan catatan perubahan persediaan obat.
- **Validasi Data** — Memastikan input sesuai aturan dan mencegah pengeluaran stok melebihi persediaan.
- **Dashboard Interaktif** — Menyediakan tampilan manajemen dengan navigasi dan visualisasi data.
- **REST API** — Menyediakan akses data melalui endpoint JSON yang dapat diuji menggunakan Postman.
- **Integrasi GitHub** — Mendukung pengelolaan kode sumber dan kolaborasi pengembangan.

## Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| PHP | Bahasa pemrograman backend |
| Laravel 12 | Framework aplikasi |
| MySQL | Sistem basis data |
| HTML, CSS, JavaScript | Pengembangan antarmuka |
| Blade | Template engine Laravel |
| Postman | Pengujian REST API |
| Git & GitHub | Version control dan kolaborasi |

## Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan perangkat sudah memiliki:

- PHP 8.2 atau lebih baru.
- Composer.
- MySQL / XAMPP.
- Git.
- Web browser.
- Postman (untuk pengujian API).

## Instalasi dan Menjalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/muhammadhaikall0241-maker/medicare.git
cd medicare
```

### 2. Instal Dependensi

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file konfigurasi:

Windows PowerShell:
```powershell
Copy-Item .env.example .env
```

Kemudian sesuaikan konfigurasi database pada `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medicare
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Persiapkan Database

Buat database bernama `medicare` melalui phpMyAdmin atau MySQL.

Jalankan migrasi:

```bash
php artisan migrate
```

### 6. Jalankan Server Laravel

```bash
php artisan serve
```

Buka aplikasi melalui browser:

http://127.0.0.1:8000

Pastikan layanan MySQL pada XAMPP sudah aktif.

## REST API

API MEDICARE menggunakan format pertukaran data JSON dengan prefix `/api`.

| Method | Endpoint | Keterangan |
|---|---|---|
| GET | `/api/customers` | Menampilkan data pelanggan |
| POST | `/api/customers` | Menambahkan pelanggan |
| GET | `/api/customers/{id}` | Melihat detail pelanggan |
| PUT/PATCH | `/api/customers/{id}` | Memperbarui pelanggan |
| DELETE | `/api/customers/{id}` | Menghapus pelanggan |
| GET | `/api/staff` | Menampilkan data staf |
| POST | `/api/staff` | Menambahkan staf |
| GET | `/api/staff/{id}` | Melihat detail staf |
| PUT/PATCH | `/api/staff/{id}` | Memperbarui staf |
| DELETE | `/api/staff/{id}` | Menghapus staf |
| GET | `/api/products` | Menampilkan data obat |
| POST | `/api/products` | Menambahkan obat |
| GET | `/api/products/{id}` | Melihat detail obat |
| PUT/PATCH | `/api/products/{id}` | Memperbarui obat |
| DELETE | `/api/products/{id}` | Menghapus obat |
| GET | `/api/stock-movements` | Melihat riwayat stok |
| POST | `/api/stock-movements` | Mencatat perubahan stok |
| GET | `/api/stock-movements/{id}` | Melihat detail pergerakan stok |

### Pengujian API dengan Postman

Untuk melakukan pengujian:

1. Jalankan server Laravel.
2. Buka aplikasi Postman.
3. Masukkan alamat endpoint sesuai kebutuhan.
4. Pilih HTTP method yang sesuai.
5. Tambahkan header:

```text
Accept: application/json
Content-Type: application/json
```

6. Untuk operasi POST dan PUT, masukkan data pada bagian Body dengan format JSON.
7. Kirim request dan periksa HTTP status serta respons yang diberikan server.

## Struktur Direktori Project

```text
medicare/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── Api/
│   └── Models/
├── bootstrap/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── public/
├── resources/
│   └── views/
├── routes/
│   ├── web.php
│   └── api.php
├── storage/
├── tests/
├── .env.example
├── artisan
└── composer.json
```

## Pengembangan dan Kolaborasi

Project dikelola menggunakan Git dan GitHub untuk menyimpan perubahan kode, memantau riwayat pengembangan, serta memungkinkan anggota kelompok bekerja bersama melalui fitur repository collaboration.

## Pengembang

Project Kelompok — Mata Kuliah Teknologi Sistem Terintegrasi

**Program Studi:** Teknologi Rekayasa Komputer dan Jaringan  
**Institusi:** Politeknik Negeri Lhokseumawe

---

*MEDICARE — Integrated Pharmacy Management System.*
