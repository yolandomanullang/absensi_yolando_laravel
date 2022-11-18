<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = ['jam_masuk', 'jam_keluar', 'tanggal', 'bulan','tahun']; // tambahkan $fillable
}
