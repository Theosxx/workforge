<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'tb_lowongan';

    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'gaji_minimal',
        'gaji_maksimal',
        'lokasi',
        'foto',
        'tipe_pekerjaan',
        'deskripsi',
    ];
}
