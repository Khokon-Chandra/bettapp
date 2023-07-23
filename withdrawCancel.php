<?php

include './lib/Database.php';
$db = new Database();
?>
<?php

 if (isset($_GET['Wcancel'])) {
    $userId = $_GET['Wcancel'];

    $query = "select * from admin_notification where id='$userId' limit 1";


    $result = $db->select($query);
    if ($result) {
        $result = $result->fetch_assoc();
		if ($result['seen'] == '1')
        {
            echo "<script>alert('Your request cannot be processed. Its already settled by admin.')</script>";
			echo '<script>document.location.href = "statement";</script>';
        }
        else
        {
        $amount = $result['withdraw'];
        $user = $result['userId']; 
        //transaction
        $query = "SELECT `total` FROM `transaction` WHERE userId='$user' and (clubCredit=0 and clubDebit=0) order by id desc limit 1";

        $resultTotal = $db->select($query);
        $Totall = 0;
        if ($resultTotal) {
            $Total = $resultTotal->fetch_assoc();
            $Totall = $Total['total'];
        }
        $Totall = $amount;
        $dis = "withdraw canceled by you";
        $query = "INSERT INTO `transaction`( `credit`,`userId`, `description`,total)"
                . " VALUES ('$amount','$user','$dis','$Totall')";
        $db->insert($query);
        //update balance
        $query = "SELECT * FROM `user` where userId='$user'";
        $resultUser = $db->select($query);
        $userBalance = $resultUser->fetch_assoc();
        $userBlc = $userBalance['balance'] + $amount;
        $query = "update `user` set balance='$userBlc' WHERE userId='$user'";
        $db->update($query);
		$query = "update `admin_notification` set wAction = 3, notes='Withdraw canceled by $user' WHERE id='$userId'";
    	$result = $db->update($query);
 
        header("location:statement");
    }
    }
 }
?>