<?php

use App\Betting\DB;

include '../auth_check.php';

include '../../autoload.php';


$request = $_POST;

try{
    DB::table('teams')->insert([
        'league_id'  => $request['league_id'],
        'name'       => $request['name'],
        'created_at' => date('Y-m-d H:s:i')
    ]);
    return "successfully league created";
}catch(\Exception $error){
    return $error->getCode();
}

