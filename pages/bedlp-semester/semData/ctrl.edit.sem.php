<?php
require '../../../includes/conn.php';



if (isset($_POST['submit'])) {

    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $semester_id = mysqli_real_escape_string($conn, $_POST['id']);

    $checkAcadSem = mysqli_query($conn, "SELECT * FROM tbl_semesters WHERE semester = '$semester'") or die(mysqli_error($conn));

    $resultCheck = mysqli_num_rows($checkAcadSem);

    if (0 == $resultCheck) {
        $addSem =  mysqli_query($conn, "UPDATE tbl_semesters SET semester = '$semester' WHERE semester_id = '$semester_id'") or die(mysqli_error($conn));

        $_SESSION['success-edit'] = true;
        header('location: ../add.sem.php?semester_id=' . $semester_id);
    } else {
        $_SESSION['semExist'] = true;
        header('location: ../add.sem.php?semester_id=' . $semester_id);
    }
}