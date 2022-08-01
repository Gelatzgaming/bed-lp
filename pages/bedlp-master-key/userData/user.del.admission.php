<?php require '../../../includes/conn.php';


$get_userID = $_GET['admission_id'];

mysqli_query($conn, "DELETE FROM tbl_admissions WHERE admission_id = '$get_userID'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.admission.php');