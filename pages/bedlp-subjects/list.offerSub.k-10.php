<?php $par_page = "Maintenance";
$cur_page = "Subject List";

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
    <title>Offer/Open Subjects | SFAC Las Pinas</title>
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
                                    <h4 class="header-title">Offer/Open Subjects for Primary & Junior High</h4>
                                    <form action="list.offerSub.k-10.php" method="GET">

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
                                                    <th>Grade Level</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($grd_lvl)) {

                                                    $get_sub = mysqli_query($conn, "SELECT * FROM tbl_subjects
                                                LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects.grade_level_id
                                                WHERE grade_level IN ('$grd_lvl')
                                                ORDER BY tbl_grade_levels.grade_level ASC, subject_id") or die(mysqli_error($conn));
                                                ?>
                                                <tr>
                                                    <?php while ($row = mysqli_fetch_array($get_sub)) {
                                                            $id = $row['subject_id'];
                                                        ?>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_description']; ?></td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><a href="../bedlp-schedules/add.sched.k-10.php<?php echo '?sub_id=' . $id; ?>"
                                                            type="button" class="btn btn-success btn-md mb-3"><i
                                                                class="fa fa-plus-square"></i>
                                                            Set Schedule
                                                        </a>


                                                    </td>
                                                </tr>

                                                <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <?php if (!empty($grd_lvl)) {
                                            if (isset($_GET['g1'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bedlp-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g2'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g3'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g4'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g5'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g6'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g7'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g8'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g9'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['g10'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['nurs'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['pkdr'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            } elseif (isset($_GET['kdr'])) {
                                                echo '
                                                    <hr class="bg-navy">
                                                    <div class="row
                                                    ">
                                                        <a href="../bed-schedules/add.petitioned.k-10.php?g=' . $grd_lvl . '" type="button"
                                                            class="btn btn-dark mb-3"><i
                                                                class="fa fa-pencil mr-1"> </i>
                                                            Open Petitioned</a>
                                                    </div>';
                                            }
                                        } ?>

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