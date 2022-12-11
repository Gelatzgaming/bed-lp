<?php
require '../../../includes/conn.php';

$sched_id = $_GET['schedule_id'];
$str_n = $_GET['str_n'];

mysqli_query($conn, "DELETE FROM tbl_schedules WHERE schedule_id = '$sched_id'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
if ($str_n == "ABM") {
    header('location: ../list.sched.senior.php?abm=' . $str_n);
} else if ($str_n == "STEM") {
    header('location: ../list.sched.senior.php?stem=' . $str_n);
} else if ($str_n == "GAS") {
    header('location: ../list.sched.senior.php?gas=' . $str_n);
} else if ($str_n == "HUMSS") {
    header('location: ../list.sched.senior.php?humss=' . $str_n);
} else if ($str_n == "TVL - HE") {
    header('location: ../list.sched.senior.php?tvl=' . $str_n);
}