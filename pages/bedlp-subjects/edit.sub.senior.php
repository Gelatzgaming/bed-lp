<?php $par_page = "Maintenance";
$cur_page = "Subject List";


?>


<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Senior High Subjects List | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $sen_id = $_GET['sen_id'];


    ?>

<body>
    <div class="page-container">
        <?php $page = "dataTables"; ?>
        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">

            <?php include '../../includes/bedlp-navbar.php';
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
            } elseif (!empty($_SESSION['success-edit'])) {
                echo ' <div class="alert alert-info alert-dismissible fade show py-3 text-center" role="alert">
                                                    <strong>Successfully Edited</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </div> ';
                unset($_SESSION['success-edit']);
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
                        <!-- Dark table start -->
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Update Subjects for Senior High School Department</h4>
                                    <?php
                                    $get_subInfo = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior 
                            LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
                            LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
                            LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
                            LEFT JOIN tbl_efacadyears ON tbl_efacadyears.efacadyear_id = tbl_subjects_senior.efacadyear_id
                            WHERE subject_id = '$sen_id'");

                                    while ($row = mysqli_fetch_array($get_subInfo)) {
                                        $strand_n = $row['strand_name'];
                                        $eay = $row['efacadyear']; ?>
                                    <form action="userData/ctrl.edit.sub.senior.php" method="POST"
                                        enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Code</label>
                                                    <input value="<?php echo $_GET['sen_id']; ?>" type="text"
                                                        name="sen_id" hidden>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Subject Code" name="subject_code"
                                                        id="example-url-input" required
                                                        value="<?php echo $row['subject_code']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input"
                                                        class="col-form-label">Description</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Subject Description"
                                                        name="subject_description" id="example-url-input" required
                                                        value="<?php echo $row['subject_description']; ?>" required>
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
                                                        value="<?php echo $row['lec_units']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Laboratory
                                                        Unit(s)</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter No. of Unit(s)" name="lab_units"
                                                        id="example-url-input" required
                                                        value="<?php echo $row['lab_units']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Total
                                                        Unit(s)</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Total Unit(s)" name="total_units"
                                                        id="example-search-input" required
                                                        value="<?php echo $row['total_units']; ?>">
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
                                                        value="<?php echo $row['pre_requisites']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label class="col-form-label">E.A.Y</label>
                                                    <select class="form-control form-control-lg"
                                                        data-dropdown-css-class="select2-info"
                                                        data-placeholder="Effective Academic Year" name="eay" required>
                                                        <option value="<?php echo $row['efacadyear_id']; ?>">
                                                            <?php echo $row['efacadyear']; ?></option>
                                                        <?php $result = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear_id NOT IN (" . $row['efacadyear_id'] . ") ");
                                                            while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['efacadyear_id']; ?>">
                                                            <?php echo $row2['efacadyear'];
                                                            } ?></option>
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
                                                        <option value="" disabled>Select Semester</option>
                                                        <option value="<?php echo $row['semester_id']; ?>">
                                                            <?php echo $row['semester']; ?></option>
                                                        <?php $result = mysqli_query($conn, "SELECT * FROM tbl_semesters WHERE semester_id NOT IN (" . $row['semester_id'] . ") ");
                                                            while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['semester_id']; ?>">
                                                            <?php echo $row2['semester'];
                                                            } ?></option>
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
                                                        <option value="" disabled>Select Grade Level</option>
                                                        <option value="<?php echo $row['grade_level_id']; ?>">
                                                            <?php echo $row['grade_level']; ?></option>
                                                        <?php $result = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN (" . $row['grade_level_id'] . ") LIMIT 13, 2");
                                                            while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['grade_level_id'] ?>">
                                                            <?php echo $row2['grade_level'];
                                                            } ?></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        Strand </label>
                                                    <select class="form-control form-control-lg"
                                                        data-dropdown-css-class="select2-info"
                                                        data-placeholder="Select Strand" name="strand_name" required>
                                                        <option value="" disabled>Select Strand</option>
                                                        <option value="<?php echo $row['strand_id'] ?>">
                                                            <?php echo $row['strand_name'] ?></option>
                                                        <?php $result = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id NOT IN (" . $row['strand_id'] . ")");
                                                            while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['strand_id']; ?>">
                                                            <?php echo $row2['strand_name'];
                                                            } ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>





                                        <button type="submit" name="submit"
                                            class="btn btn-primary mb-3 mt-3 float-left">Update</button>

                                        <div class="justify-content-end mb-3 mt-3 p-0 float-right"> <?php if ($strand_n == "ABM") {
                                                                                                            echo '<a href=" list.sub.senior.php?abm=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                                                                        } elseif ($strand_n == "STEM") {
                                                                                                            echo '<a href=" list.sub.senior.php?stem=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                                                                        } elseif ($strand_n == "GAS") {
                                                                                                            echo '<a href=" list.sub.senior.php?gas=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                                                                        } elseif ($strand_n == "HUMSS") {
                                                                                                            echo '<a href=" list.sub.senior.php?humss=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                                                                        } elseif ($strand_n == "TVL - HE") {
                                                                                                            echo '<a href=" list.sub.senior.php?tvl=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                                                                        } ?>

                                            <i class="fa fa-arrow-circle-left "></i>
                                            Back </a>
                                        </div>
                                    </form>
                                    <?php } ?>
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
    $("#alertDel").delay(2000).fadeOut();
    </script>


</body>

</html>