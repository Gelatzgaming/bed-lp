<?php $par_page = "Data Entry";
$cur_page = "Edit Schedules"; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Offer/Open Subjects | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $sub_id = $_GET['sub_id'];
    $sched_id = $_GET['sched_id'];


    $get_subID = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE subject_id = '$sub_id' AND schedule_id = '$sched_id'");
    $result = mysqli_num_rows($get_subID);
    if ($result > 0) {
        $_SESSION['sub_id'] = $sub_id;
        $_SESSION['sched_id'] = $sched_id;
    } else {
        header('location: ../bed-404/page404.php');
    }



    ?>

<body>
    <div class="page-container">

        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">

            <?php include '../../includes/bedlp-navbar.php';


            if (!empty($_SESSION['errors'])) {
                echo ' <div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show py-3 text-center"
        role="alert">
     ';
                foreach ($_SESSION['errors'] as $error) {
                    echo $error;
                }
                echo '
        <button type="button" class="close" data-dismiss="alert"
            aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>';
                unset($_SESSION['errors']);
            } elseif (!empty($_SESSION['success'])) {
                echo ' <div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show py-3 text-center"
        role="alert">
        <strong>Successfully Added.</strong>
        <button type="button" class="close" data-dismiss="alert"
            aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div> ';
                unset($_SESSION['success']);
            } elseif (!empty($_SESSION['success-edit'])) {
                echo ' <div class="alert alert-info alert-dismissible fade show py-3 text-center" role="alert">
                <strong>Successfully Edited</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div> ';
                unset($_SESSION['success-edit']);
            }





            ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-4">


                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid pl-5 pr-5 pb-3">
                        <!-- main content pt.2 -->
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Edit Class Schedules for Primary to Junior High School
                                            Department</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <?php

                                        $get_subject = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teacher_lname) AS fullname FROM tbl_schedules AS sched
                             LEFT JOIN tbl_subjects AS sub ON sub.subject_id = sched.subject_id
                             LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                             LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                            WHERE sched.subject_id = '$sub_id' AND sched.semester = 0 AND sched.schedule_id = '$_SESSION[sched_id]' AND acadyear = '$act_acad'") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($get_subject)) {
                                            $grd_lvl = $row['grade_level'];

                                        ?>
                                        <form action="./userData/ctrl.list.sched.k-10.php" method="POST"
                                            enctype="multipart/form-data">

                                            <div class="row">
                                                <?php
                                                    $sem = 0
                                                    ?>

                                                <input value="<?php echo $act_acad; ?>" hidden name="acadyear">
                                                <input value="<?php echo $sem; ?> " hidden name="sem">
                                                <input value="<?php echo $sub_id; ?> " hidden name="sub_id">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Code</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter Subject Code" name="subj_code"
                                                            id="example-url-input" readonly
                                                            value=" <?php echo $row['subject_code']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Description</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter Subject Description"
                                                            name="subj_description" id="example-search-input" readonly
                                                            value=" <?php echo $row['subject_description'] ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Days</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="M, T, W, TH, F" name="days"
                                                            id="example-url-input" value=" <?php echo $row['day']; ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Time</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="hh:mm - hh:mm AM/PM" name="time"
                                                            id="example-search-input"
                                                            value=" <?php echo $row['time']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Room</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter a Room name" name="room"
                                                            id="example-search-input"
                                                            value="<?php echo $row['room']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Instructor</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-info"
                                                            data-placeholder="Select Instructor" name="instruct">

                                                            <option selected value="<?php echo $row['teacher_id']; ?>">
                                                                <?php echo $row['fullname'];
                                                                    ?></option>
                                                            <?php $get_teachers = mysqli_query($conn, "SELECT *, CONCAT(tbl_teachers.teacher_fname, ' ', LEFT(tbl_teachers.teacher_mname,1), '. ', tbl_teachers.teacher_lname) AS fullname FROM tbl_teachers WHERE teacher_id NOT IN ('$row[teacher_id]')") or die(mysqli_error($conn));
                                                                while ($row2 = mysqli_fetch_array($get_teachers)) {
                                                                ?>
                                                            <option value="<?php echo $row2['teacher_id']; ?>">
                                                                <?php echo $row2['fullname'];
                                                                } ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>






                                            <button type="submit" name="submit"
                                                class="btn btn-info mb-3 mt-3 float-left"><i class="fa fa-check"></i>
                                                Submit</button>

                                            <div class="justify-content-end mb-3 mt-3 p-0 float-right">
                                                <?php if ($grd_lvl == "Grade 1") {
                                                        echo '<a href=" list.sched.k-10.php?g1=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 2") {
                                                        echo '<a href=" list.sched.k-10.php?g2=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 3") {
                                                        echo '<a href=" list.sched.k-10.php?g3=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 4") {
                                                        echo '<a href=" list.sched.k-10.php?g4=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 5") {
                                                        echo '<a href=" list.sched.k-10.php?g5=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 6") {
                                                        echo '<a href=" list.sched.k-10.php?g6=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 7") {
                                                        echo '<a href=" list.sched.k-10.php?g7=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 8") {
                                                        echo '<a href=" list.sched.k-10.php?g8=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 9") {
                                                        echo '<a href=" list.sched.k-10.php?g9=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Grade 10") {
                                                        echo '<a href=" list.sched.k-10.php?g10=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Nursery") {
                                                        echo '<a href=" list.sched.k-10.php?nurs=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Pre-Kinder") {
                                                        echo '<a href=" list.sched.k-10.php?pkdr=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($grd_lvl == "Kinder") {
                                                        echo '<a href=" list.sched.k-10.php?kdr=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                                    } ?>
                                                <i class="fa fa-arrow-circle-left"></i>
                                                Back</a>
                                            </div>


                                            <?php  } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
            </div>

            </section>

        </div>



        <!-- Footer-->
        <?php include '../../includes/bedlp-footer.php';  ?>
        <?php if (isset($_SESSION['dbl-sched'])) {
            echo "<script>
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('.swalDefaultError')
    Toast.fire({
        icon: 'error',
        title:  'Schedule already exists!'
    });
});
</script>";
        }
        unset($_SESSION['dbl-sched']); ?>

    </div>
    <!-- Script-->
    <?php include '../../includes/bedlp-script.php';


    unset($_SESSION['prev_data']);
    ?>

</body>

</html>