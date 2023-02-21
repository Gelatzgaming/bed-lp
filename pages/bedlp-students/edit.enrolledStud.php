<?php $par_page = "Enrollment";
$cur_page = "Edit Students" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Edit Student Details | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $stud_id = $_GET['stud_id'];
    $_SESSION['student_id'] = $stud_id;

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
                                                    <button type="button" class="close" data-dismiss="alert py-3 text-center"
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
                                        <h4 class="header-title">Update Student Details</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <?php $get_enrolled_stud = mysqli_query($conn, "SELECT *, CONCAT(stud.student_lname, ', ', stud.student_fname,' ', stud.student_mname) AS fullname
                            FROM tbl_schoolyears AS sy
                            LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
                            LEFT JOIN tbl_strands AS stds ON stds.strand_id = sy.strand_id
                            LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                            LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id =sy.grade_level_id
                            LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id  
                            WHERE sy.student_id = '$stud_id' AND ay.academic_year = '$act_acad' AND (sem.semester = '$act_sem' OR sy.semester_id = '0')") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($get_enrolled_stud)) {
                                        ?>
                                        <form action="./userData/user.edit.enrolledStud.php" method="POST"
                                            enctype="multipart/form-data">

                                            <input type="text" name="stud_id" value="<?php echo $row['student_id']; ?>"
                                                hidden>

                                            <input type="text" name="acadyear" value="<?php echo $row['ay_id']; ?>"
                                                hidden>
                                            <?php $get_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
                                                while ($row2 = mysqli_fetch_array($get_sem)) { ?>
                                            <input type="text" name="sem" value="<?php echo $row2['semester_id']; ?>"
                                                hidden>
                                            <?php } ?>

                                            <div class="row justify-content-center">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Student
                                                            ID</label>
                                                        <input class="form-control" type="text" placeholder="Student ID"
                                                            name="studno" id="example-url-input"
                                                            value="<?php echo $row['stud_no'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Name</label>
                                                        <input class="form-control" type="text" placeholder="Name"
                                                            name="name" id="example-search-input"
                                                            value="<?php echo $row['fullname'] ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Grade
                                                            Level</label>
                                                        <select class="form-control form-control-lg"
                                                            data-placeholder="Select Grade Level"
                                                            data-dropdown-css-class="select2-purple" name="grade_level"
                                                            required>
                                                            <option value="<?php echo $row['grade_level_id']; ?>">
                                                                <?php echo $row['grade_level']; ?></option>
                                                            <?php $get_grdlvl = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN ('$row[grade_level_id]')");
                                                                while ($row2 = mysqli_fetch_array($get_grdlvl)) {
                                                                ?>
                                                            <option value="<?php echo $row2['grade_level_id']; ?>">
                                                                <?php echo $row2['grade_level'];
                                                                } ?>
                                                            </option>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Student
                                                            Type</label>
                                                        <select class="form-control form-control-lg"
                                                            data-placeholder="Select Type"
                                                            data-dropdown-css-class="select2-purple" name="stud_type"
                                                            required>

                                                            <?php if ($row['stud_type'] == 'Transferee') {
                                                                    echo '<option value="' . $row['stud_type'] . '">'
                                                                        . $row['stud_type'] . '</option>';
                                                                } else {
                                                                    echo ' <option value="' . $row['stud_type'] . '">'
                                                                        . $row['stud_type'] . ' Student</option>';
                                                                } ?>

                                                            <?php if ($row['stud_type'] == 'New') {
                                                                    echo '<option value="Old">Old Student</option>
                                                        <option value="Transferee">Transferee</option>';
                                                                } else if ($row['stud_type'] == 'Old') {
                                                                    echo ' <option value="New">New Student</option>
                                                        <option value="Transferee">Transferee</option>';
                                                                } else if ($row['stud_type'] == 'Transferee') {
                                                                    echo ' <option value="New">New Student</option>
                                                        <option value="Old">Old Student</option>';
                                                                } ?>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Strand</label>
                                                        <select class="form-control form-control-lg"
                                                            data-placeholder="Select Strand (for Senior High Student)"
                                                            data-dropdown-css-class="select2-purple" name="strand">

                                                            <option value="<?php echo $row['strand_id']; ?>" selected
                                                                disabled>
                                                                <?php echo $row['strand_def']; ?>Select Strand (for
                                                                Senior
                                                                High Student) </option>
                                                            <?php $get_strand = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id NOT IN ('$row[strand_id]')");
                                                                while ($row3 = mysqli_fetch_array($get_strand)) {
                                                                ?> <option value="<?php echo $row3['strand_id']; ?>">
                                                                <?php echo $row3['strand_def'];
                                                                } ?></option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Section</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Section of a Student" name="section"
                                                            id="example-search-input"
                                                            value="<?php echo $row['section'] ?>">
                                                    </div>

                                                </div>

                                            </div>



                                            <?php } ?>
                                    </div>
                                </div>




                                <button type="submit" name="submit" class="btn btn-primary mb-3 mt-3 float-right">Update
                                    Details</button>

                                <div class="justify-content-end mr-2">
                                    <?php if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar") { ?>
                                    <a href="../bedlp-enrollment/list.pending.php?" class="btn btn-secondary mb-3">
                                        <?php  } else { ?>
                                        <a href="../bedlp-enrollment/list.pending.php" class="btn btn-secondary mb-3">

                                            <?php } ?>

                                            <i class="fa fa-arrow-circle-left"></i>
                                            Back</a>
                                </div>
                                </form>
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