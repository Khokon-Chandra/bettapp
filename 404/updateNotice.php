<?php include './header.php'; ?>
<?php include './side.php'; ?>

<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<?php
if (isset($_POST['noticeSubmit'])) {

    $notice = $_POST['notice'];
    if ($notice != '') {

        $query = "update `notice` set text='$notice'";
        $db->update($query);
    }
}
?>

<main class="app-content">

    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">All  Category</h5>
            <div class="card-body">
                <?php
                $query = "SELECT * FROM `notice`";
                $result = $db->select($query);
                $notice = $result->fetch_assoc();
                ?>
                <form action="" method="post">

                    <div class="form-group col-lg-8">
                        <label for="comment">Comment:</label>
                        <textarea name="notice" class="form-control" rows="5" id="comment"><?php echo $notice['text']; ?></textarea>
                    </div>
                    <div class="form-group  col-lg-4">

                        <input type="submit" name="noticeSubmit" class="form-control btn btn-success btn-sm" value="Update">
                    </div>
                </form>

            </div>

            <div class="card-footer text-muted"></div>
        </div>
    </div>
	<div class="bs-component">
        <div class="card">
            <h5 class="card-header">Set Minimum and Maximum withdraw balance</h5>
            <div class="card-body">
                <?php
                $query = "SELECT * FROM `rule`";
                $result = $db->select($query);
                $notice = $result->fetch_assoc();
                ?>
                <form action="" method="post">

                    <div class="form-group col-lg-5">
                        <label for="comment">Minimum Balance</label>
                        <input type="text" name="minimum" class="form-control" value="<?php echo $notice['wminimumBalance']; ?>">


                        <label for="comment">Maximum Balance</label>
                        <input type="text" name="maximum" class="form-control" value="<?php echo $notice['wmaximumBalance']; ?>">
                    </div>
                    <div class="form-group col-lg-4">

                        <input type="submit" name="minmaxSubmit" class="form-control btn btn-success btn-sm" value="Update">
                    </div>
                </form>
                <?php
                if(isset($_POST['minimum']) && isset($_POST['maximum']))
                {
                    $min = $_POST['minimum'];
                    $max = $_POST['maximum'];
                    if (isset($_POST['minmaxSubmit'])) {
                        if ($min != '' && $max != '')
                        {
                            $query = "update rule set wminimumBalance='$min', wmaximumBalance='$max' where id=1";
                            $db->update($query);

                            echo "<script>alert('Minimum and Maximum withdraw successfully settled!!!')</script>";
                            echo '<script>document.location.href = "updateNotice";</script>';   
                        }
                    }
                }

                ?>

            </div>

            <div class="card-footer text-muted"></div>
        </div>
    </div>
</main>
<?php include './footer.php'; ?>
    <script>
            CKEDITOR.replace( 'notice' );
        </script>
