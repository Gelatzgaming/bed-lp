<?php $par_page = "Data Entry";
$cur_page = "Add Teacher" ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Teacher Sign Up | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php'; ?>

<body>
    <div class="page-container">

        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">

            <?php include '../../includes/bedlp-navbar.php'; ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-4">


                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid pl-5 pr-5 pb-3">
                        <!-- main content pt.2 -->
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add Teacher</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <form action="./userData/user.add.teacher.php" method="POST"
                                            enctype="multipart/form-data">
                                            <?php
                                            if (!empty($_SESSION['errors'])) {
                                                echo ' <div class="alert-dismiss">
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
                                                 ';
                                                foreach ($_SESSION['errors'] as $error) {
                                                    echo $error;
                                                }
                                                echo '
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </div>
                                            </div>';
                                                unset($_SESSION['errors']);
                                            } elseif (!empty($_SESSION['success'])) {
                                                echo ' <div class="alert-dismiss">
                                                <div class="alert alert-success alert-dismissible fade show"
                                                    role="alert">
                                                    <strong>Successfully Added.</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </div>
                                            </div> ';
                                                unset($_SESSION['success']);
                                            }




                                            ?>



                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">First
                                                            Name</label>
                                                        <input class="form-control" type="text" placeholder="First name"
                                                            name="firstname" id="example-text-input"
                                                            value="<?php
                                                                                                                                                                            if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                echo  $_SESSION['prev_data'][0];
                                                                                                                                                                            }
                                                                                                                                                                            ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Middle
                                                            Name</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Middle Name" name="midname"
                                                            id="example-search-input"
                                                            value="<?php
                                                                                                                                                                            if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                echo  $_SESSION['prev_data'][2];
                                                                                                                                                                            }
                                                                                                                                                                            ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-email-input" class="col-form-label">Last
                                                            Name</label>
                                                        <input class="form-control" type="text" placeholder="Last name"
                                                            name="lastname" id="example-email-input"
                                                            value="<?php
                                                                                                                                                                        if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                            echo  $_SESSION['prev_data'][1];
                                                                                                                                                                        }
                                                                                                                                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Email</label>
                                                        <input class="form-control" type="email"
                                                            placeholder="example123@gmail.com" name="email"
                                                            id="example-url-input"
                                                            value="<?php
                                                                                                                                                                                if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                                    echo  $_SESSION['prev_data'][3];
                                                                                                                                                                                }
                                                                                                                                                                                ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Username</label>
                                                        <input class="form-control" type="text" placeholder="Username"
                                                            name="username" id="example-search-input"
                                                            value="<?php
                                                                                                                                                                        if (!empty($_SESSION['prev_data'])) {
                                                                                                                                                                            echo  $_SESSION['prev_data'][4];
                                                                                                                                                                        }
                                                                                                                                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputPassword"
                                                            class="col-form-label">Password</label>
                                                        <input type="password" class="form-control" id="inputPassword"
                                                            name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputPassword" class="col-form-label">Confirm
                                                            Password</label>
                                                        <input type="password" class="form-control" id="inputPassword"
                                                            name="password2" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inputGroupFile01" class="col-form-label">Upload
                                                            Profile</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control dropzone"
                                                                name="prof_img" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <button type="submit" name="submit"
                                                class="btn btn-primary mb-3 mt-3 float-right">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
            </div>

            </section>

        </div>

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