# BE-Dailist (Backend) - Dailist To Do List API

BE-Dailist adalah backend API untuk aplikasi Dailist, aplikasi to do list harian yang membantu pengguna mengelola tugas sehari-hari. Backend ini dibangun menggunakan Laravel (PHP) dan menyediakan RESTful API untuk kebutuhan frontend dan aplikasi mobile/web.

---

## Fitur Backend

- **User Authentication & Authorization**  
  Registrasi, login, dan proteksi endpoint dengan token (Laravel Sanctum).
- **CRUD To Do**  
  Tambah, baca, edit, hapus tugas harian.
- **Relasi User & To Do**  
  Setiap task hanya bisa diakses oleh user yang bersangkutan.
- **Validasi & Keamanan**  
  Validasi data, enkripsi password, middleware autentikasi.
- **RESTful API**  
  Endpoint konsisten dan mudah diintegrasikan dengan frontend Flutter/web.

---

## Teknologi

- PHP 8+
- Laravel 10+
- MySQL/MariaDB
- Laravel Sanctum (untuk authentication API)

---

## Instalasi & Setup

1. **Clone repository**
   ```bash
   git clone https://github.com/RizmaAgustin/BE-Dailist.git
   cd BE-Dailist
   ```

2. **Install dependency**
   ```bash
   composer install
   ```

3. **Copy konfigurasi environment**
   ```bash
   cp .env.example .env
   # Edit .env sesuai kebutuhan, terutama DB_DATABASE, DB_USERNAME, DB_PASSWORD
   ```

4. **Generate app key**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi database**
   ```bash
   php artisan migrate
   ```

6. **Jalankan server lokal**
   ```bash
   php artisan serve
   ```
   Backend akan berjalan di `http://localhost:8000`

---

## Dokumentasi API (Ringkasan)

| Method | Endpoint           | Deskripsi             |
|--------|--------------------|-----------------------|
| POST   | /api/register      | Registrasi User       |
| POST   | /api/login         | Login User            |
| GET    | /api/todos         | List semua to do      |
| POST   | /api/todos         | Tambah to do baru     |
| GET    | /api/todos/{id}    | Lihat detail to do    |
| PUT    | /api/todos/{id}    | Edit to do            |
| DELETE | /api/todos/{id}    | Hapus to do           |

Semua endpoint `/api/todos` memerlukan autentikasi token (Bearer).

---

## Struktur Database (Singkat)

- **users**: id, name, email, password, timestamps
- **todos**: id, user_id, title, description, status, due_date, timestamps

---

## Testing

Jalankan pengujian menggunakan PHPUnit:
```bash
php artisan test
```

---

## Deployment

- Pastikan environment production aman (APP_ENV=production)
- Gunakan HTTPS untuk keamanan API
- Setup cron untuk queue jika menggunakan fitur notifikasi/queue

---

## Kontribusi

1. Fork repo ini
2. Buat branch baru (`git checkout -b fitur-anda`)
3. Commit dan push perubahan
4. Ajukan pull request

---

## Lisensi

MIT License.  
Lihat [LICENSE](LICENSE) untuk detail.

---

## Kontak

Buat [issue](https://github.com/RizmaAgustin/BE-Dailist/issues) untuk bug/masukan.
