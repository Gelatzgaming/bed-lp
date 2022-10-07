<?php require '../../../includes/conn.php';


$get_user = $_GET['student_id'];

mysqli_query($conn, "DELETE FROM tbl_students WHERE student_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.students.php');