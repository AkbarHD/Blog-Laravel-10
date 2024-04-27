<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Blog Laravel-10
Blog yang membahas seputar bahasa pemrograman dan teknologi terkeni

## Features Aplikasi Laravel Blog

- Create, Read, Update,Delete (CRUD)
- Pencarian Artikel
- Memasuki Adsense
- Menu authentication (login, register, reset password)
- Config Dinamis
- Halaman Admin & User


## Tech Stack

Aplikasi ini dibangun dengan menggunakan:
- [xampp](https://www.apachefriends.org/download.html)
- HTML & CSS
- [Bootstrap](https://getbootstrap.com/)
- [composer](https://getcomposer.org/)
- [Larvel UI](https://github.com/laravel/ui)
- [Laravel - 10](https://laravel.com/)
- [Yajra Tables](https://yajrabox.com/)
- [Datatables](https://datatables.net/)
- [CK Editor](https://ckeditor.com/)

## Requirement
- XAMPP >= 8.1
- Bootsrap 5

## Setup Aplikasi 
Install the dependencies and devDependencies and start the server.
#### Jalankan Perintah
```sh
composer update
atau
composer isntall
```

#### Copy file .env dari .env.example
```sh
cp .env.example .env
```

#### Konfigurasi file .env
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog-laravel10
DB_USERNAME=root
DB_PASSWORD=
```

#### Generate key
```sh
php artisan key:generate
```

#### Generate key
```sh
php artisan migrate
```

#### Seeder table User, Pengaturan
```sh
php artisan db:seed
```

#### Menjalankan aplikasi
```sh
php artisan serve
```

# TETAP ILMU PADI🔥🔥🔥
