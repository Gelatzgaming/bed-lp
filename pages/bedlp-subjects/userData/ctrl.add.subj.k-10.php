<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {

    $subj_code = mysqli_real_escape_string($conn, $_POST['subj_code']);
    $subj_description = mysqli_real_escape_string($conn, $_POST['subj_description']);
    $grade_level = mysqli_real_escape_string($conn, $_POST['grade_level']);


    $check_double = mysqli_query($conn, "SELECT * FROM tbl_subjects
     LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects.grade_level_id 
     WHERE subject_code = '$subj_code' AND subject_description = '$subj_description' AND tbl_subjects.grade_level_id = '$grade_level'") or die(mysqli_error($conn));

    $result = mysqli_num_rows($check_double);

    if ($result == 0) {
        $insertSub = mysqli_query($conn, "INSERT INTO tbl_subjects (subject_code, subject_description, grade_level_id) VALUES ('$subj_code', '$subj_description', '$grade_level')") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../add.sub.k-10.php');
    } else {
        $_SESSION['subject_exists'] = true;
        header('location: ../add.sub.k-10.php');
    }
}