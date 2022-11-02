<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $primaryKey = 'id_config';
    protected $fillable = [
        "id_config",
        "config",
        "type_input",
        "config_key",
        "config_value",
        "table_config",
        "sub_tabel",
    ];
}
