<?php
require '../../../includes/conn.php';


if (isset($_GET['remark'])) {

    $id = $conn->real_escape_string($_GET['id']);

    if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Adviser") {
        $remark = ($_GET['remark'] == "Checked" || $_GET['remark'] == "Disapproved") ? 'Canceled' : 'Checked';
        $remark = $conn->real_escape_string($remark);
    } else if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar") {
        $remark = ($_GET['remark'] == "Checked" || $_GET['remark'] == "Disapproved") ? 'Approved' : 'Disapproved';
        $remark = $conn->real_escape_string($remark);
    }

    $query = $conn->query("UPDATE tbl_schoolyears SET remark = '$remark' WHERE sy_id = '$id'");

    if ($query) {
        //alert | session-> here.........
        header('location: ../list.pending.php');
    }
}
