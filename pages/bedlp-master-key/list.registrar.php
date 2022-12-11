<?php $par_page = "Maintenance";
$cur_page = "Registrar List" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Registrar List | SFAC Las Pinas</title>
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
                                    <h4 class="header-title">Registrar List</h4>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-center" style="width: 100%;">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Fullname</th>
                                                    <th>Email</th>
                                                    <th>Username</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_registrars.reg_lname, ', ', tbl_registrars.reg_fname, ' ', tbl_registrars.reg_mname) AS fullname 
                                                FROM tbl_registrars");
                                                while ($row = mysqli_fetch_array($get_user)) {
                                                    $id = $row['reg_id'];
                                                ?>
                                                <tr>
                                                    <td><img class="img-fluid mr-4"
                                                            src="data:image/jpeg;base64, <?php echo base64_encode($row['img']); ?>"
                                                            alt="image" style="height: 80px; width: 100px"></td>
                                                    <td><?php echo $row['fullname'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><a href="edit.registrar.php<?php echo '?reg_id=' . $id; ?>"
                                                            type="button" class="btn btn-info mx-1"><i
                                                                class="fa fa-edit"></i>
                                                            Update
                                                        </a>
                                                        <button type="button" class="btn btn-danger mx-1"
                                                            data-toggle="modal"
                                                            data-target="#delete<?php echo $row['reg_id'] ?>"><i
                                                                class="fa fa-trash"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                <!-- Delete modal start -->
                                                <div class="modal fade" id="delete<?php echo $row['reg_id'] ?>">
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
                                                                <a href="userData/user.del.registrar.php?reg_id=<?php echo $row['reg_id'] ?>"
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