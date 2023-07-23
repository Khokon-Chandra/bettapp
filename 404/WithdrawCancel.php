<?php include './header.php'; ?>
<?php include './side.php'; ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h5><i class="fa fa-th-list"></i> Club withdraw inbox</h5>

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
                                    <th>SN</th>
                                    <th>User Id</th>
                                    <th>Amount</th>
                                    <th>Notes</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM `admin_notification` WHERE wAction=3 ORDER BY id desc";
                                $result = $db->select($query);
                                $i = 0;
                                if ($result) {
                                    foreach ($result as $deposit) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td> <?php echo $deposit['userId']; ?></td>
                                            <td> <?php echo $deposit['withdraw']; ?></td>
                                            
                                            <td><?php echo $deposit['notes']; ?></td>
                                            <td><?php echo $deposit['time']; ?></td>
                                     </tr>
                                    <?php
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<?php include './footer.php'; ?>

<script type="text/javascript">$('#sampleTable').DataTable({
    "order": [[ 3, "desc" ]]
});</script>

</body>
</html>