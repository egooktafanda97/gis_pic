<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBank extends Model
{
    use HasFactory;

    protected $table = 'jenis_bank';
    protected $primaryKey = 'id_jenis_bank';
    public $timestamps = true;
    protected $appends = ['setting', 'ethnicity', "header"];
    protected $fillable = [
        "nama_jenis_bank",
    ];
}
