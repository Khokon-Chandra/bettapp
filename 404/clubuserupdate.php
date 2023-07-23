<?php
include 'db.php';

if (isset($_GET['act'])) {
	$id=$_GET['act'];
	$stmt = $con->prepare("update user set actionpersonalid=1 where userId=?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	echo "<script>alert('Successfully set user for transection');</script>";
	echo '<script>document.location.href = "./clubuser.php";</script>';
	$stmt->close();
}
elseif (isset($_GET['inact'])) {
	$stmt = $con->prepare("update user set actionpersonalid=0 where userId=?");
	$stmt->bind_param("s", $_GET['inact']);
	$stmt->execute();
	echo "<script>alert('Successfully deactivate user for transection');</script>";
	echo '<script>document.location.href = "./clubuser.php";</script>';
	$stmt->close();
}
else
{
	echo "<script>alert('Something went wrong. Please try again later!!!');</script>";
}