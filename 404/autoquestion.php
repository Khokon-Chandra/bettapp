<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="row" style="width:90%;margin:0 auto;">
    <div class="col-md-12">
    <p>Auto Question</p>
    <?php
include'../lib/Database.php'; 
$db=new Database();
$id=$_POST['gameid'];
$query="Select * from default_ques where g_type='$id'";
$result=$db->select($query);
if($result)
{
while($ques=$result->fetch_assoc())
{
?>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th colspan="2" style="background: #1A3D5C;
    color: #fff;"><?php echo $ques['title']; ?></th>
        
      </tr>
    </thead>
    <tbody>
      <?php 
    $query1="Select * from default_ans where bettingSubTitleId='$ques[id]'";
    $result1=$db->select($query1);
    if($result1){
    while($ans=$result1->fetch_assoc())
    
{
?>
      <tr>
      
        <td><?php echo $ans['title']; ?></td>
        <td><?php echo $ans['amount']; ?></td>
        
      </tr>
<?php }} ?>
      
    </tbody>
  </table>
  <?php
}
}
else
{
    echo"Auto question Not Found";
}
?>
    </div>

</div>
