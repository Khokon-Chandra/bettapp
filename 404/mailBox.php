<?php include './header.php'; ?>
<?php include './side.php'; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-envelope-o"></i> Mailbox</h1>
      
        </div>
     
      </div>
      <div class="row">
   
        <div class="col-md-12">
          <div class="tile">
   
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover" id="sampleTable">
                <tbody>
                    <?php 
                   include 'db.php';
                    $q="select * from message";
                    $run=mysqli_query($con,$q);
                    while($row=mysqli_fetch_array($run))
                    {
                        
                    
                    ?>
                  <tr>
                    <td>
                  
                    </td>
                    <td></td>
                    <td><a href="read-mail.html"><?php echo $row['first_name']; echo" ";echo $row['last_name']; ?></a></td>
                    <td class="mail-subject"><?php echo $row['message'];  ?></td>
                    <td></td>
                    <td><a href="" class="btn btn-sm btn-info">Reply</a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
    
          </div>
        </div>
      </div>
    </main>
<?php include './footer.php';?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>