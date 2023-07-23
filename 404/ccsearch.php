<?php include './header.php'; ?>
<?php include './side.php'; ?>
<div class="app-content">
    <div class="container">
		<div class="row">
      <div class="page-header col-md-12">
			<form method="post" action="ccsearch.php"  class="form-inline">
			  <div class="form-group col-lg-12">
				<label for="Date_From">Date From</label>
				<input type="date" name="date_from" value="<?php echo (isset ($_POST['date_from'])) ? $_POST['date_from']: ''; ?>" class="form-control" />
			  </div>
			  <input type="submit" name="search" class="btn btn-primary" value="Search">
			</form>
			<br />
			<br />
			
			<div class="table-responsive">
				<table class="table table-dark">
					<tr>
						<th>Total ClubCommission by Date</th>
						<th>Total Amount</th>
					</tr>
				<?php
					include ('db.php');
					$query = "SELECT sum(clubCredit) as total FROM `transaction` where (STR_TO_DATE(time,'%d %b %Y %h:%i %p') BETWEEN '".$_POST['date_from']." 00:00:01' and '".$_POST['date_from']." 23:59:59')";
					$result = mysqli_query($con, $query);
					
					for ($count=0; $row_member = mysqli_fetch_array($result); $count++){
				?>
					<tr>
						<td><?php echo (isset ($_POST['date_from'])) ? $_POST['date_from']: ''; ?></td>
						<td><?php if(isset ($_POST['date_from'])) { echo ($row_member['total']) ? $row_member['total'] : '000';}?></td>
						
					</tr>
					<?php	}	?>
				</table>
			</div>
      </div>
    </div>
</div>


<!--Essential javascripts for application to work-->
<script src = "js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Google analytics script-->