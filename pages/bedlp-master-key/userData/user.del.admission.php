<?php require '../../../includes/conn.php';


$get_user = $_GET['admission_id'];

mysqli_query($conn, "DELETE FROM tbl_admissions WHERE admission_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.admission.php');