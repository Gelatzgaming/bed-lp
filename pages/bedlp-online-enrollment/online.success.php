<?php
require '../../includes/conn.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SFAC-LP | Online Inquiry</title>
    <link rel="icon" href="../../assets/img/logo.png" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../../assets/css/typography.css">
    <link rel="stylesheet" href="../../assets/css/default-css.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>


    <!-- Custom css -->
    <style>
    .background {
        background-repeat: no-repeat;
        background-size: cover;
        background-position-x: right;
        background-position: bottom;

    }

    body {
        font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    }

    .toast-top-right {
        right: unset;
        margin-top: 1%;
    }
    </style>
</head>

<body class="hold-transition login-page background"
    style="background-image: url('../../assets/img/background/bg-4.jpg');">

    <!-- Preloader -->
    <?php
    if (isset($_POST['pre-loader'])) {
        echo ' <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="../../assets/img/logo.png" alt="logo-preloader" height="100" width="100">
    </div>';
    }
    if (!empty($_SESSION['success'])) {
        echo '  <div class="alert alert-success alert-dismissible fade show py-3 text-center" role="alert">
        <strong>Successfully Registered</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>';
        unset($_SESSION['success']);
    } ?>


    <div class="content-wrapper pt-4">
        <section class="content">
            <div class="container-fluid pl-4 pr-4 pb-3">
                <div class="card-body justify-content-center">
                    <div class="row justify-content-center">
                        <!-- Textual inputs start -->
                        <div class="col-8 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header text-center">
                                        <a href="../../index.php" class="h1 justify-content-center"><img height="90"
                                                width="90" src="../../assets/img/logo.png" alt="logo-signin"></a>
                                        <p class="login-box-msg">Saint Francis of Assisi College Bacoor Campus</p>
                                    </div>

                                    <form action="../bedlp-login/bedlp-login.php" method="POST"
                                        enctype="multipart/form-data">

                                        <div class="card-header" style="background-color: #28a745;">
                                            <h4 class="text-lg-center mb-1 mt-1" style="color: white;">Form Successfully
                                                Submitted</h4>
                                        </div>

                                        <div class="card-body ml-2 mr-2">
                                            <div class="row mb-4 mt-4 justify-content-center">
                                                <p>Your form has been successfully submitted and is now being processed.
                                                    Please wait for further instruction regarding to your registration.
                                                    <br> If at any point you have questions regarding to your
                                                    application, please refer to contact information below. Thank you!
                                                </p>
                                            </div>

                                            <div class="form-group row mb-3 mt-3 justify-content-center">
                                                <div class="input-group col-md-8 mb-2">
                                                    <div class="card bg-light d-flex flex-fill">
                                                        <div class="card-header text-muted border-bottom-0"
                                                            style="background-color: rgb(151, 16, 16);">
                                                            <p style="color: white;">Contact Information</p>
                                                        </div>
                                                        <div class="card-body pt-2">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <h2 class="lead"><b>Saint Francis of Assisi College
                                                                            - Bacoor Campus</b></h2>
                                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                                        <li class="small"><span class="fa-li"><i
                                                                                    class="fa fa-lg fa-building"></i></span>
                                                                            #96, Bayanan, City of Bacoor, Cavite</li>
                                                                        <li class="small"><span class="fa-li"><i
                                                                                    class="fa fa-lg fa-phone"></i></span>
                                                                            (046) 502 6289</li>
                                                                        <li class="small"><span class="fa-li"><i
                                                                                    class="fa fa-envelope"></i></span>
                                                                            reg@gmail.com</li>
                                                                        <li class="small"><span class="fa-li"><i
                                                                                    class="fa fa-facebook-f"></i></span>
                                                                            https://www.facebook.com/mysfacbacoor/</li>
                                                                        <li class="small"><span class="fa-li"><i
                                                                                    class="fa fa-globe"></i></span>
                                                                            http://www.stfrancis.edu.ph/</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-5 text-center">
                                                                    <img src="../../assets/img/logo.png"
                                                                        alt="user-avatar" class="img-circle img-fluid">
                                                                </div>
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>







                                        <button type="submit" name="submit"
                                            class="btn btn-success mb-3 mt-3 float-left"><i
                                                class="fa fa-lg fa-home"></i>
                                            Home</button>




                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </section>
    </div>



    <!-- /.login-box -->

    <!-- Validation toast -->
    <?php
    if (isset($_SESSION['pwd-error'])) {
        echo "<script>
    $(function() {
        toastr.error('The password you’ve entered is incorrect.')
    });
    </script>";
    } elseif (isset($_SESSION['no-input'])) {
        echo "<script>
            $(function () {
                toastr.error('Enter your valid username and password.')
            });
        </script>";
    }
    session_destroy();
    ?>
    <!-- End Validation toast -->


</body>

</html>