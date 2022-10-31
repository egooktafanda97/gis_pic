<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$active_group = 'deploy';
$query_builder = TRUE;
$db['default'] = array(
	'dsn'    => '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'pku_gis',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['deploy'] = array(
	'dsn'    => '',
	'hostname' => 'localhost',
	'username' => 'u1807606_pic',
	'password' => 'AMzqqSa;JA2?',
	'database' => 'u1807606_pic',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$capsule = new Capsule;
$capsule->addConnection([
	'driver'    => 'mysql',
	'host'      => $db[$active_group]['hostname'],
	'database'  => $db[$active_group]['database'],
	'username'  => $db[$active_group]['username'],
	'password'  => $db[$active_group]['password'],
	'charset'   => $db[$active_group]['char_set'],
	'collation' => $db[$active_group]['dbcollat'],
	'prefix'    => $db[$active_group]['dbprefix'],
]);
// Set the event dispatcher used by Eloquent models... (optional)
$capsule->setEventDispatcher(new Dispatcher(new Container));
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
