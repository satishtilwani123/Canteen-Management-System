<?php
session_start();
unset($_SESSION['emp_submit']);
unset($_SESSION['emp_id']);
unset($_SESSION['emp_name']);
header('location:Employeelogin.php');
?>