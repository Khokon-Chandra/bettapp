<?php

use App\Betting\DB;

include './header.php';
include './side.php';
include 'db.php';

$leagues = DB::table('leagues')->select('id', 'name')->get();

?>
<link rel="stylesheet" type="text/css" href="css/betPanel.css">
<link rel="stylesheet" type="text/css" href="css/loader.css">
<main class="app-content">
    <div class="app-title">
        <div>
            <h6><i class="fa fa-dashboard"></i>Total User Balance=

                <?php
                $query = "select sum(balance) as total from user";
                $UserTotalBalance = $db->select($query);
                if ($UserTotalBalance) {
                    $UserTotalBalance = $UserTotalBalance->fetch_assoc();
                    echo round($UserTotalBalance['total'], 2);
                }
                ?>
                <?php
                $q = "select sum(amount)as totalsend from deposit_and_withdraw_his where d_or_w=2";
                $run = $db->select($q);
                $total_sending = $run->fetch_assoc();
                $totalSending = $total_sending['totalsend'];
                ?>
                <?php
                $q = "select sum(amount)as tatalgain from deposit_and_withdraw_his where d_or_w=1";
                $run = $db->select($q);
                $tatalgain = $run->fetch_assoc();
                $tatalgain = $tatalgain['tatalgain'];
                $totalGain = $tatalgain - $totalSending;
                ?>
                <?php
                $query = "SELECT * FROM `bettintransaction`";
                $amount = $db->select($query);
                $total = $amount->fetch_assoc();


                $totalSaving = $total['totalSaving'];
                $s_save = $total['s_save'];
                ?>
                || Total Gaining Amount= <?php echo round($totalGain, 2); ?>
                || Total Sending Amount= <?php echo round($totalSending, 2); ?>
                || Total Saving Amount= <?php echo round($totalSaving, 2); ?>

                <span style="color: green"> || Total S Amount= <?php echo round($s_save, 2); ?></span>

            </h6>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">



            <div class="tile">
                <div class="tile-body">
                    <!-- add match -->
                    <div id="add-bet" class="modal" style="">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Match Title <?= \Illuminate\Support\Carbon::now()->format('d-F-Y H:s:i A')  ?></h5>
                                    <a href="bettingPanel.php">
                                        <span class="close" aria-hidden="true">×</span>
                                    </a>
                                </div>
                                <form id=myForm>
                                    <div class="modal-body">



                                        <div id="addMatchSuccess">

                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">A Team</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="A_team" name="A_team" rows="4" placeholder="Enter A Team Name">
                                                <span><input type="hidden" id="color_a" name="color_a" class="form-control" placeholder="Team Color"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">B Team</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="B_team" name="B_team" rows="4" placeholder="Enter  B Team Name">
                                                <span><input type="hidden" id="color_b" name="color_b" class="form-control" placeholder="Team Color"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Bet Statement</label>
                                            <div class="col-md-8">
                                                <input class="form-control" id="title" name="title" rows="4" placeholder="Enter Bet Statement">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Start Date</label>
                                            <div class="col-md-8">
                                                <input class="form-control" id="date" name="date" id="demoDate" type="text" placeholder="Select Date"></input>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Match Status</label>
                                            <div class="col-md-8">
                                                <!--Radio Button Markup-->
                                                <div class="">
                                                    <label>
                                                        <input type="radio" name="status" id="status" value="1"><span class="label-text"> Live</span><br>
                                                        <input type="radio" name="status" id="status" value="2"><span class="label-text"> Upcoming</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Match Type</label>
                                            <div class="col-md-8">
                                                <!--Radio Button Markup-->
                                                <div class="">
                                                    <label>
                                                        <input type="radio" name="gameType" id="gameType" value="1" onchange="autoquestion(1)"><span class="label-text"> FootBall</span><br>
                                                        <input class="gameTypec" type="radio" name="gameType" id="gameType" value="2" onchange="autoquestion(2)"><span class="label-text"> Cricket</span><br>
                                                        <input type="radio" name="gameType" id="gameType" value="3" onchange="autoquestion(3)"><span class="label-text"> Basketball</span><br>

                                                        <input type="radio" name="gameType" id="gameType" value="5" onchange="autoquestion(5)"><span class="label-text"> Tennis</span><br>
                                                        <input type="radio" name="gameType" id="gameType" value="6" onchange="autoquestion(6)"><span class="label-text"> Table Tennis</span>
                                                        <br>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div id="autoquestion" style="max-height:200px;overflow-y:scroll"> -->

                                    </div>
                                    <div class="form-group row hiddenOp" style="display: none">
                                        <label class="control-label col-md-3">Match Status</label>
                                        <div class="col-md-8">
                                            <!--Radio Button Markup-->
                                            <div class="">
                                                <label>
                                                    <input type="radio" name="status2" id="status2" value="1"><span class="label-text"> ODI</span><br>
                                                    <input type="radio" name="status2" id="status2" value="2"><span class="label-text"> T20</span><br>
                                                    <input type="radio" name="status2" id="status2" value="3"><span class="label-text"> Test</span>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-8">
                                            <input style="background-color: #996600; border: 1px solid #996600;" id="addMatchSubmit" type="submit" class="btn btn-success" value="submit">
                                            <input style="background-color: #996600; border: 1px solid #996600;" id="addMatchSubmitDefault" type="submit" class="btn btn-success" value="Add With AutoQues">
                                        </div>
                                    </div>



                            </div>
                            </form>
                            <div class="modal-footer">

                                <a href="bettingPanel.php">
                                    <button>Close</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->


                <!-- add match by league modal -->
                <div id="add-bet-league" class="modal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Match Title By League</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div id="addMatchSuccessLea">
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">League</label>
                                    <div class="col-md-8">
                                        <select class="form-control club" id="league" name="league" tabindex="1">
                                            <option disabled="" selected="" value="">Select League</option>
                                            <?php
                                            foreach ($leagues as $league) {
                                                printf('<option value="%d">%s</option>', $league->id, $league->name);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">A Team</label>
                                    <div class="col-md-8">
                                        <select class="form-control A_teamLea" id="A_teamLea" name="league" tabindex="1">
                                            <option disabled="" selected="" value="">Select A Team</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">B Team</label>
                                    <div class="col-md-8">
                                        <select class="form-control B_teamLea" id="B_teamLea" name="league" tabindex="1">
                                            <option disabled="" selected="" value="">Select B Team</option>
                                        </select>
                                    </div>
                                </div>
                                <datalist id="leagueMatch"></datalist>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Bet Statement</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="titleLea" name="title" rows="4" placeholder="Enter Bet Statement">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Date</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="dateLea" name="date" type="text" placeholder="Select Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Match Status</label>
                                    <div class="col-md-8">
                                        <!--Radio Button Markup-->
                                        <div class="">
                                            <label>
                                                <input type="radio" name="status" id="statusLea" value="1"><span class="label-text"> Live</span><br>
                                                <input type="radio" name="status" id="statusLea" value="2"><span class="label-text"> Upcoming</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Match Type</label>
                                    <div class="col-md-8">
                                        <!--Radio Button Markup-->
                                        <div class="">
                                            <label>
                                                <input type="radio" name="gameType" id="gameTypeLea" value="1">
                                                <span class="label-text"> FootBall</span><br>
                                                <input class="gameTypec" type="radio" name="gameType" id="gameTypeLea" value="2">
                                                <span class="label-text"> Cricket</span><br>
                                                <input type="radio" name="gameType" id="gameTypeLea" value="4">
                                                <span class="label-text"> Tennis</span><br>
                                                <input type="radio" name="gameType" id="gameTypeLea" value="5">
                                                <span class="label-text"> Volleyball</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row hiddenOp" style="display: none">
                                    <label class="control-label col-md-3">Match Status</label>
                                    <div class="col-md-8">
                                        <!--Radio Button Markup-->
                                        <div class="">
                                            <label>
                                                <input type="radio" name="status2" id="status2Lea" value="1"><span class="label-text"> ODI</span><br>
                                                <input type="radio" name="status2" id="status2Lea" value="2"><span class="label-text"> T20</span><br>
                                                <input type="radio" name="status2" id="status2Lea" value="3"><span class="label-text"> Test</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input id="addMatchSubmitLea" type="submit" class="btn btn-success" value="submit">
                                        <input id="addMatchSubmitDefaultLea" type="submit" class="btn btn-success" value="add default">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End add match by league modal -->

                <!-- hidden-match -->
                <div id="hidden-match" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hidden match</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" id="hiddenContentShow">

                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->

                <!-- Closed-match -->
                <div id="closed-match" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Closed match</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" id="closedContentShow">

                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->

                <!-- Closed-match question -->
                <div id="closed-match-question" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Closed Question</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" id="closedQuestionShow">

                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->

                <a id="new" class="btn btn-primary icon-btn" href="" data-toggle="modal" data-target="#add-bet"><i class="fa fa-plus"></i>Add Item </a>

                <a class="btn btn-primary icon-btn" href="" data-toggle="modal" data-target="#add-bet-league"><i class="fa fa-plus"></i>By League</a>

                <a id="new" class="btn btn-success" href=""><i class="fa fa-refresh"></i>Refresh</a>
                <a id="hidden" class="btn btn-primary" href="" id="hidden" data-toggle="modal" data-target="#hidden-match">hidden match </a>
                <a class="btn btn-primary" href="defaultSetting.php">Set default match </a>

                <br><br>
                <h6 style="color: #DD5347">Live Match</h6>


                <!-- addQuestion -->
                <div id="addQuestion" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Question </h5>

                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h6>match : <span id="matchShow"></span></h6>


                                <div id="addQustionSuccess">

                                </div>


                                <div class="field_wrapper-sub">

                                    <div class="form-group row">

                                        <div class="col-md-6">
                                            <input class="form-control" name="input_field" id="addQustionOfMatch" placeholder="Enter Question">


                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input name="bettingId" id="bettingIdForAddQuestion" type="text" value="" hidden="1">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input style="color: white; background-color: #996600; border: 1px solid #996600;" name="addBetSubTitle" id="addQuestionSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">

                                <button style="color: white; background-color: #996600; border: 1px solid #996600;" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- limitMatch -->
                <div id="scoreModal" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add score </h5>

                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h6>match : <span id="matchShowOfLimit"></span></h6>


                                <div id="scoreSuc">

                                </div>


                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input class="form-control" name="limitRateAmount" id="ScoreRateForMatch" value="">

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input name="bettingId" id="matchIdForScore" type="text" value="" hidden="1">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input style="color: white; background-color: #996600; border: 1px solid #996600;" name="limitBettingTitle" id="score" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">

                                <button style="color: white; background-color: #996600; border: 1px solid #996600;" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- limitMatch -->
                <div id="limitMatch" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Limit </h5>

                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h6>match : <span id="matchShowOfLimit"></span></h6>


                                <div id="limitMatchSuccess">

                                </div>


                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input class="form-control" name="limitRateAmount" id="limitRateForMatch" value="">

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input name="bettingId" id="matchIdForLimit" type="text" value="" hidden="1">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input id="new" name="limitBettingTitle" id="limitRateForMatchSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- wait -->
                <div id="matchWatting" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Match Waiting Time </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <h6>match : <span id="matchShowOfWait"></span></h6>
                                    <div id="waitMatchSuccess">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <input class="form-control" id="matchWaittingRate" name="matchwaittime" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <input name="bettingId" id="matchIdForWait" type="text" value="" hidden="1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-8">
                                            <input id="new" name="waitBettingTitle" id="matchWattingTimeSubmit" type="submit" class="btn btn-success" value="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->

                <!-- limitQuestion -->
                <div id="limitQuestion" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Limit </h5>

                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h6 style="color: black;">Question : <span id="questionShowOfLimit"></span></h6>


                                <div id="limitQuestionSuccess">

                                </div>


                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input class="form-control" name="limitRateAmount" id="limitRateForQuestion" value="">

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input name="bettingId" id="questionIdForLimit" type="text" value="" hidden="1">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input id="new" name="limitBettingTitle" id="limitRateForQuestionSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- wait -->
                <div id="questionWatting" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Question Waiting Time </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <h6>match : <span id="questionShowOfWait"></span></h6>
                                    <div id="waitQuestionSuccess">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <input class="form-control" id="questionWaittingRate" name="questionwatingtime" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <input name="questionid" id="questionIdForWait" type="text" value="" hidden="1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-8">
                                            <input id="new" name="waitBettingquestion" id="questionWattingTimeSubmit" type="submit" class="btn btn-success" value="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- matchActionMenu -->
                <div id="matchActionMenu" class="modal" style="">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">



                            <div class="modal-body">

                                <div class="list-group">
                                    <a style="color: white; background-color: #996600; border: 1px solid #996600;" href="#" class="list-group-item btn btn-sm addQuestion" data-toggle="modal" data-target="#addQuestion">Add Question</a>
                                    <a style="color: white; background-color: #996600; border: 1px solid #996600;" href="#" class="list-group-item btn btn-sm updateMatch" data-toggle="modal" data-target="#updateMatch" data-dismiss="modal">Update match</a>


                                    <button style="color: white; background-color: #996600; border: 1px solid #996600;" class="list-group-item btn btn-sm closeMatch">Close The Match</button>
                                </div>


                            </div>

                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">X</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- hidden-match -->
                <div id="hidden-section" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hidden match</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" id="hiddenSectionShow">

                            </div>
                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary m-default" type="button" data-dismiss="modal" id="">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->

                <!-- matchActionMenu -->
                <div id="default" class="modal" style="">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">



                            <div class="modal-body">

                                <div class="list-group">
                                    <?php
                                    $query = "SELECT * FROM section";
                                    $resultreceivingMoneyNumber = $db->select($query);
                                    $i = 0;
                                    if ($resultreceivingMoneyNumber) {
                                        while ($receivingMoneyNumber = $resultreceivingMoneyNumber->fetch_assoc()) {

                                            $i++;
                                    ?>

                                            <a style="color: #996600;" href="#" class="list-group-item btn btn-sm section" g-type="2" id="<?php echo $receivingMoneyNumber['id']; ?>" data-toggle="modal" data-target="#hidden-section"> <?php echo $receivingMoneyNumber['title']; ?></a>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>


                            </div>

                            <div class="modal-footer">

                                <button style="color: white; background-color: #996600; border: 1px solid #996600;" class="btn btn-secondary" type="button" data-dismiss="modal">X</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->

                <!-- Modal update match-->
                <div id="updateMatch" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Match Title </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">


                                <div id="UpdateMatchSuccess"></div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">A Team</label>
                                    <div class="col-md-8">
                                        <input type="hidden" class="form-control matchIdForUpdate" id="" rows="4" value="">
                                        <input type="text" class="form-control" id="Update_A_team" name="A_team" rows="4" value="" placeholder="Enter A Team Name">
                                        <span><input type="hidden" id="color_aup" name="color_aup" class="form-control" placeholder="Team Color"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">B Team</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="Update_B_team" rows="4" value="" placeholder="Enter  B Team Name">
                                        <span><input type="hidden" id="color_bup" name="color_bup" class="form-control" placeholder="Team Color"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">match Statement</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="title" id="Update_title" value="" rows="4" placeholder="Enter match Statement">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Start Date</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="Update_date" name="date" id="demoDate" type="date" placeholder="Select Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Start Time</label>
                                    <div class="col-md-8">
                                        <input id="timesss" name="time" type="time" value="" onchange="ampmupdate(this.value)"></input>
                                        <input type="hidden" id="selecttimeupdate">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">End Date</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="update_enddate" name="date" id="demoDate" type="date" placeholder="Select Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">End Time</label>
                                    <div class="col-md-8">
                                        <input id="timesss" name="time" type="time" value="" onchange="ampm_end_update(this.value)">
                                        <input type="hidden" id="selecttimeupdate_end">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Match Status</label>
                                    <div class="col-md-8">
                                        <!--Radio Button Markup-->
                                        <div class="">
                                            <label>
                                                <input type="radio" name="Update_status" id="Update_status" value="1"><span class="label-text"> Live</span><br>
                                                <input type="radio" name="Update_status" id="Update_status" value="2"><span class="label-text"> Upcoming</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Match Type</label>
                                    <div class="col-md-8">
                                        <!--Radio Button Markup-->
                                        <div class="">
                                            <label>
                                                <input type="radio" name="gameType" id="Update_gameType" value="1"><span class="label-text"> FootBall</span><br>
                                                <input class="gameTypec" type="radio" name="gameType" id="Update_gameType" value="2"><span class="label-text"> Cricket</span><br>
                                                <input type="radio" name="gameType" id="Update_gameType" value="3"><span class="label-text"> Basketball</span><br>

                                                <input type="radio" name="gameType" id="Update_gameType" value="5"><span class="label-text"> Tennis</span><br>
                                                <input type="radio" name="gameType" id="Update_gameType" value="6"><span class="label-text"> Table Tennis</span>
                                                <br>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input style="color: white; background-color: #996600; border: 1px solid #996600;" name="updateMatch" id="updateMatchSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">

                                <button style="color: white; background-color: #996600; border: 1px solid #996600;" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- questionActionMenu -->
                <div id="questionActionMenu" class="modal" style="">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">



                            <div class="modal-body">

                                <div class="list-group">
                                    <a style="color: white; background-color: #996600; border: 1px solid #996600;" href="#" class="list-group-item btn btn-sm addAns" data-toggle="modal" data-target="#addAns">Add Answer</a>
                                    <a style="color: white; background-color: #996600; border: 1px solid #996600;" href="#" class="list-group-item btn btn-sm updateQuestion" data-toggle="modal" data-target="#updateQuestion" data-dismiss="modal">Update question</a>

                                    <button style="color: white; background-color: #996600; border: 1px solid #996600;" class="list-group-item btn btn-sm closeQuestion" onclick="return confirm('Are you sure?')">Close The question</button>
                                </div>


                            </div>

                            <div class="modal-footer">

                                <button id="new" class="btn btn-secondary" type="button" data-dismiss="modal">X</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- addAns Modal -->
                <div id="addAns" class="modal" style="">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h6>Question : <span id="questionShowOfAddAns"></span></h6>
                                <div id="addAnsSuccess">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input class="form-control" id="addAnsField" placeholder="Enter Ans">
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" id="addAnsRate" placeholder="Rate">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input id="questionIdForAddAns" type="text" value="" hidden="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input id="addAnsSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-secondary" type="button" data-dismiss="modal">X</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->
                <!-- update-sub-betting Modal -->
                <div id="updateQuestion" class="modal" style="">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Edit Question </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <div id="UpdateQuestionSuccess"></div>


                                <div class="form-group row">
                                    <label class="control-label col-md-3">Question</label>
                                    <div class="col-md-8">
                                        <input type="hidden" class="form-control questionIdForUpdate" id="" rows="4" value="">
                                        <input class="form-control" id="editQuestion" value="">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input name="updateMatch" id="updateQuestionSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-secondary" type="button" data-dismiss="modal">X</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->




                <!-- edit betting rate -->
                <div id="updateAnsRate" class="modal editRate" style="">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Answers </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div id="UpdateAnsSuccess">

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input class="form-control" id="editAnswer" value="">
                                        <input type="hidden" class="form-control ansIdForUpdate" id="" rows="4" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input class="form-control rate" id="editRateAmount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input id="updateAnsSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end Modal -->

                <!-- limit betting rate -->
                <div id="limitAns" class="modal" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Limit Answer </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h6>Answer : <span id="ansShowOfLimit"></span></h6>
                                <div id="limitAnsSuccess">
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input class="form-control" id="limitRateAmount" value="">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input class="form-control" id="ansIdForLimit" value="" hidden="1">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">
                                        <input id="limitRateForAnsSubmit" type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Modal -->

                <div id="liveMatchFetch">
                    <div class="loader loader-1">
                        <div class="loader-outter"></div>
                        <div class="loader-inner"></div>
                    </div>

                </div>
                <br>
                <h6 style="color: #17A05D">Upcoming Match</h6>

                <div id="upcomingContent">

                </div>



            </div>
        </div>
    </div>
    </div>
</main>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function() {
        $("#liveMatchFetch").load('betLiveContent.php');
        $("#upcomingContent").load('upcomingMatch.php');

    });

    $(document).on('click', '#hidden', function(event) {
        $("#hiddenContentShow").load('hiddenContent.php');



    });
    $(document).on('click', '#closedmatch', function(event) {
        $("#closedContentShow").load('closedMatch.php');
    });
    $(document).on('click', '#closedquestion', function(event) {
        $("#closedQuestionShow").load('closedQuestion.php');
    });
</script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>

<!-- Page specific javascripts-->


<!-- won-->
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/betAction.js"></script>
<script>
    $(function() {

        setInterval(function() {
            if ($("#success").is(":visible")) {
                //you may add animate.css class for fancy fadeout
                $("#success").fadeOut("fast");
            }
        }, 1000);

    });

    $('.editRate').on('shown.bs.modal', function() {
        $(this).find('.rate').focus();
    });


    setInterval(function() {
        $.ajax({
            url: "betRefresh.php",
            success: function(data) {

                if (data === "1") {
                    $("#liveMatchFetch").load('betLiveContent.php');
                    $("#upcomingContent").load('upcomingMatch.php');
                }
            }
        });
    }, 6000);


    $(document).on('click', '.gameTypec', function() {

        $('.hiddenOp').toggle();


    });
</script>

<?php
if (isset($_POST['waitBettingTitle'])) {
    $match_id = $_POST['bettingId'];
    $waiting = $_POST['matchwaittime'];
    $q = "update betting_title set waittingTime='$waiting' where id='$match_id'";
    if (mysqli_query($con, $q)) {
    }
}

if (isset($_POST['waitBettingquestion'])) {
    $questionid = $_POST['questionid'];
    $waiting = $_POST['questionwatingtime'];
    $q = "update betting_subtitle set waittingTime='$waiting' where id='$questionid'";
    if (mysqli_query($con, $q)) {
    }
}

?>

<script>
    function autoquestion(gameid) {

        return false;

        $.ajax({
            method: "POST",
            url: "autoquestion.php",
            data: {
                gameid: gameid
            },
            success: function(data) {

                $("#autoquestion").html(data);


            }
        });
    }

    function ampm(time) {

        console.log(time);
        if (time.value !== "") {
            var hours = time.split(":")[0];
            var minutes = time.split(":")[1];
            var suffix = hours >= 12 ? "pm" : "am";
            hours = hours % 12 || 12;
            hours = hours < 10 ? "0" + hours : hours;

            var displayTime = hours + ":" + minutes + " " + suffix;
            //document.getElementById("display_time").innerHTML = displayTime;
            $('#selecttime').val(displayTime);
        }
    }

    function ampm_end(time) {

        console.log(time);
        if (time.value !== "") {
            var hours = time.split(":")[0];
            var minutes = time.split(":")[1];
            var suffix = hours >= 12 ? "pm" : "am";
            hours = hours % 12 || 12;
            hours = hours < 10 ? "0" + hours : hours;

            var displayTime = hours + ":" + minutes + " " + suffix;
            //document.getElementById("display_time").innerHTML = displayTime;
            $('#selecttime_end').val(displayTime);
        }
    }

    function ampmupdate(time) {

        console.log(time);
        if (time.value !== "") {
            var hours = time.split(":")[0];
            var minutes = time.split(":")[1];
            var suffix = hours >= 12 ? "pm" : "am";
            hours = hours % 12 || 12;
            hours = hours < 10 ? "0" + hours : hours;

            var displayTime = hours + ":" + minutes + " " + suffix;
            //document.getElementById("display_time").innerHTML = displayTime;
            $('#selecttimeupdate').val(displayTime);
        }
    }

    function ampm_end_update(time) {

        console.log(time);
        if (time.value !== "") {
            var hours = time.split(":")[0];
            var minutes = time.split(":")[1];
            var suffix = hours >= 12 ? "pm" : "am";
            hours = hours % 12 || 12;
            hours = hours < 10 ? "0" + hours : hours;

            var displayTime = hours + ":" + minutes + " " + suffix;
            //document.getElementById("display_time").innerHTML = displayTime;
            $('#selecttimeupdate_end').val(displayTime);
        }
    }
</script>


<?php
$dt = new DateTime('now');

?>