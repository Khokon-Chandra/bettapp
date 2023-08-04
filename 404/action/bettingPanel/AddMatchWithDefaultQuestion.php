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

    DB::beginTransaction();

    $matchId = DB::table('betting_title')->insertGetId([
        'A_team'   => $request->A_team,
        'B_team'   => $request->B_team,
        'title'    => $request->title,
        'date'     => $request->date,
        'gameType' => $request->gameType,
        'status'   => $request->status,
    ]);


    $defaultQuestions = DB::table('default_ques')->where('g_type', $request->gameType)->get();

    foreach ($defaultQuestions as $question) {

        $sub_title_id = DB::table('betting_subtitle')->insertGetId([
            'title' => $question->title,
            'bettingId' => $matchId,
            'section_ct' => $question->section_ct,
            'section_hide' => 1,
        ]);

        $defaultAnswers = DB::table('default_ans')->where('bettingSubTitleId', $question->id)->get();

        foreach ($defaultAnswers as $answer) {
            DB::table('betting_sub_title_option')->insert([
                'title' => $answer->title,
                'amount' => $answer->amount,
                'bettingSubTitleId' => $sub_title_id
            ]);
        }
    }
    printf('<div  class="alert alert-success " id="success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>  Ok !!</strong>Success!.</div>');

    DB::commit();

} catch (\Exception $error) {

    DB::rollBack();

    http_response_code(500);
    printf('<div  class="alert alert-danger " id="success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        ×</button>  <strong>  Ok !!</strong>%s</div>', $error->getMessage());
}









