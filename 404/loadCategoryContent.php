<?php

require_once './auth_check.php';
require_once '../autoload.php';

use App\Betting\DB;

$categories = DB::table('section')->get();


foreach ($categories as $category) {
?>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <a href="javascript::void(0)" class="text-primary" data-toggle="collapse" data-target="#league_<?= $category->id ?>" aria-expanded="false" aria-controls="league_<?= $category->id ?>"><?= $category->title ?></a>
            </div>
            <div class="text-end">
                <button class="btn btn-sm btn-primary editCategory d-sm-inline d-block mb-2" data-toggle="modal" data-id="<?= $category->id ?>" data-title="<?= $category->title ?>" data-target="#editCategory">Edit</button>
                <button class="btn btn-sm btn-danger deleteCategory d-sm-inline d-block mb-2" data-id="<?= $category->id ?>">Delete</button>
            </div>
        </div>

    </div>

<?php
}
?>