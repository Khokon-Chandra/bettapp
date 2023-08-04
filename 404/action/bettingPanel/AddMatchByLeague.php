<?php

use App\Betting\DB;
use Illuminate\Http\Request;
use Rakit\Validation\Validator;

require_once '../../auth_check.php';

require_once '../../../autoload.php';


$request = new Request($_POST);


// make it
$validator = new Validator();

$validation = $validator->make($_POST, [
    'league'   => 'required',
    'A_team'   => 'required|integer',
    'B_team'   => 'required|integer',
    'title'    => 'nullable',
    'date'     => 'required',
    'dateend'  => 'nullable',
    'gameType' => 'required|integer',
    'status'   => 'required',
]);

// then validate
$validation->validate();


if ($validation->fails()) {
    foreach ($validation->errors->firstOfAll() as $key => $message) {
        printf('<div  class="alert alert-danger "  role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×</button>  <strong>%s</strong>%s</div>', $key, $message);
    }

    exit();
}




$teams = DB::table('teams')->where('league_id', $request->league);


$auth_id = $_COOKIE['adminId'] ?? $_SESSION['adminId'];


try {
    $result = DB::table('betting_title')->insert([
        'A_team'   => $teams->where('id', $request->A_team)->first()->name,
        'B_team'   => $teams->where('id', $request->A_team)->first()->name,
        'title'    => $request->title,
        'date'     => $request->date,
        'dateend'  => $request->date,
        'gameType' => $request->gameType,
        'status'   => $request->status,
        'user'     => $auth_id,

    ]);

    if ($result == 0) {
        throw new \Exception('something went wrong. Please try again', 500);
    }

    printf('<div  class="alert alert-success " id="success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        ×</button>  <strong>  Ok !!</strong>      Success!.
</div>');
} catch (\Exception $error) {
    echo $error->getMessage();
    printf('<div  class="alert alert-danger " id="success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        ×</button>  <strong>  Ok !!</strong>%s</div>', $error->getMessage());
}
