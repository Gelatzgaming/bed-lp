<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {

    $semester = mysqli_real_escape_string($conn, $_POST['semester']);

    $addSem =  mysqli_query($conn, "INSERT INTO tbl_semesters (semester) values ('$semester')") or die(mysqli_error($conn));

    if ($addSem == true) {
        $_SESSION['successYear'] = true;
        header("location: ../add.sem.php");
    } else {
        $_SESSION['fill'] = true;
        header("location: ../add.sem.php");
    }
}