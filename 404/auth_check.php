<?php

session_start();
if (!isset($_SESSION['adminId']) || (trim($_SESSION['adminId']) == '')) {
    if (!isset($_COOKIE["adminPanel"]) and (!isset($_COOKIE["adminPass"]))) {
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


if (isset($_GET["logout"])) {
    session_start();
    session_destroy();
    if (isset($_COOKIE["adminPanel"]) and isset($_COOKIE["adminPass"])) {
        setcookie('adminPanel', '', time() - (86400 * 30));
        setcookie('adminPass', '', time() - (86400 * 30));
        setcookie("adminId", '', time() - (86400 * 30));
        setcookie("adminType", '', time() - (86400 * 30));
    }

    header('location:login.php');
}
