<?php $par_page = "Maintenance";
$cur_page = "Enrollment Information";


$stud_id = $_GET['stud_id'];


?>


<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Enrollment Information | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';


    if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") {
        $stud_id = $_GET['stud_id'];


        $get_active_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
        while ($row = mysqli_fetch_array($get_active_sem)) {
            $sem = $row['semester_id'];
        }

        $get_active_acad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
        while ($row = mysqli_fetch_array($get_active_acad)) {
            $acad = $row['ay_id'];
        }

        $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
    WHERE student_id = '$stud_id' AND semester_id = '0' AND ay_id = '$acad'") or die(mysqli_error($conn));
        $result = mysqli_num_rows($get_level_id);

        if ($result > 0) {
        } else {

            $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
    WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
            $result2 = mysqli_num_rows($get_level_id);

            if ($result2 > 0) {
                header('location: list.enrolledSubSH.php?stud_id=' . $stud_id . '&glvl_id=' . $glvl_id);
            } else {
                header('location: ../bed-404/page404.php');
            }
        }
    }


    if ($_SESSION['role'] == "Student") {
        $get_stud = mysqli_query($conn, "SELECT *, CONCAT(stud.student_fname, ' ', LEFT(stud.student_mname,1), '. ', stud.student_lname) AS fullname 
FROM tbl_schoolyears AS sy
LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
LEFT JOIN tbl_genders AS gen ON gen.gender_id = stud.gender_id
LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sy.grade_level_id
LEFT JOIN tbl_strands AS std ON std.strand_id = sy.strand_id 
LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
WHERE sy.student_id = '$stud_id' AND ay.academic_year = '$act_acad' AND sy.semester_id = '0'") or die(mysqli_error($conn));
        $result = mysqli_num_rows($get_stud);
        if ($result == 0) {
            header('location: ../bed-student/add.enroll.php');
        }
    }

    ?>


<body>
    <div class="page-container">
        <?php $page = "dataTables"; ?>
        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">

            <?php include '../../includes/bedlp-navbar.php';
            if (!empty($_SESSION['success-del'])) {
                echo '  <div class="alert alert-danger alert-dismissible fade show py-3 text-center" role="alert" >
                <strong>Successfully Deleted.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>';
                unset($_SESSION['success-del']);
            }
            ?>



            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-4">


                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid pl-5 pr-5 pb-3">
                        <!-- main content pt.2 -->
                        <!-- Dark table start -->
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Enrollment Information</h4>
                                    <div class="data-tables datatable-dark">
                                        <table id="dt3" class="text-center" style="width: 100%;">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Student ID:</th>
                                                    <th>Name:</th>
                                                    <th>Gender:</th>
                                                    <th>Grade Level:</th>
                                                    <th>School Year:</th>
                                                    <th>Date:</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $get_stud = mysqli_query($conn, "SELECT *, CONCAT(stud.student_fname, ' ', LEFT(stud.student_mname,1), '. ', stud.student_lname) AS fullname 
                                                FROM tbl_schoolyears AS sy
                                                LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
                                                LEFT JOIN tbl_genders AS gen ON gen.gender_id = stud.gender_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sy.grade_level_id
                                                LEFT JOIN tbl_strands AS std ON std.strand_id = sy.strand_id 
                                                LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
                                                LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                                                WHERE sy.student_id = '$stud_id' AND ay.academic_year = '$act_acad' AND sy.semester_id = '0'") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($get_stud)) {
                                                    $remark = $row['remark']; ?>
                                                <tr>
                                                    <td class="pt-4 pb-4"><?php echo $row['stud_no']; ?></td>
                                                    <td class="pt-4 pb-4"><?php echo $row['fullname']; ?></td>
                                                    <td class="pt-4 pb-4"><?php echo $row['gender_name']; ?></td>
                                                    <td class="pt-4 pb-4"><?php echo $row['grade_level']; ?></td>
                                                    <td class="pt-4 pb-4"><?php echo $row['academic_year']; ?></td>
                                                    <td class="pt-4 pb-4"><?php echo $row['date_enrolled']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <hr style="border: 1px solid black;">
                                <h4 class="text-lg-center mb-2">Your Subject List</h4>
                                <hr style="border: 1px solid black;">

                                <div class="card-body">

                                    <?php if ($_SESSION['role'] == "Student") { ?>
                                    <form action="userData/ctrl.del.list.offeredSubPJH.php" method="POST">
                                        <?php } elseif ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") { ?>
                                        <form
                                            action="userData/ctrl.del.list.offeredSubPJH.php?stud_id=<?php echo $stud_id; ?>"
                                            method="POST">
                                            <?php } ?>
                                            <div class="data-tables datatable-dark">
                                                <table id="dt3" class="text-center" style="width: 100%;">
                                                    <thead class="text-capitalize">
                                                        <tr>
                                                            <th><input type="checkbox" id="option-all"
                                                                    onchange="checkAll(this)"><label
                                                                    for="option-all"></label>
                                                            </th>
                                                            <th>Code</th>
                                                            <th>Description</th>
                                                            <th>Days</th>
                                                            <th>Time</th>
                                                            <th>Room</th>
                                                            <th>Professor</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php $get_enrolled_sub = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teach.teacher_lname) AS fullname FROM tbl_enrolled_subjects AS ensub
                                                         LEFT JOIN tbl_schedules AS sched ON sched.schedule_id = ensub.schedule_id
                                                         LEFT JOIN tbl_students AS stud ON stud.student_id = ensub.student_id
                                                         LEFT JOIN tbl_subjects AS sub ON sub.subject_id = sched.subject_id
                                                         LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                                                         LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                                         WHERE stud.student_id = $stud_id AND sched.semester = '0'") or die(mysqli_error($conn));
                                                        $index = 0;
                                                        while ($row = mysqli_fetch_array($get_enrolled_sub)) {
                                                        ?>
                                                        <tr>
                                                            <td class="pt-3 pb-3">
                                                                <?php if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") { ?>
                                                                <div
                                                                    class="custom-control custom-checkbox justify-content-center">
                                                                    <input type="text" name="enrolled_subID[]"
                                                                        value="<?php echo $row['enrolled_sub_id'] ?>"
                                                                        hidden>
                                                                    <input
                                                                        class="custom-control-input custom-control-input-navy"
                                                                        type="checkbox" name="checked[]"
                                                                        value="<?php echo $index++; ?>"
                                                                        id="option-a<?php echo $row['enrolled_sub_id'] ?>">
                                                                    <label
                                                                        for="option-a<?php echo $row['enrolled_sub_id'] ?>"
                                                                        class="custom-control-label"></label>
                                                                </div>
                                                                <?php } else if ($_SESSION['role'] == "Student") {
                                                                        if ($remark == 'Canceled' || $remark == 'Pending') { ?>

                                                                <div
                                                                    class="custom-control custom-checkbox justify-content-center">
                                                                    <input type="text" name="enrolled_subID[]"
                                                                        value="<?php echo $row['enrolled_sub_id'] ?>"
                                                                        hidden>
                                                                    <input
                                                                        class="custom-control-input custom-control-input-navy"
                                                                        type="checkbox" name="checked[]"
                                                                        value="<?php echo $index++; ?>"
                                                                        id="option-b<?php echo $row['enrolled_sub_id'] ?>">
                                                                    <label
                                                                        for="option-b<?php echo $row['enrolled_sub_id'] ?>"
                                                                        class="custom-control-label"></label>
                                                                </div>
                                                                <?php }
                                                                    } ?>
                                                            </td>


                                                            <td class="pt-3 pb-3"><?php echo $row['subject_code']; ?>
                                                            </td>
                                                            <td class="pt-3 pb-3">
                                                                <?php echo $row['subject_description']; ?></td>
                                                            <td class="pt-3 pb-3"><?php echo $row['day']; ?></td>
                                                            <td class="pt-3 pb-3"><?php echo $row['time']; ?></td>
                                                            <td class="pt-3 pb-3"><?php echo $row['room']; ?></td>
                                                            <td class="pt-3 pb-3"><?php if (empty($row['fullname'])) {
                                                                                            echo "TBA";
                                                                                        } else {
                                                                                            echo $row['fullname'];
                                                                                        }  ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <?php

                                                    $get_enrolled_sub = mysqli_query($conn, "SELECT COUNT(sub.subject_id) AS csub FROM tbl_enrolled_subjects AS ensub
                                                    LEFT JOIN tbl_schedules AS sched ON sched.schedule_id = ensub.schedule_id
                                                    LEFT JOIN tbl_students AS stud ON stud.student_id = ensub.student_id
                                                    LEFT JOIN tbl_subjects AS sub ON sub.subject_id = sched.subject_id
                                                    LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                                                    LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                                    WHERE stud.student_id = $stud_id AND sched.semester = '0'") or die(mysqli_error($conn));
                                                    $index = 0;
                                                    while ($row = mysqli_fetch_array($get_enrolled_sub)) {
                                                        if (!empty($row['csub'])) { ?>

                                                    <tfoot>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>Total Subjects:</td>
                                                                <td><?php echo '(' . $row['csub'] . ')' ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </tfoot>
                                                    <?php }
                                                    } ?>
                                                </table>
                                                <?php if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") { ?>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <?php if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar") { ?>
                                                        <a href="../bedlp-enrollment/list.pending.php?"
                                                            class="btn btn-secondary p-2">
                                                            <?php } else { ?>
                                                            <a href="../bedlp-enrollment/list.pending.php"
                                                                class="btn btn-secondary p-2">
                                                                <?php } ?>
                                                                <i class="fa fa-arrow-circle-left">
                                                                </i>
                                                                Back</a>
                                                    </div>


                                                    <div class="ml-auto mr-1">
                                                        <a href="list.offeredSub.k-10.php?stud_id=<?php echo $stud_id; ?>"
                                                            class="btn btn-info p-2"><i class="fa fa-plus">
                                                            </i>
                                                            Add Subjects</a>



                                                        <button name="submit" class="btn btn-danger p-2"><i
                                                                class="fa fa-trash-alt">
                                                            </i>
                                                            Drop Selected</a>
                                                        </button>
                                                    </div>

                                                </div>
                                                <?php  } elseif ($_SESSION['role'] == "Student") {
                                                    if ($remark == 'Canceled' || $remark == 'Pending') { ?>
                                                <hr>
                                                <div class="row justify-content-end float-right">
                                                    <div class="ml-1">
                                                        <a href="list.offeredSub.k-10.php" class="btn btn-info p-2"><i
                                                                class="fa fa-plus">
                                                            </i>
                                                            Add Subjects</a>
                                                    </div>

                                                    <div class="ml-2">
                                                        <button name="submit" class="btn btn-danger p-2"><i
                                                                class="fa fa-trash-alt">
                                                            </i>
                                                            Drop Selected</a>
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php }
                                                } ?>
                                        </form>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
            </div>

            </section>

        </div>

    </div>

    <!-- Footer-->
    <?php include '../../includes/bedlp-footer.php';  ?>

    </div>
    <?php include '../../includes/bedlp-script.php'; ?>
    <script>
    $('#dt3').dataTable({
        "paging": false,
        "searching": false,
        "info": false
    });

    $("#alertDel").delay(2000).fadeOut();

    var checkboxes = document.querySelectorAll("input [type = 'checkbox']");

    function checkAll(myCheckbox) {
        if (myCheckbox.checked == true) {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        } else {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            })
        }
    }
    </script>


</body>

</html>