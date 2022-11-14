<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisPenginapan extends Model
{
    use HasFactory;
    protected $table = 'jenis_penginapan';
    protected $primaryKey = 'id_jenis_penginapan';
    public $timestamps = true;
    protected $fillable = [
        "nama_jenis_penginapan",
    ];
}
