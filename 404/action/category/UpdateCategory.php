<?php

use App\Betting\DB;

include '../../auth_check.php';

include '../../../autoload.php';

$request = $_POST;

try {

    DB::table('section')->where('id', $request['category_id'])->update([
        'title' => $request['title'],
    ]);

    http_response_code(200);

    echo "successfully league created";
} catch (\Exception $error) {

    http_response_code(500);
    echo $error->getMessage();
}
