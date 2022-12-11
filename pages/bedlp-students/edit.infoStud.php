<?php $par_page = "Maintenance";
$cur_page = "Edit Information" ?>

<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Personal Information | SFAC Las Pinas</title>
    <?php include '../../includes/bedlp-header.php';

    if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {

        $stud_id = $_GET['stud_id'];
        $_SESSION['student_id'] = $stud_id;
    }

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
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </div>
                                            </div>';
                unset($_SESSION['errors']);
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
                                        <form action="./userData/user.edit.infoStud.php" method="POST"
                                            enctype="multipart/form-data">


                                            <?php
                                            $get_userInfo = mysqli_query($conn, "SELECT * FROM tbl_students
                                             LEFT JOIN tbl_genders ON tbl_students.gender_id = tbl_genders.gender_id
                                              WHERE student_id = '$stud_id'");

                                            while ($row = mysqli_fetch_array($get_userInfo)) {
                                            ?>


                                            <input class="form-control" type="text" name="student_id"
                                                value="<?php echo $row['student_id']; ?>" hidden>


                                            <?php if (empty($row['date_ap'])) {
                                                ?>
                                            <input type="text" name="date_ap" hidden
                                                value="<?php echo date('d/M/y'); ?>">
                                            <input type="text" name="syear" hidden
                                                value="<?php echo $_SESSION['active_acadyears']; ?>">
                                            <?php } ?>

                                            <hr style="border: 1px solid black;">
                                            <h4 class="text-lg-center mb-3">Personal Data</h4>
                                            <hr style="border: 1px solid black;">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Student
                                                            ID</label>
                                                        <?php if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {
                                                                echo '   
                                                            <input type="text" class="form-control focss"
                                                            value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no"
                                                       >
                                                    </div>';
                                                            } elseif ($_SESSION['role'] == 'Student') {
                                                                echo '   
                                                            <input type="text" class="form-control focss"
                                                            value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no" readonly>
                                                    </div>';
                                                            } ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">LRN</label>
                                                            <?php if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {
                                                                    echo '   
                                                            <input type="text" class="form-control focss"
                                                            value="' . $row['lrn'] . '" placeholder="Learner Reference Number" name="lrn"
                                                       >
                                                    </div>';
                                                                } elseif ($_SESSION['role'] == 'Student') {
                                                                    echo '   
                                                            <input type="text" class="form-control focss"
                                                            value="' . $row['lrn'] . '" placeholder="Learner Reference Number" name="lrn" readonly>
                                                    </div>';
                                                                } ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Last Name</label>
                                                                <input class="form-control" type="text"
                                                                    placeholder="Last Name" name="lastname"
                                                                    id="example-url-input"
                                                                    value="<?php echo $row['student_lname']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">First Name</label>
                                                                <input class="form-control" type="text"
                                                                    placeholder="First Name" name="firstname"
                                                                    id="example-url-input"
                                                                    value="<?php echo $row['student_fname']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-search-input"
                                                                    class="col-form-label">Middle Name</label>
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
                                                                <label for="example-search-input"
                                                                    class="col-form-label">Home Address</label>
                                                                <input class="form-control" type="text"
                                                                    placeholder="Unit number, house number, street name, barangay, city, province"
                                                                    name="address" id="example-search-input"
                                                                    value="<?php echo $row['address']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-search-input"
                                                                    class="col-form-label">Province Address</label>
                                                                <input class="form-control" type="text"
                                                                    placeholder="Unit number, house number, street name, barangay, city, province"
                                                                    name="prov" id="example-search-input"
                                                                    value="<?php echo $row['prov']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Date of Birth</label>
                                                                <input type="text" class="form-control focss"
                                                                    data-inputmask-alias="datetime"
                                                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                                    name="date_birth" placeholder="day/month/year"
                                                                    value="<?php echo $row['date_birth']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Place of Birth</label>
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
                                                                <input class="form-control" type="text"
                                                                    placeholder="00 yrs old" name="age"
                                                                    id="example-search-input"
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
                                                                    data-placeholder="Select Gender" name="gender"
                                                                    required>
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
                                                                <input class="form-control" type="text"
                                                                    placeholder="Religion" name="religion"
                                                                    id="example-search-input"
                                                                    value="<?php echo $row['religion']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">ACR #</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="ACR Number"
                                                                    value="<?php echo $row['acr']; ?>" name="acr">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Landline No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Landline Number"
                                                                    value="<?php echo $row['landline']; ?>"
                                                                    name="landline">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-search-input"
                                                                    class="col-form-label">Cellphone No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Cellphone Number"
                                                                    value="<?php echo $row['cellphone']; ?>"
                                                                    name="cellphone">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Email Address</label>
                                                                <input type="email" class="form-control focss"
                                                                    placeholder="example@gmail.com"
                                                                    value="<?php echo $row['email']; ?>" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Level Applied for</label>
                                                                <select class="form-control form-control-lg"
                                                                    data-dropdown-css-class="select2-purple"
                                                                    data-placeholder="Select Grade Level"
                                                                    name="app_grade_level">
                                                                    <?php if (empty($row['app_grade_level'])) {
                                                                            echo '<option value="None" disabled selected>Select Grade Level</option>';
                                                                            $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                                            while ($row2 = mysqli_fetch_array($get_glevel)) {
                                                                                echo '<option value="' . $row2['grade_level'] . '">'
                                                                                    . $row2['grade_level'] . '</option>';
                                                                            }
                                                                        } else {
                                                                            echo '<option disabled>Select Grade Level</option>
                                                        <option value="' . $row['app_grade_level'] . '" selected>'
                                                                                . $row['app_grade_level'] . '</option>';
                                                                            $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level NOT IN ('" . $row['app_grade_level'] . "') ");
                                                                            while ($row3 = mysqli_fetch_array($get_glevel)) {
                                                                                echo '<option value="' . $row3['grade_level'] . '">'
                                                                                    . $row3['grade_level'] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr style="border: 1px solid black;">
                                                    <h4 class="text-lg-center mb-3 mt-3">Family Background</h4>
                                                    <hr style="border: 1px solid black;">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Name of Father</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Fullname"
                                                                    value="<?php echo $row['fname']; ?>" name="fname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Name of Mother</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Fullname"
                                                                    value="<?php echo $row['mname']; ?>" name="mname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Age</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Age"
                                                                    value="<?php echo $row['fage']; ?>" name="fage">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Age</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Age"
                                                                    value="<?php echo $row['fage']; ?>" name="fage">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Email Add.</label>
                                                                <input type="email" class="form-control focss"
                                                                    placeholder="(Father) Email Address"
                                                                    value="<?php echo $row['femail']; ?>" name="femail">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Email Add.</label>
                                                                <input type="email" class="form-control focss"
                                                                    placeholder="(Mother) Email Address"
                                                                    value="<?php echo $row['memail']; ?>" name="memail">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Landline No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Landline Number"
                                                                    value="<?php echo $row['flandline']; ?>"
                                                                    name="flandline">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Landline No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Landline Number"
                                                                    value="<?php echo $row['mlandline']; ?>"
                                                                    name="mlandline">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Contact No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Contact Number"
                                                                    value="<?php echo $row['fcontact']; ?>"
                                                                    name="fcontact">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Contact No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Contact Number"
                                                                    value="<?php echo $row['mcontact']; ?>"
                                                                    name="mcontact">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Education Attain.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Educational Attainment"
                                                                    value="<?php echo $row['feduc_attain']; ?>"
                                                                    name="feduc_attain">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Educational Attain.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Educational Attainment"
                                                                    value="<?php echo $row['meduc_attain']; ?>"
                                                                    name="meduc_attain">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Last School Attended</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Last School Attended"
                                                                    value="<?php echo $row['flast_sch_att']; ?>"
                                                                    name="flast_sch_att">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Last School Attended</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Last School Attended"
                                                                    value="<?php echo $row['mlast_sch_att']; ?>"
                                                                    name="mlast_sch_att">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Occupation</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Father Occupation"
                                                                    value="<?php echo $row['focc']; ?>" name="focc">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Occupation</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Mother Occupation"
                                                                    value="<?php echo $row['mocc']; ?>" name="mocc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Employer</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Employer (Name of the Company)"
                                                                    value="<?php echo $row['femployer']; ?>"
                                                                    name="femployer">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Employer</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Employer (Name of the Company)"
                                                                    value="<?php echo $row['memployer']; ?>"
                                                                    name="memployer">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Business Add.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Business Address"
                                                                    value="<?php echo $row['fbus_ad']; ?>"
                                                                    name="fbus_ad">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Business Add.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Business Address"
                                                                    value="<?php echo $row['mbus_ad']; ?>"
                                                                    name="mbus_ad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Office Phone No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Father) Office Phone Number"
                                                                    value="<?php echo $row['fof_ph_no']; ?>"
                                                                    name="fof_ph_no">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Office Phone No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="(Mother) Office Phone Number"
                                                                    value="<?php echo $row['mof_ph_no']; ?>"
                                                                    name="mof_ph_no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 ml-auto mr-auto">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Monthly Income</label>
                                                                <input type="number" class="form-control focss"
                                                                    placeholder="(Father) Monthly Income"
                                                                    value="<?php echo $row['fmonth_inc']; ?>"
                                                                    name="fmonth_inc">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 ml-auto mr-auto">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Monthly Income</label>
                                                                <input type="number" class="form-control focss"
                                                                    placeholder="(Mother) Monthly Income"
                                                                    value="<?php echo $row['mmonth_inc']; ?>"
                                                                    name="mmonth_inc">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr style="border: 1px solid black;">

                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Guardian Name</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Guardian Name"
                                                                    value="<?php echo $row['guardname']; ?>"
                                                                    name="guardname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Relationship</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Relationship"
                                                                    value="<?php echo $row['grelation'] ?>"
                                                                    name="grelation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Address</label>
                                                                <input type="text" class="form-control focss"
                                                                    name="gaddress"
                                                                    value="<?php echo $row['gaddress']; ?>"
                                                                    placeholder="Unit number, house number, street name, barangay, city, province">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Tel No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    name="gtel_no"
                                                                    value="<?php echo $row['gtel_no']; ?>"
                                                                    placeholder="Telephone Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Cellphone No.</label>
                                                                <input type="text" class="form-control focss"
                                                                    name="gcontact"
                                                                    value="<?php echo $row['gcontact']; ?>"
                                                                    placeholder="Cellphone Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-search-input"
                                                                    class="col-form-label">Email Address</label>
                                                                <input type="email" class="form-control focss"
                                                                    name="gemail" value="<?php echo $row['gemail']; ?>"
                                                                    placeholder="Email Address">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr style="border: 1px solid black;">
                                                    <h4 class="text-lg-center mb-3 mt-3">Siblings (From Eldest to
                                                        Youngest)</h4>
                                                    <hr style="border: 1px solid black;">

                                                    <div class="form-group row mb-3">

                                                        <div class=" col-xl-3 mb-2">

                                                            <label for="exampleInputBorder">Name:</label>

                                                            <input type="text" id="exampleInputBorder"
                                                                class="form-control focss form-control-border focs mb-2"
                                                                placeholder="Name"
                                                                value="<?php echo $row['sib1_name']; ?>"
                                                                name="sib1_name">
                                                            <input type="text" id="exampleInputBorder"
                                                                class="form-control focss form-control-border focs mb-2"
                                                                placeholder="Name"
                                                                value="<?php echo $row['sib2_name']; ?>"
                                                                name="sib2_name">
                                                            <input type="text" id="exampleInputBorder"
                                                                class="form-control focss form-control-border focs mb-2"
                                                                placeholder="Name"
                                                                value="<?php echo $row['sib3_name']; ?>"
                                                                name="sib3_name">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Name" value="<?php echo $row['sib4_name']; ?>" name="sib4_name">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Name" value="<?php echo $row['sib5_name']; ?>" name="sib5_name">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Name" value="<?php echo $row['sib6_name']; ?>" name="sib6_name">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Name" value="<?php echo $row['sib7_name']; ?>" name="sib7_name">
                                                        </div>

                                                        <div class=" col-xl-1 mb-2">

                                                            <label for="exampleInputBorder">Age:</label>

                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Age" value="<?php echo $row['sib1_age']; ?>" name="sib1_age">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Age" value="<?php echo $row['sib2_age']; ?>" name="sib2_age">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Age" value="<?php echo $row['sib3_age']; ?>" name="sib3_age">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Age" value="<?php echo $row['sib4_age']; ?>" name="sib4_age">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Age" value="<?php echo $row['sib5_age']; ?>" name="sib5_age">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Age" value="<?php echo $row['sib6_age']; ?>" name="sib6_age">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Age" value="<?php echo $row['sib7_age']; ?>" name="sib7_age">
                                                        </div>
                                                        <div class=" col-xl-2 mb-2">

                                                            <label for="exampleInputBorder">Civil Status:</label>

                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Civil Status" value="<?php echo $row['sib1_civ']; ?>" name="sib1_civ">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Civil Status" value="<?php echo $row['sib2_civ']; ?>" name="sib2_civ">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Civil Status" value="<?php echo $row['sib3_civ']; ?>" name="sib3_civ">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Civil Status" value="<?php echo $row['sib4_civ']; ?>" name="sib4_civ">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Civil Status" value="<?php echo $row['sib5_civ']; ?>" name="sib5_civ">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Civil Status" value="<?php echo $row['sib6_civ']; ?>" name="sib6_civ">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Civil Status" value="<?php echo $row['sib7_civ']; ?>" name="sib7_civ">

                                                        </div>

                                                        <div class=" col-xl-3 mb-2">

                                                            <label for="exampleInputBorder">School:</label>

                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="School" value="<?php echo $row['sib1_sch']; ?>" name="sib1_sch">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="School" value="<?php echo $row['sib2_sch']; ?>" name="sib2_sch">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="School" value="<?php echo $row['sib3_sch']; ?>" name="sib3_sch">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="School" value="<?php echo $row['sib4_sch']; ?>" name="sib4_sch">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="School" value="<?php echo $row['sib5_sch']; ?>" name="sib5_sch">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="School" value="<?php echo $row['sib6_sch']; ?>" name="sib6_sch">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="School" value="<?php echo $row['sib7_sch']; ?>" name="sib7_sch">
                                                        </div>


                                                        <div class=" col-xl-3 mb-2">

                                                            <label for="exampleInputBorder">Educ. Background</label>

                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Educational Background" value="<?php echo $row['sib1_educbg']; ?>" name="sib1_educbg">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Educational Background" value="<?php echo $row['sib2_educbg']; ?>" name="sib2_educbg">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Educational Background" value="<?php echo $row['sib3_educbg']; ?>" name="sib3_educbg">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Educational Background" value="<?php echo $row['sib4_educbg']; ?>" name="sib4_educbg">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Educational Background" value="<?php echo $row['sib5_educbg']; ?>" name="sib5_educbg">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Educational Background" value="<?php echo $row['sib6_educbg']; ?>" name="sib6_educbg">
                                                            <input type="text" id="exampleInputBorder" class="form-control focss form-control-border focs mb-2
mb-2
mb-2" placeholder="Educational Background" value="<?php echo $row['sib7_educbg']; ?>" name="sib7_educbg">

                                                        </div>


                                                    </div>

                                                    <hr style="border: 1px solid black;">
                                                    <h4 class="text-lg-center mb-3 mt-3">Educational Background</h4>
                                                    <hr style="border: 1px solid black;">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">School Last Attended</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="School Last Attended"
                                                                    name="last_attend"
                                                                    value="<?php echo $row['last_sch']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Previous Grade Level</label>
                                                                <select class="form-control form-control-lg"
                                                                    data-dropdown-css-class="select2-purple"
                                                                    data-placeholder="Select Grade Level"
                                                                    name="prev_grade_level">
                                                                    <?php if (empty($row['prev_grade_level'])) {
                                                                            echo '<option value="None" disabled selected>Select Grade Level</option>
                                                            <option value="None">N/A</option>';
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
                                                                <label for="example-url-input"
                                                                    class="col-form-label">School Year</label>
                                                                <input type="text" class="form-control focss"
                                                                    data-inputmask-alias="datetime"
                                                                    data-inputmask-inputformat="yyyy-yyyy" data-mask
                                                                    placeholder="School Year" name="sch_year"
                                                                    value="<?php echo $row['sch_year']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">School Address</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="School Address" name="sch_address"
                                                                    value="<?php echo $row['sch_address']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Honors & Awards</label>
                                                                <input type="text" class="form-control focss focss"
                                                                    placeholder="Honors & Awards" name="honor"
                                                                    value="<?php echo $row['honor']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <hr style="border: 1px solid black;">
                                                    <h4 class="text-lg-center mb-3 mt-3">Special
                                                        Talents/Skills<small> (please check)</small></h4>
                                                    <hr style="border: 1px solid black;">

                                                    <div
                                                        class="form-group row mb-1 justify-content-center mr-auto ml-auto">

                                                        <?php
                                                            if (!empty($row['talent'])) {
                                                                $get_talent = $row['talent'];
                                                                $res_talent = explode(",", $get_talent);
                                                            }  ?>

                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox1" value="Dancing"
                                                                name="talent[]"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                                                            if (in_array("Dancing", $res_talent)) {
                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                            }
                                                                                                                                                                                                        } ?>>
                                                            <label for="customCheckbox1"
                                                                class="custom-control-label font-weight-bold">
                                                                Dancing</label>
                                                        </div>


                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox2" value="Singing"
                                                                name="talent[]"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                                                            if (in_array("Singing", $res_talent)) {
                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                            }
                                                                                                                                                                                                        } ?>>
                                                            <label for="customCheckbox2"
                                                                class="custom-control-label font-weight-bold">
                                                                Singing</label>
                                                        </div>


                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox3"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                            if (in_array("Basketball", $res_talent)) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            }
                                                                                                                                                                        } ?>
                                                                name="talent[]" value="Basketball">
                                                            <label for="customCheckbox3"
                                                                class="custom-control-label font-weight-bold">
                                                                Basketball</label>
                                                        </div>

                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox4"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                            if (in_array("Volleyball", $res_talent)) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            }
                                                                                                                                                                        } ?>
                                                                name="talent[]" value="Volleyball">
                                                            <label for="customCheckbox4"
                                                                class="custom-control-label font-weight-bold">
                                                                Volleyball</label>
                                                        </div>



                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox5"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                            if (in_array("Chess", $res_talent)) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            }
                                                                                                                                                                        } ?>
                                                                name="talent[]" value="Chess">
                                                            <label for="customCheckbox5"
                                                                class="custom-control-label font-weight-bold">
                                                                Chess</label>
                                                        </div>



                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox6"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                            if (in_array("Tennis", $res_talent)) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            }
                                                                                                                                                                        } ?>
                                                                name="talent[]" value="Tennis">
                                                            <label for="customCheckbox6"
                                                                class="custom-control-label font-weight-bold">
                                                                Table Tennis</label>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group row mb-1 justify-content-center mr-auto ml-auto">

                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox7"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                            if (in_array("Drawing", $res_talent)) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            }
                                                                                                                                                                        } ?>
                                                                name="talent[]" value="Drawing">
                                                            <label for="customCheckbox7"
                                                                class="custom-control-label font-weight-bold">
                                                                Drawing</label>
                                                        </div>



                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox8"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                            if (in_array("Painting", $res_talent)) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            }
                                                                                                                                                                        } ?>
                                                                name="talent[]" value="Painting">
                                                            <label for="customCheckbox8"
                                                                class="custom-control-label font-weight-bold">
                                                                Painting</label>
                                                        </div>


                                                        <div class="custom-control col-md-6 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox9"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                            if (in_array("Music", $res_talent)) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            }
                                                                                                                                                                        } ?>
                                                                name="talent[]" value="Music">
                                                            <label for="customCheckbox9"
                                                                class="custom-control-label font-weight-bold">
                                                                Playing Musical Instrument</label>
                                                            <label class="mb-0 font-weight-bold">,
                                                                Specify:</label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="text"
                                                                    class="form-control form-control-border focs"
                                                                    value="<?php echo $row['spec']; ?>" name="spec">
                                                            </div>

                                                        </div>
                                                        <div class="custom-control col-md-2 custom-checkbox">
                                                        </div>


                                                    </div>

                                                    <div
                                                        class="form-group justify-content-center row mb-1 mr-auto ml-auto">
                                                        <div class="custom-control col-md-5 custom-checkbox">
                                                            <input
                                                                class="custom-control-input custom-control-input-purple"
                                                                type="checkbox" id="customCheckbox10" value="other"
                                                                name="talent[]"
                                                                <?php if (!empty($res_talent)) {
                                                                                                                                                                                                        if (in_array("other", $res_talent)) {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        }
                                                                                                                                                                                                    } ?>>
                                                            <label for="customCheckbox10"
                                                                class=" custom-control-label font-weight-bold">
                                                                Other</label>

                                                            <label class="font-weight-bold mb-0">, Please
                                                                Specify:</label>

                                                            <input type="text"
                                                                class="form-control form-control-border focs"
                                                                value="<?php echo $row['other']; ?>" name="other">

                                                        </div>

                                                        <div class="custom-control col-md-7 custom-checkbox">
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Academic</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Academic Competitions Joined"
                                                                    name="acad_c" value="<?php echo $row['acad_c']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Sports</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Sports Competitions Joined"
                                                                    name="sport_c"
                                                                    value="<?php echo $row['sport_c']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">School Org.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Memberhip in School Organization"
                                                                    name="sch_m" value="<?php echo $row['sch_m']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-url-input"
                                                                    class="col-form-label">Community/Religous
                                                                    Org.</label>
                                                                <input type="text" class="form-control focss"
                                                                    placeholder="Membership in Community / Religious Organization"
                                                                    name="comrel_m"
                                                                    value="<?php echo $row['comrel_m']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <?php } ?>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary mb-3 mt-3 float-right">Update Personal
                                                        Info.</button>
                                        </form>
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