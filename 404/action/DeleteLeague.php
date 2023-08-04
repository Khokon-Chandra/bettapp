<?php

use App\Betting\DB;

include '../auth_check.php';

include '../../autoload.php';

$request = $_POST;

try{
    DB::table('leagues')->where('id',$request['id'])->delete();
    return "successfully league created";
}catch(\Exception $error){
    return $error->getCode();
}

