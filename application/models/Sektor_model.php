<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Sektor_model extends Eloquent
{
    protected $table = 'sektor_industri';
    public $timestamps = true;
    protected $primaryKey = 'id_sektor_industri';
    protected $fillable = [
        "nama_sektor_utama_industri",
    ];
}
