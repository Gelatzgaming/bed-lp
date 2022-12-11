<?php
require '../../../includes/conn.php';

if (isset($_POST['submit'])) {

    $actacadyear = mysqli_real_escape_string($conn, $_POST['act_acadyear']);

    $update = mysqli_query($conn, "UPDATE tbl_active_acadyears SET ay_id = '$actacadyear'") or die(mysqli_error($conn));
    $_SESSION['success-update'] = true;
    header('location: ../add.date.php');
}