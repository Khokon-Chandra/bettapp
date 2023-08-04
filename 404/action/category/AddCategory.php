<?php

use App\Betting\DB;

include '../../auth_check.php';

include '../../../autoload.php';


$request = $_POST;

try {
    DB::table('section')->insert([
        'title' => $request['title'],
        'created_at' => date('Y-m-d H:s:i')
    ]);

    http_response_code(200);
    echo "successfully league created";
} catch (\Exception $error) {
    http_response_code($error->getCode());
    echo $error->getMessage();
}
