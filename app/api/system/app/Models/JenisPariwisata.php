<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPariwisata extends Model
{
    use HasFactory;
    protected $table = 'jenis_pariwisata';
    protected $primaryKey = 'id_jenis_pariwisata';
    public $timestamps = true;
    protected $fillable = [
        "nama_jenis_pariwisata",
    ];
}
