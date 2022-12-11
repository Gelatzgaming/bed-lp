<?php
require '../../../includes/conn.php';

$get_sem = $_GET['semester_id'];

mysqli_query($conn, "DELETE FROM tbl_semesters WHERE semester_id = '$get_sem' ") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header("location: ../add.sem.php");