# PSB (APLIKASI PENERIMAAN SISWA BARU)
## Install

1. git clone 
2. composer install
3. copy .env.example to .env
4. php artsan key:generate
5. php artsan serve
6. dump hasblidb.sql (abaikan)

git checkout -b nama_branch

## modul
* project/login -> jun (abaikan)


## Membuat Model

* php artisan make:model nama_model -m
* example:
* php artisan make:model kota -r 

## Membuat Resource

* php artisan make:resource nama_resource
* example :
* php artisan make:resource KotaResource

## Membuat Controller
* php artisan make:controller Api\KotaController -r 

## Check Route
* php artisan route:list

## Perintah Bikin Branch Baru
* git checkout -b nama_branch
* contoh
* git checkout -b project/tsukamoto

## Tambahkan Code Dibawah ini untuk menambahkan route
* Route::apiResource('/kota', App\Http\Controllers\Api\KotaController::class);
