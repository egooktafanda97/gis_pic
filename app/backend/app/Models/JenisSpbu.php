<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSpbu extends Model
{
    use HasFactory;
    protected $table = 'jenis_spbu';
    protected $primaryKey = 'id_jenis_spbu';
    protected $fillable = [
        "id_jenis_spbu",
        "nama_jenis_spbu",
    ];
}
