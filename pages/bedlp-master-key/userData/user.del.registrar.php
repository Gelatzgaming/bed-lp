<?php require '../../../includes/conn.php';


$get_user = $_GET['reg_id'];

mysqli_query($conn, "DELETE FROM tbl_registrars WHERE reg_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.registrar.php');