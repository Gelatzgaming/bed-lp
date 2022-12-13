<?php
require '../../../includes/conn.php';

$sched_id = $_GET['schedule_id'];
$grd_lvl = $_GET['grd_lvl'];

mysqli_query($conn, "DELETE FROM tbl_schedules WHERE schedule_id = '$sched_id'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
if ($grd_lvl == "Grade 1") {
    header('location: ../list.sched.k-10.php?g1=' . $grd_lvl);
} else if ($grd_lvl == "Grade 2") {
    header('location: ../list.sched.k-10.php?g2=' . $grd_lvl);
} else if ($grd_lvl == "Grade 3") {
    header('location: ../list.sched.k-10.php?g3=' . $grd_lvl);
} else if ($grd_lvl == "Grade 4") {
    header('location: ../list.sched.k-10.php?g4=' . $grd_lvl);
} else if ($grd_lvl == "Grade 5") {
    header('location: ../list.sched.k-10.php?g5=' . $grd_lvl);
} else if ($grd_lvl == "Grade 6") {
    header('location: ../list.sched.k-10.php?g6=' . $grd_lvl);
} else if ($grd_lvl == "Grade 7") {
    header('location: ../list.sched.k-10.php?g7=' . $grd_lvl);
} else if ($grd_lvl == "Grade 8") {
    header('location: ../list.sched.k-10.php?g8=' . $grd_lvl);
} else if ($grd_lvl == "Grade 9") {
    header('location: ../list.sched.k-10.php?g9=' . $grd_lvl);
} else if ($grd_lvl == "Grade 10") {
    header('location: ../list.sched.k-10.php?g10=' . $grd_lvl);
} else if ($grd_lvl == "Nursery") {
    header('location: ../list.sched.k-10.php?nurs=' . $grd_lvl);
} else if ($grd_lvl == "Pre-Kinder") {
    header('location: ../list.sched.k-10.php?pkdr=' . $grd_lvl);
} else if ($grd_lvl == "Kinder") {
    header('location: ../list.sched.k-10.php?kdr=' . $grd_lvl);
}