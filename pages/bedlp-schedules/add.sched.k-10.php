<?php $par_page = "Data Entry";
$cur_page = "Set Schedules"; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Offer/Open Subjects | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $sub_id = $_GET['sub_id'];
    $get_subID = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE subject_id = '$sub_id'");
    $result = mysqli_num_rows($get_subID);
    if ($result > 0) {
        $_SESSION['sub_id'] = $sub_id;
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
                                        <h4 class="header-title">Set Schedules for Primary to Junior High School
                                            Department</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <?php $get_subject = mysqli_query($conn, "SELECT * FROM tbl_subjects AS sub
                            LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id 
                            WHERE sub.subject_id = '$sub_id'") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($get_subject)) {
                                            $gl = $row['grade_level'];
                                        ?>
                                        <form action="./userData/ctrl.add.sched.k-10.php" method="POST"
                                            enctype="multipart/form-data">

                                            <div class="row">


                                                <input value="<?php echo $acadyear; ?> " hidden name="acad">
                                                <input value="<?php echo $sub_id; ?> " hidden name="sub_id">
                                                <input value="<?php echo $row['grade_level_id']; ?>" hidden name="glvl">

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
                                                        <label class="col-form-label">Instructor</label>
                                                        <select class="form-control"
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
                                                <?php if ($gl == "Grade 1") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g1=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 2") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g2=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 3") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g3=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 4") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g4=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 5") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g5=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 6") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g6=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 7") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g7=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 8") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g8=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 9") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g9=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Grade 10") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g10=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Nursery") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?nurs=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Pre-Kinder") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?pkdr=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    } elseif ($gl == "Kinder") {
                                                        echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?kdr=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                    }  ?>
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