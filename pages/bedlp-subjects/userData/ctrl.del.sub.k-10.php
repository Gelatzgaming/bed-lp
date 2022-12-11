<?php
require '../../../includes/conn.php';

$sub_id = $_GET['subject_id'];

mysqli_query($conn, "DELETE FROM tbl_subjects WHERE subject_id = '$sub_id'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.sub.k-10.php');