<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSektor extends Model
{
    use HasFactory;
    protected $table = 'sub_sektor_industri';
    protected $primaryKey = 'id_subsektor_industri';
    protected $fillable = [
        "id_subsektor_industri",
        "nama_subsektor_industri",
    ];
}
