<?php
session_start();
unset($_SESSION['inven_id']);
unset($_SESSION['admin_id']);
unset($_SESSION['inven_name']);
unset($_SESSION['inven_submit']);
header('location:Inventorylogin.php');
?>