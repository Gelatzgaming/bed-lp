<?php $par_page = "Enroll Now";
$cur_page = "Enrollment" ?>

<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Enroll Now | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';
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
        header('location: ../bedlp-subjects/list.enrolledSub.k-10.php');
    } else {

        $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
        $result2 = mysqli_num_rows($get_level_id);

        if ($result2 > 0) {
            header('location: ../bedlp-subjects/list.enrolledSub.senior.php');
        }
    }
    ?>

<body>
    <div class="page-container">

        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">

            <?php include '../../includes/bedlp-navbar.php'; ?>

            <?php
            if (!empty($_SESSION['errors'])) {
                echo ' <div class="alert-dismiss">
                                                <div class="alert alert-danger alert-dismissible fade show"
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
                                                <div class="alert alert-success alert-dismissible fade show"
                                                    role="alert">
                                                    <strong>Successfully Added.</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </div>
                                            </div> ';
                unset($_SESSION['success']);
            }
            if (!empty($_SESSION['success-edit'])) {
                echo '  <div class="alert alert-info alert-dismissible fade show py-3 text-center" role="alert">
                <strong>Successfully Edited</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>';
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
                                        <h4 class="header-title">Enrollment Form</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <?php $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname,' ', tbl_students.student_mname) AS fullname FROM tbl_students WHERE student_id = '$stud_id'");
                                        while ($row = mysqli_fetch_array($get_stud)) {
                                        ?>
                                        <form action="userData/user.add.enroll.php" method="POST"
                                            enctype="multipart/form-data">

                                            <input type="text" name="stud_id" value="<?php echo $row['student_id']; ?>"
                                                hidden>

                                            <?php $get_act_acad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
                                                while ($row2 = mysqli_fetch_array($get_act_acad)) {
                                                    echo '<input type="text" name="acadyear" value="' . $row2['ay_id'] . '" hidden>';
                                                }
                                                ?>

                                            <?php $get_act_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
                                                while ($row2 = mysqli_fetch_array($get_act_sem)) {
                                                    echo '<input type="text" name="sem" value="' . $row2['semester_id'] . '" hidden>';
                                                }
                                                ?>

                                            <input type="text" name="remark" value="Pending" hidden>

                                            <input class="form-control" type="text" name="student_id"
                                                value="<?php echo $row['student_id']; ?>" hidden>
                                            <div class="row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Student
                                                            ID</label>
                                                        <input type="text" class="form-control" name="studno"
                                                            placeholder="Student ID"
                                                            value="<?php echo $row['stud_no'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name" value="<?php echo $row['fullname'] ?>"
                                                            readonly>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php } ?>
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Grade
                                                            Level</label>
                                                        <select class="form-control form-control-lg"
                                                            data-placeholder="Select Grade Level"
                                                            data-dropdown-css-class="select2-lightblue"
                                                            name="grade_level" required>
                                                            <option value="" selected disabled>Select Grade Level
                                                            </option>
                                                            <?php $get_grdlvl = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                            while ($row = mysqli_fetch_array($get_grdlvl)) {
                                                            ?>
                                                            <option value="<?php echo $row['grade_level_id']; ?>">
                                                                <?php echo $row['grade_level'];
                                                            } ?>
                                                            </option>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Student
                                                            Type</label>
                                                        <select class="form-control form-control-lg"
                                                            data-placeholder="Select Type"
                                                            data-dropdown-css-class="select2-lightblue" name="stud_type"
                                                            required>
                                                            <option value="" selected disabled>Select Type</option>
                                                            <option value="New">New Student</option>
                                                            <option value="Old">Old Student</option>
                                                            <option value="Transferee">Transferee</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="col-form-label">Strand</label>
                                                        <select class="form-control form-control-lg"
                                                            data-placeholder="Select Strand (for Senior High Student)"
                                                            data-dropdown-css-class="select2-lightblue" name="strand">
                                                            <option value="" selected disabled>Select Strand (for Senior
                                                                High Student)</option>
                                                            <?php $get_strand = mysqli_query($conn, "SELECT * FROM tbl_strands");
                                                            while ($row = mysqli_fetch_array($get_strand)) {
                                                            ?> <option value="<?php echo $row['strand_id']; ?>">
                                                                <?php echo $row['strand_def'];
                                                            } ?></option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" name="submit"
                                                class="btn btn-primary mb-3 mt-3 float-right"><i
                                                    class="fa fa-check"></i> Enroll Now</button>
                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </section>

            </div>

        </div>

        <!-- Footer-->
        <?php include '../../includes/bedlp-footer.php';  ?>

    </div>
    <!-- Script-->
    <?php include '../../includes/bedlp-script.php';


    unset($_SESSION['prev_data']);
    ?>

</body>

</html>