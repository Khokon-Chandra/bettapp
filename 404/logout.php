<?php
session_start();
    unset($_SESSION['adminId']);
    unset($_SESSION['adminType']);
    unset($_SESSION['adminPanel']);
    unset($_SESSION['adminPass']);

        setcookie('adminPanel', '', time() - 60*60*24*10, '/');
        setcookie('adminPass', '', time() - 60*60*24*10, '/');
        setcookie("adminId", '', time() - 60*60*24*10, '/');
        setcookie("adminType", '', time() - 60*60*24*10, '/');
    header('location:./');
?>