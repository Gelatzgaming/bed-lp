<?php
include 'conn.php';

if (!empty($_SESSION['role'])) {
    if ($_SESSION['role'] == "Master Key") {
        $mk_id = $_SESSION['mk_id'];
        $user = $conn->query("SELECT * FROM tbl_master_key WHERE mk_id = '$mk_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['name'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($mk_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } elseif ($_SESSION['role'] == "Registrar") {
        $reg_id = $_SESSION['reg_id'];
        $user = $conn->query("SELECT * FROM tbl_registrars WHERE reg_id = '$reg_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['reg_fname'] . " " . $row_user['reg_lname'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($reg_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } elseif ($_SESSION['role'] == "Principal") {
        $prin_id = $_SESSION['prin_id'];
        $user = $conn->query("SELECT * FROM tbl_principals WHERE prin_id = '$prin_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['prin_fname'] . " " . $row_user['prin_lname'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($prin_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } elseif ($_SESSION['role'] == "Accounting") {
        $acc_id = $_SESSION['acc_id'];
        $user = $conn->query("SELECT * FROM tbl_accountings WHERE acc_id = '$acc_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['accounting_fname'] . " " . $row_user['accounting_lname'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($acc_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } elseif ($_SESSION['role'] == "Admission") {
        $admission_id = $_SESSION['admission_id'];
        $user = $conn->query("SELECT * FROM tbl_admissions WHERE admission_id = '$admission_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['admission_fname'] . " " . $row_user['admission_lname'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($admission_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } elseif ($_SESSION['role'] == "Teacher") {
        $teacher_id = $_SESSION['teacher_id'];
        $user = $conn->query("SELECT * FROM tbl_teachers WHERE teacher_id = '$teacher_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['teacher_fname'] . " " . $row_user['teacher_lname'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($teacher_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } elseif ($_SESSION['role'] == "Adviser") {
        $ad_id = $_SESSION['ad_id'];
        $user = $conn->query("SELECT * FROM tbl_adviser WHERE ad_id = '$ad_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['ad_fname'] . " " . $row_user['ad_lname'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($ad_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } elseif ($_SESSION['role'] == "Student") {
        $stud_id = $_SESSION['stud_id'];
        $user = $conn->query("SELECT * FROM tbl_students WHERE student_id = '$student_id'");
        $row_user = $user->fetch_array();
        $user_fullname = $row_user['student_fname'] . " " . $row_user['student_lname'];
        $user_img = $row_user['img'];
        $user_email = $row_user['email'];
        if ($stud_id == false) {
            header("location: ../bedlp-login/bedlp-login.php");
        }
    } else {
        session_destroy();
        header("location: ../bedlp-login/bedlp-login.php");
    }
} else {
    header("location: ../bedlp-login/bedlp-login.php");
}


$getSchool_settings = mysqli_query($conn, "SELECT * FROM tbl_school_settings");
$row_school = mysqli_fetch_array($getSchool_settings);
$school_name = $row_school['school_name'];
$school_address = $row_school['school_address'];

// active acad and sem
$get_acadYear = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
$get_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
$row_acadyear = mysqli_fetch_array($get_acadYear);
$row_semester = mysqli_fetch_array($get_sem);
$acadyear_id = $row_acadyear['ay_id'];
$semester_id = $row_semester['semester_id'];