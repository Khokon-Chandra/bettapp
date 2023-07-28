<?php

use Riazul\Riaz\DB;

require_once './vendor/autoload.php';

include './lib/Database.php';


$db = new Database();
date_default_timezone_set('Asia/Dhaka');
?>

<?php
 function fill_brand($db)  
 {
      $output = '';
	 $query = "SELECT * FROM method";
      $resultMethod = $db->select($query);
      $i = 0;
      if ($resultMethod) {
      while ($method = $resultMethod->fetch_assoc()) {
         $i++;
           $output .='<option value="' .$method['id'].'">' .$method['method'].'</option>';
		} 
      return $output;  
 } 
 }
 function fill_product($db)  
 {  
      $output = '';  
	$query = "SELECT * FROM receiving_money_number";
    $resultreceivingMoneyNumber = $db->select($query);
     $i = 0;
     if ($resultreceivingMoneyNumber) {
     while ($receivingMoneyNumber = 												$resultreceivingMoneyNumber->fetch_assoc()) {

                                                        $i++; 
           $output .= '<option value="">' .$receivingMoneyNumber['phone'].'</option>';   
      }  
      return $output;  
 }
 }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
         <title> Newt20.live - Home.</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Demoforyou.xyz betting portal ,cricket,football,Table Tennis,Cricket 1st & 2nd Batting,Test Option,Table Tennis" />
        <!-- css -->
        <link href="./css/bootstrap.min.css" rel="stylesheet" />
        <link href="./css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="./css/footer-basic-centered.css">
         <link href="https://fonts.googleapis.com/css?family=Palanquin&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/headerStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>


    <body>
        <!-- Modal deposit -->
        <div id="deposit" class="modal fade" role="dialog" >
            <div class="modal-dialog  " >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header m-head" style="background: #005a4c !important;">

                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h4 class="modal-title" style="color: #D2D2D2"> &nbsp; Request a deposit</h4>
                    </div>
                    <div class="modal-body" style="padding: 1% !important">
                        <div class="">
                            <div role="form" class="register-form">
                                <div id="errorDeposit" class="alert alert-danger errorDeposit" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×</button>  <strong>  Opps !!</strong> <span id="errorDepositText"></span>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">

                                            <label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>

                                            <select class="form-control" id="dMethodt">
                                                <option disabled selected value>Select method</option>
<?php echo fill_brand($db); ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">

                                            <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;">*</span></label>
                                            <select class="form-control" id="dTo">
                                                <option disabled selected value>Select number</option>
<?php echo fill_product($db); ?>
                                                
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">

                                        <div class="form-group">
                                            <label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;">*</span></label>
                                            <input type="text" name="first_name" id="dAmount" class="form-control input-lg" placeholder="Amount" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <label style="text-align: left;width: 100%;">From <span style="color:#DD4F43;">*</span></label>
                                        <div class="form-group">
                                            <input type="number" name="dFrom" id="dFrom" class="form-control input-lg" placeholder="From" tabindex="1">
											<span id="dError" style="color: #C84038;font-family: initial;"></span>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">

                                    <input type="hidden" value="trxid" name="display_name" id="dReference" class="form-control input-lg" placeholder="Transaction Number " tabindex="3">
                                </div>




                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
										<input type="submit" id="depositSubmit" value="Submit" style="background-color: #005a4c;" class="btn btn-success btn-block btn-lg" tabindex="7"></div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
<div style="border: 2px solid ;"></div>
        <div id="wrapper" >
            <!-- start header -->
            <header>



                <nav class="navbar navbar-default heading-color" style="background: #10323A; padding-right: -5px;">
                    <div class="container">
                         
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header ">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="float:left;margin-left:10px;">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div style="width: 240px;margin: auto;">  <a  class="" href="https://newt10.live/"><img style="width: 180px;height: 55px;margin-top: 0px; border-radius: 5px;" src="img/logo.png"></a></div>
							                                                                        <div style="position:absolute;right:10px;color:#fff;top:22px;line-height: 6px;color:yellow;font-weight:bolder;">
                            <p id="MyClockDisplay" onload="showTime()"></p>

                            
                            <script type="text/javascript">
                                function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " ";
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
                            </script>
                            </div>
                    
                          

									        <!--Modal deposit restrict-->
