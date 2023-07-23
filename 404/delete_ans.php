<?php
include'../lib/Database.php';
$db=new Database;
$id=$_GET['del'];
$qid=$_GET['qid'];
$q="delete from default_ans where id='$id'";
$run=$db->delete($q);
if($run)
{
	header("location:add_ans.php?qid=".$qid);
}

?>