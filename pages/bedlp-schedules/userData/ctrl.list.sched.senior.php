<?php
require '../../../includes/conn.php';



if (isset($_POST['submit'])) {

    $act_acad = mysqli_real_escape_string($conn, $_POST['acadyear']);
    $act_sem = mysqli_real_escape_string($conn, $_POST['sem']);
    $sen_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $sched_id = mysqli_real_escape_string($conn, $_POST['schedule_id']);
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $instruct = mysqli_real_escape_string($conn, $_POST['instruct']);

    $check_double = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE subject_id = '$sen_id' AND schedule_id = '$sched_id' AND teacher_id = '$instruct' AND day = '$days' AND time = '$time' AND room = '$room' AND semester = '$act_sem' AND acadyear = '$act_acad'") or die(mysqli_error($conn));
    $result = mysqli_num_rows($check_double);

    if ($result > 0) {
        $_SESSION['dbl-sched'] = true;
        header('location: ../edit.sched.senior.php?subject_id=' . $_SESSION['subject_id'] . '&schedule_id=' . $_SESSION['schedule_id']);
    } else {
        $insert = mysqli_query($conn, "UPDATE tbl_schedules SET day = '$days', time = '$time', room = '$room', teacher_id = '$instruct' WHERE subject_id = '$sen_id' AND acadyear = '$act_acad' AND semester = '$act_sem' AND schedule_id = '$sched_id'") or die(mysqli_error($conn));
        $_SESSION['success-edit'] = true;
        header('location: ../edit.sched.senior.php?subject_id=' . $_SESSION['subject_id'] . '&schedule_id=' . $_SESSION['schedule_id']);
    }
}