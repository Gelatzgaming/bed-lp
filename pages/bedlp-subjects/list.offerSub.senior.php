<?php $par_page = "Maintenance";
$cur_page = "Subject List";

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
                                    <h4 class="header-title">Offer/Open Subjects for Senior High School
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
                                        } ?></h4>
                                    <form action="list.offerSub.senior.php" method="GET">

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

                                            <button class="btn btn-dark mb-6 ml-1" value="HUMSS" name="humss">
                                                <i class="fa fa-users"></i> HUMSS
                                            </button>

                                            <button class="btn btn-dark mb-6 ml-1" value="TVL - HE" name="tvl">
                                                <i class="fa fa-users"></i> TVL- HE
                                            </button>

                                        </div>

                                        <div class="row justify-content-center">
                                            <div class=" input-group col-md-4 mb-2 mt-2">

                                                <select class="form-control form-control-lg"
                                                    data-dropdown-css-class="select2-navy"
                                                    data-placeholder="Select Effective Academic Year" name="eay">
                                                    <option value="" disabled>Select Effective Academic
                                                        Year
                                                    </option>
                                                    <?php
                                                    if (!empty($efacadyear)) {
                                                        $get_eay = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear = '$efacadyear'");
                                                        while ($row = mysqli_fetch_array($get_eay)) {
                                                    ?>
                                                    <option selected value="<?php echo $row['efacadyear'] ?>">
                                                        Effective
                                                        Academic Year <?php echo $row['efacadyear'];
                                                                            } ?></option>
                                                    <?php $get_eay2 = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear NOT IN ('$efacadyear')");
                                                            while ($row2 = mysqli_fetch_array($get_eay2)) {
                                                            ?>
                                                    <option value="<?php echo $row2['efacadyear'] ?>">
                                                        Effective
                                                        Academic Year <?php echo $row2['efacadyear'];
                                                                                } ?></option>
                                                    <?php } else {
                                                                $get_eay = mysqli_query($conn, "SELECT * FROM tbl_efacadyears ORDER BY efacadyear_id DESC");
                                                                while ($row = mysqli_fetch_array($get_eay)) {
                                                                ?>
                                                    <option value="<?php echo $row['efacadyear'] ?>">
                                                        Effective
                                                        Academic Year <?php echo $row['efacadyear'];
                                                                                    } ?></option>
                                                    <?php  } ?>

                                                </select>

                                            </div>
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
                                                    <th>Pre-Requisites</th>
                                                    <th>Grade Level</th>
                                                    <th>Semester</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php if (!empty($efacadyear)) {



                                                    $get_subjects = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
                                                    LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
                                                    LEFT JOIN tbl_efacadyears ON tbl_efacadyears.efacadyear_id = tbl_subjects_senior.efacadyear_id
                                                    WHERE tbl_strands.strand_name IN ('$str_name') AND tbl_efacadyears.efacadyear IN ('$efacadyear') AND tbl_semesters.semester IN ('$act_sem') ORDER BY grade_level ASC, subject_id") or die(mysqli_error($conn));

                                                ?>

                                                <tr>
                                                    <?php while ($row = mysqli_fetch_array($get_subjects)) {
                                                            $id = $row['subject_id'];

                                                        ?>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_description']; ?></td>
                                                    <td><?php echo $row['total_units']; ?></td>
                                                    <td><?php echo $row['pre_requisites']; ?></td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><?php echo $row['semester']; ?></td>
                                                    <td><a href="../bedlp-schedules/add.sched.senior.php<?php echo '?sen_id=' . $id; ?>"
                                                            type="button" class="btn btn-success text-sm p-2 mb-md-2"><i
                                                                class="fa fa-plus-square"></i>
                                                            Set Schedule
                                                        </a>

                                                    </td>
                                                </tr><?php }
                                                    } ?>
                                            </tbody>
                                        </table>

                                        <?php if (!empty($efacadyear)) {
                                            if (isset($_GET['stem'])) {
                                                echo '
                                        <hr class="bg-navy">
                                        <div class="row
                                        ">
                                            <a href="../bedlp-schedules/add.petitioned.senior.php?str=STEM&eay=' . $efacadyear . '" type="button"
                                                class="btn btn-dark mb-3"><i
                                                    class="fa fa-pencil mr-1"> </i>
                                                Open Petitioned</a>
                                        </div>';
                                            } elseif (isset($_GET['abm'])) {
                                                echo '
                                        <hr class="bg-navy">
                                        <div class="row
                                            ">

                                            <a href="../bedlp-schedules/add.petitioned.senior.php?str=ABM&eay=' . $efacadyear . '" type="button"
                                                class="btn btn-dark mb-3"><i
                                                    class="fa fa-pencil mr-1"></i>
                                                Open Petitioned</a>

                                        </div>';
                                            } elseif (isset($_GET['gas'])) {
                                                echo '
                                        <hr class="bg-navy">
                                        <div class="row
                                            ">

                                            <a href="../bedlp-schedules/add.petitioned.senior.php?str=GAS&eay=' . $efacadyear . '" type="button"
                                                class="btn btn-dark mb-3 "><i
                                                    class="fa fa-pencil mr-1"></i>
                                                Open Petitioned</a>

                                        </div>';
                                            } elseif (isset($_GET['humss'])) {
                                                echo '
                                        <hr class="bg-navy">
                                        <div class="row
                                            ">

                                            <a href="../bedlp-schedules/add.petitioned.senior.php?str=HUMSS&eay=' . $efacadyear . '" type="button"
                                                class="btn btn-dark mb-3 "><i
                                                    class="fa fa-pencil mr-1"></i>
                                                Open Petitioned</a>

                                        </div>';
                                            } elseif (isset($_GET['tvl'])) {
                                                echo '
                                        <hr class="bg-navy">
                                        <div class="row
                                            ">

                                            <a href="../bedlp-schedules/add.petitioned.senior.php?str=TVL - HE&eay=' . $efacadyear . '" type="button"
                                                class="btn btn-dark mb-3 "><i
                                                    class="fa fa-pencil mr-1"></i>
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