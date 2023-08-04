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
    'A_team'   => 'required',
    'B_team'   => 'required',
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
            ×</button>  <strong>%s : </strong>%s</div>', $key, $message);
    }

    http_response_code(422);
    exit();
}




$auth_id = $_COOKIE['adminId'] ?? $_SESSION['adminId'];


try {

    $result = DB::table('default_match')->insert([
        'A_team'   => $request->A_team,
        'B_team'   => $request->B_team,
        'title'    => $request->title,
        'date'     => $request->date,
        'gameType' => $request->gameType,
        'status'   => $request->status,
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