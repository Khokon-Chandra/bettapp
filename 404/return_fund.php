<?php
include 'db.php';
$user=$_POST['userid'];
$amount=$_POST['amount'];
$string =$user; 
$str_arr = explode (",", $string);  
$count=(count($str_arr));
$dt = new DateTime('now');
$dt = $dt->format('d M Y g:i A');
for($i=0;$i<$count;$i++)
{
       $query = "select userId,betAmount from bet where id='$str_arr[$i]'";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($run))
        {
            $userId=$row[0];
            $balance=$row[1];
            $refund=$balance*($amount/100);
            $update = "update user set balance=balance+$refund where userId='$userId'";
            $update1 = "update bet set betAmount=betAmount-$refund where id='$str_arr[$i]'";

            $update3 = "update bet set betStatus=3 where id='$str_arr[$i]'";
            mysqli_query($con,$update);
            mysqli_query($con,$update1);
           mysqli_query($con,$update3);
           
           
        $query1 = "select balance from user where userId='$userId'";
        $run1=mysqli_query($con,$query1);
         while($row=mysqli_fetch_array($run1))
        {  $balance2=$row[0];
          
            $update2 = "insert into transaction(userId,time,debit,credit,description,total)values('$userId','$dt','0','$refund','Refund from admin','$balance2')";
             mysqli_query($con,$update2);
        }
          
            echo "Fund Return Successful";
        }
}
