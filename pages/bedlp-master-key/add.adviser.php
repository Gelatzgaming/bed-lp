<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Adviser Sign Up | SFAC Las Pinas</title>
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
                                        <h4 class="header-title">Add Adviser</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">First
                                                        Name</label>
                                                    <input class="form-control" type="text" placeholder="First name"
                                                        id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Middle
                                                        Name</label>
                                                    <input class="form-control" type="search" placeholder="Middle Name"
                                                        id="example-search-input">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">Last
                                                        Name</label>
                                                    <input class="form-control" type="email" placeholder="Last name"
                                                        id="example-email-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Email</label>
                                                    <input class="form-control" type="url"
                                                        placeholder="example123@gmail.com" id="example-url-input">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-search-input"
                                                        class="col-form-label">Username</label>
                                                    <input class="form-control" type="search" placeholder="Username"
                                                        id="example-search-input">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputGroupFile01" class="col-form-label">Upload
                                                        Profile</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="button"
                                            class="btn btn-primary mb-3 mt-3 float-right">Primary</button>
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
    <?php include '../../includes/bedlp-script.php'; ?>

</body>

</html>