<?php
require '../../../includes/conn.php';
session_start();

$sen_id = $_GET['sen_id'];

mysqli_query($conn, "DELETE FROM tbl_subjects_senior WHERE subject_id='$sen_id'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.sub.senior.php');