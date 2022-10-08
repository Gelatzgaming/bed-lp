<?php $par_page = "Enrollment";
$cur_page = "Pending students" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Pending Students List | SFAC Las Pinas</title>
    <style>
    .dropdown-toggle::after {
        content: unset !important;
    }
    </style>
    <?php include '../../includes/bedlp-header.php'; ?>

<body>
    <div class="page-container">
        <?php $page = "dataTables"; ?>
        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">
            <?php include '../../includes/bedlp-navbar.php';
            if (!empty($_SESSION['success-del'])) {
                echo '  <div class="alert-dismiss">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertDel">
                    <strong>Successfully Deleted.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
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
                                    <h4 class="header-title">Pending Students List</h4>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-center" style="width: 100%;">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Student ID</th>
                                                    <th>Fullname</th>
                                                    <th>Grade level</th>
                                                    <th>Type</th>
                                                    <th>Date enrolled</th>
                                                    <th>Remark</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_schoolyears LEFT JOIN tbl_students USING(student_id) LEFT JOIN tbl_grade_levels USING(grade_level_id) WHERE remark IN ('Checked', 'Pending', 'Canceled') AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0') ORDER BY remark DESC, sy_id DESC");
                                                while ($row = mysqli_fetch_array($get_stud)) {
                                                    $id = $row['sy_id'];
                                                ?>
                                                <tr>
                                                    <td><img class="img-fluid mr-4"
                                                            src="data:image/jpeg;base64, <?php echo base64_encode($row['img']); ?>"
                                                            alt="image" style="height: 80px; width: 100px"></td>
                                                    <td><?php echo $row['stud_no'] ?></td>
                                                    <td><?php echo $row['fullname'] ?></td>
                                                    <td><?php echo $row['grade_level'] ?></td>
                                                    <td><?php echo $row['stud_type'] ?></td>
                                                    <td><?php echo $row['date_enrolled'] ?></td>
                                                    <td>
                                                        <span
                                                            class="badge badge-<?php if ($row['remark'] == "Checked") {
                                                                                            echo 'success';
                                                                                        } elseif ($row['remark'] == "Pending") {
                                                                                            echo 'warning';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        } ?> p-1"><?php echo $row['remark'] ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown col-lg-6 col-md-4 col-sm-6">
                                                            <button class="btn btn-light dropdown-toggle py-1 px-3"
                                                                type="button" data-toggle="dropdown">
                                                                <p><i class="fa fa-ellipsis-h"></i></p>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <form action="userData/user.list.pending.php"
                                                                    method="POST">
                                                                    <input type="text" name="id"
                                                                        value="<?php echo $id; ?>" hidden>
                                                                    <input type="text" name="remark"
                                                                        value="<?php echo $row['remark']; ?>" hidden>
                                                                    <button class="dropdown-item" type="submit"
                                                                        name="btnRemark"><?php echo ($row['remark'] == 'Checked') ? 'Cancel' : 'Approve'; ?></button>
                                                                </form>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else
                                                                    here</a>
                                                            </div>
                                                        </div>
                                                        <!-- <a href="edit.students.php<?php echo '?student_id=' . $id; ?>"
                                                            type="button" class="btn btn-info mx-1"><i
                                                                class="fa fa-edit"></i>
                                                            Update
                                                        </a>
                                                        <button type="button" class="btn btn-danger mx-1"
                                                            data-toggle="modal"
                                                            data-target="#delete<?php echo $row['student_id'] ?>"><i
                                                                class="fa fa-trash"></i> Delete</button> -->
                                                    </td>
                                                </tr>
                                                <!-- Delete modal start -->
                                                <div class="modal fade" id="delete<?php echo $row['student_id'] ?>">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body text-center my-5">
                                                                <p>Are you sure you want to delete,
                                                                    <i
                                                                        class="font-weight-bold"><?php echo $row['fullname'] ?></i>
                                                                    ?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <a href="userData/user.del.students.php?student_id=<?php echo $row['student_id'] ?>"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete modal end -->
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