## DharmaHenwa

### PHP Requirement :

- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

[Lebih di Laravel](https://laravel.com/docs/8.x)

### Cara Install

1. Copy project
    - `git clone https://github.com/0aljawi0/dharmahenwa.git`
1. Install Database MySQL, database ada di root project 'darmahenwa.sql'
    - Gunakan external tools seperti heidisql, or
    - Dengan cli : `mysql -u NAMAUSER -p darmahenwa < darmahenwa.sql`
2. Install Vendor
    - cli : `composer install`
3. Link storage
    - cli : `php artisan storage:link`
4. Buat `.env` file
    - Copy `.env.example`
    - Rename jadi `.env`
    - sesuaikan koneksi database
    ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=
    ```
5. Generate app key
    - cli : `php artisan key:generate`
6. Selesai.

### Jika menggunakan Sub Folder sebagai HOST maka ganti global host
1. Open file `main.js` di `public/js/main.js`
2. Tambahakan nama subfolder pada `var global_host = window.location.origin` ,
    - contoh : `var global_host = window.location.origin+'/darmahenwa2'`
3. Save! Done!

