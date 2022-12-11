<?php $par_page = "Data Entry";
$cur_page = "Add Subjects" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Add Subjects | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php'; ?>

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
            } elseif (!empty($_SESSION['subject_exists'])) {
                echo ' <div class="alert-dismiss">
                                                <div class="alert alert-danger alert-dismissible fade show py-3 text-center"
                                                    role="alert">
                                                    <strong>Subject Already Exists.</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </div>
                                            </div> ';
                unset($_SESSION['subject_exists']);
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
                                        <h4 class="header-title">Add Subject for Senior High School
                                            Department</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <form action="./userData/ctrl.add.sub.senior.php" method="POST"
                                            enctype="multipart/form-data">



                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Code</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter Subject Code" name="subject_code"
                                                            id="example-url-input" required
                                                            value="<?php
                                                                                                                                                                                            if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                                echo  $_SESSION['prev_data'][1];
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Description</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter Subject Description"
                                                            name="subject_description" id="example-search-input"
                                                            required
                                                            value="<?php
                                                                                                                                                                                                                if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                                                    echo  $_SESSION['prev_data'][2];
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Lecture
                                                            Unit(s)</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter No. of Unit(s)" name="lec_units"
                                                            id="example-url-input" required
                                                            value="<?php
                                                                                                                                                                                            if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                                echo  $_SESSION['prev_data'][1];
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Laboratory
                                                            Unit(s)</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter No. of Unit(s)" name="lab_units"
                                                            id="example-url-input" required
                                                            value="<?php
                                                                                                                                                                                            if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                                echo  $_SESSION['prev_data'][1];
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Total
                                                            Unit(s)</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter Total Unit(s)" name="total_units"
                                                            id="example-search-input" required
                                                            value="<?php
                                                                                                                                                                                                if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                                    echo  $_SESSION['prev_data'][2];
                                                                                                                                                                                                }
                                                                                                                                                                                                ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Pre-Requisites</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter Pre-Requisites" name="prerequisites"
                                                            id="example-url-input" required
                                                            value="<?php
                                                                                                                                                                                                if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                                    echo  $_SESSION['prev_data'][1];
                                                                                                                                                                                                }
                                                                                                                                                                                                ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <label class="col-form-label">E.A.Y</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-info"
                                                            data-placeholder="Effective Academic Year" name="eay"
                                                            required>
                                                            <option value="" disabled selected>Select Effective Academic
                                                                Year</option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * FROM tbl_efacadyears ");
                                                            while ($row2 = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $row2['efacadyear_id'] . '">' . $row2['efacadyear'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">
                                                            Semester </label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-info"
                                                            data-placeholder="Select Semester" name="semester" required>
                                                            <option value="" disabled selected>Select Semester</option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * from tbl_semesters");
                                                            while ($row2 = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $row2['semester_id'] . '">' . $row2['semester'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">
                                                            Grade Level </label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-info"
                                                            data-placeholder="Select Grade Level" name="grade_level"
                                                            required>
                                                            <option value="" disabled selected>Select Grade Level
                                                            </option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * from tbl_grade_levels LIMIT 13, 2");
                                                            while ($row2 = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $row2['grade_level_id'] . '">' . $row2['grade_level'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">
                                                            Strand </label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-info"
                                                            data-placeholder="Select Strand" name="strand_name"
                                                            required>
                                                            <option value="" disabled selected>Select Strand</option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * from tbl_strands");
                                                            while ($row2 = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $row2['strand_id'] . '">' . $row2['strand_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>




                                <button type="submit" name="submit"
                                    class="btn btn-primary mb-3 mt-3 float-right">Submit</button>
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