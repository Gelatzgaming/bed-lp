<?php require '../../../includes/conn.php';


$get_user = $_GET['teacher_id'];

mysqli_query($conn, "DELETE FROM tbl_teachers WHERE teacher_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.teacher.php');