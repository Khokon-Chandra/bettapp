<?php include './header.php'; ?>
<?php include './side.php'; ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h5><i class="fa fa-th-list"></i> Club transfer settings</h5>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="clubTable">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Club Name</th>
                                    <th>Balance</th>
                                    <th>Personal Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT user.userId as userofuser, user.balance as ubalance, club.userId as clubuser, club.personalIdOfClub as personalid, user.actionpersonalid as action FROM user, club where user.userId = club.personalIdOfClub";
                                $result = $db->select($query);

                                if ($result) {
                                    foreach ($result as $club) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $club['userofuser']; ?></td>
                                            <td> <?php echo $club['clubuser']; ?></td>
                                            <td> <?php echo $club['ubalance']; ?></td>
                                            <td> <?php if ($club['action']==1) {
                                                echo "<span style='color:green;font-weight:bolder;'>$club[personalid]</span>";
                                            }elseif ($club['action']==0) {
                                                echo "<span style='color:red;font-weight:bolder;'>$club[personalid]</span>";
                                            }else{
                                                echo "<span>$club[personalid] </span><span style='color:red'> (Action Required)</span>";
                                            } ?></td>
                                            <td>
                                        <form action="" method="post">
                                                <div  class="btn-group" role="group">
                                                    <button class="btn btn-info btn-sm dropdown-toggle" id="btnGroupDrop3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Click for action</button>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item" href="clubuserupdate?act=<?php echo $club['personalid'] ?>" >Activate transfer</a>
                                                        <a class="dropdown-item" href="clubuserupdate?inact=<?php echo $club['personalid'] ?>" >Deactivate transfer</a>
                                                    </div>
                                                </div>
                                        </form>
                                    </td>
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

<script type="text/javascript">$('#clubTable').DataTable();</script>

</body>
</html>