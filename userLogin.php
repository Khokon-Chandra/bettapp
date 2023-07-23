<?php
include 'db.php';
session_start();
?>
<?php
if (!isset($_POST['userId']) && $_POST['password']) {
    die("Please fill both field!");
}elseif (empty($_POST['userId'])) {
	echo "Have to give username!!!";
}
elseif (empty($_POST['password'])) {
	echo "Have to give Password!!!";
}
else{
    $userId = $db->real_escape_string($_POST['userId']);
    $passwords = $db->real_escape_string(md5($_POST['password']));
	
	if ($userId == strip_tags($_POST['userId'])) {
	
    if ($userId !== "" && $passwords !== "") {
        $stmt = $db->prepare("select id, password from `user` where userId=?");
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0){
            $stmt->bind_result($id, $password);
        $row = $stmt->fetch();
        if ($passwords === $password) {
            session_regenerate_id();

            //set up cookie
            setcookie("userId", $userId, time() + 86400 * 30, '/');
            setcookie("password", $passwords, time() + 86400 * 30, '/');
            setcookie("id", $id, time() + 86400 * 30, '/');
            setcookie("msg", 0, time() + 86400 * 30, '/');
            $_SESSION['userId'] = $userId;
            echo "1";
        }
        else
    		{
				echo "Password is incorrect!!!";
    		}
        }
        else
    		{
				$stmt = $db->prepare("select id, password from `club` where userId=?");
				$stmt->bind_param("s", $userId);
				$stmt->execute();
				$stmt->store_result();
			
        		if ($stmt->num_rows > 0) {
					$stmt->bind_result($id, $password);
					$row = $stmt->fetch();
					if ($passwords === $password) {
            		session_regenerate_id();
            		//set up cookie
					setcookie("userId", $userId, time() + 86400 * 30, '/');
					setcookie("password", $password, time() + 86400 * 30, '/');
					setcookie("club", $userId, time() + 86400 * 30, '/');
					setcookie("id", $id, time() + 6400 * 30, '/');
					setcookie("msg", 0, time() + 86400 * 30, '/');
					$_SESSION['userId'] = $userId;
						
					echo "2";
        		}
        		else
    			{
					echo "Password is incorrect!!!";
    			}
			}
	}
}
	}
	else{
		    //whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
		$stmt = $db->prepare("INSERT INTO tryingToinject(ipaddress) VALUES (?)");
		$stmt->bind_param("s", $ip_address);
		$stmt->execute();
		echo "Your IP is stored!!!";

		$stmt->close();
		$db->close();
	}
}
?>