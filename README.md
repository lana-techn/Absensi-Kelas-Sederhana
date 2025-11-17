# Maulana Absensi Kelas Sederhana

Aplikasi web untuk manajemen absensi siswa kelas sederhana berbasis Laravel 11. Sistem ini memudahkan guru dalam mencatat kehadiran siswa, mengelola data kelas, dan membuat laporan kehadiran.

## 📋 Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Penggunaan](#penggunaan)
- [Akun Test](#akun-test)
- [Struktur Database](#struktur-database)
- [API Routes](#api-routes)
- [Screenshots](#screenshots)
- [Teknologi](#teknologi)

## ✨ Fitur Utama

### 1. **Authentication & Authorization**
   - Login dengan username dan password
   - Session management
   - Logout functionality

### 2. **Manajemen Kelas**
   - Tambah, edit, dan hapus kelas
   - Kelola jumlah bangku/kapasitas kelas
   - Kelola distribusi siswa per kelas

### 3. **Manajemen Siswa**
   - CRUD siswa (Create, Read, Update, Delete)
   - Assign siswa ke kelas
   - Track data NIS (Nomor Induk Siswa)

### 4. **Manajemen Guru/Pengajar**
   - Tambah guru dan assign ke kelas
   - Kelola hubungan guru-kelas

### 5. **Sistem Absensi**
   - Input kehadiran siswa per kelas
   - Status kehadiran: Hadir, Sakit, Izin, Alpa
   - Edit history kehadiran
   - Search dan filter kehadiran berdasarkan tanggal dan nama siswa

### 6. **Dashboard & Laporan**
   - Dashboard dengan visualisasi data menggunakan Chart.js
   - Laporan kehadiran

## 🖥️ Persyaratan Sistem

- PHP >= 8.2
- MariaDB/MySQL >= 10.4
- Composer
- Node.js & npm
- Apache (XAMPP)

## 🚀 Instalasi

### 1. Clone atau Download Project

```bash
cd /Applications/XAMPP/xamppfiles/htdocs
git clone <repository-url> "Maulana Absensi Kelas Sederhana"
cd "Maulana Absensi Kelas Sederhana"
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Setup Environment

```bash
# Copy .env file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_absensiea
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migration & Seeding

```bash
# Run migrations
php artisan migrate

# Seed database dengan user test
php artisan db:seed
```

### 6. Build Assets

```bash
npm run build
# atau untuk development dengan hot reload
npm run dev
```

### 7. Start Application

```bash
# Start Laravel development server
php artisan serve

# Buka browser ke: http://localhost:8000
```

Atau gunakan XAMPP:
- Tempatkan folder di `/Applications/XAMPP/xamppfiles/htdocs/`
- Akses via: `http://localhost/Maulana%20Absensi%20Kelas%20Sederhana`

## ⚙️ Konfigurasi

### Database Configuration

Edit `config/database.php` atau gunakan `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_absensiea
DB_USERNAME=root
DB_PASSWORD=
```

### Session Configuration

Session di simpan dalam `storage/framework/sessions/`

## 📖 Penggunaan

### 1. Login ke Aplikasi

Akses halaman login:
- Desktop: `http://localhost/Maulana%20Absensi%20Kelas%20Sederhana/login`
- Laravel: `http://localhost:8000/login`

Gunakan salah satu akun test (lihat bagian [Akun Test](#akun-test))

### 2. Dashboard

Setelah login, Anda akan melihat dashboard dengan:
- Chart kehadiran
- Statistik siswa
- Quick access menu

### 3. Manajemen Data

#### Manajemen Kelas
- Menu: Kelas → Master Kelas
- Fitur: Tambah, Edit, Hapus kelas
- Kelola kapasitas dan jumlah siswa

#### Manajemen Siswa
- Menu: Siswa → Data Siswa
- Fitur: Tambah, Edit, Hapus siswa
- Assign siswa ke kelas

#### Manajemen Guru
- Menu: Guru → Data Guru
- Fitur: Tambah guru ke kelas

### 4. Input Absensi

- Menu: Absensi → Input Absensi
- Pilih kelas
- Centang status kehadiran setiap siswa
- Klik Submit

### 5. Edit History Kehadiran

- Menu: Kehadiran → Edit Kehadiran
- Pilih kelas dan tanggal
- Ubah status kehadiran
- Save perubahan

## 🔐 Akun Test

Setelah menjalankan seeder, gunakan akun berikut:

| Username | Password | Nama |
|----------|----------|------|
| **admin** | **admin123** | Admin Test |
| **guru** | **guru123** | Guru Test |
| **devi34** | **devi123** | Devi Test |

> **Catatan:** Untuk production, ubah password dan gunakan environment yang aman.

## 🗄️ Struktur Database

### Tabel Utama

#### 1. **users**
```sql
- id: Primary Key
- nip: Nomor Induk Pegawai (unique)
- name: Nama guru/admin
- username: Username untuk login (unique)
- password: Password ter-hash
- remember_token: Session token
- created_at, updated_at
```

#### 2. **kelas**
```sql
- id: Primary Key
- name: Nama kelas (contoh: 1A, 2B)
- jumlah_siswa: Total siswa di kelas
- bangku_tersisa: Sisa bangku/kapasitas
- rombel: Rombongan belajar
- created_at, updated_at
```

#### 3. **siswas**
```sql
- id: Primary Key
- nis: Nomor Induk Siswa (unique)
- kelas_id: Foreign key ke tabel kelas
- name: Nama siswa
- created_at, updated_at
```

#### 4. **pengajars** (Hubungan Guru-Kelas)
```sql
- id: Primary Key
- guru_id: Foreign key ke tabel users
- kelas_id: Foreign key ke tabel kelas
- created_at, updated_at
```

#### 5. **logkehadirans** (History Kehadiran)
```sql
- id: Primary Key
- guru_id: Foreign key ke tabel users
- siswa_id: Foreign key ke tabel siswas
- kelas_id: Foreign key ke tabel kelas
- tanggal: Tanggal kehadiran
- keterangan: Detail status (belum diabsen, hadir, sakit, izin, alpa)
- status: Status kehadiran
- created_at, updated_at
```

## 🛣️ API Routes

### Authentication Routes
```
GET  /login              - Tampil halaman login
POST /login/submit       - Submit login
POST /logout             - Logout
```

### Dashboard
```
GET  /                   - Dashboard utama
```

### Siswa Routes
```
GET  /siswa              - Lihat semua siswa
GET  /siswa/add          - Form tambah siswa
POST /siswa/add/new      - Submit tambah siswa
GET  /siswa/edit/{nis}   - Form edit siswa
GET  /siswa/edit/new/{nis} - Submit edit siswa
GET  /siswa/delete/{nis} - Hapus siswa
GET  /siswa/addkelas/{id} - Tambah kelas ke siswa
POST /siswa/add/kelas    - Submit tambah kelas siswa
```

### Kelas Routes
```
GET  /kelas              - Lihat semua kelas
GET  /kelas/add          - Form tambah kelas
POST /kelas/add/new      - Submit tambah kelas
GET  /kelas/edit/{id}    - Form edit kelas
POST /kelas/edit/new/{id} - Submit edit kelas
POST /kelas/delete/{id}  - Hapus kelas
GET  /kelas/siswa/{id}   - Lihat siswa di kelas
GET  /kelas/mskelas      - Pilih kelas
GET  /kelas/pilih        - Pilih kelas untuk siswa
POST /kelas/siswa/update/{nis} - Update kelas siswa
```

### Guru/Pengajar Routes
```
GET  /guru               - Lihat data guru
POST /guru/add           - Tambah guru ke kelas
POST /guru/{id}          - Hapus guru dari kelas
```

### Absensi Routes
```
GET  /mabs               - Menu absensi
GET  /absensi            - Pilih kelas untuk absensi
POST /kehadiran/edit/{id} - Edit kehadiran
GET  /kehadiran          - Menu kehadiran
GET  /kehadiran/{id}     - Edit history kehadiran
GET  /absensi/kelas/{id} - Input absensi kelas
POST /absensi            - Submit absensi
```

## 📸 Screenshots

### Halaman Login - 17:34:40
![Login Page](public/img/Screenshot%202025-11-17%20at%2017.34.40.png)

**Layout:**
- Responsive design (Mobile & Desktop)
- Bootstrap 5 UI framework
- Custom styling dengan CSS
- Form validation

### Dashboard & Main Features

**Screenshot 1 - 17:37:31 (Dashboard Utama)**
![Dashboard Main](public/img/Screenshot%202025-11-17%20at%2017.37.31.png)

**Screenshot 2 - 17:37:44 (Menu Kelas)**
![Kelas Management](public/img/Screenshot%202025-11-17%20at%2017.37.44.png)

**Screenshot 3 - 17:37:56 (Manajemen Siswa)**
![Siswa Management](public/img/Screenshot%202025-11-17%20at%2017.37.56.png)

**Screenshot 4 - 17:38:09 (Input Absensi)**
![Input Absensi](public/img/Screenshot%202025-11-17%20at%2017.38.09.png)

**Screenshot 5 - 17:38:15 (Edit Kehadiran)**
![Edit Kehadiran](public/img/Screenshot%202025-11-17%20at%2017.38.15.png)

**Fitur yang ditampilkan:**
- Dashboard dengan chart kehadiran
- Manajemen kelas lengkap
- Manajemen data siswa
- Input & tracking kehadiran
- Edit history kehadiran
- Responsive design
- Real-time data updates

### Dashboard
```
┌──────────────────────────────────────────┐
│ Maulana Absensi Kelas                    │
├──────────────────────────────────────────┤
│ [Statistik Cards]                        │
│ - Total Siswa                            │
│ - Total Kelas                            │
│ - Kehadiran Hari Ini                     │
├──────────────────────────────────────────┤
│ [Chart Kehadiran]  [Quick Menu]          │
│ - Line Chart       - Master Kelas        │
│ - Pie Chart        - Master Siswa        │
│                    - Input Absensi       │
└──────────────────────────────────────────┘
```

**Fitur:**
- Chart.js untuk visualisasi data
- Responsive grid layout
- Real-time data updates

### Menu Utama
```
Dashboard
├─ Kelas
│  ├─ Master Kelas
│  ├─ Data Siswa Per Kelas
│  └─ Assign Siswa
├─ Siswa
│  ├─ Data Siswa
│  ├─ Tambah Siswa
│  └─ Edit/Hapus Siswa
├─ Guru
│  ├─ Data Guru
│  └─ Assign Guru ke Kelas
├─ Absensi
│  ├─ Input Absensi
│  ├─ Edit Kehadiran
│  └─ Laporan
└─ Logout
```

## 🛠️ Teknologi

### Backend
- **Laravel 11** - Framework PHP
- **PHP 8.2+** - Server-side language
- **MySQL/MariaDB** - Database

### Frontend
- **Bootstrap 5** - CSS Framework
- **Chart.js** - Data visualization
- **jQuery** - JavaScript library
- **Blade Template** - Template engine

### Build Tools
- **Vite** - Build tool & dev server
- **npm** - Package manager
- **Composer** - PHP package manager

### Dependencies

**PHP:**
- laravel/framework
- laravel-debugbar (dev)
- fakerphp/faker (dev)
- phpunit/phpunit (dev)

**JavaScript:**
- bootstrap ^5.3.3
- chart.js ^4.4.4
- jquery ^3.7.1
- axios ^1.7.4

## 📂 Struktur Folder

```
Maulana Absensi Kelas Sederhana/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── KelasController.php
│   │   │   ├── SiswaController.php
│   │   │   ├── LogController.php
│   │   │   ├── PengajarController.php
│   │   │   ├── ChartController.php
│   │   │   └── SclassController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Kelas.php
│   │   ├── Siswa.php
│   │   ├── Pengajar.php
│   │   └── Logkehadiran.php
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   │   ├── UserSeeder.php
│   │   └── DatabaseSeeder.php
│   └── factories/
├── resources/
│   ├── views/
│   │   ├── login.blade.php
│   │   ├── teacher.blade.php
│   │   ├── Absensi/
│   │   ├── guru/
│   │   ├── kelas/
│   │   ├── siswa/
│   │   └── components/
│   ├── css/
│   └── js/
├── public/
│   ├── js/
│   ├── img/
│   ├── build/
│   └── storage/
├── routes/
│   └── web.php
├── config/
├── storage/
└── vendor/
```

## 🔧 Troubleshooting

### Masalah: "Route not found"
- Pastikan migration sudah berjalan: `php artisan migrate`
- Clear cache: `php artisan cache:clear`

### Masalah: "Database connection refused"
- Periksa konfigurasi `.env`
- Pastikan MySQL/MariaDB running
- Ubah `DB_HOST` sesuai konfigurasi

### Masalah: "Assets not loading"
- Run: `npm run build`
- Clear cache: `php artisan cache:clear`

### Masalah: "Session/Login error"
- Periksa folder `storage/framework/sessions/`
- Pastikan folder writable: `chmod -R 775 storage bootstrap/cache`

## 📝 Lisensi

Projectini adalah open source dan tersedia di bawah lisensi MIT.

## 👤 Author

Maulana - Sistem Absensi Kelas Sederhana

---

**Last Updated:** November 2024  
**Version:** 1.0.0
