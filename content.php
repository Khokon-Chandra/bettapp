<?php
date_default_timezone_set("Asia/Dhaka");
include './lib/Database.php';
$db = new Database();
$output = '';
?>
<?php
$query = "SELECT * FROM `betting_title` WHERE status=1 and close=0 and STR_TO_DATE(dateend,'%d %b %Y %h:%i %p') >= NOW() ORDER BY STR_TO_DATE(date,'%d %b %Y %h:%i %p') ASC";
$dbb = new PDO('mysql:host='.constant("host").';dbname='.constant("dbname"), constant("user"), constant("pass"));
$dbb->exec("SET TIME_ZONE = '".date('P')."';");
$resultBettingTitle = $dbb->query($query)->fetchAll(PDO::FETCH_ASSOC);
$i = 0;
if ($resultBettingTitle) {

    foreach ($resultBettingTitle as $bettingTitle) {
        $i++;
        ?>
        <?php
        if ($bettingTitle['hide']) {
            ?>
            <div class="panel2">
                <?php
                if ($bettingTitle['showStatus'] == 0) {
                    ?>
                    <div style="background: yellow;" class="panel-heading first-lebal" role="tab" id="headingOne<?php echo $bettingTitle['id'] ?>">
                        <?php
                    } else {
                        ?>
                        <div class="panel-heading first-lebal" style="background:#90BDDC;" role="tab" id="headingOne<?php echo $bettingTitle['id'] ?>">
                            <?php
                        }
                        ?>

                        <h4 style="cursor: pointer" class="panel-title" role="button" data-toggle="collapse" href="#collapseOne<?php echo $bettingTitle['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $bettingTitle['id'] ?>">

                            <?php
                            if ($bettingTitle['gameType'] == 1) {
                                ?>
							<div class="row">
                                 <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <img class="im" src="./img/1393757333.png">
								</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
							<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span>&nbsp<span style="color: #EFA71D">VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"><?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
                                <?php
                                if ($bettingTitle['cancel'] ==1)
                                 {
                                    ?>
                                    <img src="img/886065d49e.png"> <span style='color:red;font-size: 19px;'><b>Canceled</b></span>
									 </div>
							</div>
                                    <?php
                                 }
                            } else if ($bettingTitle['gameType'] == 2) {
                                ?>
							<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <img class="im" src="./img/ka-pl.png">
								</div>
								<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
							<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span><span style="color: #EFA71D">VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"> <?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
                                    
                                <?php
                                 if ($bettingTitle['cancel'] ==1)
                                 {
                                    ?>
                                   <img src="img/886065d49e.png"> <span style='color:red;font-size: 19px;'><b>Canceled</b></span>
								</div>
							</div>
                                    <?php
                                 }
                            } else if ($bettingTitle['gameType'] == 3){
                                ?>
						<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <img class="im" src="./img/basket.png">
							</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
							<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D"> VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"><?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?>
                                    
                                <?php
                                 if ($bettingTitle['cancel'] ==1)
                                 {
                                    ?>
                                   <img src="img/886065d49e.png"> <span style='color:red;font-size: 19px;'><b>Canceled</b></span>
							</div>
							</div>
                                    <?php
                                 }
                            }
                            else if ($bettingTitle['gameType'] == 4){
                                ?>
								<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <img class="im" src="./img/boxing.png">
									</div>
									<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
							<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D"> VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"><?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?>
                                    
                                <?php
                                 if ($bettingTitle['cancel'] ==1)
                                 {
                                    ?>
                                    <img src="img/886065d49e.png"> <span style='color:red;font-size: 19px;'><b>Canceled</b></span>
									</div>
							</div>
                                    <?php
                                 }
                            }
                            else if ($bettingTitle['gameType'] == 5){
                                ?>
							<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <img class="im" src="./img/tenis.png">
								</div>
								<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
							<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span>&nbsp<span style="color: #EFA71D">VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"><?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?>
                                    
                                <?php
                                  if ($bettingTitle['cancel'] ==1)
                                 {
                                    ?>
                                   <img src="img/886065d49e.png"> <span style='color:red;font-size: 19px;'><b>Canceled</b></span>
								</div>
							</div>
                                    <?php
                                 }
                            }
                             else if ($bettingTitle['gameType'] == 6){
                                ?>
							<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <img class="im" src="./img/tabletennis.png">
								</div>
								<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
							
							<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D"> VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"><?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?>
                                    
                                <?php
                                 if ($bettingTitle['cancel'] ==1)
                                 {
                                    ?>
                                   <img src="img/886065d49e.png"> <span style='color:red;font-size: 19px;'><b>Canceled</b></span>
								</div>
							</div>
                                    <?php
                                 }
                            }
                            else if ($bettingTitle['gameType'] == 7){
                                ?>
						<div class="row">
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <img class="im" src="./img/animated-badminton-image-0001.gif">
							</div>
							<div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10">
							<span style="color:<?php echo $bettingTitle['color_a'] ?>"><?php echo $bettingTitle['A_team'] ?></span> <span style="color: #EFA71D"> VS</span> <span style="color:<?php echo $bettingTitle['color_b'] ?>"><?php echo $bettingTitle['B_team'] ?></span> <br> <?php echo $bettingTitle['title'] ?> <br> <?php echo substr_replace($bettingTitle['date'], "@", 12, 0) ?> 
                                    
                                <?php
                                if ($bettingTitle['cancel'] ==1)
                                 {
                                    ?>
                                  <img src="img/886065d49e.png"> <span style='color:red;font-size: 19px;'><b>Canceled</b></span>
							</div>
							</div>
                                    <?php
                                 }
                            }
                            ?>

                        </h4>
                    </div>
						<div class="col-lg-12 scor"><?php if ($bettingTitle['liveScore']==null) {
                                    echo "";
                                }else{
                                    ?>
                                      <span class="liv"><?php echo "Score : ".$bettingTitle['liveScore'];?></span>
                                    <?php
                                } ?></div>
                    <div id="collapseOne<?php echo $bettingTitle['id'] ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne<?php echo $bettingTitle['id'] ?>">
                        <div class="panel-body" style="padding: 0px;">
                            <?php
                            $query = "SELECT * FROM `betting_subtitle` WHERE bettingId='$bettingTitle[id]' and close=0 order by id asc";
                            $resultBettingSubTitle = $db->select($query);
                            $i = 0;
                            if ($resultBettingSubTitle) {
                                while ($bettingSubTitle = $resultBettingSubTitle->fetch_assoc()) {

                                    $i++;
                                    ?>
                                    <?php
                                    if ($bettingSubTitle['hide']) {
                                        ?>

                                        <div class=" panel2">
                                            <?php
                                            if ($bettingTitle['showStatus'] == 0 || $bettingSubTitle['showStatus'] == 0) {
                                                ?>

                                                <div style="padding:4px !important;" class="panel-heading second-lebal" role="tab" id="headingOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div style="padding:4px !important;" class="panel-heading second-lebal" role="tab" id="headingOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>">
                                                        <?php
                                                    }
                                                    ?>

                                                    <h4 style="cursor: pointer" class="panel-title" role="button" data-toggle="collapse"  href="#collapseOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>">

                                                        <?php echo $bettingSubTitle['title'] ?> <span class="bg"></span>

                                                    </h4>
                                                </div>
                                                <div id="collapseOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne<?php echo $bettingTitle['id'] ?>-two<?php echo $bettingSubTitle['id'] ?>">
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


                                                                    <?php
                                                                    if ($bettingTitle['showStatus'] == 0 || $bettingSubTitle['showStatus'] == 0 || $BettingSubTitleOption['showStatus'] == 0) {
                                                                        ?>

                                                                        <div style="" class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-6 btn  btn-sm data-show buttonrate" style="cursor: pointer" 
                                                                            id="select " 
                                                                             bettingTitle="<?php echo $bettingTitle['id'] ?>"
                                                                             bettingSubTitle=" <?php echo $bettingSubTitle['id'] ?>"
                                                                             BettingSubTitleOption="<?php echo $BettingSubTitleOption['id'] ?>"
                                                                             gameType="<?php echo $bettingTitle['gameType'] ?>"
                                                                             gameStatus="<?php echo $bettingTitle['status'] ?>"

                                                                      

                                                                             >
                                                                             <div class=""
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
                                                                             ?> style="font-size: 13px;<?php if ($bettingSubTitle['showStatus']==0){
                                                                                echo"background:#F83C3D";
                                                                             } ?>">
                                                                            <b><?php echo $BettingSubTitleOption['title'] ?></b>  <span  style="color: red;"><b><?php echo $BettingSubTitleOption['amount'] ?></b></span>
                                                                        </div>
                                                                        </div>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-6 btn  btn-sm data-show buttonrate" style="cursor: pointer"



                                                                             id="select " 
                                                                             bettingTitle="<?php echo $bettingTitle['id'] ?>"
                                                                             bettingSubTitle=" <?php echo $bettingSubTitle['id'] ?>"
                                                                             BettingSubTitleOption="<?php echo $BettingSubTitleOption['id'] ?>"
                                                                             gameType="<?php echo $bettingTitle['gameType'] ?>"
                                                                             gameStatus="<?php echo $bettingTitle['status'] ?>"

                                                                             >
                                                                             <div class=""
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
                                                                             ?> style="font-size: 13px;<?php if ($bettingSubTitle['showStatus']==0){
                                                                                echo"background:transparent";
                                                                             } ?>">
                                                                            <b><?php echo $BettingSubTitleOption['title'] ?></b>  <span   style="color: #15E3F4;background: #1B5562;padding: 1px 8px;border-radius: 9px;margin-left: 2px;"><b><?php echo $BettingSubTitleOption['amount'] ?></b></span>
                                                                        </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>


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