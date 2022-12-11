<?php
require '../../../includes/conn.php';


if (isset($_POST['submit1'])) {

    $actsem = mysqli_real_escape_string($conn, $_POST['act_sem']);

    $update = mysqli_query($conn, "UPDATE tbl_active_semesters SET semester_id = '$actsem'") or die(mysqli_error($conn));
    $_SESSION['success-update'] = true;
    header('location: ../add.sem.php');
}