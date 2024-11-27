## Cara menjalankan aplikasi
#### Persyaratan

-   Git
-   PHP 8.2 (minimal)
-   Composer
-   MySQL atau MariaDB
### Langkah-langkah

1. Clone repositori
    ```bash
    Clone repository ini atau download file ZIP-nya.
    ```
2. Masuk ke direktori/folder `e-commerce`
    ```bash
    cd e-commerce 
    ```
    atau

    ```bash
    open folder di visual code atau aplikasi lainnya 
    ```
3. Hapus file composer.lock
   
4.  Install dependensi
    ```bash
    composer install
    ```
    dan
     ```bash
    npm install
    ```
5. Copy file `.env.example` menjadi `.env`

6. Buat Database
   dengan nama database db_ecommerce

7. Migrasi Database
   Jalankan perintah berikut untuk membuat tabel di database:
    ```bash
    php artisan migrate
    ```
8. Seed Database
   Jalankan perintah berikut untuk mengisi database dengan data awal:
    ```bash
    php artisan migrate:fresh --seed
    ```
9. Jalankan NPM
   Jalankan perintah berikut untuk meng-compile aset frontend:    
    ```bash
    npm run dev
    ```
10. Jalankan Aplikasi
-   Buka terminal baru.
-   Jalankan perintah berikut untuk memulai server:    
    ```bash
    php artisan serve
    ```

11. Akses Aplikasi
    Buka browser dan akses:    
    ```bash
    http://127.0.0.1:8000
    ```

    > [!NOTE]
    > Pastikan _dua terminal berjalan_:
    > Satu terminal menjalankan 'npm run dev'.
    > Satu terminal menjalankan 'php artisan serve'.

## Akun Login
#### Akun Admin
- Email: _admin@admin.gmail_
- Password: _admin123_
#### Akun Pengguna
Silakan registrasi untuk membuat akun pengguna.