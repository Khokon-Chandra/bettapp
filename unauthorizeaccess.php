<div style="background: red;">
	<div style="width: 260px;margin:0 auto;"><img src="img/hack.png" style="width: 250px;"></div><h1 style="color: #fff">You are not allowed to access this file. We tracked your ip <?php
echo $ip=$_SERVER['REMOTE_ADDR'];

?> for Security reson.If any problems happen because of you. We will take necessarry stepts according to law. Thanks.</h1>
</div>
<?php
date_default_timezone_set('Asia/Dhaka');
                    $date = date("m.d.y");
                    $time=date("h:i:s");
                    $datetime=$date.", Time: ".$time;
include'auth/db.php';
$q="insert into iptrack(ip_address,time)values('$ip','$datetime')";
mysqli_query($con,$q);
?>