# PSB (APLIKASI PENERIMAAN SISWA BARU)

## Requirements

1. php version 7.4
2. composer 2.1.3
3. node v14.15
4. npm 6.14
5. yarn 1.22

## Install

1. git clone  https://github.com/dimaswahyu456/psb-laravel8-api.git
2. composer install
3. copy .env.example to .env
4. php artisan key:generate
5. php artisan serve
6. dump dbpsb.sql

git checkout -b nama_branch

## modul
* project/login -> jun (abaikan)


## Membuat Model

* php artisan make:model nama_model -m
* example:
* php artisan make:model siswa -r 

## Membuat Resource

* php artisan make:resource nama_resource
* example :
* php artisan make:resource SiswaResource

## Membuat Controller
* php artisan make:controller Api\SiswaController -r 

## Check Route
* php artisan route:list

# Git Flow (Alur Git)
* dilarang merge isi beta ke live dan master
* dilarang pull beta ke live dan master
* jika ingin membuat project baru, pastikan induknya adalah branch master atau branch live
* dilarang push di branch project/design-system (hanya boleh pull di branch sendiri)

## Perintah Bikin Branch Baru
* git checkout -b nama_branch
* contoh
* git checkout -b project/tsukamoto

## Tambahkan Code Dibawah ini untuk menambahkan route
* Route::apiResource('/kota', App\Http\Controllers\Api\KotaController::class);



