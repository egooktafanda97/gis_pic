<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPenginapan extends Model
{
    use HasFactory;
    protected $table = 'kelas_penginapan';
    protected $primaryKey = 'id_kelas_penginapan';
    public $timestamps = true;
    protected $fillable = [
        "nama_kelas_penginapan",
    ];
}
