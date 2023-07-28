<?php

require_once './auth_check.php';
require_once '../autoload.php';

use Riazul\Riaz\DB;

$leagues = DB::table('leagues')->get();

?>


<?php

foreach ($leagues as $league) {
?>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <span class="text-primary"><?= $league->name ?></span>
            </div>
            <div class="text-end">
                <button class="btn btn-sm btn-primary addTeam d-sm-inline d-block mb-2" data-toggle="modal" data-id="<?= $league->id ?>" data-target="#addLeagueMatch">Add Team</button>
                <button class="btn btn-sm btn-success d-sm-inline d-block mb-2" data-toggle="collapse" data-target="#league_<?= $league->id ?>" aria-expanded="false" aria-controls="league_<?= $league->id ?>">Area Show</button>
                <button class="btn btn-sm btn-danger deleteLeague d-sm-inline d-block mb-2" data-id="<?= $league->id ?>">Delete</button>
            </div>
        </div>


        <div class="card-body collapse p-2" id="league_<?= $league->id ?>">
            <?php
            $teams = DB::table('teams')->where('league_id', $league->id)->get();
            foreach ($teams ?? [] as $team) { ?>
                <div class="bg-light d-flex justify-content-between mb-1">
                    <b><?= $team->name ?></b>
                    <button class="btn text-danger btn-xs"><i class="fa fa-trash"></i></button>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


<?php
}
?>

