<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class PicIndustri_model extends Eloquent
{
    protected $table = 'pic_industri';
    public $timestamps = true;
    protected $primaryKey = 'id_pic_industri';
    protected $fillable = [
        "pic_category_name",
        "pic_industry_type_name"
    ];
}
