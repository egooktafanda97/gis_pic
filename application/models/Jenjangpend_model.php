<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Jenjangpend_model extends Eloquent
{
    protected $table = 'jenjang_pendidikan';
    public $timestamps = true;
    protected $primaryKey = 'jenjang_pendidikan_id';
    protected $fillable = [
        "nama_jenjang",
        "ketrangan"
    ];
}
