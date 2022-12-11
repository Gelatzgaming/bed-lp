<?php $par_page = "Data Entry";
$cur_page = "Edit Subjects";


?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Update Subjects | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $sub_id = $_GET['subject_id'];
    $_SESSION['subject_id'] = $sub_id;


    ?>

<body>
    <div class="page-container">

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
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Update Subjects for Primary to Junior High School
                                            Department</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <?php $get_sub = mysqli_query($conn, "SELECT * FROM tbl_subjects LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects.grade_level_id WHERE subject_id = '$sub_id'");
                                        while ($row = mysqli_fetch_array($get_sub)) {
                                            $gl = $row['grade_level'];
                                        ?>
                                        <form action="./userData/ctrl.edit.sub.k-10.php" method="POST"
                                            enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Code</label>
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
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Select Grade
                                                            Level</label>
                                                        <select class="form-control"
                                                            data-dropdown-css-class="select2-info"
                                                            data-placeholder="Select Grade Level" name="grade_level">

                                                            <option value="<?php echo $row['grade_level_id'] ?>"
                                                                selected>
                                                                <?php echo $row['grade_level'] ?></option>
                                                            <?php $get_grdlvl = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN (" . $row['grade_level_id'] . ") LIMIT 12");
                                                                while ($row2 = mysqli_fetch_array($get_grdlvl)) {
                                                                ?>
                                                            <option value="<?php echo $row2['grade_level_id']; ?>">
                                                                <?php echo $row2['grade_level'];
                                                                } ?></option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" name="submit"
                                                class="btn btn-primary mb-3 mt-3 float-left">Update</button>

                                            <div class="justify-content-end mb-3 mt-3 p-0 float-right"> <?php if ($gl == "Grade 1") {
                                                                                                                echo '<a href="list.sub.k-10.php?g1=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 2") {
                                                                                                                echo '<a href="list.sub.k-10.php?g2=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 3") {
                                                                                                                echo '<a href="list.sub.k-10.php?g3=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 4") {
                                                                                                                echo '<a href="list.sub.k-10.php?g4=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 5") {
                                                                                                                echo '<a href="list.sub.k-10.php?g5=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 6") {
                                                                                                                echo '<a href="list.sub.k-10.php?g6=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 7") {
                                                                                                                echo '<a href="list.sub.k-10.php?g7=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 8") {
                                                                                                                echo '<a href="list.sub.k-10.php?g8=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 9") {
                                                                                                                echo '<a href="list.sub.k-10.php?g9=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Grade 10") {
                                                                                                                echo '<a href="list.sub.k-10.php?g10=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Nursery") {
                                                                                                                echo '<a href="list.sub.k-10.php?nurs=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Pre-Kinder") {
                                                                                                                echo '<a href="list.sub.k-10.php?pkdr=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            } elseif ($gl == "Kinder") {
                                                                                                                echo '<a href="list.sub.k-10.php?kdr=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                            }  ?>
                                                <i class="fa fa-arrow-circle-left "></i>
                                                Back </a>
                                            </div>

                                        </form>
                                        <?php } ?>
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