<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Spbu_model extends Eloquent
{
    protected $table = 'users';
    public $timestamps = false;
}
