<?php
require '../../../includes/conn.php';



if (isset($_POST['submit'])) {

    $acad_year = mysqli_real_escape_string($conn, $_POST['acad_year']);
    $ay_id = mysqli_real_escape_string($conn, $_POST['id']);

    $checkAcadYear = mysqli_query($conn, "SELECT * FROM tbl_acadyears WHERE academic_year = '$academic_year'") or die(mysqli_error($conn));

    $resultCheck = mysqli_num_rows($checkAcadYear);

    if (0 == $resultCheck) {
        $addAcad =  mysqli_query($conn, "UPDATE tbl_acadyears SET academic_year = '$acad_year' WHERE ay_id = '$ay_id'") or die(mysqli_error($conn));

        $_SESSION['success-edit'] = true;
        header('location: ../add.date.php?ay_id=' . $ay_id);
    } else {
        $_SESSION['yearExist'] = true;
        header('location: ../add.date.php?ay_id=' . $ay_id);
    }
}