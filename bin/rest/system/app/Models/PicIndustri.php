<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicIndustri extends Model
{
    use HasFactory;
    protected $table = 'pic_industri';
    protected $primaryKey = 'id_pic_industri';
    protected $fillable = [
        "id_pic_industri",
        "pic_category_name",
        "pic_industry_type_name",
    ];
}
