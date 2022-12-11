<?php $par_page = "Data Entry";
$cur_page = "Add Academic Semester" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Add Academic Semester | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php'; ?>

<body>
    <div class="page-container">
        <?php $page = "dataTables"; ?>

        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">

            <?php include '../../includes/bedlp-navbar.php';

            if (!empty($_SESSION['successYear'])) {
                echo '  <div class="alert alert-success alert-dismissible fade show py-3 text-center" role="alert">
                <strong>Successfully Added</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>';
                unset($_SESSION['successYear']);
            }
            if (!empty($_SESSION['success-del'])) {
                echo '  <div class="alert alert-danger alert-dismissible fade show py-3 text-center" role="alert" >
                    <strong>Successfully Deleted.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>';
                unset($_SESSION['success-del']);
            }
            if (!empty($_SESSION['success-edit'])) {
                echo '  <div class="alert alert-info alert-dismissible fade show py-3 text-center" role="alert">
                <strong>Successfully Edited</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>';
                unset($_SESSION['success-edit']);
            }
            if (!empty($_SESSION['semExist'])) {
                echo '  <div class="alert alert-danger alert-dismissible fade show py-3 text-center" role="alert" >
                    <strong>Semester Already Exists.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>';
                unset($_SESSION['semExist']);
            }
            if (!empty($_SESSION['success-update'])) {
                echo '  <div class="alert alert-dark alert-dismissible fade show py-3 text-center" role="alert">
                <strong>Academic Semester Updated!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>';
                unset($_SESSION['success-update']);
            }
            ?>

            <!-- Content Wrapper. Contains page content -->



            <!-- Main content -->
            <section class="content">
                <div class="container-fluid pl-5 pr-5 pb-3">
                    <div class="row">
                        <div class="col-8 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="header-title">Add Semester</h4>
                                        <button type="button" class="btn btn-rounded btn-primary mb-3 "
                                            data-toggle="modal" data-target=".bd-example-modal-lg">Add
                                            Academic
                                            Semester</button>

                                    </div>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-center" style="width: 100% ;">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Semester</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $get_sem = mysqli_query($conn, "SELECT *, CONCAT(tbl_semesters.semester) AS fullname 
                                                FROM tbl_semesters");
                                                while ($row = mysqli_fetch_array($get_sem)) {
                                                    $id = $row['semester_id'];
                                                ?>
                                                <tr>
                                                    <td class="px-5"><?php echo $row['fullname'] ?></td>
                                                    <td>
                                                        <span data-toggle="tooltip" data-placement="top"
                                                            title="Edit Academic Semester">
                                                            <button type="button" class="btn btn-rounded btn-info mb-3"
                                                                data-toggle="modal"
                                                                data-target="#edit<?php echo $row['semester_id'] ?>"><i
                                                                    class="fa fa-edit"></i></button>
                                                        </span>

                                                        </a>
                                                        <span data-toggle="tooltip" data-placement="top"
                                                            title="Delete Academic Semester">
                                                            <button type="button"
                                                                class="btn btn-rounded btn-danger mb-3"
                                                                data-toggle="modal"
                                                                data-target="#delete<?php echo $row['semester_id'] ?>"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="edit<?php echo $row['semester_id'] ?>">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Academic Semester</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <form action="semData/ctrl.edit.sem.php" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon3">Academic
                                                                                Semester</span>
                                                                        </div>
                                                                        <input type="text" name="id"
                                                                            value="<?php echo $id; ?>" hidden>
                                                                        <input type="text" class="form-control"
                                                                            id="basic-url" name="semester"
                                                                            aria-describedby="basic-addon3"
                                                                            placeholder="Enter Semester"
                                                                            value="<?php echo $row['fullname'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="submit">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="delete<?php echo $row['semester_id'] ?>">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body text-center my-5">
                                                                <p>Are you sure you want to delete
                                                                    <i
                                                                        class="font-weight-bold"><?php echo $row['fullname'] ?></i>
                                                                    ?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <a href="semData/ctrl.del.sem.php?semester_id=<?php echo $row['semester_id'] ?>"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>






                                <div class="modal fade bd-example-modal-lg">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Academic Semester</h5>
                                                <button type="button" class="close"
                                                    data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <form action="semData/ctrl.add.sem.php" method="POST">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3">Academic
                                                                Semester</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            name="semester" aria-describedby="basic-addon3"
                                                            placeholder="Enter Semester">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        name="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-4 mt-5">
                            <div class="card card-bordered">
                                <div class="card-header">
                                    <div class="card-title mb-0"><b>Set Active Academic Semester</b></div>
                                </div>
                                <form action="semData/ctrl.set.sem.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="col-form-label">Select Academic Semester</label>
                                            <select class="form control select2 select2-purple custom-select"
                                                data-placeholder="Select Semester"
                                                data-dropdown-css-class="select2-purple" name="act_sem">
                                                <?php $sltd_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_active_semesters.semester_id") or die(mysqli_error($conn));
                                                while ($row1 = mysqli_fetch_array($sltd_sem)) {
                                                ?>
                                                <option value="<?php echo $row1['semester_id'];  ?>">
                                                    <?php echo $row1['semester'];
                                                        ?></option>
                                                <?php $get_sem = mysqli_query($conn, "SELECT * FROM tbl_semesters WHERE semester_id NOT IN (" . $row1['semester_id'] . ")") or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($get_sem)) {
                                                    ?>
                                                <option value="<?php echo $row['semester_id']; ?>">
                                                    <?php echo $row['semester'];
                                                    }
                                                } ?></option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" name="submit1" type="submit"><i
                                                class="fas fa-fa-calendar-check-o"></i> Set Academic Year</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </section>

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