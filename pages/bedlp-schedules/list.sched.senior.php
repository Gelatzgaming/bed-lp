<?php $par_page = "Maintenance";
$cur_page = "Schedule List";

if (!empty($_GET['eay'])) {
    $efacadyear = $_GET['eay'];
}


if (isset($_GET['stem'])) {
    $str_name = $_GET['stem'];
} elseif (isset($_GET['abm'])) {
    $str_name = $_GET['abm'];
} elseif (isset($_GET['gas'])) {
    $str_name = $_GET['gas'];
} elseif (isset($_GET['humss'])) {
    $str_name = $_GET['humss'];
} elseif (isset($_GET['tvl'])) {
    $str_name = $_GET['tvl'];
}

?>


<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Class Schedule | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php'; ?>

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
                                    <h4 class="header-title">Class Schedule for Senior High School

                                        <?php if (isset($_GET['stem'])) {
                                            echo '(STEM)';
                                        } elseif (isset($_GET['abm'])) {
                                            echo ' (ABM)';
                                        } elseif (isset($_GET['gas'])) {
                                            echo ' (GAS)';
                                        } elseif (isset($_GET['humss'])) {
                                            echo ' (HUMSS)';
                                        } elseif (isset($_GET['tvl'])) {
                                            echo ' (TVL-HE)';
                                        } else {
                                            echo '';
                                        } ?>

                                    </h4>
                                    <form method="GET">

                                        <div class="row justify-content-center">

                                            <button class="btn btn-dark mb-6 ml-1" value="STEM" name="stem">
                                                <i class="fa fa-users"></i> STEM
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="ABM" name="abm">
                                                <i class="fa fa-users"></i> ABM
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="GAS" name="gas">
                                                <i class="fa fa-users"></i> GAS
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="HUMMS" name="humms">
                                                <i class="fa fa-users"></i> HUMMS
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="TVL - HE" name="tvl">
                                                <i class="fa fa-users"></i> TVL
                                            </button>
                                        </div>


                                    </form>
                                    <hr class="bg-black">
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-center" style="width: 100%;">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Units</th>
                                                    <th>Day</th>
                                                    <th>Time</th>
                                                    <th>Room</th>
                                                    <th>Professor</th>
                                                    <th>Pre-Requisites</th>
                                                    <th>Grade Level</th>
                                                    <th>Semester</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($str_name)) {

                                                    $get_sched = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teacher_lname) AS fullname FROM tbl_schedules AS sched
                                                    LEFT JOIN tbl_subjects_senior AS subsen ON subsen.subject_id = sched.subject_id
                                                    LEFT JOIN tbl_strands AS strd ON strd.strand_id = subsen.strand_id
                                                    LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = subsen.grade_level_id
                                                    LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                                WHERE strd.strand_name IN ('$str_name') AND sched.semester IN ('$act_sem') AND sched.acadyear = '$act_acad' ORDER BY gl.grade_level ASC, sched.subject_id") or die(mysqli_error($conn));

                                                ?>


                                                <tr>
                                                    <?php while ($row = mysqli_fetch_array($get_sched)) {
                                                            $sen_id = $row['subject_id'];
                                                            $sched_id = $row['schedule_id'];

                                                        ?>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_description']; ?></td>
                                                    <td><?php echo $row['total_units']; ?></td>
                                                    <td><?php echo $row['day']; ?></td>
                                                    <td><?php echo $row['time']; ?></td>
                                                    <td><?php echo $row['room']; ?></td>
                                                    <td><?php if (!empty($row['fullname'])) {
                                                                    echo $row['fullname'];
                                                                } else {
                                                                    echo 'TBA';
                                                                } ?>
                                                    </td>
                                                    <td><?php echo $row['pre_requisites']; ?></td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><?php echo $row['semester']; ?></td>
                                                    <td><a href="edit.sched.senior.php<?php echo '?sen_id=' . $sen_id . '&sched_id=' . $sched_id; ?>"
                                                            type="button" class="btn btn-info m-1"><i
                                                                class="fa fa-edit"></i>
                                                            Update
                                                        </a>

                                                        <button type="button" class="btn btn-danger mx-1"
                                                            data-toggle="modal"
                                                            data-target="#delete<?php echo $row['sen_id'] ?>"><i
                                                                class="fa fa-trash"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                <!-- Delete modal start -->
                                                <div class="modal fade" id="delete<?php echo $row['subject_id'] ?>">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body text-center my-5">
                                                                <p>Are you sure you want to delete,
                                                                    <?php echo $row['subject_code'] . ', ' . $row['subject_description']; ?>?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <a href="userData/ctrl.del.sched.senior.php?sen_id=<?php echo $row['sen_id']; ?>"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </tr>
                                                <!-- Delete modal end -->
                                                <?php } ?>

                                                <?php } ?>

                                            </tbody>
                                        </table>
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