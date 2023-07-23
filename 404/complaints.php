<?php include './header.php'; ?>
<?php include './side.php'; ?>
<main class="app-content">
    <div class="app-title">
        <div>
             <h5><i class="fa fa-th-list"></i> User Complaints Box</h5>

        </div>

    </div>

        <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" style="text-align: center;" id="sampleTable">
                            <thead>
                                <tr>
                                      <th>SN.</th>
                                    <th>User Id</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM complaints order by id desc";
                                $result = $db->select($query);

                                if ($result) {
                                    $i=0;
                                    foreach ($result as $deposit) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td> <?php echo $i ?></td>
                                            <td> <?php echo $deposit['username']; ?></td>
                                            <td> <?php echo $deposit['phone']; ?></td>
                                            <td><?php echo $deposit['msg']; ?></td>
                                            <td> <?php echo $deposit['entry_date']; ?></td>
                                            <td>
                                            	<a class="btn btn-danger btn-sm" style="margin-top: -2px;" name="delete">Delete</a>
                                      
                                        	</td>
                                        	<td>
                                            	<a class="btn btn-primary btn-sm" style="margin-top: -2px;" name="notice">Notice</a>
                                        	</td>
								</tr>
<?php }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './footer.php'; ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
 </body>
</html>