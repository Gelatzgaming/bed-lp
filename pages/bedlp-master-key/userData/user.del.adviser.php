<?php require '../../../includes/conn.php';


$get_user = $_GET['ad_id'];

mysqli_query($conn, "DELETE FROM tbl_adviser WHERE ad_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.adviser.php');