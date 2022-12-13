<?php $par_page = "Enrollment";
$cur_page = "Online Inquiry" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Online Inquiries List | SFAC Las Pinas</title>
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
                                    <h4 class="header-title">Online Inquiries</h4>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-center" style="width: 100%;">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Fullname</th>
                                                    <th>Grade</th>
                                                    <th>Email</th>
                                                    <th>Student Type</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                                    WHERE remark = 'Pending'
                                                    ") or die(mysqli_error($conn)) ?>


                                                <tr>
                                                    <?php while ($row = mysqli_fetch_array($get_user)) {
                                                        $id = $row['or_id'];
                                                    ?>
                                                    <td><?php echo $row['fullname']; ?></td>

                                                    <?php if (empty($row['strand_id'])) {
                                                            echo '<td>' . $row['grade_level'] . '</td>';
                                                        } else {
                                                            echo '<td>' . $row['grade_level'] . ' - ' . $row['strand_name'] . '</td>';
                                                        }
                                                        ?>

                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['stud_type']; ?></td>
                                                    <td><?php echo $row['remark']; ?></td>
                                                    <td>
                                                        <?php if (empty($row['strand_id'])) { ?>
                                                        <a href="online.edit.php<?php echo '?or_id=' . $id; ?>"
                                                            type="button" class="btn btn-success mb-3 mt-3"><i
                                                                class="fa fa-edit"></i>
                                                            Approve
                                                        </a>
                                                        <?php } else { ?>
                                                        <a href="online.edit.senior.php<?php echo '?or_id=' . $id; ?>"
                                                            type="button" class="btn btn-success mb-3 mt-3"><i
                                                                class="fa fa-edit"></i>
                                                            Approve
                                                        </a>
                                                        <?php } ?>


                                                        <?php if (empty($row['strand_id'])) { ?>
                                                        <a href="../bedlp-forms/pre_en_online.php<?php echo '?or_id=' . $id; ?>"
                                                            type="button" class="btn btn-info mb-3 mt-3"><i
                                                                class="fa fa-edit"></i>
                                                            Pre-enrollment Form
                                                        </a>
                                                        <?php } else { ?>
                                                        <a href="../bedlp-forms/pre_en_online_senior.php<?php echo '?or_id=' . $id; ?>"
                                                            type="button" class="btn btn-info mb-3 mt-3"><i
                                                                class="fa fa-edit"></i>
                                                            Pre-enrollment Form
                                                        </a>
                                                        <?php } ?>

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger mb-3 mt-3"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal<?php echo $id ?>"><i
                                                                class="fa fa-trash"></i>
                                                            Delete
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?php echo $id ?>"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-red">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            <i class="fa fa-exclamation-triangle"></i>
                                                                            Confirm Delete
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body p-3">
                                                                        Are you sure you want to delete
                                                                        <?php echo $row['fullname']; ?>?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <a href="userData/ctrl.del.online.php<?php echo '?or_id=' . $id; ?>"
                                                                            type="button" name="delete"
                                                                            class="btn btn-danger">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


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