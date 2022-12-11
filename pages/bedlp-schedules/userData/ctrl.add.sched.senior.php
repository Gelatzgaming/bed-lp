<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {

    $acadyear = mysqli_real_escape_string($conn, $_POST['acadyear']);
    $sem = mysqli_real_escape_string($conn, $_POST['sem']);
    $sen_id = mysqli_real_escape_string($conn, $_POST['sen_id']);
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $instruct = mysqli_real_escape_string($conn, $_POST['instruct']);

    $check_double = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE subject_id = '$sen_id' AND teacher_id = '$instruct' AND day = '$days' AND time = '$time' AND room = '$room' AND semester = '$sem' AND acadyear = '$acadyear' ") or die(mysqli_error($conn));
    $result = mysqli_num_rows($check_double);

    if ($result > 0) {
        $_SESSION['dbl-sched'] = true;
        header('location: ../list.sched.senior.php?sen_id=' . $_SESSION['sen_id']);
    } else {
        $insert = mysqli_query($conn, "INSERT INTO tbl_schedules (subject_id, teacher_id, day, time, room, semester, acadyear) VALUES ('$sen_id', '$instruct', '$days', '$time', '$room', '$sem', '$acadyear')") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../list.sched.senior.php?sen_id=' . $_SESSION['sen_id']);
    }
}