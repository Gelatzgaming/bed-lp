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
                                    <form action="./userData/ctrl.addonline.php" method="POST"
                                        enctype="multipart/form-data">

                                        <hr style="border: 1px solid black;">
                                        <h4 class="text-lg-center mb-3">Registration Form | Pre-School</h4>
                                        <hr style="border: 1px solid black;">

                                        <div class="card-body ml-2 mr-2">


                                            <div class="row justify-content-center">

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Grade</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Grade" name="grade">
                                                            <option selected disabled>Select Grade</option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * FROM tbl_grade_levels LIMIT 0, 3");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $row['grade_level_id'] . '">' . $row['grade_level'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">LRN</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter 11-digit LRN" name="lrn"
                                                            id="example-url-input">
                                                    </div>
                                                </div>

                                            </div>



                                            <hr style="border: 1px solid black;">
                                            <h4 class="text-lg-center mb-3">Personal Data</h4>
                                            <hr style="border: 1px solid black;">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Last
                                                            Name</label>
                                                        <input class="form-control" type="text" placeholder="Last Name"
                                                            name="lastname" id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">First
                                                            Name</label>
                                                        <input class="form-control" type="text" placeholder="First Name"
                                                            name="firstname" id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Middle
                                                            Name</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Middle name" name="midname"
                                                            id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Home
                                                            Address</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Unit number, house number, street name, barangay, city, province"
                                                            name="address" id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Date
                                                            of
                                                            Birth</label>
                                                        <input type="text" class="form-control focss"
                                                            data-inputmask-alias="datetime"
                                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                            name="date_birth" placeholder="day/month/year">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Place
                                                            of
                                                            Birth</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="city, province" name="place_birth"
                                                            id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Age</label>
                                                        <input class="form-control" type="text" placeholder="00 yrs old"
                                                            name="age" id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Gender</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Gender" name="gender" required>
                                                            <?php if (empty($row['gender_id'])) {
                                                                echo '<option value="" disabled selected>Select Gender</option>';
                                                                $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders");
                                                                while ($row2 = mysqli_fetch_array($get_gender)) {
                                                                    echo '
                                                    <option value="' . $row2['gender_id'] .
                                                                        '">' . $row2['gender_name'] . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option disabled>Select Gender</option>
                                                        <option value="' . $row['gender_id'] .
                                                                    '" selected >' . $row['gender_name'] . '</option>';
                                                                $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders WHERE gender_id NOT IN (" . $row['gender_id'] . ")");
                                                                while ($row3 = mysqli_fetch_array($get_gender)) {
                                                                    echo '<option value="' . $row3['gender_id'] . '">'
                                                                        . $row3['gender_name'] . '</option>';
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Nationality</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Nationality" name="nationality"
                                                            id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Religion</label>
                                                        <input class="form-control" type="text" placeholder="Religion"
                                                            name="religion" id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mr-auto ml-auto">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Landline
                                                            No.</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Landline Number" name="landline">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mr-auto ml-auto">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Cellphone
                                                            No.</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Cellphone Number" name="cellphone">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Email
                                                            Address</label>
                                                        <input type="email" class="form-control focss"
                                                            placeholder="example@gmail.com" name="email">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <hr style="border: 1px solid black;">
                                        <h4 class="text-lg-center mb-3">Family Background</h4>
                                        <hr style="border: 1px solid black;">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Name of
                                                        Father</label>
                                                    <input class="form-control" type="text" placeholder="Fullname"
                                                        name="fname" id="example-url-input">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Father
                                                        Occupation</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Father Occupation" name="focc"
                                                        id="example-url-input">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Contact
                                                        Number</label>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Contact Number" name="fcontact">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Name of
                                                        Mother</label>
                                                    <input class="form-control" type="text" placeholder="Fullname"
                                                        name="mname" id="example-url-input">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Mother
                                                        Occupation</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Mother Occupation" name="mocc"
                                                        id="example-url-input">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Contact
                                                        Number</label>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Contact Number" name="mcontact">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 mr-auto ml-auto">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Monthly
                                                        Income</label>
                                                    <input type="text" class="form-control" placeholder="Family Income"
                                                        name="month_inc">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mr-auto ml-auto">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">No. of
                                                        Siblings</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="No. of Siblings" name="no_sib">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Guardian
                                                        Name</label>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Guardian Name" name="guardname">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input"
                                                        class="col-form-label">Address</label>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Unit number, house number, street name, barangay, city, province"
                                                        name="gaddress">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Contact
                                                        Number</label>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Contact Number" name="gcontact">
                                                </div>
                                            </div>

                                        </div>

                                        <hr style="border: 1px solid black;">
                                        <h4 class="text-lg-center mb-3">Educational Background</h4>
                                        <hr style="border: 1px solid black;">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">School Last
                                                        Attended</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="School Last Attended" name="last_attend"
                                                        id="example-url-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Grade
                                                        Level</label>
                                                    <select class="form-control form-control-lg"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Grade Level" name="prev_grade_level">
                                                        <?php
                                                        $get = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                        while ($row2 = mysqli_fetch_array($get)) {
                                                            echo '<option value="' . $row2['grade_level'] . '">'
                                                                . $row2['grade_level'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">School
                                                        Year</label>
                                                    <input class="form-control" type="text" placeholder="0000-0000"
                                                        name="sch_year" id="example-url-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">School
                                                        Address</label>
                                                    <input class="form-control" type="text" placeholder="School Address"
                                                        name="sch_address" id="example-url-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group mb-0">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="terms" class="custom-control-input"
                                                        id="exampleCheck1" required>
                                                    <label class="custom-control-label" for="exampleCheck1">I agree that
                                                        the data collected from this online registration shall be
                                                        subject to the school's <a
                                                            href="terms/SFAC-Data-Privacy.pdf">Data Privacy
                                                            Policy</a>.</label>
                                                </div>
                                            </div>
                                        </div>





                                        <button type="submit" name="submit"
                                            class="btn btn-primary mb-3 mt-3 float-left">Register</button>


                                </div>

                                </form>
                            </div>
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