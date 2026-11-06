# MEDICARE — Sistem Manajemen Apotek Terintegrasi

<p align="center">
  <strong>Aplikasi Manajemen Apotek Berbasis Web dan REST API</strong>
</p>

MEDICARE merupakan aplikasi manajemen apotek terintegrasi yang dikembangkan menggunakan Laravel dan MySQL. Aplikasi ini dirancang untuk membantu pengelolaan data pelanggan, staf apotek, obat, serta persediaan stok secara lebih terstruktur.

Project ini dikembangkan sebagai bagian dari pembelajaran **Teknologi Sistem Terintegrasi** di Program Studi Teknologi Rekayasa Komputer dan Jaringan, Politeknik Negeri Lhokseumawe.

## ✨ Fitur Utama

- **Manajemen Pelanggan** — Menambah, melihat, mengubah, dan menghapus data pelanggan.
- **Manajemen Staf** — Mengelola informasi staf apotek.
- **Manajemen Obat** — Mengelola kode obat, nama, kategori, harga, stok, dan tanggal kedaluwarsa.
- **Manajemen Inventaris** — Mencatat penambahan dan pengeluaran stok obat.
- **Riwayat Stok** — Menampilkan catatan perubahan persediaan.
- **Validasi Data** — Memastikan data yang dimasukkan sesuai ketentuan.
- **Dashboard** — Menyediakan antarmuka pengelolaan data apotek.
- **REST API** — Mendukung pertukaran data menggunakan format JSON.

## 🛠️ Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| PHP 8.2+ | Bahasa pemrograman |
| Laravel 12 | Framework backend |
| MySQL | Database |
| HTML, CSS, JavaScript | Pengembangan antarmuka |
| Blade | Template Laravel |
| Postman | Pengujian REST API |
| Git & GitHub | Version control |

## 📋 Persyaratan Instalasi

Pastikan perangkat telah memiliki:

- PHP versi 8.2 atau lebih baru
- Composer
- MySQL atau XAMPP
- Git
- Postman (untuk pengujian API)

## 🚀 Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/muhammadhaikall0241-maker/medicare.git
```

Masuk ke direktori project:

```bash
cd medicare
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file konfigurasi:

```bash
copy .env.example .env
```

Atur konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medicare
DB_USERNAME=root
DB_PASSWORD=
```

Buat database bernama `medicare` melalui phpMyAdmin atau MySQL.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migration

```bash
php artisan migrate
```

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

## 🔌 REST API Endpoints

Base URL:

```text
http://127.0.0.1:8000/api
```

| Method | Endpoint | Fungsi |
|---|---|---|
| GET | `/customers` | Menampilkan pelanggan |
| POST | `/customers` | Menambahkan pelanggan |
| GET | `/customers/{id}` | Detail pelanggan |
| PUT | `/customers/{id}` | Mengubah pelanggan |
| DELETE | `/customers/{id}` | Menghapus pelanggan |
| GET | `/staff` | Menampilkan staf |
| POST | `/staff` | Menambahkan staf |
| GET | `/staff/{id}` | Detail staf |
| PUT | `/staff/{id}` | Mengubah staf |
| DELETE | `/staff/{id}` | Menghapus staf |
| GET | `/products` | Menampilkan obat |
| POST | `/products` | Menambahkan obat |
| GET | `/products/{id}` | Detail obat |
| PUT | `/products/{id}` | Mengubah obat |
| DELETE | `/products/{id}` | Menghapus obat |
| GET | `/stock-movements` | Melihat riwayat stok |
| POST | `/stock-movements` | Mencatat perubahan stok |
| GET | `/stock-movements/{id}` | Detail riwayat stok |

## 🧪 Pengujian API dengan Postman

Pengujian API dilakukan menggunakan Postman dengan konfigurasi:

**Headers:**

```text
Accept: application/json
Content-Type: application/json
```

Untuk metode POST dan PUT, data dikirim menggunakan format JSON melalui menu Body → raw → JSON.

Pengujian mencakup operasi CRUD pelanggan, staf, dan obat, serta penambahan, pengeluaran, dan validasi persediaan stok.

## 📁 Struktur Project

```text
medicare/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── database/
│   └── migrations/
├── resources/
│   └── views/
├── routes/
│   ├── api.php
│   └── web.php
├── public/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## 👨‍💻 Repository

GitHub:  
https://github.com/muhammadhaikall0241-maker/medicare

Project ini dikembangkan untuk keperluan pembelajaran dan praktikum pengembangan aplikasi berbasis web, database, serta integrasi REST API.

---

**MEDICARE — Better Care. Smarter Management.**
