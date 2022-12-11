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
    <title>Senior High Subjects List | SFAC Las Pinas</title>
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
                                    <h4 class="header-title">Senior High Subjects List <?php if (isset($_GET['stem'])) {
                                                                                            echo ' (STEM)';
                                                                                        } elseif (isset($_GET['abm'])) {
                                                                                            echo ' (ABM)';
                                                                                        } elseif (isset($_GET['gas'])) {
                                                                                            echo ' (GAS)';
                                                                                        } elseif (isset($_GET['humss'])) {
                                                                                            echo ' (HUMSS)';
                                                                                        } elseif (isset($_GET['tvl'])) {
                                                                                            echo ' (TVL-HE)';
                                                                                        } else {
                                                                                            echo ' (STEM)';
                                                                                        } ?></h4>
                                    <form action="list.sub.senior.php" method="GET">

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
                                                    WHERE tbl_strands.strand_name IN ('$str_name') AND tbl_efacadyears.efacadyear IN ('$efacadyear') ORDER BY tbl_subjects_senior.semester_id ASC, subject_id") or die(mysqli_error($conn));

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
                                                    <td><a href="edit.sub.senior.php<?php echo '?sen_id=' . $id; ?>"
                                                            type="button" class="btn btn-info mx-1"><i
                                                                class="fa fa-edit"></i>
                                                            Update
                                                        </a>
                                                        <button type="button" class="btn btn-danger mx-1"
                                                            data-toggle="modal"
                                                            data-target="#delete<?php echo $row['subject_id'] ?>"><i
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
                                                                    <i class="font-weight-bold"><?php echo $row['subject_code'] ?>
                                                                        | </i>
                                                                    <i
                                                                        class="font-weight-bold"><?php echo $row['subject_description'] ?></i>
                                                                    ?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <a href="userData/ctrl.del.sub.senior.php?sen_id=<?php echo $row['subject_id'] ?>"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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