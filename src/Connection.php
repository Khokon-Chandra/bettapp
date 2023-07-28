<?php


use Illuminate\Database\Capsule\Manager as DB;


$DB = new DB;

$DB->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'bet',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);


// Make this Capsule instance available globally via static methods... (optional)
$DB->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$DB->bootEloquent();



