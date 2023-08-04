<?php

use App\Betting\DB;

use Illuminate\Http\Request;

include '../auth_check.php';

include '../../autoload.php';

$request = new Request($_POST);


$teams = DB::table('teams')->where('league_id',$request->leagueId)->select('id','name')->get();

foreach($teams as $team){
    printf('<option value="%d">%s</option>',$team->id, $team->name);
}