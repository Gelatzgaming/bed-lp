<?php $par_page = "Data Entry";
$cur_page = "Set Schedules"; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Offer/Open Subjects | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $sen_id = $_GET['sen_id'];


    $get_senID = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior WHERE subject_id = '$sen_id'");
    $result = mysqli_num_rows($get_senID);
    if ($result > 0) {
        $_SESSION['sen_id'] = $sen_id;
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
                                        <h4 class="header-title">Set Schedules for Senior High School
                                            Department</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <?php $get_subject = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior AS sub
                            LEFT JOIN tbl_strands AS strd ON strd.strand_id = sub.strand_id 
                            LEFT JOIN tbl_efacadyears AS eay on eay.efacadyear_id = sub.efacadyear_id
                            WHERE sub.subject_id = '$sen_id'") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($get_subject)) {
                                            $strand_n = $row['strand_name'];
                                            $eay = $row['efacadyear'];
                                        ?>
                                        <form action="./userData/ctrl.add.sched.senior.php" method="POST"
                                            enctype="multipart/form-data">


                                            <input value="<?php echo $act_acad; ?>" hidden name="acadyear">
                                            <input value="<?php echo $act_sem; ?> " hidden name="sem">
                                            <input value="<?php echo $sen_id; ?> " hidden name="sen_id">

                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Code</label>
                                                        <input class="form-control" type="text" name="code"
                                                            id="example-url-input" readonly
                                                            value="<?php echo $row['subject_code']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Description</label>
                                                        <input class="form-control" type="text" name="subject"
                                                            id="example-search-input" readonly
                                                            value="<?php echo $row['subject_description'] ?>">
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
                                                        <select class="form-control form-control-lg"
                                                            data-placeholder="Select Instructor"
                                                            data-dropdown-css-class="select2-info" name="instruct">
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
                                                <?php if ($strand_n == "ABM") {
                                                    } ?>

                                                <?php if ($strand_n == "ABM") {
                                                        echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?abm=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($strand_n == "STEM") {
                                                        echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?stem=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($strand_n == "GAS") {
                                                        echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?gas=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($strand_n == "HUMSS") {
                                                        echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?humss=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                                    } elseif ($strand_n == "TVL - HE") {
                                                        echo '<a href=" ../bedlp-subjects/list.offerSub.senior.php?tvl=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
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