# 🍚 Vermata Burjo - UTS Pemrograman Web Lanjut

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-red?logo=codeigniter)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange?logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4-purple?logo=bootstrap)
![Status](https://img.shields.io/badge/Status-Selesai-green)

---

## 📋 Tentang Proyek

**Vermata Burjo** adalah website profil dan sistem manajemen menu untuk usaha **warung burjo** (warung makan sederhana) yang dibangun menggunakan **Framework CodeIgniter 4**. Website ini dikembangkan sebagai tugas **Ujian Tengah Semester (UTS)** mata kuliah **Pemrograman Web Lanjut** semester 4.

Proyek ini mengimplementasikan konsep **MVC (Model-View-Controller)** dan dilengkapi dengan fitur **autentikasi pengguna**, **manajemen menu** (CRUD), serta **dashboard admin** untuk mengelola data makanan dan minuman.

Website ini juga berfungsi sebagai **portofolio** yang menunjukkan kemampuan dalam pengembangan web modern dengan PHP framework.

---

## 🎯 Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 🔐 **Authentication System** | Login dengan data statis, session management, logout |
| 🛡️ **Filter Protection** | Auth filter untuk proteksi halaman, Admin filter untuk role |
| 📄 **Multi Page** | Home, Menu, About, Admin Dashboard |
| 👑 **Admin Dashboard** | Halaman khusus admin dengan statistik menu dan CRUD |
| 🍽️ **Manajemen Menu** | CRUD (Create, Read, Update, Delete) untuk makanan & minuman |
| 🔍 **Search & Filter** | Pencarian dan filter menu secara real-time |
| 📞 **WhatsApp Integration** | Tombol pesan langsung ke WhatsApp pemilik burjo |
| 🎨 **Responsive Design** | Tampilan modern dengan template coffee yang responsif |

---

## 🧠 Implementasi Konsep

| Konsep | Implementasi |
|--------|--------------|
| **Routes** | Definisi URL mapping ke controller di `app/Config/Routes.php` |
| **Layout** | Template dengan `layout.php` dan `components/` (header, sidebar, footer) |
| **Session** | Penyimpanan data login user |
| **Filter** | `Auth.php` dan `AdminFilter.php` untuk proteksi akses |
| **Migration** | Struktur database dengan version control |
| **Seeding** | Data dummy untuk testing |
| **CRUD** | Create, Read, Update, Delete untuk foods & drinks |

---

## 🚀 Halaman Website

| Halaman | URL | Hak Akses |
|---------|-----|-----------|
| Home | `/` | ✅ Publik (tanpa login) |
| Menu | `/menu` | ✅ Publik (tanpa login) |
| About | `/about` | ✅ Publik (tanpa login) |
| Login | `/login` | ✅ Publik (tanpa login) |
| Logout | `/logout` | ✅ User login |
| Admin Dashboard | `/admin/dashboard` | ❌ Hanya Admin |
| Manajemen Makanan | `/admin/foods` | ❌ Hanya Admin |
| Manajemen Minuman | `/admin/drinks` | ❌ Hanya Admin |

---

## 🔑 Demo Credential

| Username | Password | Role |
|----------|----------|------|
| `eka88` | `1234567` | Admin |

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| **CodeIgniter 4** | PHP Framework (backend) |
| **PHP 8.2+** | Bahasa pemrograman |
| **MySQL** | Database management system |
| **Bootstrap 4** | CSS Framework |
| **Coffee Template** | Template frontend (Free Bootstrap 4 Template by Colorlib) |
| **jQuery** | JavaScript library untuk interaktivitas |
| **Chart.js** | Library untuk grafik statistik |
| **Faker PHP** | Library untuk generate data dummy |

---

## 📁 Struktur Proyek
uts_15676/
├── app/
│   ├── Config/
│   │   ├── Filters.php
│   │   └── Routes.php
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── Home.php
│   │   ├── MenuController.php
│   │   ├── AboutController.php
│   │   └── AdminController.php
│   ├── Filters/
│   │   ├── Auth.php
│   │   └── AdminFilter.php
│   ├── Models/
│   │   ├── FoodModel.php
│   │   ├── DrinkModel.php
│   │   └── UserModel.php
│   ├── Views/
│   │   ├── components_coffee/
│   │   │   ├── header.php
│   │   │   └── footer.php
│   │   ├── layout_coffee.php
│   │   └── v_*.php
│   └── Database/
│       ├── Migrations/
│       └── Seeds/
├── public/
│   ├── coffee1-1.0.0/
│   ├── img/
│   └── Vermata/
│       └── assets/
└── writable/

---

## 📊 Database Structure

### Tabel `foods`

| Field | Type | Keterangan |
|-------|------|------------|
| `id` | INT(11) AUTO_INCREMENT | Primary Key |
| `nama_makanan` | VARCHAR(255) | Nama makanan |
| `harga` | DOUBLE | Harga makanan |
| `deskripsi` | TEXT | Deskripsi makanan |
| `kategori` | VARCHAR(100) | Kategori makanan (Nasi, Mie, dll) |
| `foto` | VARCHAR(255) | Nama file foto |
| `status` | ENUM('tersedia','habis') | Status ketersediaan |
| `created_at` | DATETIME | Waktu dibuat |
| `updated_at` | DATETIME | Waktu diupdate |

### Tabel `drinks`

| Field | Type | Keterangan |
|-------|------|------------|
| `id` | INT(11) AUTO_INCREMENT | Primary Key |
| `nama_minuman` | VARCHAR(255) | Nama minuman |
| `harga` | DOUBLE | Harga minuman |
| `deskripsi` | TEXT | Deskripsi minuman |
| `kategori` | VARCHAR(100) | Kategori minuman (Dingin/Panas) |
| `ukuran` | ENUM('Small','Medium','Large') | Ukuran minuman |
| `foto` | VARCHAR(255) | Nama file foto |
| `status` | ENUM('tersedia','habis') | Status ketersediaan |
| `created_at` | DATETIME | Waktu dibuat |
| `updated_at` | DATETIME | Waktu diupdate |

---

## 💻 Instalasi & Setup

### Prasyarat

- PHP 8.2 atau lebih tinggi
- Composer
- Web Server (XAMPP / Laragon / Native)
- MySQL

### Langkah Instalasi

# 1. Clone repository
git clone https://github.com/username-anda/uts_15676.git
cd uts_15676

2. Install dependencies
composer install

# 3. Setup environment
cp env .env
# Edit .env sesuai kebutuhan (atur baseURL dan database)

-- 4. Buat database di phpMyAdmin
CREATE DATABASE db_ci4;

# 5. Jalankan migration & seeder
php spark migrate
php spark db:seed DatabaseSeeder

# 6. Jalankan server development
php spark serve

# 7. Akses website
http://localhost:8080

---

🔐 Login ke Website
Buka http://localhost:8080/login

Masukkan credential demo:

Username: eka88

Password: 1234567

Klik Login

---

📚 Yang Dipelajari dari Proyek Ini
✅ Instalasi dan konfigurasi CodeIgniter 4

✅ Konsep MVC (Model-View-Controller)

✅ Routing dan URL management

✅ Layout system dengan template & components

✅ Session management untuk autentikasi

✅ Filter untuk proteksi route (Auth & Admin)

✅ Migration dan Seeding database

✅ CRUD (Create, Read, Update, Delete)

✅ Validasi form

✅ Integrasi template frontend ke CI4

✅ Upload foto

✅ Pencarian dan filtering data

---

 Lisensi
Proyek ini dibuat untuk tugas UTS Pemrograman Web Lanjut dan dapat digunakan sebagai referensi pembelajaran.
