<?php
include 'db.php';

if (isset($_GET['cact'])) {
	$id=$_GET['cact'];
	$stmt = $con->prepare("UPDATE cwithdraw_active set activ=0 WHERE activ=?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	echo "<script>alert('Withdraw De-Activated');</script>";
	echo '<script>document.location.href = "./";</script>';
	$stmt->close();
}
elseif (isset($_GET['cdact'])) {
	$stmt = $con->prepare("UPDATE cwithdraw_active set activ=1 WHERE activ=?");
	$stmt->bind_param("s", $_GET['cdact']);
	$stmt->execute();
	echo "<script>alert('Withdraw Activated');</script>";
	echo '<script>document.location.href = "./";</script>';
	$stmt->close();
}
else
{
	echo "<script>alert('Something went wrong. Please try again later!!!');</script>";
}
?>