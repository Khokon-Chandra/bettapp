<?php

use Riazul\Riaz\DB;

include '../auth_check.php';

include '../../autoload.php';


$request = $_POST;

try{
    DB::table('leagues')->insert([
        'name'=> $request['name'],
        'created_at' => date('Y-m-d H:s:i')
    ]);
    return "successfully league created";
}catch(\Exception $error){
    return $error->getCode();
}

