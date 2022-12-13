<?php $par_page = "Maintenance";
$cur_page = "Schedule List";

if (!empty($_GET['eay'])) {
    $efacadyear = $_GET['eay'];
}

if (isset($_GET['g1'])) {
    $grd_lvl = $_GET['g1'];
} elseif (isset($_GET['g2'])) {
    $grd_lvl = $_GET['g2'];
} elseif (isset($_GET['g3'])) {
    $grd_lvl = $_GET['g3'];
} elseif (isset($_GET['g4'])) {
    $grd_lvl = $_GET['g4'];
} elseif (isset($_GET['g5'])) {
    $grd_lvl = $_GET['g5'];
} elseif (isset($_GET['g6'])) {
    $grd_lvl = $_GET['g6'];
} elseif (isset($_GET['g7'])) {
    $grd_lvl = $_GET['g7'];
} elseif (isset($_GET['g8'])) {
    $grd_lvl = $_GET['g8'];
} elseif (isset($_GET['g9'])) {
    $grd_lvl = $_GET['g9'];
} elseif (isset($_GET['g10'])) {
    $grd_lvl = $_GET['g10'];
} elseif (isset($_GET['nurs'])) {
    $grd_lvl = $_GET['nurs'];
} elseif (isset($_GET['pkdr'])) {
    $grd_lvl = $_GET['pkdr'];
} elseif (isset($_GET['kdr'])) {
    $grd_lvl = $_GET['kdr'];
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
                                    <h4 class="header-title">Class Schedule for Primary to Junior High School

                                        <?php if (isset($_GET['g1'])) {
                                            echo '(Grade 1)';
                                        } elseif (isset($_GET['g2'])) {
                                            echo ' (Grade 2)';
                                        } elseif (isset($_GET['g3'])) {
                                            echo ' (Grade 3)';
                                        } elseif (isset($_GET['g4'])) {
                                            echo ' (Grade 4)';
                                        } elseif (isset($_GET['g5'])) {
                                            echo ' (Grade 5)';
                                        } elseif (isset($_GET['g6'])) {
                                            echo ' (Grade 6)';
                                        } elseif (isset($_GET['g7'])) {
                                            echo ' (Grade 7)';
                                        } elseif (isset($_GET['g8'])) {
                                            echo ' (Grade 8)';
                                        } elseif (isset($_GET['g9'])) {
                                            echo ' (Grade 9)';
                                        } elseif (isset($_GET['g10'])) {
                                            echo ' (Grade 10)';
                                        } elseif (isset($_GET['nurs'])) {
                                            echo ' (Nursery)';
                                        } elseif (isset($_GET['pkdr'])) {
                                            echo ' (Pre-Kinder)';
                                        } elseif (isset($_GET['kdr'])) {
                                            echo ' (Kinder)';
                                        } else {
                                            echo '';
                                        } ?>

                                    </h4>
                                    <form method="GET">

                                        <div class="row justify-content-center">

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 1" name="g1">
                                                <i class="fa fa-users"></i> Grade 1
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 2" name="g2">
                                                <i class="fa fa-users"></i> Grade 2
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 3" name="g3">
                                                <i class="fa fa-users"></i> Grade 3
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 4" name="g4">
                                                <i class="fa fa-users"></i> Grade 4
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 5" name="g5">
                                                <i class="fa fa-users"></i> Grade 5
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 6" name="g6">
                                                <i class="fa fa-users"></i> Grade 6
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 7" name="g7">
                                                <i class="fa fa-users"></i> Grade 7
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 8" name="g8">
                                                <i class="fa fa-users"></i> Grade 8
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 9" name="g9">
                                                <i class="fa fa-users"></i> Grade 9
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Grade 10" name="g10">
                                                <i class="fa fa-users"></i> Grade 10
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Nursery" name="nurs">
                                                <i class="fa fa-users"></i> Nursery
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Pre-Kinder" name="pkdr">
                                                <i class="fa fa-users"></i> Pre-Kinder
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="Kinder" name="kdr">
                                                <i class="fa fa-users"></i> Kinder
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
                                                    <th>Day</th>
                                                    <th>Time</th>
                                                    <th>Room</th>
                                                    <th>Teacher</th>
                                                    <th>Grade Level</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($grd_lvl)) {


                                                    $get_sched = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teacher_lname) AS fullname FROM tbl_schedules AS sched
                                                    LEFT JOIN tbl_subjects AS sub ON sub.subject_id = sched.subject_id             
                                                    LEFT JOIN tbl_grade_levels AS gl1 ON gl1.grade_level_id = sched.grade_level_id
                                                    LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                                                    LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                                WHERE gl1.grade_level IN ('$grd_lvl') AND sched.semester = '0' AND sched.acadyear = '$act_acad' ORDER BY gl.grade_level ASC, sched.subject_id") or die(mysqli_error($conn));

                                                    // 
                                                    // 

                                                ?>

                                                <?php while ($row = mysqli_fetch_array($get_sched)) {
                                                        $id = $row['subject_id'];
                                                        $sched_id = $row['schedule_id'];

                                                    ?>
                                                <tr>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_description']; ?></td>
                                                    <td><?php echo $row['day']; ?></td>
                                                    <td><?php echo $row['time']; ?></td>
                                                    <td><?php echo $row['room']; ?></td>
                                                    <td><?php if (!empty($row['fullname'])) {
                                                                    echo $row['fullname'];
                                                                } else {
                                                                    echo 'TBA';
                                                                } ?>
                                                    </td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><a href="edit.sched.k-10.php<?php echo '?sub_id=' . $id . '&sched_id=' . $sched_id; ?>"
                                                            type="button" class="btn btn-info mx-1"><i
                                                                class="fa fa-edit"></i>
                                                            Update
                                                        </a>

                                                        <button type="button" class="btn btn-danger mx-1"
                                                            data-toggle="modal"
                                                            data-target="#delete<?php echo $row['subject_id'] ?>"><i
                                                                class="fa fa-trash"></i>
                                                            Delete
                                                        </button>
                                                        <!-- Delete modal start -->
                                                        <div class="modal fade"
                                                            id="delete<?php echo $row['subject_id'] ?>">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
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
                                                                        <a href="userData/ctrl.del.sched.k-10.php<?php echo '?schedule_id=' . $sched_id . '&grd_lvl=' . $grd_lvl; ?>"
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