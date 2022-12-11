<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {

    $acad_year = mysqli_real_escape_string($conn, $_POST['acad_year']);

    $addAcad =  mysqli_query($conn, "INSERT INTO tbl_acadyears (academic_year) values ('$acad_year')") or die(mysqli_error($conn));

    if ($addAcad == true) {
        $_SESSION['successYear'] = true;
        header("location: ../add.date.php");
    } else {
        $_SESSION['fill'] = true;
        header("location: ../add.date.php");
    }
}