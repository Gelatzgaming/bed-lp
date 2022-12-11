<?php $par_page = "Data Entry";
$cur_page = "Set Schedules"; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Offer/Open Subjects | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $eay = $_GET['eay'];
    $_SESSION['eay'] = $eay;
    $strand_name = $_GET['str'];
    $_SESSION['strand_n'] = $strand_name;

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
                                        <h4 class="header-title">Add Petitioned Subjects for
                                            <?php if ($strand_name == 'STEM') {
                                                echo '(STEM)';
                                            } elseif ($strand_name == 'ABM') {
                                                echo ' (ABM)';
                                            } elseif ($strand_name == 'GAS') {
                                                echo ' (GAS)';
                                            } elseif ($strand_name == 'HUMSS') {
                                                echo ' (HUMSS)';
                                            } elseif ($strand_name == 'TVL - HE') {
                                                echo ' (TVL-HE)';
                                            } else {
                                                header('location: ../bed-404/page404.php');
                                            } ?>
                                        </h4>

                                        <form action="./userData/ctrl.add.petitioned.senior.php" method="POST"
                                            enctype="multipart/form-data">


                                            <input value="<?php echo $acadyear; ?>" hidden name="acadyear">
                                            <input value="<?php echo $sem; ?> " hidden name="sem">

                                            <div class="row  justify-content-center">




                                                <div class="input-group col-md-8 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>Code & Subject &
                                                                Level</b></span>
                                                    </div>
                                                    <select class="form-control form-control-lg"
                                                        data-placeholder="Select a Subject"
                                                        data-dropdown-css-class="select2-info" name="sub" required>
                                                        <option value="" selected disabled>Select Subject</option>

                                                        <?php
                                                        $active_sem = $_SESSION['active_semester'];
                                                        $get_offersub = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior AS subsen LEFT JOIN tbl_strands AS strd ON strd.strand_id = subsen.strand_id 
                                                LEFT JOIN tbl_semesters AS sem ON sem.semester_id = subsen.semester_id 
                                                LEFT JOIN tbl_efacadyears AS eay ON eay.efacadyear_id = subsen.efacadyear_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = subsen.grade_level_id
                                                WHERE sem.semester NOT IN ('$active_sem') AND strd.strand_name = '$strand_name' AND eay.efacadyear = '$eay'");
                                                        while ($row = mysqli_fetch_array($get_offersub)) {

                                                        ?>
                                                        <option value="<?php echo $row['subject_id']; ?>">
                                                            <?php echo $row['subject_code'] . ' - ', ' ' . $row['subject_description'] . ' - (' . $row['semester'] . ') - (' . $row['grade_level'] . ')'; ?>
                                                        </option>

                                                        <?php } ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Days</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="M, T, W, TH, F" name="days"
                                                            id="example-url-input" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Time</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="hh:mm - hh:mm AM/PM" name="time"
                                                            id="example-search-input" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Room</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter a Room name" name="room"
                                                            id="example-search-input" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Instructor</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-info"
                                                            data-placeholder="Select Instructor" name="instruc">
                                                            <option value="" selected disabled></option>
                                                            <?php $get_teachers = mysqli_query($conn, "SELECT *, CONCAT(tbl_teachers.teacher_fname, ' ', LEFT(tbl_teachers.teacher_mname,1), '. ', tbl_teachers.teacher_lname) AS fullname FROM tbl_teachers") or die(mysqli_error($conn));
                                                            while ($row = mysqli_fetch_array($get_teachers)) {
                                                            ?>
                                                            <option value="<?php echo $row['teacher_id']; ?>">
                                                                <?php echo $row['fullname'];
                                                            } ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>






                                            <button type="submit" name="submit"
                                                class="btn btn-info mb-3 mt-3 float-left"><i class="fa fa-check"></i>
                                                Submit</button>

                                            <div class="justify-content-end mb-3 mt-3 p-0 float-right">
                                                <?php if ($strand_name == "ABM") {
                                                    echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?abm=' . $strand_name . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                } elseif ($strand_name == "STEM") {
                                                    echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?stem=' . $strand_name . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                } elseif ($strand_name == "GAS") {
                                                    echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?gas=' . $strand_name . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                } elseif ($strand_name == "HUMSS") {
                                                    echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?humss=' . $strand_name . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                } elseif ($strand_name == "TVL - HE") {
                                                    echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?tvl=' . $strand_name . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                } ?>
                                                <i class="fa fa-arrow-circle-left"></i>
                                                Back</a>
                                            </div>



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