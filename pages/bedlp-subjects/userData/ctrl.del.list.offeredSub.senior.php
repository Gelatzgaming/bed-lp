<?php
require '../../../includes/conn.php';

$stud_id = $_GET['stud_id'];

if (isset($_POST['submit'])) {

    if (empty($_POST['checked'])) {
        $_SESSION['empty-check'] = true;
        if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") {
            header('location: ../list.enrolledSub.senior.php?stud_id=' . $stud_id);
        } else if ($_SESSION['role'] == "Student") {
            header('location: ../list.enrolledSub.senior.php');
        }
    } else {
        foreach ($_POST['checked'] as $index) {
            $ensub = $_POST['enrolled_subID'];
            $del_enrolled_sub = mysqli_query($conn, "DELETE FROM tbl_enrolled_subjects WHERE enrolled_sub_id = '$ensub[$index]'") or die(mysqli_error($conn));
            $_SESSION['drop'] = true;
            if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") {
                header('location: ../list.enrolledSub.senior.php?stud_id=' . $stud_id);
            } else if ($_SESSION['role'] == "Student") {
                header('location: ../list.enrolledSub.senior.php');
            }
        }
    }
}