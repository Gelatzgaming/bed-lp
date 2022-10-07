<?php require '../../../includes/conn.php';


$get_user = $_GET['prin_id'];

mysqli_query($conn, "DELETE FROM tbl_principals WHERE prin_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.principal.php');