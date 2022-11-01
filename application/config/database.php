<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Dotenv\Dotenv;

$query_builder = TRUE;
$env = json_decode(file_get_contents(FCPATH . '/bin/init//env.json'), true);

$active_group = 'default';

$db['default'] = array(
	'dsn'    => '',
	'hostname' => $env["DEVELOPMENT"]['DB_HOST'],
	'username' => $env["DEVELOPMENT"]['DB_USERNAME'],
	'password' => $env["DEVELOPMENT"]['DB_PASSWORD'],
	'database' => $env["DEVELOPMENT"]['DB_DATABASE'],
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
	'hostname' => $env["PRODUC"]['DB_HOST'],
	'username' => $env["PRODUC"]['DB_USERNAME'],
	'password' => $env["PRODUC"]['DB_PASSWORD'],
	'database' => $env["PRODUC"]['DB_DATABASE'],
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
$db['deploy_old'] = array(
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
