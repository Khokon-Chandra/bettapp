<?php include './header.php'; ?>

<style>

    @font-face {
        font-family: myFirstFont;
        //   src: url('fonts/Open_Sans/OpenSans-SemiBold.ttf');
    }
    *{
        font-family: myFirstFont;
    }
    /* accordian*/




    /*live*/
    .livem {
        background: #4F555B !important;
        padding: 5px !important;
        border: 1px solid #9F9F9F;
        color: #D7D7D7 !important;
    }
    .upcoming {

        background: #4F555B !important;
        padding: 5px !important;
        border: 1px solid #9F9F9F;
        color: #D7D7D7 !important;
    }

    .first-lebal {
        background: #14805E  !important;

        color: #dadada !important;
        font-size: 14px !important;
    }
    .second-lebal {
        background: #666666 !important;

        color: #EBEBEB !important;
        font-size: 13px !important;
    }
    .panel-body{
        background: #fcfcfc;
    }
    .mrq {
        color: #2E2E2E;
        background: #dbdbdb;
        padding: 9px;
        border-left: 3px solid #ED4F4F;
        border-right: 3px solid #14805E;
        font-size: 15px;
    }
    .content-container {

        margin-left: auto;
        margin-right: auto;
    }
    .pr-0 {
        padding-right: 0 !important;
    }
    .pl-0 {
        padding-left: 0 !important;
    }
    .p-0 {
        padding: 0 !important;
    }
    .panel2 {
        margin-bottom: 0px;
        background-color: #fff;
        border: 0px solid transparent;
        border-radius: 0px;
        -webkit-box-shadow: 0 0px 0px rgba(0,0,0,.05);
        box-shadow: 0 0px 0px rgba(0,0,0,.05);
    }
    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid #929292 !important;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
    }
    .button-rate {
        width: 120px;
        border-bottom: 3px solid #DD5246;
        background: #F1F1F1;
        color: #14805E;
    }
    .bg {
        background: #D24437 !important;
        margin-left: 16px;
        font-size: 11px;
    }
    .bgu {
        background: #1CA261 !important;
        margin-left: 16px;
        font-size: 11px;
    }

</style>

<section class="callaction " style="border-bottom: 1px solid #5F5F5F;min-height: 430px;">

    <div class="content-container mx-auto p-0 container">

        <div class="" >



            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12  pl-0 pr-0 " >

                <div class="table-responsive" style="background: #ffffff;">
                    <table class="table table-bordered table-hover" id="sampleTable2">

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
                                        <td><?php echo $ClubMember['time']; ?></td>
                                        <?php
                                        $query = "select * from `bet` where userId='$ClubMember[userId]' order by id desc";
                                        $resultRecentBet = $db->select($query);

                                        if ($resultRecentBet) {
                                            $RecentBet = $resultRecentBet->fetch_assoc();
											if($RecentBet){
                                            ?>
                                            <td><?php echo $RecentBet['time']; ?></td>
                                            <?php
											}
                                        } else {
                                            ?>
                                            <td> not yet bet </td>       
                                            <?php
                                        }
                                        ?>
                                        <td><?php echo $ClubMember['name']; ?></td>
                                        <td><?php echo $ClubMember['userId']; ?></td>
                                        <?php
                                        $query = "select sum(betAmount) as betAmount from `bet` where userId='$ClubMember[userId]'";
                                        $betAmount = $db->select($query);

                                        if ($betAmount) {
                                            $betAmountTotal = $betAmount->fetch_assoc();
											if($betAmountTotal){
                                            $totalBet+=$betAmountTotal['betAmount'];
                                            ?>
                                            <td><?php echo $betAmountTotal['betAmount']; ?></td>
                                            <?php
											}
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
											if($betAmountTotal){
                                            $totalCommission+=$betAmountTotal['commission'];
                                            ?>
                                            <td><?php echo $betAmountTotal['commission']; ?></td>
                                            <?php
                                        }
										}else {
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


                        </tbody>

                        <tfoot>
                            <tr>
                                <th style="border: 0px !important;"></th>
                          <th style="border: 0px !important;"></th>
                        <th style="border: 0px !important;"></th>
                            <th style="border: 0px !important;"></th>
                                <th>Page Total</th>
                                <th><?php echo $totalBet; ?></th> 
                                <th><?php echo $totalCommission; ?></th>  
                            </tr>
                        </tfoot>

                    </table>
                </div><!--end of .table-responsive-->
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
                 <img style="width:300px;height:100px;margin-left: 10px;" src="/img/bkash-nagad-rocket.png">
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
                <p style="font-size: 15px;color: #dcdcdc;" class="footer-company-name">Copyright &copy; Demoforyou.xyz <?php echo date("Y"); ?>| All Right Reserved.</p>
            </div>
        </div>
    </div>

</footer>
</div>


<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min_1.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/validation/placeBet.js"></script>
<script src="js/animate.js"></script>
<script src="js/validation/validated.js"></script>


<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$('#sampleTable1').DataTable();
    $('#sampleTable2').DataTable();
	$('#sampleTable3').DataTable();
	$('#sampleTable4').DataTable();
</script>


</body>

</html>

