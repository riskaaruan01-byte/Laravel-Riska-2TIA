<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata_nya';

    protected $fillable = [
        'nama',
        'nim',
        'jenis_kelamin',
        'tanggal_lahir',
        'status',
        'kewarganegaraan',
        'email',
        'no_hp',
        'alamat',
        'jurusan',
        'foto',
        'pendidikan',
        'pengalaman_kerja',
        'kemampuan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}