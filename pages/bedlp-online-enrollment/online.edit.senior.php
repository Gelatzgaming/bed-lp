<?php $par_page = "Enrollment";
$cur_page = "Edit Personal Info." ?>
<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Edit Personal Info. | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    $or_id = $_GET['or_id'];
    $_SESSION['or_id'] = $or_id;

    ?>

<body>
    <div class="page-container">

        <!-- sidebar menu -->
        <?php include '../../includes/bedlp-sidebar.php'; ?>

        <div class="main-content">

            <?php include '../../includes/bedlp-navbar.php'; ?>

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
                                                    <button type="button" class="close" data-dismiss="alert py-3 text-center"
                                                        aria-label="Close">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </div>
                                            </div>';
                unset($_SESSION['errors']);
            } elseif (!empty($_SESSION['success'])) {
                echo ' <div class="alert-dismiss">
                                                <div class="alert alert-success alert-dismissible fade show py-3 text-center"
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
            if (!empty($_SESSION['success-edit'])) {
                echo '  <div class="alert alert-info alert-dismissible fade show py-3 text-center" role="alert">
                <strong>Successfully Edited</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>';
                unset($_SESSION['success-edit']);
            }
            if (!empty($_SESSION['lrn-studno'])) {
                echo '  <div class="alert alert-danger alert-dismissible fade show py-3 text-center" role="alert" >
                    <strong>Student ID and LRN are already exists.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>';
                unset($_SESSION['lrn-studno']);
            }
            if (!empty($_SESSION['double-lrn'])) {
                echo '  <div class="alert alert-danger alert-dismissible fade show py-3 text-center" role="alert" >
                    <strong>LRN already exists.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>';
                unset($_SESSION['double-lrn']);
            }
            if (!empty($_SESSION['double-studno'])) {
                echo '  <div class="alert alert-danger alert-dismissible fade show py-3 text-center" role="alert" >
                    <strong>Student ID already exists.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>';
                unset($_SESSION['double-studno']);
            }





            ?>


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
                                        <h4 class="header-title">Personal Information</h4>
                                        <p class="text-muted font-14 mb-4">Fill up the forms.
                                        </p>
                                        <?php
                                        $display_info = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_online_reg.gender_id
                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                    WHERE or_id = '" . $_GET['or_id'] . "'") or die(mysqli_error($conn));

                                        while ($row = mysqli_fetch_array($display_info)) {
                                        ?>
                                        <form action="./userData/ctrl.admit.online.php" method="POST"
                                            enctype="multipart/form-data">

                                            <hr style="border: 1px solid black;">
                                            <h4 class="text-lg-center mb-3">Registration Form</h4>
                                            <hr style="border: 1px solid black;">


                                            <div class="row justify-content-center">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Student
                                                            Type</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Student Type" name="studtype">
                                                            <option value="<?php echo $row['stud_type']; ?>">
                                                                <?php echo $row['stud_type']; ?></option>
                                                            <option value="New">New</option>
                                                            <option value="Old">Old</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Grade</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Grade" name="grade">
                                                            <?php if (empty($row['grade_level_id'])) {
                                                                    echo '<option value="" disabled selected>Select Gender</option>';
                                                                    $get_level = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                                    while ($row2 = mysqli_fetch_array($get_level)) {
                                                                        echo '
                                                <option value="' . $row2['grade_level_id'] .
                                                                            '">' . $row2['grade_level'] . '</option>';
                                                                    }
                                                                } else {
                                                                    echo '<option disabled>Select Gender</option>
                                                        <option value="' . $row['grade_level_id'] .
                                                                        '" selected >' . $row['grade_level'] . '</option>';
                                                                    $get_level = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN (" . $row['grade_level_id'] . ")");
                                                                    while ($row3 = mysqli_fetch_array($get_level)) {
                                                                        echo '<option value="' . $row3['grade_level_id'] . '">'
                                                                            . $row3['grade_level'] . '</option>';
                                                                    }
                                                                } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Strand</label>
                                                        <select class="form-control form-control-lg"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Strand" name="strand">
                                                            <?php if (empty($row['strand_id'])) {
                                                                    echo '<option value="" disabled selected>Select Strand</option>';
                                                                    $get_strand = mysqli_query($conn, "SELECT * FROM tbl_strands");
                                                                    while ($row2 = mysqli_fetch_array($get_strand)) {
                                                                        echo '
                                                <option value="' . $row2['strand_id'] .
                                                                            '">' . $row2['strand_name'] . '</option>';
                                                                    }
                                                                } else {
                                                                    echo '<option disabled>Select Strand</option>
                                                        <option value="' . $row['strand_id'] .
                                                                        '" selected >' . $row['strand_name'] . '</option>';
                                                                    $get_strand = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id NOT IN (" . $row['strand_id'] . ")");
                                                                    while ($row3 = mysqli_fetch_array($get_strand)) {
                                                                        echo '<option value="' . $row3['strand_id'] . '">'
                                                                            . $row3['strand_name'] . '</option>';
                                                                    }
                                                                } ?>
                                                        </select>>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">LRN</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter 11-digit lrn" wwww
                                                            value="<?php echo $row['lrn']; ?>" name="lrn">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Student
                                                            No.</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Student Number" name="stud_no">
                                                    </div>
                                                </div>

                                            </div>
                                            <hr style="border: 1px solid black;">
                                            <h4 class="text-lg-center mb-3">Account Details</h4>
                                            <hr style="border: 1px solid black;">

                                            <div class="row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Username</label>
                                                        <input type="text" class="form-control" placeholder="Username"
                                                            name="username">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Password</label>
                                                        <input type="text" class="form-control" placeholder="Password"
                                                            name="password">
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
                                                            name="lastname" id="example-url-input"
                                                            value="<?php echo $row['student_lname']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">First
                                                            Name</label>
                                                        <input class="form-control" type="text" placeholder="First Name"
                                                            name="firstname" id="example-url-input"
                                                            value="<?php echo $row['student_fname']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Middle
                                                            Name</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Middle name" name="midname"
                                                            id="example-search-input"
                                                            value="<?php echo $row['student_mname']; ?>">
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
                                                            name="address" id="example-search-input"
                                                            value="<?php echo $row['address']; ?>">
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
                                                            name="date_birth" placeholder="day/month/year"
                                                            value="<?php echo $row['date_birth']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Place
                                                            of
                                                            Birth</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="city, province" name="place_birth"
                                                            id="example-url-input"
                                                            value="<?php echo $row['place_birth']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Age</label>
                                                        <input class="form-control" type="text" placeholder="00 yrs old"
                                                            name="age" id="example-search-input"
                                                            value="<?php echo $row['age']; ?>">
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
                                                            data-placeholder="Select Gender" name="gender">
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
                                                            id="example-url-input"
                                                            value="<?php echo $row['nationality']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Religion</label>
                                                        <input class="form-control" type="text" placeholder="Religion"
                                                            name="religion" id="example-search-input"
                                                            value="<?php echo $row['religion']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mr-auto ml-auto">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Landline
                                                            No.</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Landline Number" name="landline"
                                                            value="<?php echo $row['landline']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mr-auto ml-auto">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Cellphone
                                                            No.</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Cellphone Number" name="cellphone"
                                                            value="<?php echo $row['cellphone']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Email
                                                            Address</label>
                                                        <input type="email" class="form-control focss"
                                                            placeholder="example@gmail.com" name="email"
                                                            value="<?php echo $row['email']; ?>">
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
                                                            name="fname" id="example-url-input"
                                                            value="<?php echo $row['fname']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Father
                                                            Occupation</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Father Occupation" name="focc"
                                                            id="example-url-input" value="<?php echo $row['focc']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Contact
                                                            Number</label>
                                                        <input type="text" class="form-control focss"
                                                            placeholder="Contact Number" name="fcontact"
                                                            value="<?php echo $row['fcontact']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Name of
                                                            Mother</label>
                                                        <input class="form-control" type="text" placeholder="Fullname"
                                                            name="mname" id="example-url-input"
                                                            value="<?php echo $row['mname']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Mother
                                                            Occupation</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Mother Occupation" name="mocc"
                                                            id="example-url-input" value="<?php echo $row['mocc']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Contact
                                                            Number</label>
                                                        <input type="text" class="form-control focss"
                                                            placeholder="Contact Number" name="mcontact"
                                                            value="<?php echo $row['mcontact']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mr-auto ml-auto">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Monthly
                                                            Income</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Family Income" name="month_inc"
                                                            value="<?php echo $row['month_inc']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mr-auto ml-auto">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">No. of
                                                            Siblings</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="No. of Siblings" name="no_sib"
                                                            value="<?php echo $row['no_siblings']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Guardian
                                                            Name</label>
                                                        <input type="text" class="form-control focss"
                                                            placeholder="Guardian Name" name="guardname"
                                                            value="<?php echo $row['guardname']; ?>">
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
                                                            name="gaddress" value="<?php echo $row['gaddress']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Contact
                                                            Number</label>
                                                        <input type="text" class="form-control focss"
                                                            placeholder="Contact Number" name="gcontact"
                                                            value="<?php echo $row['gcontact']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <hr style="border: 1px solid black;">
                                            <h4 class="text-lg-center mb-3">Educational Background</h4>
                                            <hr style="border: 1px solid black;">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">School
                                                            Last
                                                            Attended</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="School Last Attended" name="last_attend"
                                                            id="example-url-input"
                                                            value="<?php echo $row['last_sch']; ?>">
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
                                                            data-placeholder="Select Grade Level"
                                                            name="prev_grade_level">
                                                            <?php if (empty($row['prev_grade_level'])) {
                                                                    echo '<option value="None" selected>Select Grade Level</option>';
                                                                    $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                                    while ($row2 = mysqli_fetch_array($get_glevel)) {
                                                                        echo '<option value="' . $row2['grade_level'] . '">'
                                                                            . $row2['grade_level'] . '</option>';
                                                                    }
                                                                } else {
                                                                    echo '<option disabled>Select Grade Level</option>
                                                        <option value="' . $row['prev_grade_level'] . '" selected>'
                                                                        . $row['prev_grade_level'] . '</option>';
                                                                    $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level NOT IN ('" . $row['prev_grade_level'] . "') ");
                                                                    while ($row3 = mysqli_fetch_array($get_glevel)) {
                                                                        echo '<option value="' . $row3['grade_level'] . '">'
                                                                            . $row3['grade_level'] . '</option>';
                                                                    }
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
                                                            name="sch_year" id="example-url-input"
                                                            value="<?php echo $row['sch_year']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">School
                                                            Address</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="School Address" name="sch_address"
                                                            id="example-url-input"
                                                            value="<?php echo $row['sch_address']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>





                                    <?php } ?>
                                </div>





                                <button type="submit" name="submit" class="btn btn-primary mb-3 mt-3 float-left"><i
                                        class="fa fa-check"></i> Register</button>

                            </div>
                            </form>
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