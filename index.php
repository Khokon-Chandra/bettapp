<?php include './header.php'; ?>
<link rel="stylesheet" href="css/indexStyle.css">
<link href="https://fonts.googleapis.com/css?family=Palanquin&display=swap" rel="stylesheet">
	

<section class="callaction " style="border-bottom: 1px solid #002549;min-height: 450px;">

    <div class="content-container mx-auto p-0">
        <div class="" >



            <div class="">
                <div >
                    <div >

                        <div class="">
                            <div class="list-group" >
                                <?php
                                $query = "SELECT * FROM `notice`";
                                $result = $db->select($query);
                                $notice = $result->fetch_assoc();
                                ?>
                                                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-md-12">
                                <marquee style="background: #10323A;color: #D4DA0A;border-radius: 5px;font-size:14px;" class="mrq" scrollamount='3' direction="scroll"> <?php echo $notice['text']; ?>
                                </marquee>

                                </div>
                            </div>
                        </div>
                                

 
                                <!-- Modal betting-->

                                <div   class="modal fade betForm" id="betting" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content m-content">
                                            <div class="modal-header m-head" style="  background: #000000 !important;">

                                                <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                                                <h4 class="modal-title" style="color: #D2D2D2">  &nbsp; Place Bet</h4>
                                            </div>
                                            <div class="modal-body" style="padding: 2% !important">
                                                <div class="signup-form">

                                                    <div  id="formData">

                                                        <div id="errorPlaceBet" class="alert alert-danger errorPlaceBet" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                                ×</button>  <strong>  Opps !!</strong> <span id="PlaceBetText"></span>
                                                        </div>






                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label><span style="color: #003b3d;" id="BettingSubTitleOption"></span> <span style="color: yellow;" id="betRateShow" class="badge text-right"></span></label> <br>
                                                                    <label><small id="bettingSubTitle"></small></label><br>
                                                                    <label>
                                                                        <span style="color: #003b3d;" id="bettingTitle"></span>
                                                                        <span  id="gameLiveOrUpcoming"  class="badge text-right"></span>

                                                                    </label><br>
                                                                    <input type="text"  id="match" value="" hidden="1">
                                                                    <input type="text"  id="matchBet"value="" hidden="1">
                                                                    <input type="text"  id="betRate"value="" hidden="1">
                                                                    <input type="text"  id="betId"value="" hidden="1">
                                                                    <input type="text"  id="matchId" value="" hidden="1">
                                                                    <input type="text"  id="betTitleId" value="" hidden="1">

                                                                    <label class="gameLogo">

                                                                        <img id="gameLogo" style="box-shadow: 1px 7px 4px 0px #787981 !important;border-radius: 50%;" class="img-circle" src="" width="25px;">&nbsp;


                                                                    </label>

                                                                </div>
																<div class="row" style="padding:0px 10%;">
                                                                <div class="col-lg-12">
                                                                    <button class="placebetbutton"  id="200">200</button>
                                                                    <button class="placebetbutton"  id="500">500</button>
                                                                    <button class="placebetbutton"  id="1000">1000</button>
                                                                    <button class="placebetbutton"  id="3000">3000</button>
                                                                    <button class="placebetbutton" id="5000" >5000</button>
                                                                    <button class="placebetbutton" id="10000" >10000</button>


                                                              <br><br>
                                                                    <input type="text" class="form-control" style="box-shadow: 1px 7px 4px 0px #787981 !important;border-radius: 20%;"  id="stakeAmount" value="" >


                                                                </div>
																	</div>
                                                            </div>



                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-7">
                                                                    <label><strong>Total Stake</strong></label>

                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <label class="col-lg-12 text-right"><strong id="stakeAmountView">100</strong></label>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-7">
                                                                    <label><strong>Possible Winning</strong></label>

                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <label class="col-lg-12 text-right"><strong id="possibleAmount"> 100.00</strong></label>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">

                                                            <button  type="submit" id="placeBet"  name="placeBet"  class="btn btn-info btn-lg btn-block" style="background: #005a4c;">Place Bet</button>

                                                            <button  id="load" class="btn btn-success btn-sm btn-block load"><i class="fa fa-spinner fa-spin" style="font-size:24px;background: #005a4c;"></i></button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">

                                <a style="background:linear-gradient(to right, #09535B , #37113B); color:#fff; border: none; font-weight:bolder; border-top:0px solid #273D76; text-align: center;"  class="list-group-item">Live Match </a>
                                
                                <div id="liveContent">


                           
                                </div>
</div>
<div class="col-lg-6">
                                <a style="background: linear-gradient(to right, #09535B , #37113B); color: #fff;border: none;font-weight:bolder;border-top:0px solid #273E74;"  class="list-group-item"> <i class="fa-spin"><img src="img/live1.gif" /></i></a>
                                <div id="upcomingContent">
                               
                                </div>
                            </div>
                            </div>

</div>
                            </div><!-- ./ end list-group -->
                        </div><!-- ./ end slide-container -->

                    </div><!-- ./ end panel-body -->
                </div><!-- ./ end panel panel-default-->
            </div><!-- ./ endcol-lg-6 col-lg-offset-3 -->
            <div class="col-lg-2">

            </div>
        </div><!-- ./ end row -->

    </div>
</section>
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
                
    <div style="color: #ffffff">
          <p style="font-size: 15px;color: #dcdcdc;" class="footer-company-name">Copyright &copy;
        <?php echo date("Y"); ?>| All Right Reserved.
       
        </p>
            </div>
        </div>
    </div>
</div>
</footer>

<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min_1.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/validation/placeBet.js"></script>

<script src="js/validation/validated.js"></script>
<script src="js/validation/siteRefresh.js"></script>
<script src="js/validation/deposit_and_withdraw.js"></script>


<script>
$(document).ready(function () {
     $("#liveContent").load('content.php');
     $("#upcomingContent").load('upcomingMatch.php');

}); 
</script>
<?php
if (isset($_COOKIE["userId"]) AND ( isset($_COOKIE["password"]))) {

    include './chatBox.php';
}
?>

<script type="text/javascript">
    $('#200').click(function(event) {
    $('#stakeAmount').val('200');
    returnamount('200')

   });
    $('#500').click(function(event) {
    $('#stakeAmount').val('500');
    returnamount('500')

   });
    $('#1000').click(function(event) {
    $('#stakeAmount').val('1000');
    returnamount('1000')

   });
    $('#3000').click(function(event) {
    $('#stakeAmount').val('3000');
    returnamount('3000')

   });
    $('#5000').click(function(event) {
    $('#stakeAmount').val('5000');
    returnamount('5000')

   });
    $('#10000').click(function(event) {
    $('#stakeAmount').val('10000');
    returnamount('10000')

   });
   function returnamount(stakeamount)
   {
     var stakeAmount = stakeamount;
    var betRate = $("#betRate").val();
    $("#stakeAmountView").text(stakeAmount);
    var st = stakeAmount * betRate;
    $("#possibleAmount").text(st.toFixed(2));
   }


</script>


<script type="text/javascript">
    document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script>