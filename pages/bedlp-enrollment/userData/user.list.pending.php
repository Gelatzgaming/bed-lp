<?php
require '../../../includes/conn.php';


if (isset($_POST['btnRemark']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $conn->real_escape_string($_POST['id']);
    $remark = ($_POST['remark'] == "Checked") ? 'Canceled' : 'Checked';
    $remark = $conn->real_escape_string($remark);

    $query = $conn->query("UPDATE tbl_schoolyears SET remark = '$remark' WHERE sy_id = '$id'");

    if ($query) {
        //alert | session-> here.........
        header('location: ../list.pending.php');
    }
}