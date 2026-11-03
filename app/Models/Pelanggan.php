<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    
    // Tambahkan baris ini jika primary key menggunakan pelanggan_id
    protected $primaryKey = 'pelanggan_id';

    protected $guarded = [];
}