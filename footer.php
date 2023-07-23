<footer class="footer-basic-centered ">
        <div class="container">


            <div class="row">

                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-6">
                    <p class="footer-links">

                        <a  class="" href=""><img style="width: 150px;height: 40px;margin-left: 10px;border-radius: 10px;" src="img/logo.PNG"></a>
                    <p style="font-size: 15px;color: #dcdcdc;" class="footer-company-name"> Newt20.live INC. &copy; <?php echo date("Y"); ?>  all right reserved.</p>

                    </p>


                </div>
                <div class="col-lg-3">
                    
                </div>

            </div>
        </div>

    </footer>
</div>


<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min_1.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/validation/placeBet.js"></script>

<script src="js/validation/validated.js"></script>
<script src="js/validation/siteRefresh.js"></script>
<script src="js/validation/deposit_and_withdraw.js"></script>


<script type="text/javascript">


</script>


<?php
if (isset($_COOKIE["userId"]) AND ( isset($_COOKIE["password"]))) {

    include './chatBox.php';
}
?>



<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script src="js/validation/deposit_and_withdraw.js"></script>
<script src="js/validation/fetchChat.js"></script>
</body>
</html>


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
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4290385&101" alt="site hit counter" border="0"></a></noscript>
<!-- Histats.com  END  -->

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

<script type="text/javascript">
    $(document).ready(function () {
    $("#depositSubmit").click(function () {
        setTimeout(function () { disableButton(); }, 0);
    });

    function disableButton() {
        $("#depositSubmit").prop('disabled', true);
    }
});
</script>