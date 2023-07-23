<?php
session_start();
if (!isset($_SESSION['adminId']) || (trim($_SESSION['adminId']) == '')) {
    if (!isset($_COOKIE["adminPanel"]) AND ( !isset($_COOKIE["adminPass"]))) {
        header('location:login.php');
        exit();
    }
}
if (isset($_SESSION['adminType'])) {
    if ($_SESSION['adminType'] != 1) {
        header('location:login.php');
        exit();
    }
} else if (isset($_COOKIE["adminType"])) {
    if ($_COOKIE["adminType"] != 1) {
        header('location:login.php');
        exit();
    }
}
?>
<?php
include '../lib/Database.php';
$db = new Database();
?>
<?php
if (isset($_GET["logout"])) {
    session_start();
    session_destroy();
    if (isset($_COOKIE["adminPanel"]) AND isset($_COOKIE["adminPass"])) {
        setcookie('adminPanel', '', time() - (86400 * 30));
        setcookie('adminPass', '', time() - (86400 * 30));
        setcookie("adminId", '', time() - (86400 * 30));
        setcookie("adminType", '', time() - (86400 * 30));
    }

    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="refresh" content="3600;url=logout.php" />
		<meta http-equiv="refresh" content="600">
        <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Twitter meta-->
        <meta property="twitter:card" content="summary_large_image">
        <!-- Open Graph Meta-->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Vali Admin">
        <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
        <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
        <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Admin</title>
         <link href="https://fonts.googleapis.com/css?family=Palanquin&display=swap" rel="stylesheet">
         
    </head>
    <style type="text/css">
        body{
             font-family: Palanquin;
        }
    </style>
    <body class="app sidebar-mini">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="index.php">Newt10.live</a>
            <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>
            <!-- Navbar Right Menu-->
            <ul class="app-nav">
                <!--Notification Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" id=""><i class="fa fa-envelope-square fa-lg"></i><span class="badge" style="background: red;" id="countChatofClub"></span></a>
                    <ul class="app-notification dropdown-menu dropdown-menu-right">
                        <li class="app-notification__title" style="color: red">Club notifications.</li>
                        <div class="app-notification__content" id="chatNotificationListOfClub">


                        </div>
                        <li class="app-notification__footer"><a href="mailBox">See all notifications.</a></li>
                    </ul>
                </li>
                <!--Notification Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" id=""><i class="fa fa-envelope-o fa-lg"></i><span class="badge" style="background: red;" id="countChat"></span></a>
                    <ul class="app-notification dropdown-menu dropdown-menu-right">
                        <li class="app-notification__title">User notifications.</li>
                        <div class="app-notification__content" id="chatNotificationList">


                        </div>
                        <li class="app-notification__footer"><a href="mailBox">See all notifications.</a></li>
                    </ul>
                </li>
                <!--Notification Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" id=""><i class="fa fa-bell-o fa-lg"></i><span class="badge" style="background: red;" id="count"></span></a>
                    <ul class="app-notification dropdown-menu dropdown-menu-right">
                        <li class="app-notification__title">You have  new notifications.</li>
                        <div class="app-notification__content" id="notificationList">


                        </div>
                        <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
                    </ul>
                </li>
                <!-- User Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><strong></strong><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
<?php
$query = "SELECT `balance` FROM `admin` where type=1";
$resultAdmin = $db->select($query);
$adminBalance = 0;
if ($resultAdmin) {
    $resultAdmin = $resultAdmin->fetch_assoc();
    $adminBalance = $resultAdmin['balance'];
}
?>
                        <li><a href="adminTransactionHistory" class="dropdown-item"><i class="fa fa-money fa-lg"></i>( <?php echo $adminBalance; ?> )</a></li>
                        <li><a class="dropdown-item" href="setting"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                        <li><a class="dropdown-item" href="adminProfile"><i class="fa fa-cog fa-lg"></i> Change profile</a></li>
                        <li><a class="dropdown-item" href="adminProfile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                        <li><a class="dropdown-item" href=""><i class="fa fa-user fa-lg"></i> Clear history</a></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </header>