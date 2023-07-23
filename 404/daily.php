<?php include './header.php'; ?>
<?php include './side.php'; ?>

<main class="app-content">

    <div class="container">
		<div class="row">
      <div class="page-header col-md-12">
			<form method="post" action="search.php" class="form-inline">
			  <div class="form-group col-lg-12">
				<label for="Date_From">Search per-day deposit using Date</label>
				<input type="date" name="date_from" value="<?php echo date('Y-m-d'); ?>" class="form-control" />
			  </div>
				<div class="form-group col-md-12">
			  <input type="submit" name="search" class="btn btn-primary" value="Search">
					</div>
			</form>
			
      </div>
		</div>
		
		<br/>
		
				<div class="row">
      <div class="page-header col-md-12">
			<form method="post" action="wsearch.php" class="form-inline">
			  <div class="form-group col-lg-12">
				<label for="Date_From">Search per-day withdraw using Date</label>
				<input type="date" name="date_from" value="<?php echo date('Y-m-d'); ?>" class="form-control" />
			  </div>
				<div class="form-group col-md-12">
			  <input type="submit" name="search" class="btn btn-primary" value="Search">
			</div>
			</form>
			
      </div>
		</div>
	</div>
		</main>






<!--Essential javascripts for application to work-->
<script src = "js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Google analytics script-->