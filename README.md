# Fingerprint with Laravel
Penerapan metode SOAP untuk melakukan penarikan data dari mesin absensi Fingerprint ke database.

## Installasi
* Buka terminal linux
* Jalankan perintah berikut
``` bash
$ cp .env.example .env
$ composer install
$ php artisan key:generate
```
* Buka file .env menggunakan text editor, lalu ubah dan sesuaikan dengan settingan yang dimiliki
* Setelah itu jalankan perintah berikut
``` bash
$ php artisan migrate
```
