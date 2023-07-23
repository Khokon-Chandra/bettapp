<?php
include'db.php';
$id=$_POST['id'];
$amount=$_POST['amount'];
$q="update admin_notification set deposit='$amount' where id='$id'";
$run=mysqli_query($con,$q);
if($run)
{
	echo "1";
}
?>