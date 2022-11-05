<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisFasilitasKesehatan extends Model
{
    use HasFactory;
    protected $table = 'jenis_fasilitas_kesehatan';
    protected $primaryKey = 'id_jenis_fasilitas';
    public $timestamps = true;
    protected $fillable = [
        "nama_jenis_fasilitas",
    ];
}
