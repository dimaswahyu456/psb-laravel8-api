<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datasiswa extends Model
{
    use HasFactory;


    protected $table = 'datasiswa';
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'alamat_siswa',
        'jenis_kelamin',
        'agama',
        'tempat lahir',
        'tanggal_lahir',
        'id_sekolah',
        'id_prestasi',
        'id_wali'
    ];

    protected $hidden = [];
}
