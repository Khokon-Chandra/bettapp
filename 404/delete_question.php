<?php
include'../lib/Database.php';
$db=new Database;
$id=$_GET['del'];
$q="delete from default_ques where id='$id'";
$run=$db->delete($q);
if($run)
{
	header('location:add_question.php?res=Deleted');
}

?>