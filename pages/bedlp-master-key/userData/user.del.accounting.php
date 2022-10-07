<?php require '../../../includes/conn.php';


$get_user = $_GET['acc_id'];

mysqli_query($conn, "DELETE FROM tbl_accountings WHERE acc_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.accounting.php');