<?php $par_page = "Data Entry";
$cur_page = "Add Academic Year" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Add Academic Year | SFAC Las Pinas</title>
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
            if (!empty($_SESSION['yearExist'])) {
                echo '  <div class="alert alert-danger alert-dismissible fade show py-3 text-center" role="alert" >
                    <strong>Year Already Exists.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>';
                unset($_SESSION['yearExist']);
            }
            if (!empty($_SESSION['success-update'])) {
                echo '  <div class="alert alert-dark alert-dismissible fade show py-3 text-center" role="alert">
                <strong>Academic Year Updated!</strong>
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
                                        <h4 class="header-title">Data Table Dark</h4>
                                        <button type="button" class="btn btn-rounded btn-primary mb-3 "
                                            data-toggle="modal" data-target=".bd-example-modal-lg">Add
                                            Academic
                                            Year</button>

                                    </div>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-center" style="width: 100% ;">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Academic Year</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $get_ay = mysqli_query($conn, "SELECT *, CONCAT(tbl_acadyears.academic_year) AS fullname 
                                                FROM tbl_acadyears");
                                                while ($row = mysqli_fetch_array($get_ay)) {
                                                    $id = $row['ay_id'];
                                                ?>
                                                <tr>
                                                    <td class="px-5"><?php echo $row['fullname'] ?></td>
                                                    <td>
                                                        <span data-toggle="tooltip" data-placement="top"
                                                            title="Edit Academic Year">
                                                            <button type="button" class="btn btn-rounded btn-info mb-3"
                                                                data-toggle="modal"
                                                                data-target="#edit<?php echo $row['ay_id'] ?>"><i
                                                                    class="fa fa-edit"></i></button>
                                                        </span>

                                                        </a>
                                                        <span data-toggle="tooltip" data-placement="top"
                                                            title="Delete Academic Year">
                                                            <button type="button"
                                                                class="btn btn-rounded btn-danger mb-3"
                                                                data-toggle="modal"
                                                                data-target="#delete<?php echo $row['ay_id'] ?>"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="edit<?php echo $row['ay_id'] ?>">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Academic Year</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <form action="acadData/ctrl.edit.date.php" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon3">Academic Year</span>
                                                                        </div>
                                                                        <input type="text" name="id"
                                                                            value="<?php echo $id; ?>" hidden>
                                                                        <input type="text" class="form-control"
                                                                            id="basic-url" name="acad_year"
                                                                            aria-describedby="basic-addon3"
                                                                            placeholder="yyyy-yyyy"
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
                                                <div class="modal fade" id="delete<?php echo $row['ay_id'] ?>">
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
                                                                <a href="acadData/ctrl.del.date.php?ay_id=<?php echo $row['ay_id'] ?>"
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
                                                <h5 class="modal-title">Add Academic Year</h5>
                                                <button type="button" class="close"
                                                    data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <form action="acadData/ctrl.add.date.php" method="POST">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3">Academic
                                                                Year</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            name="acad_year" aria-describedby="basic-addon3"
                                                            placeholder="yyyy-yyyy">
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
                                    <div class="card-title mb-0"><b>Set Active Academic Year</b></div>
                                </div>
                                <form action="acadData/ctrl.set.date.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="col-form-label">Select Academic Year</label>
                                            <select class="form-control" name="act_acadyear"
                                                data-placeholder="Select Active Academic Year"
                                                data-dropdown-css-class="select2-purple" name="act_acadyear">
                                                <?php $get_actacad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_active_acadyears.ay_id") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($get_actacad)) {
                                                ?>
                                                <option value="<?php echo $row['ay_id']; ?>">A.Y
                                                    <?php echo $row['academic_year']; ?></option>
                                                <?php $get_acad = mysqli_query($conn, "SELECT * FROM tbl_acadyears WHERE  ay_id NOT IN (" . $row['ay_id'] . ")") or die(mysqli_error($conn));
                                                    while ($row2 = mysqli_fetch_array($get_acad)) {
                                                    ?>
                                                <option value="<?php echo $row2['ay_id']; ?>">A.Y
                                                    <?php echo $row2['academic_year'];
                                                    }
                                                } ?></option>

                                            </select>
                                        </div>
                                        <button class="btn btn-primary" name="submit" type="submit"><i
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