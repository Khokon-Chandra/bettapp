<?php
if (isset($_GET["logout"])) {
    if (isset($_COOKIE["userId"]) AND isset($_COOKIE["password"]) AND isset($_COOKIE["club"])) {
        session_start();
        setcookie("userId",'',time()- 60*60*24*10, '/');
        setcookie("password",'',time()- 60*60*24*10, '/');
        setcookie("club",'',time()- 60*60*24*10, '/');
        unset($_SESSION['userId']);
        header('location:/');
    } else if (isset($_COOKIE["userId"]) AND isset($_COOKIE["password"])) {
        session_start();
        setcookie("userId",'',time()- 60*60*24*10, '/');
        setcookie("password",'',time()- 60*60*24*10, '/');
        unset($_SESSION['userId']);
        header('location:/');
    }else 
	{
		header('location:/');
	}
}

?>