<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class SubSektor_model extends Eloquent
{
    protected $table = 'sub_sektor_industri';
    public $timestamps = true;
    protected $primaryKey = 'id_subsektor_industri';
    protected $fillable = [
        "nama_subsektor_industri",
    ];
}
