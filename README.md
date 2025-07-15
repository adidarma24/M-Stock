# 📦 M-Stock – Manajemen Stok Barang (Laravel 12)

**M-Stock** adalah aplikasi manajemen stok barang berbasis web yang dibangun dengan **Laravel 12** dan **Bootstrap 5**. Aplikasi ini ditujukan untuk memudahkan pencatatan dan pemantauan _Stock In_ dan _Stock Out_, lengkap dengan fitur dashboard visual menggunakan **Chart.js** dan ekspor data ke Excel.

## ✨ Fitur Utama

-   🔐 Login multi-role (Admin & User)
-   📦 Manajemen data produk (CRUD)
-   📥 Pencatatan barang masuk (_Stock In_)
-   📤 Pencatatan barang keluar (_Stock Out_)
-   📊 Dashboard visual (Chart.js)
-   📄 Export data stok ke Excel
-   ✅ Approval dua level (jika diimplementasikan)
-   🔎 Pencarian dan filter data

## 🛠️ Teknologi yang Digunakan

-   **Framework**: Laravel 12
-   **Frontend**: Blade, Bootstrap 5, Chart.js
-   **Database**: MySQL
-   **Ekspor Excel**: Laravel Excel
-   **Login**: Laravel Breeze / Fortify (jika digunakan)

## 📸 Cuplikan Layar

> Tambahkan screenshot di sini  
> Contoh: Dashboard, halaman produk, form stock in/out

## 🚀 Instalasi & Setup

### 1. Clone Repo

```bash
git clone https://github.com/adidarma24/M-Stock.git
cd M-Stock
```

### 2. Install Dependensi

```bash
composer install
npm install && npm run dev
```

### 3. Konfigurasi `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` dan sesuaikan konfigurasi database:

```
DB_DATABASE=mstock
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi & Seed Database

```bash
php artisan migrate --seed
```

### 5. Jalankan Aplikasi

```bash
php artisan serve
```

Akses di `http://localhost:8000`

---

## 🔐 Login Default (Seeder)

| Role  | Email             | Password |
| ----- | ----------------- | -------- |
| Admin | admin@example.com | password |
| User  | user@example.com  | password |

---

## 📁 Struktur Folder Penting

-   `app/Models` – Model Eloquent
-   `app/Http/Controllers` – Logika aplikasi
-   `resources/views` – Blade templates
-   `routes/web.php` – Routing web
-   `database/migrations` – Struktur database

---

## 🧑‍💻 Kontribusi

Pull request sangat diterima. Silakan fork repo ini dan buat PR dengan penjelasan fitur atau perbaikannya.

---

## 📄 Lisensi

[MIT License](LICENSE)

---

## 👨‍💻 Dibuat oleh

**Adi Dharma Putra, S.Kom**  
📍 Sidoarjo, Indonesia  
🌐 [Portofolio](https://adidharma-portofolio.vercel.app/) | [GitHub](https://github.com/adidarma24) | [LinkedIn](https://linkedin.com/in/adidarmap)
