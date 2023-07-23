<?php
header("Access-Control-Allow-Origin:*");
include"../db.php";
$table=$_POST['table'];
$q="delete from $table";
$e=mysqli_query($con,$q);
if($e)
{

    echo"Action Successful";
}
?>