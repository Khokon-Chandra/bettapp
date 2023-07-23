<?php
include "db.php";
$output = '';
if(isset($_POST["brand_id"])){
	if($_POST["brand_id"] != ''){
			$query = "SELECT * FROM receiving_money_number";
            $resultreceivingMoneyNumber = mysqli_query($db, $query);
            $i = 0;
            if ($resultreceivingMoneyNumber) {
                while ($receivingMoneyNumber = mysqli_fetch_array($resultreceivingMoneyNumber)) {

                 $i++;
														
					$output .= '<option>' .$receivingMoneyNumber["phone"]. '</option>';
														
		}
		echo $output;
     }
	
	}
}
?>