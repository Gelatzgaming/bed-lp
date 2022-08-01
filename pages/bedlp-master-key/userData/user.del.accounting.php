<?php require '../../../includes/conn.php';


$get_userID = $_GET['acc_id'];

mysqli_query($conn, "DELETE FROM tbl_accountings WHERE acc_id = '$get_userID'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.accounting.php');