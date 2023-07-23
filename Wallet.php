<?php
$page = $_SERVER['PHP_SELF'];
$sec = "1200";
header("Refresh: $sec; url=$page");
?>
<?php include './header.php'; ?>
<?php
date_default_timezone_set("Asia/Dhaka");
$dt = new DateTime('now');
$dt = $dt->format('d M Y g:i A');
if (isset($_POST['uerToUser'])) {

    $toUser = $_POST['toUser'];
    $fromUser = $_POST['fromUser'];
    $notes = $_POST['notes'];
    $amount = $_POST['amount'];
    if ($toUser!='' && $fromUser!='' && $notes!='' && $amount!=''){
 

    //update balance
    $userBlc = 0;
    $query = "SELECT * FROM `user` where userId='$fromUser' and actionpersonalid=1";
    $resultUser = $db->select($query);
    $userBalance = $resultUser->fetch_assoc();
    $userBlc = $userBalance['balance'] - $amount;
    if ($userBlc < 0) {
        $b = abs($userBlc);
        $cut = $sendBalance - $b;
        $userBlc = $userBalance['balance'] - $cut;
        $query = "update `user` set balance='$userBlc',loane='$b'  WHERE userId='$fromUser' and actionpersonalid=1";
        $db->update($query);
    } else {
        $query = "update `user` set balance='$userBlc' WHERE userId='$fromUser' and actionpersonalid=1";
        $db->update($query);
    }
    //transaction from   
    $query = "INSERT INTO `transaction`(`debit`,`userId`, `description`,total,time)"
            . " VALUES ('$amount','$fromUser','$notes (to $toUser)','$userBlc','$dt')";
    $db->insert($query);
    
    $query = "INSERT INTO `balance_transfer`(`amount`,`userId`,`notes`,`userBalance`,`time`,`to_userId`)"
            . " VALUES ('$amount','$fromUser','$notes','$userBlc','$dt','$toUser')";
    $db->insert($query);
    //update balance
    $userBlc = 0;
    $query = "SELECT * FROM `user` where userId='$toUser'";
    $resultUser = $db->select($query);
    $userBalance = $resultUser->fetch_assoc();
    $userBlc = $userBalance['balance'] + $amount;

    $query = "update `user` set balance='$userBlc' WHERE userId='$toUser'";
    $db->update($query);
    //transaction to
    $query = "INSERT INTO `transaction`(`credit`,`userId`, `description`,total,time)"
            . " VALUES ('$amount','$toUser','$notes  (from $fromUser)','$userBlc','$dt')";
    $db->insert($query);
    echo '<script>alert(" success ")</script>';
     }  else {
          echo '<script>alert(" All field required ")</script>';
    }
}
?>
<link rel="stylesheet" href="css/statementAndWallet.css">
<body>



    <div id=" "  style="border-bottom: 1px solid #16ffbd;min-height: 450px;">

    <style type="text/css">
        .modal{
            border-radius: 10px;
        }
    </style>

        <!-- Modal deposit -->
        
        <!-- Modal withdraw -->
        <div id="withdraw" class="modal fade" role="dialog" >
            <div class="modal-dialog  " >

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header m-head" style="background: #0c8281 !important;">

                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h4 class="modal-title" style="color: white;"> &nbsp;Request a withdraw</h4>
                    </div>
                    <div class="modal-body" style="padding: 2% !important">
                        <div class="">
                            <div role="form" class="register-form">

                                <div id="errorWithraw" class="alert alert-info errorWithraw" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×</button>  <strong>  Opps !!</strong> <span id="errorWithrawText"></span>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">

                                            <label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>

                                            <select class="form-control" id="wMethod">
                                                <option disabled selected value>select Method</option>
                                                <?php
                                                $query = "SELECT * FROM w_method";
                                                $resultMethod = $db->select($query);
                                                $i = 0;
                                                if ($resultMethod) {
                                                    while ($method = $resultMethod->fetch_assoc()) {

                                                        $i++;
                                                        ?>
                                                        <option value="<?php echo $method['id']; ?>"><?php echo $method['method']; ?></option>

                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">

                                            <label style="text-align: left;width: 100%;">Type <span style="color:#DD4F43;">*</span></label>
                                            <select class="form-control" id="wType">
                                                <option disabled selected value>Account Type</option>
                                                <option>Personal</option>

                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 center" >

                                        <div class="form-group">
                                            <label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;">*</span></label>
                                            <input type="text" name="first_name" id="wAmount" style="background: white;" placeholder="Amount" class="form-control" tabindex="1">

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;">*</span></label>
                                        <div class="form-group">
                                            <input type="number" name="first_name" id="wTo" class="form-control input-lg" placeholder="To" tabindex="1">
											<span id="wError" style="color: #C84038;font-family: initial;"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            <label style="text-align: left;width: 100%;">Password <span style="color:#DD4F43;">*</span></label>
                                            <input type="text" name="first_name" id="wPassword" class="form-control input-lg" placeholder="Password" tabindex="1">
                                        </div>
                                    </div>


                                </div>





                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6"><input type="submit" style="background-color: #0c8281;" id="withdrawSubmit" value="Submit" class="btn btn-success btn-block btn-lg" tabindex="7"></div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Modal number verify -->
        <div id="numberVerify" class="modal fade" role="dialog" >
            <div class="modal-dialog  " >

                <!-- Modal content-->
                <div class="modal-content">

                    <div id="" class="showCategoryId"></div>
                    <div class="modal-header m-head" style="  background: #8000ff !important;">

                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h4 class="modal-title" style="color: white;"> &nbsp; Verification step</h4>
                    </div>
                    <div class="modal-body" style="padding: 2% !important">
                        <div class="">
                            <div role="form" class="register-form">

                                <div id="codeError" style="display: none" class="alert alert-info codeError" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×</button>  <strong>  Opps !!</strong> <span id="codeErrorText"></span>
                                </div>


                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">

                                        <div class="form-group">
                                            <label style="text-align: left;width: 100%;">Verify code <span style="color:#DD4F43;">*</span></label>
                                            <input type="text" name="first_name" id="Vcode" class="form-control input-lg" placeholder="Enter code" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <label style="text-align: left;width: 100%;">To account number <span style="color:#DD4F43;">*</span></label>
                                        <div class="form-group">
                                            <div class=""><button  id="sendCode"  class="btn btn-primary btn-block btn-lg" tabindex="7">send code</button></div>
                                        </div>
                                    </div>

                                </div>





                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6"><input style="display: none" type="submit" id="confirmCode" value="Submit" class="btn btn-success btn-block btn-lg" tabindex="7"></div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Modal changePassword-->
        <div id="changePassword" class="modal fade" role="dialog" >
            <div class="modal-dialog  " >

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header m-head" style="  background: #0c8281 !important;">

                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h4 class="modal-title" style="color: white;">  &nbsp; Change Password</h4>
                    </div>
                    <div class="modal-body" style="padding: 2% !important">
                        <div class="">
                            <div role="form" class="register-form">

                                <div id="errorChangePassword" class="alert alert-info errorChangePassword" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×</button>  <strong>  Opps !!</strong> <span id="errorChangePasswordText"></span>
                                </div>
                                <hr class="colorgraph">


                                <div class="form-group">

                                    <label style="text-align: left;width: 100%;">Current Password  <span style="color:#DD4F43;">*</span></label>
                                    <input type="text" name="currentPassword" id="currentPassword" class="form-control input-lg" placeholder="Current Password " tabindex="3" required>
                                </div>

                                <div class="form-group">

                                    <label style="text-align: left;width: 100%;">New Password  <span style="color:#DD4F43;">*</span></label>
                                    <input type="text" name="newPassword" id="newPassword" class="form-control input-lg" placeholder="New Password" tabindex="3" required>
                                </div>

                                <div class="form-group">

                                    <label style="text-align: left;width: 100%;">Confirm Password  <span style="color:#DD4F43;">*</span></label>
                                    <input type="text" name="confirmPassword" id="confirmPasswordAgain" class="form-control input-lg" placeholder="Confirm Password" tabindex="3" required>
                                </div>




                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6"><input type="submit" style="background-color: #0c8281;" id="changePasswordSubmit" value="Submit" class="btn btn-success btn-block btn-lg" tabindex="7"></div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Modal balance Transfer-->
       
<div id="transfertoclub" class="modal fade" role="dialog" >
            <div class="modal-dialog  " >

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header m-head" style="  background: #0c8281 !important;">


                    </div>
                    <div class="modal-body" style="padding: 2% !important">
                        <div class="">
                            <form method="post" action="">
                            <div class="control-group">
                                <?php
            if (isset($_COOKIE["userId"]) && (isset($_COOKIE["password"])) && ( isset($_COOKIE["id"]))) {
            $userId = $_COOKIE["userId"];
                                        ?>
                            <div class="control-group">
                                <label class="control-label">From User Id</label>
                                  <input type="text" readonly name="fromUser" value="<?php echo $userId; ?>" class="form-control" placeholder="Username" tabindex="1" rows="3" required="1">

                            </div>
                            </div>
                                <?php } ?>
                            <div class="control-group">
                                <label class="control-label">To User Id</label>
                                <input type="text"name="toUser" class="form-control" rows="3" required="1">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Notes</label>
                                <textarea name="notes" class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>  
                            <div class="form-group">
                                <label for="exampleTextarea">Amount</label>
                                <input type="text"name="amount" class="form-control" rows="3" required="1">
                            </div>  

                            <div class="form-check">
                                <button name="uerToUser" class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>

          <!-- Modal change club -->
		<div id="changeClub" class="modal fade" role="dialog" >
            <div class="modal-dialog  " >

                <!-- Modal content-->
                <div class="modal-content">


                    <div class="modal-header m-head" style="  background: #0c8281 !important;">

                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h4 class="modal-title" style="color: white"> &nbsp; Change Club</h4>
                    </div>

                    <div class="modal-body" style="padding: 2% !important">
                        <div class="">
                            <div role="form" class="register-form">


                                <div id="errorchangeClub" class="alert alert-danger errorchangeClub" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×</button>  <strong>  Opps !!</strong> <span id="errorchangeClubText"></span>
                                </div>
                                <hr class="colorgraph">

                                <div class="form-group">

                                    <label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>

                                    <select class="form-control" id="cClub">
                                        <option disabled selected value>Select Club</option>
                                        <?php
                                        $query = "SELECT * FROM club";
                                        $resultMethod = $db->select($query);
                                        $i = 0;
                                        if ($resultMethod) {
                                            while ($method = $resultMethod->fetch_assoc()) {

                                                $i++;
                                                ?>
                                                <option value="<?php echo $method['userId']; ?>"><?php echo $method['name']; ?></option>

                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                    <div class="form-group">

                                        <label style="text-align: left;width: 100%;"> Password  <span style="color:#DD4F43;">*</span></label>
                                        <input type="text" name="PasswordClubChange" id="PasswordClubChange" class="form-control input-lg" placeholder="Current Password " tabindex="3" required>
                                    </div>
                                </div>                
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6"><input type="submit" style="  background: #0c8281 !important;" id="changeClubSubmit" value="Update" class="btn btn-success btn-block btn-lg" tabindex="7"></div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
		 <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        Withdraw allowed 1 time in 24 hours!!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
				 <div class="modal fade" id="deposit100" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        Please deposit atleast 100tk for withdraw. Its one time in a month.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <?php
        if (isset($_COOKIE["userId"]) && ( isset($_COOKIE["password"])) && ( isset($_COOKIE["id"]))) {
            $userId = $_COOKIE["userId"];
            $id = $_COOKIE["id"];
            $query = "select * from `user` where userId='$userId' and id='$id'";
            $result = $db->select($query);
            if ($result) {
                $userProfile = $result->fetch_assoc();
                ?>
                <section class="callaction ">
                    <div class="content-wrap" >

                        <div class="container">
                            <div class="row">
                                < <div class="col-lg-11 bhoechie-tab-container" style="width: 98.5% !important;background: #ffffff;">
                                    <div class="col-lg-2  bhoechie-tab-menu">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item active text-center list-item">
                                                Profile
                                            </a>
                                             <a href="#" class="list-group-item text-center list-item " id="deposit-numberW"  data-toggle="modal" data-target="#deposit">
                                                Deposit
                                            </a>
											<a href="#"  id="1" class="list-group-item text-center list-item wDraw"
                                            <?php
                                            $userId = $_COOKIE["userId"];
                                            $id = $_COOKIE["id"];
                                            $query = "select * from admin_notification where userId='$userId' and notificationType=2 and wAction<=3 order by id desc limit 1";
                                            $result = $db->select($query);

                                            if ($result) {
                                                    $row = $result->fetch_assoc();
                                                    $times = strtotime($row['time']);
                                                    $currenttime = time();
												
													
                                                    if (($currenttime - $times) > 86400) {
                                                        echo "data-toggle='modal' data-target='#withdraw'";
                                                    }
                                                    else
                                                    {
                                            echo "data-toggle='modal' data-target='#basicExampleModal'";
													}
                                                
                                            }
											else
                                            {
                                                echo "data-toggle='modal' data-target='#withdraw'";
                                            }
												
                                             ?>>
												Withdraw
											</a>
											<a href="#"  class="list-group-item text-center list-item" data-toggle="modal" data-target="#changeClub">
                                                Change Club
                                            
											
                                            <a href="#"  class="list-group-item text-center list-item" data-toggle="modal" data-target="#changePassword">
                                                Change Password
                                            </a>


                                        </div>
                                    </div>
                                    <div class="col-lg-10  bhoechie-tab">
                                        <!-- flight section -->
                                        <div class="bhoechie-tab-content active">
                                            <center>
                                                <table class="table table-bordered" style="color: #0C8281 !important;">

                                                    <tr>
                                                        <th>Full Name</th>
                                                        <td><?php echo $userProfile['name']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Username</th>
                                                        <td><?php echo $userProfile['userId']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Mobile No.</th>
                                                        <td><?php echo $userProfile['mobileNumber']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><?php echo $userProfile['email']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Referred By</th>
                                                        <td>
                                                            <?php echo $userProfile['sponsorUsername']; ?>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th>Club</th>
                                                        <td>   <?php echo $userProfile['clubId']; ?>  </td>

                                                    </tr>

                                                </table>

                                            </center>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <?php
            }
        } else {
            ?>
            <h1>You are Not Allow</h1>
            <?php
        }
        ?>


    </div>
<footer class="footer-basic-centered ">
<div class="container">


        <div class="row">

            <div class="col-lg-4">
                
                  <p class="footer-links">
                    
                    <a href="index.php">Home</a>
                    |
                    <a href="rules.html"> Rules & Regulations</a>
                    |
                    <a href="faq.html"> FAQ</a>
                    |
                    <a href="about.html"> About Us</a>

                </p>
            </div>
             <div class="col-lg-4">
                <p style="color: #FFFFFF;"> Caution! We strongly discourage to use this site who are not 18+ and also site administrator is not liable to any kind of issues created by user.</p>
            </div>
            <div class="col-lg-4">
    <a  class="" href=""><img style="width: 150px;height: 40px;margin-left: 10px; border-radius: 10px;" src="img/logo.png"></a>
    <div style="color: #ffffff">
         100% Trusted Betting Platform.
        </div>
                <p style="font-size: 15px;color: #dcdcdc;" class="footer-company-name">Copyright &copy; All <?php echo date("Y"); ?>| All Right Reserved.</p>
            </div>
        </div>
    </div>

</footer>


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min_1.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/animate.js"></script>


    <script src="js/validation/deposit_and_withdraw.js"></script>
    <script src="js/validation/sendCode.js"></script>
    <script>
        $(document).ready(function () {
            $("#data-click").click(function () {
                $("#data-show").toggle("slow");
            });
        });

        $(document).ready(function () {
            $(".history_check").click(function () {
                $(".hitory_content").fadeIn("slow");
            });
        });
    </script>
      <script>

    
    $("#deposit-numberW").on("click", function () {

       $("#dTo").load('DepositNumber.php');

});
</script>
    <script>
        //wallet
        $(document).ready(function () {
            $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
        });
    </script>

	
<script type="text/javascript">
    $(document).ready(function () {
    $("#btnutransfer").click(function () {
        setTimeout(function () { disableButton(); }, 0);
    });

    function disableButton() {
        $("#btnutransfer").prop('disabled', true);
    }
});
</script>
	
<script type="text/javascript">
    $(document).ready(function () {
    $("#withdrawSubmit").click(function () {
        setTimeout(function () { disableButton(); }, 0);
    });

    function disableButton() {
        $("#withdrawSubmit").prop('disabled', true);
    }
});
</script>
	
<script>
	$(document).ready(function () {
	$("#depositSubmit").click(function() {
		setTimeout(function() {
		disableButton();
		}, 0);
	});
		
		function disableButton() {
		$("#depositSubmit").prop('disabled', true);
		}
	});
</script>

<script>
function withdraw(){
	var x = document.getElementById("withdrawamount");
	if(x.style.display === "none"){
	   	x.style.display = "block";
	   }else{
		x.style.display = "none";
	}
}
</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>

</body>
</html>