<div class="modal fade" id="depositrestrict" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You have 1 request pending!!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<table class="guest" id="content-mobile"   style="width:100% ;margin: 0px auto;">
                                <tr>
                                    <?php
                                    if (!isset($_COOKIE["userId"]) AND ( !isset($_COOKIE["password"]))) {
                                        ?>
                                        <td class="td1">
                                            
                                        </td>
                                        <td class="td2">
                                            
                                        </td>
                            
                                        <?php
                                    } else {
                                        $account = '';
                                        if (isset($_COOKIE["club"])) {

                                            $query = "select * from `club` where userId='$_COOKIE[userId]'";
                                            $result = $db->select($query);
                                            if ($result) {
                                                $account = $result->fetch_assoc();
                                            }
                                        } else {

                                            $query = "select * from `user` where userId='$_COOKIE[userId]'";
                                            $result = $db->select($query);
                                            if ($result) {
                                                $account = $result->fetch_assoc();
                                            }
                                        }
                                        ?>
                                        <td class="td1">
                                            <div style=" padding: 7px;background:yellow !important;color: #000000!important;font-weight: bolder;"  class="panel text-center ">  <?php echo "Balance : ".round($account['balance'],2); ?>
                                            </div>

                                        </td>
                                        <td class="td2">
                                            <?php
                                            if (isset($_COOKIE["club"])) {
                                                ?>
                                               <div  style="padding: 7px;color: #ffffff!important;background:transparent !important;border: 1px solid silver!important;" class="panel text-center"> 
                                                Deposit
                                            </div>
                                                <?php
                                            } else {
                                                ?>
                                               <div  style="padding: 7px;color: #ffffff!important;background:#016d5f !important;border: 1px solid silver!important;" class="panel text-center"
													data-toggle="modal" data-target="#deposit">
                                                Deposit
                                            </div>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    <?php
									}
                                    ?>
                                </tr>
                            </table>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav nv left" style="float:right;">                           
                                <?php
                                $account = '';
                                if (!isset($_COOKIE["userId"]) AND ( !isset($_COOKIE["password"]))) {
                                    ?>
                                    <li><a  href="" data-toggle="modal" data-target="#SignUp"><i class="fa fa-user-plus" aria-hidden="true" style="color:yellow"></i><span style="color:#FFDE16;"> Register Now</span></a></li>
                                    <li><a href="" data-toggle="modal" data-target="#SignIn"><i class="fa fa-sign-in">&nbsp Log in</i></a></li>
                                    <?php
                                } else {
                                    if (isset($_COOKIE["club"])) {

                                        $query = "select * from `club` where userId='$_COOKIE[userId]'";
                                        $result = $db->select($query);
                                        if ($result) {
                                            $account = $result->fetch_assoc();
                                        }
                                        ?>
                                        <li>
                                            <a href="#" style="color: yellow !important"><?php echo "UserID - ". $_COOKIE["userId"]; ?></a>  
                                        </li>

                                        <div class="modal fade" id="clubMember" role="dialog">
                                            <div class="modal-dialog modal-lg " >
                                                <!-- Modal content-->
                                                <div class="modal-content m-content">
                                                    <div class="modal-header m-head" style="background: #002549 !important;">

                                                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                                                        <h4 class="modal-title" style="color: #C0C0C0">  &nbsp; All Sponsor's</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table  class="table table-bordered table-hover" id="clubMember">
                                                                <thead>
                                                                    <tr>
                                                                        <th>SN.</th>
                                                                        <th>Joining Date</th>
                                                                        <th>Recent Bet Date</th>
                                                                        <th>Name</th>
                                                                        <th>User Id</th>
                                                                        <th>Total Bet</th> 
                                                                        <th>Commission Earned</th>  
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $totalBet = 0;
                                                                    $totalCommission = 0;
                                                                    $query = "select * from `user` where clubId='$_COOKIE[userId]'";
                                                                    $resultClubMember = $db->select($query);
                                                                    $count = 0;
                                                                    if ($resultClubMember) {
                                                                        foreach ($resultClubMember as $ClubMember) {
                                                                            $count++;
                                                                            ?>


                                                                            <tr>
                                                                                <td><?php echo $count; ?></td>
                                                                                <td><?php echo $ClubMember['time'] ?></td>
                                                                                <?php
                                                                                $query = "select * from `bet` where userId='$ClubMember[userId]' order by id desc";
                                                                                $resultRecentBet = $db->select($query);

                                                                                if ($resultRecentBet) {
                                                                                    $RecentBet = $resultRecentBet->fetch_assoc();
                                                                                    ?>
                                                                                    <td><?php echo $RecentBet['time'] ?></td>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <td> not yet bet </td>       
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <td><?php echo $ClubMember['name'] ?></td>
                                                                                <td><?php echo $ClubMember['userId'] ?></td>
                                                                                <?php
                                                                                $query = "select sum(betAmount) as betAmount from `bet` where userId='$ClubMember[userId]'";
                                                                                $betAmount = $db->select($query);

                                                                                if ($betAmount) {
                                                                                    $betAmountTotal = $betAmount->fetch_assoc();
                                                                                    $totalBet+=$betAmountTotal['betAmount'];
                                                                                    ?>
                                                                                    <td><?php echo $betAmountTotal['betAmount'] ?></td>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <td> not yet bet </td>       
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                                $query = "select sum(clubCredit) as commission  from `transaction` where userId='$ClubMember[userId]' and clubId='$_COOKIE[userId]'";
                                                                                $betAmount = $db->select($query);

                                                                                if ($betAmount) {
                                                                                    $betAmountTotal = $betAmount->fetch_assoc();
                                                                                    $totalCommission+=$betAmountTotal['commission'];
                                                                                    ?>
                                                                                    <td><?php echo $betAmountTotal['commission'] ?></td>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <td> not yet bet </td>       
                                                                                    <?php
                                                                                }
                                                                                ?>


                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                    <div  class="alert alert-danger " role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                                            ×</button>  <strong>  Opps !!</strong> Members not found !!
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>Page Total</th>
                                                                    <th><?php echo $totalBet; ?></th> 
                                                                    <th><?php echo $totalCommission; ?></th>  
                                                                </tr>

                                                                </tbody>

                                                            </table>
                                                        </div><!--end of .table-responsive-->
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <li >

                                            <a href="clubMember.php" >Club Members (<?php echo $count; ?>)</a>   
                                        </li>
                                        <li >

                                            <a href="clubHistory.php" >Club History</a>   
                                        </li>
                                        <li> <a style="" href="clubProfile.php" >  My Wallet</a></li>
                                        <li> <a style="" href="clubStatement.php" >My Statement</a></li>
                                        <li> <a style="color: yellow !important; font-weight: bold;"><mark class="mrk"><?php echo "Balance - ". $account['balance'] * 1.00; ?></mark></a></li>
                                        <li>  <a style="color: yellow; font-family: verdana;" href="logout.php?logout">Log Out</a></li>



                                        <?php
                                    } else {

                                        $query = "select * from `user` where userId='$_COOKIE[userId]'";
                                        $result = $db->select($query);
                                        if ($result) {
                                            $account = $result->fetch_assoc();
                                            ?>
                                            <div class="modal fade" id="sponsor" role="dialog">
                                                <div class="modal-dialog  modal-lg" >

                                                    <!-- Modal content-->
                                                    <div class="modal-content m-content">
                                                        <div class="modal-header m-head" style="background: #005a4c!important;">

                                                            <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                                                            <h4 class="modal-title" style="color: #C0C0C0">  &nbsp; All Sponsor's</h4>
                                                        </div>
                                                        <div class="modal-body" style="">
                                                            <div class="table-responsive">
                                                                <table  class="table table-bordered table-hover" id="sampleTable2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>Name</th>
                                                                            <th>User Id</th>
                                                                            <th>Email</th>  
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $query = "select * from user where sponsorUsername='$_COOKIE[userId]'";
                                                                        $resultUser = $db->select($query);
                                                                        $i = 0;
                                                                        if ($resultUser) {
                                                                            while ($user = $resultUser->fetch_assoc()) {

                                                                                $i++;
                                                                                ?>


                                                                                <tr>
                                                                                    <td><?php echo $i; ?></td>
                                                                                    <td><?php echo $user['name'] ?></td>
                                                                                    <td><?php echo $user['userId'] ?></td>
                                                                                    <td><?php echo $user['email'] ?></td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                        <div  class="alert alert-danger " role="alert">
                                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                                                ×</button>  <strong>  Opps !!</strong> Sponsor's not found !!
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                    </tbody>

                                                                </table>
                                                            </div><!--end of .table-responsive-->
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <li >
                                                <a style="color: yellow !important;"><mark class="mrk"><?php echo "UserID - ". $_COOKIE["userId"]; ?></mark></a> </li>

                                            <li> <a  href="Wallet.php" >My Wallet</a></li>
                                            <li> <a href="statement.php" >My Statement</a></li>
                                            <li><a  href="#" data-toggle="modal" data-target="#sponsor">
                                                    My Sponsor <?php //echo $account['sponsorUsername']; ?></a></li>
                                            <li> <a style="color: yellow !important; font-family: verdana; font-weight: bold;" href="#" ><mark class="mrk"><?php echo "Balance - ". round($account['balance'] * 1.00, 2); ?></mark></a></li>
								
                                            <li> <a style="color: yellow; font-family: arial;" href="logout.php?logout" >Log Out</a></li>
								



                                            <?php
                                        }
                                    }
                                    ?>



                                    <?php
                                }
                                ?>
                               
                            </ul>
                            
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>
            <!-- end header -->
            <!-- Modal Login-->
<div class="modal fade" id="SignIn" role="dialog">
                <div class="modal-dialog  " >

                    <!-- Modal content-->
                    <div class="modal-content m-content">
                        <div class="modal-header m-head" style="  background: #005a4c !important;">

                            <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                            <h4 class="modal-title"  style="color: #fff">   &nbsp; Sign In</h4>
                        </div>
                        <div class="modal-body" style="padding: 2% !important">
                            <div class="signup-form">
                                <div  id="formData">
                                    <div id="errorSignIn" class="alert alert-info errorSignIn" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×</button>  <strong></strong><span id="signinerrorText"></span>
                                    </div>  
                                    <div class="form-group">
                                        <label>User Id <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="userId" 
                                               value="<?php
                                               if (isset($_COOKIE["userId"])) {
                                                   echo $_COOKIE["userId"];
                                               }
                                               ?>" id="userIdOfuser" placeholder="user Id" required>
                                        <span id="userIdError" style="color: #C84038;font-family: initial;"></span>

                                    </div>


                                    <div class="form-group">

                                        <label>Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="password" value="<?php
                                        if (isset($_COOKIE["password"])) {
                                            echo $_COOKIE["password"];
                                        }
                                        ?>" id="passwordOfuser" placeholder="password">
                                        

                                    </div>


                                    <div class="form-group">

                                        <input type="submit" id="userSignInForm"  name="userSignInForm"  class="btn btn-success btn-lg btn-block" style="background: #005a4c" value="Sign in">


                                    </div>
                                
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- sign up -->
            <div id="SignUp" class="modal fade" role="dialog" >
                <div class="modal-dialog  " >

                    <!-- Modal content-->
                    <div class="modal-content m-content">
                        <div class="modal-header m-head" style="background: #005a4c !important;">

                            <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                            <h4 class="modal-title"  style="color: #C0C0C0"> &nbsp; Sign Up</h4>
                        </div>
                        <div class="modal-body" style="padding: 2% !important">
                            <div class="signup-form">

                                <div  id="formData">

                                    <div id="error" class="alert alert-info error" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×</button>  <strong></strong><span id="signuperrorText"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>Full Name <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                            </div>
                                            <div class="col-xs-12">
                                                <label>User Id <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="userId" 
                                                       value="<?php
                                                       if (isset($_COOKIE["userId"])) {
                                                           echo $_COOKIE["userId"];
                                                       }
                                                       ?>" id="userId" placeholder="user Id" required>
                                                <span id="userIdError" style="color: #C84038;font-family: initial;"></span>
                                            </div>
                                        </div>        	
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>Mobile Number <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="mobileNumber" required>
                                                <span id="mobileError" style="color: #C84038;font-family: initial;"></span>
                                            </div>
                                            <div class="col-xs-12">
                                                <label>Email <span style="color: red">*</span></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="email" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>Select Club <span style="color: red">*</span></label>
                                                <select class="form-control" id="club" name="club">

                                                    <?php
                                                    $query = "SELECT * FROM `club` ORDER BY balance DESC";
                                                    $resultClubTitle = $db->select($query);
                                                    $i = 0;
                                                    if ($resultClubTitle) {
                                                        while ($clubTitle = $resultClubTitle->fetch_assoc()) {

                                                            $i++;
                                                            ?>
                                                    <option value="<?php echo $clubTitle['userId'] ?>"><?php echo $clubTitle['name'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="col-xs-12">
                                                <label>Sponsor's Username</label>
                                                <input type="text" class="form-control" name="sponsor" id="sponsor" placeholder="Sponsor's Username" >
                                                <span id="sponsorError" style="color: #C84038;font-family: initial;"></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>Password <span style="color: red">*</span></label>
                                                <input type="password" class="form-control" name="password" value="<?php
                                                if (isset($_COOKIE["password"])) {
                                                    echo $_COOKIE["password"];
                                                }
                                                ?>" id="password" placeholder="password" required="required"  pattern=".{6,}"   title="6 characters minimum">
                                                <span>Password at least 6 characters.</span>
                                            </div>
                                            <div class="col-xs-12">
                                                <label>Confirm Password <span style="color: red">*</span></label>
                                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="confirmPassword" required="required"  pattern=".{6,}"   title="6 characters minimum">
                                                <span id="passwordError" style="color: #C84038;font-family: initial;"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" id="userSignUp"  name="userSignUp"  class="btn btn-success btn-lg btn-block" style="background: #005a4c">Register Now</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
			

            <style type="text/css">
                .heading-color {
               background: #001b35;
                border-radius: 0px;
                border: 0px;
                border-bottom: 1px solid #939393;
            }
            </style>
             <!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4290385,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4290385&101" alt="website stat" border="0"></a></noscript>
<!-- Histats.com  END  -->
		
			<script>
window.setTimeout(function(){       
    window.location.href = "logout?logout";
}, 28800000);
			</script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
 <script>  
 $(document).ready(function(){  
      $('#dMethodt').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"depload.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#dTo').html(data);  
                }  
           });  
      });  
 });  
 </script>