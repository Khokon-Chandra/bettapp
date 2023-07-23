<?php
include './lib/Database.php';
$db = new Database();
$output = '';
?>

<?php
$query = "SELECT * FROM `betting_title` where status=2 and close=0 and STR_TO_DATE(dateend,'%d %b %Y %h:%i %p') >= NOW() ORDER BY STR_TO_DATE(date,'%d %b %Y %h:%i %p') ASC";
$resultBettingTitle = $db->select($query);
$i = 0;
if ($resultBettingTitle) {
    while ($bettingTitle = $resultBettingTitle->fetch_assoc()) {

        $i++;
        ?>
        <?php
        if ($bettingTitle['hide']) {
            ?>
            <div class="panel panel-default panel2" >
                <div class="panel-heading first-lebal" role="tab" id="headingOne<?php echo $bettingTitle['id'] ?>" style="background: linear-gradient(to top,#263E73, #203F61);">
                    <h4 style="cursor: pointer" class="panel-title"  role="button" data-toggle="collapse"  href="#collapseOne<?php echo $bettingTitle['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $bettingTitle['id'] ?>">

                                <?php
                        if ($bettingTitle['gameType'] == 1) {
                            ?>
						<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <img class="im" src="./img/1393757333.png">
							</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
						<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D">VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"><?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?>  
							</div>
						</div>
                            <?php
                        } else  if ($bettingTitle['gameType']==2) {
                            ?>
						<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <img class="im" src="./img/ka-pl.png">
						</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
						<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D">VS</span><span style="color:<?php echo $bettingTitle['color_b'] ?>"> <?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
							</div>
						</div>
                            <?php
                        }  else if ($bettingTitle['gameType']==3){
                              ?>
                        <div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <img class="im" src="./img/b_ball.png">
						</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
						<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D">VS</span><span style="color:<?php echo $bettingTitle['color_b'] ?>"> <?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
					</div>
						</div>
                        <?php
                        }

                        else if ($bettingTitle['gameType']==4){
                              ?>
                        <div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <img class="im" src="./img/boxing.png">
						</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
						<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D">VS</span><span style="color:<?php echo $bettingTitle['color_b'] ?>"> <?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
						</div>
						</div>
                        <?php
                        }

                        else if ($bettingTitle['gameType']==5){
                              ?>
                        <div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <img class="im" src="./img/tenis.png">
						</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
						<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D">VS</span><span style="color:<?php echo $bettingTitle['color_b'] ?>"> <?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
					</div>
						</div>
                        <?php
                        }
                        else if ($bettingTitle['gameType']==6){
                              ?>
                        <div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <img class="im" src="./img/h.png">
						</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
						<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D">VS</span><span style="color:<?php echo $bettingTitle['color_b'] ?>"> <?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
					</div>
						</div>
                        <?php
                        }
                         else if ($bettingTitle['gameType']==7){
                              ?>
                        <div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <img class="im" src="./img/badminton.png">
						</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
						<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D">VS</span><span style="color:<?php echo $bettingTitle['color_b'] ?>"> <?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
						</div>
						</div>
                        <?php
                        }

                        ?>

                    </h4>
                </div>
                <div id="collapseOne<?php echo $bettingTitle['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $bettingTitle['id'] ?>">
                    <div class="panel-body" style="padding:0px;">
                        <?php
                        $query = "SELECT * FROM `betting_subtitle` WHERE bettingId='$bettingTitle[id]' order by id asc";
                        $resultBettingSubTitle = $db->select($query);
                        $i = 0;
                        if ($resultBettingSubTitle) {
                            while ($bettingSubTitle = $resultBettingSubTitle->fetch_assoc()) {

                                $i++;
                                ?>
                                <?php
                                if ($bettingSubTitle['hide']) {
                                    ?>

                                    <div class="">
                                        <div style="padding: 5px;" class="panel-heading second-lebal" role="tab" id="headingOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>">
                                            <h4 style="cursor: pointer" class="panel-title" role="button" data-toggle="collapse"  href="#collapseOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>">

                                                <?php echo $bettingSubTitle['title'] ?> <span class="bgu">Upcoming</span>

                                            </h4>
                                        </div>
                                        <div id="collapseOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>">
                                            <div class="panel-body"  style="padding:0px;">

                                                <?php
                                                $query = "SELECT * FROM `betting_sub_title_option` WHERE  bettingSubTitleId='$bettingSubTitle[id]' order by id asc";
                                                $resultBettingSubTitleOption = $db->select($query);
                                                $i = 0;
                                                if ($resultBettingSubTitleOption) {
                                                    while ($BettingSubTitleOption = $resultBettingSubTitleOption->fetch_assoc()) {

                                                        $i++;
                                                        ?>
                                                        <?php
                                                        if ($BettingSubTitleOption['hide']) {
                                                            ?>



                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-sm data-show buttonrate" style="cursor: pointer;font-size: 13px;background:transparent;border:none;border-right:1px solid #B5B5B5;border-bottom:1px solid pink;font-weight:bold;<?php if ($bettingSubTitle['showStatus']==0){
                                                                                echo"background:transparent";
                                                                             } ?>"



                                                                 id="select" 
                                                                 bettingTitle="<?php echo $bettingTitle['id'] ?>"
                                                                 bettingSubTitle=" <?php echo $bettingSubTitle['id'] ?>"
                                                                 BettingSubTitleOption="<?php echo $BettingSubTitleOption['id'] ?>"

                                                                 gameType="<?php echo $bettingTitle['gameType'] ?>"
                                                                 gameStatus="<?php echo $bettingTitle['status'] ?>"
                                                                <?php if ($bettingSubTitle['showStatus']!=0){
                                                                                echo"data-toggle='modal'";
                                                                             } ?>  
                                                                 <?php if (isset($_COOKIE["userId"]) && ( isset($_COOKIE["password"])) && ( isset($_COOKIE["id"]))) {
                                                                     ?>
                                                                     data-target="#betting"
                                                                     <?php
                                                                 } else {
                                                                     ?>
                                                                     data-target="#SignIn"
                                                                     <?php
                                                                 }
                                                                 ?>

                                                                 ><?php echo $BettingSubTitleOption['title'] ?>  <span   style="color: #f9f9f9;background: #52A921;padding: 1px 8px;border-radius: 9px;margin-left: 2px;"><b><?php echo $BettingSubTitleOption['amount'] ?></b></span>

                                                            </div>

                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <?php
    }
} else {
    ?>
    <div class="alert alert-dismissible alert-info">
        <button class="close" type="button" data-dismiss="alert">×</button><strong>No match available !!!</strong>
    </div>
    <?php
}
?>