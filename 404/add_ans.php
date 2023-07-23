<?php include './header.php'; ?>
<?php include './side.php';
$id=$_GET['qid'];
if(isset($_GET['res']))
{
	echo"<script>
	alert('Question Deleted')
	</script>";
	}
 ?>
<div id="editans" class="modal" style="">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Ans</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body" id="hiddenContentShow">
                                	<form class="form-group" method="post">
                                		<input  type="hidden" name="ansid" id="ansid">
                                		<input class="form-control" type="text" name="title-edit" id="title-edit"><br>
                                		<input class="form-control" type="number" name="rate-edit" id="rate-edit"><br>
                                		<button type="submit" name="updateansbtn"  class="btn btn-info form-control">Update</button>
                                	</form>
                                </div>
                                <div class="modal-footer">

                                    <button  id="new" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

<main class="app-content">

    <div class="app-title">
        <div>
            <h5><i class="fa fa-th-list"></i> Question</h5>
   	<form method="post">
	<input type="text" name="ans" placeholder="ans">
	<input type="text" name="rate" placeholder="rate">

	<input type="submit" name="add" value="add">
</form>
<?php
if(isset($_POST['add']))
{
	$ans=$_POST['ans'];
	$rate=$_POST['rate'];
	$q="insert into default_ans(title,bettingSubTitleId,amount)values('$ans','$id','$rate')";
	$r=$db->insert($q);
}


if(isset($_POST['updateansbtn']))
{
	$ansid=$_POST['ansid'];
	$ans=$_POST['title-edit'];
	$rate=$_POST['rate-edit'];
	$q="update default_ans set title='$ans', amount='$rate' where id='$ansid'";
	$r=$db->update($q);

}
?>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
            
                    <div class="table-responsive">

                                <table class="table table-hover table-bordered" id="sampleTable">
                       
                                <thead>
                                    <tr>
									<th>Ans</th>
								    <th>Rate</th>
								    <th><a href="" class="btn btn-danger">X</a></th>
								    <th><a href="" class="btn btn-success">Edit</a></th>
								</tr>
                                </thead>
                                <tbody>
                                   <?php 
$q="select * from default_ans where bettingSubTitleId='$id'";
$r=$db->select($q);
if ($r) {
  
while($row=mysqli_fetch_assoc($r))
{


?>
    <tr>
		<td><?php echo$row['title']; ?></td>
	    <td><?php echo$row['amount']; ?></td>
	    <td><a href="delete_ans.php?del=<?php echo$row['id']; ?>&qid=<?php echo $row['bettingSubTitleId'] ?>" class="btn btn-danger">X</a></td>

	    <td><button  class="btn btn-success" data-toggle="modal" data-target="#editans" onclick="editans('<?php echo $row["id"]; ?>','<?php echo $row["title"]; ?>','<?php echo $row["amount"]; ?>')">Edit</button></td>

	</tr>
	<?php }
    } ?>
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
 
<?php include './footer.php'; 


?>
<script >
    $('#sampleTable').dataTable({
      aaSorting: [[0, 'asc']]
    });
    function editans(id,question,rate)
    {
    	$('#ansid').val(id);
    	$('#title-edit').val(question);
    	$('#rate-edit').val(rate);
    }
</script>
<!-- Google analytics script-->

</body>
</html>