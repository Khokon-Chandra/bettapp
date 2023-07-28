<?php

$directory = __DIR__.'/vendor/autoload.php';

if (file_exists($directory)) {
    require_once($directory);
} else {
    echo "<h1>Please run the command 'composer install'</h1>";
    exit();
}
