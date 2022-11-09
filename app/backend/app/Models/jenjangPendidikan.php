<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenjangPendidikan extends Model
{
    use HasFactory;
    protected $table = 'jenjang_pendidikan';
    protected $primaryKey = 'jenjang_pendidikan_id ';
    protected $fillable = [
        "jenjang_pendidikan_id ",
        "nama_jenjang",
        "ketrangan",
        "sub_tabel",
    ];

}
