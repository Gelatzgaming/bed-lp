<?php
require '../../../includes/conn.php';

$get_id = $_GET['ay_id'];

mysqli_query($conn, "DELETE FROM tbl_acadyears WHERE ay_id = '$get_id' ") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header("location: ../add.date.php");