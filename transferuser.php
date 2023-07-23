<?php
include './db.php';

if (isset($_POST["from"]) && isset($_POST["touser"]) && isset($_POST["amount"]) && isset($_POST["password"])) {

	$from = $_POST["from"];
	$tuser = $_POST["touser"];
	$amount = $_POST["amount"];
	$password = md5($_POST["password"]);

	if ($from != '' && $tuser != '' && $amount != '' && $password != '') {
		if (isset($_POST["usertransfer"]))
		{
			$timestamp = date("Y-m-d H:i:s");
			$stmt = $db->prepare("select * from user where userId=?");
			$stmt->bind_param("s", $tuser);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($row = $result->fetch_assoc()) {
					
				if ($row['actionpersonalid'] == 1)
				{
					echo "<script>alert('User transfer not allowed!!');</script>";
					echo '<script>document.location.href = "Wallet.php";</script>';
				}
				elseif($row['actionpersonalid'] == 0)
				{
					echo "<script>alert('This user is not availabe for transfer. Please try another one!!');</script>";
					echo '<script>document.location.href = "Wallet.php";</script>';					
				}
				else
				{
					$a = 1;
					$stmt = $db->prepare("select * from user where userId=? and actionpersonalid=?");
					$stmt->bind_param("ss", $from, $a);
					$stmt->execute();
					$result = $stmt->get_result();

					if ($row = $result->fetch_assoc()) {
						if ($row['actionpersonalid'] == 1) {
						$balance = 0;
						$stmt = $db->prepare("select * from user where userId=?");
						$stmt->bind_param("s", $from);
						$stmt->execute();
						$result = $stmt->get_result();

						if ($row = $result->fetch_assoc()) {
							if ($password == $row['password'])
							{
								$balance = $row['balance'] - $amount;
								if ($balance > 0)
								{
									$orbalance = abs($balance);

									$stmt = $db->prepare("update user set balance='$orbalance' where userId=?");
									$stmt->bind_param("s", $from);
									$stmt->execute();
									$touser = "To $tuser";
									$fromu = "From $from";

									$stmt = $db->prepare("INSERT INTO `abtransaction`(`debit`,`userId`,`description`,total,time)"
            						. "VALUES(?,?,?,?,?)");
            						$stmt->bind_param("sssss", $amount, $from, $touser, $orbalance, $timestamp);
            						$stmt->execute();

            						$uupdate = 0;
            						$stmt = $db->prepare("select * from user where userId=?");
            						$stmt->bind_param("s", $tuser);
            						$stmt->execute();
            						$result = $stmt->get_result();

            						if ($row = $result->fetch_assoc()) {
            							$uupdate = $row['balance'] + $amount;
            						
            						$stmt = $db->prepare("update user set balance='$uupdate' where userId=?");
            						$stmt->bind_param("s", $tuser);
            						$stmt->execute();

            						$stmt = $db->prepare("INSERT INTO `abtransaction`(`credit`,`userId`,`description`,total,time)"
            						. "VALUES(?,?,?,?,?)");
            						$stmt->bind_param("sssss", $amount, $tuser, $fromu, $uupdate, $timestamp);
            						$stmt->execute();
            						echo "<script>alert('Successfully sent to $tuser!!');</script>";
									echo '<script>document.location.href = "Wallet.php";</script>';
            					}
								}
								else
								{
									echo "<script>alert('Insufficient balance. Please deposit!!');</script>";
									echo '<script>document.location.href = "Wallet.php";</script>';
								}
							}
							else
							{
								echo "<script>alert('Password not match or wrong userId!!');</script>";
								echo '<script>document.location.href = "Wallet.php";</script>';					
							}
						}
					}
				}
				else
				{
					echo "<script>alert('availabe transfer for only club leader to user and user to club leader!!');</script>";
					echo '<script>document.location.href = "Wallet.php";</script>';
				}
				}
			}
		}
	}
	else
	{
		echo "<script>alert('Please fill-up all the fields!!');</script>";
		echo '<script>document.location.href = "Wallet.php";</script>';	
	}
}
else
{
	echo "<script>alert('Please fill-up all fields!!');</script>";
	echo '<script>document.location.href = "Wallet.php";</script>';
}
