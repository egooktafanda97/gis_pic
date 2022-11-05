<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorUtama extends Model
{
    use HasFactory;
    protected $table = 'sektor_industri';
    protected $primaryKey = 'id_sektor_industri';
    protected $fillable = [
        "id_sektor_industri",
        "nama_sektor_utama_industri",
    ];
}
