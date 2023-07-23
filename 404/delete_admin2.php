<?php
include'db.php';
$id=$_GET['del'];
$q="delete from admin where userName='$id' and type='2'";
$r=mysqli_query($con,$q);
if($r){
	header('location:setting');
}

?>