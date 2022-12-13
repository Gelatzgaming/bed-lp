<?php $par_page = "Dashboard";
$cur_page = "Dashboard" ?>
<?php

// head
include '../../includes/bedlp-header.php';

$get_active_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters AS asem
LEFT JOIN tbl_semesters AS sem ON sem.semester_id = asem.semester_id");
while ($row = mysqli_fetch_array($get_active_sem)) {
    $sem = $row['semester_id'];
    $sem_n = $row['semester'];
}

$get_active_acad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears AS aay
LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = aay.ay_id");
while ($row = mysqli_fetch_array($get_active_acad)) {
    $acad = $row['ay_id'];
    $acad_n = $row['academic_year'];
}

?>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>


    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        <!-- sidebar -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>


        <!-- main content area start -->
        <div class="main-content">

            <!-- header area start -->
            <?php include '../../includes/bedlp-navbar.php'; ?>

            <div class="main-content-inner">
                <?php if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Admission" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Principal") {
                    include 'dblp.general.php';
                } else if ($_SESSION['role'] == "Student") {

                    $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                    WHERE student_id = '$stud_id' AND semester_id = '0' AND ay_id = '$acad'") or die(mysqli_error($conn));
                    $result = mysqli_num_rows($get_level_id);

                    if ($result > 0) {
                        while ($row = mysqli_fetch_array($get_level_id)) {
                            $grade_level = $row['grade_level_id'];
                        }
                    } else {

                        $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                    WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
                        $result2 = mysqli_num_rows($get_level_id);

                        if ($result2 > 0) {
                            while ($row = mysqli_fetch_array($get_level_id)) {
                                $grade_level = $row['grade_level_id'];
                            }
                        }
                    }

                    if (!empty($grade_level)) {
                        if ($grade_level > 13) {
                            include 'dblp.student.senior.php';
                        } else if ($grade_level < 14) {
                            include 'dblp.student.php';
                        }
                    } else {
                        include 'dblp.student.senior.php';
                    }
                } else {
                    header('location: ../bed-500/page500.php');
                }
                ?>
            </div>
        </div>
        <!-- main content area end -->


        <!-- footer area -->
        <?php include '../../includes/bedlp-footer.php'; ?>


    </div>
    <!-- page container area end -->

    <!-- script -->
    <?php include '../../includes/bedlp-script.php'; ?>

</body>

</html>