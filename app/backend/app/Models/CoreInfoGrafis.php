<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class CoreInfoGrafis extends Model
{
    use HasFactory;
    protected $connection = 'sqlite';
    protected $table = 'core_info_grafis';
    protected $primaryKey = 'id';
    protected $fillable = [
        "faktor",
        "sub_faktor"
    ];
}
