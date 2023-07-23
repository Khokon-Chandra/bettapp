<?php include './header.php'; ?>
<?php include './side.php';
if(isset($_GET['res']))
{
	echo"<script>
	alert('Question Deleted')
	</script>";
	}
 ?>
}


<main class="app-content">

    <div class="app-title">
        <div>
            <h5><i class="fa fa-th-list"></i> Question</h5>
   	<form method="post">
	<select name="game_type" >
		<option value="1">Football</option>
		<option value="2">Cricket</option>
		<option value="3">Basketball</option>
		<option value="5">Tennis</option>
		<option value="20">OneTen</option>
		<option value="6">Table Tennis</option>
	</select>
	<input type="text" name="question" placeholder="question">

	<input type="submit" name="add" value="add">
</form>
<?php
if(isset($_POST['add']))
{
	$game_type=$_POST['game_type'];
	$question=$_POST['question'];
	$q="insert into default_ques(title,g_type,ariaHide,section_ct)values('$question','$game_type','1','1')";
	$r=$db->insert($q);
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
										<th>game type</th>
									    <th>question</th>
									    <th>Add Ans</th>
									    <th><a href="" class="btn btn-danger">X</a></th>
									</tr>
                                </thead>
                                <tbody>
                                   <?php
$q="select * from default_ques order by id desc";
$r=$db->select($q);
while($row=mysqli_fetch_assoc($r))
{


?>
    <tr>

	    <td>
	    	<?php

	    	if($row['g_type']==1)
	    	{
	    		echo "Footaball";
	    	}
	    	else if($row['g_type']==2)
	    	{
	    		echo "Cricket";
	    	}
	    	else if($row['g_type']==3)
	    	{
	    		echo "Basketball";
	    	}
	    	else if($row['g_type']==5)
	    	{
	    		echo "Tennis";
	    	}
	    	else if($row['g_type']==20)
	    	{
	    		echo "OneTen";
			}
			else if($row['g_type']==6)
	    	{
	    		echo "Table Tennis";
	    	}

	    ?>

	    </td>
	    <td><?php echo$row['title']; ?></td>
	    <td><a href="add_ans.php?qid=<?php echo$row['id'] ?>">Add ans</a></td>
	    <td><a href="delete_question.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">X</a></td>
	</tr>
	<?php } ?>
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<?php include './footer.php'; ?>
<!-- <script >
    $('#sampleTable').dataTable({
      aaSorting: [[0, 'asc']]
    });
</script> -->
<!-- Google analytics script-->

</body>
</html>
