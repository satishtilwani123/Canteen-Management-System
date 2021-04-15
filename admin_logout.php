<?php
session_start();
unset($_SESSION['submit']);
unset($_SESSION['inven_id']);
unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);
header('location:adminlogin.php');
?>