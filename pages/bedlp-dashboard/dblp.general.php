<?php
$active_ay = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
while ($row = mysqli_fetch_array($active_ay)) {
    $ay_id = $row['ay_id'];
} ?>

<?php $active_ay = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
while ($row = mysqli_fetch_array($active_ay)) {
    $sem_id = $row['semester_id'];
} ?>

<section class="content">
    <div class="container-fluid ">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-3 mt-5 mb-3">
                <div class="card">
                    <div class="small-box bg-info">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-group"></i><br><small> Total No.
                                    of</small><br>
                                Enrolled
                                Students</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND (semester_id = '$sem_id' OR semester_id = '0')") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-5 mb-3">
                <div class="card">
                    <div class="small-box bg-success">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-group"></i><br><small> Total No.
                                    of</small><br>
                                New Enrolled
                                Students</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND stud_type = 'New' AND (semester_id = '$sem_id' OR semester_id = '0')") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-5 mb-3">
                <div class="card">
                    <div class="small-box bg-secondary">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-group"></i><br><small> Total No.
                                    of</small><br>
                                Old Enrolled
                                Students</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND stud_type = 'Old' AND (semester_id = '$sem_id' OR semester_id = '0')") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-5 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: olive;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-clock-o"></i><br><small> Total No.
                                    of</small><br>
                                Pending Enrollees</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND (remark = 'Pending' OR remark = 'Canceled') AND (semester_id = '$sem_id' OR semester_id = '0')") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box bg-danger">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-minus-circle"></i><br><small> Total No.
                                    of</small><br>
                                Dropped Students</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Dropped'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: navy;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-minus-circle"></i><br><small> Total No.
                                    of</small><br>
                                Online Inquiry</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(or_id) AS total_stud FROM tbl_online_reg WHERE remark = 'Pending'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-3 col-6">
            </div>
            <div class="col-lg-3 col-6">
            </div>
            <!-- small box -->
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: black;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-support"></i><br><small> Total No.
                                    of</small><br>
                                Grade 11 Students in (STEM)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND strand_id = '4' AND remark = 'Approved' AND grade_level_id = '14'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: black;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-support"></i><br><small> Total No.
                                    of</small><br>
                                Grade 12 Students in (STEM)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND strand_id = '4' AND remark = 'Approved' AND grade_level_id = '15'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: teal;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-line-chart"></i><br><small> Total No.
                                    of</small><br>
                                Grade 11 Students in (ABM)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND remark = 'Approved' AND strand_id = '1' AND grade_level_id = '14'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: teal;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-line-chart"></i><br><small> Total No.
                                    of</small><br>
                                Grade 12 Students in (ABM)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND remark = 'Approved' AND strand_id = '1' AND grade_level_id = '15'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: maroon;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-suitcase"></i><br><small> Total No.
                                    of</small><br>
                                Grade 11 Students in (GAS)</div>
                            <?php $str_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND strand_id = '2' AND grade_level_id = '14' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($str_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: maroon;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-suitcase"></i><br><small> Total No.
                                    of</small><br>
                                Grade 12 Students in (GAS)</div>
                            <?php $str_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND strand_id = '2' AND grade_level_id = '15' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($str_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: purple;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-comments"></i><br><small> Total No.
                                    of</small><br>
                                Grade 11 Students in (HUMSS)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND remark = 'Approved' AND strand_id = '3' AND grade_level_id = '14' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: purple;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-comments"></i><br><small> Total No.
                                    of</small><br>
                                Grade 12 Students in (HUMSS)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND remark = 'Approved' AND strand_id = '3' AND grade_level_id = '15' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: orange;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-cutlery"></i><br><small> Total No.
                                    of</small><br>
                                Grade 11 Students in (TVL-HE)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND remark = 'Approved' AND strand_id = '5' AND grade_level_id = '14' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: orange;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-cutlery"></i><br><small> Total No.
                                    of</small><br>
                                Grade 12 Students in (TVL-HE)</div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND semester_id = '$sem_id' AND remark = 'Approved' AND strand_id = '5' AND grade_level_id = '15' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-6">
            </div>
            <div class="col-lg-3 col-6">
            </div>

            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 10 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '13' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 9 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '12' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 8 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '11' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 7 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '10' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 6 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '9' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 5 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '8' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 4 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '7' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 3 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '6' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 2 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '5' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #095073;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Grade 1 Students </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '4' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-3 col-6">
            </div>
            <div class="col-lg-3 col-6">
            </div>

            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #850554;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Enrolled Students in (Kinder) </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '3' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #850554;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Enrolled Students in (Pre-Kinder) </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '2' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-3">
                <div class="card">
                    <div class="small-box" style="background-color: #850554;">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-star"></i><br><small> Total No.
                                    of</small><br>
                                Enrolled Students in (Nursery) </div>
                            <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND grade_level_id = '1' ") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['total_stud']; ?></h1>
                            <?php } ?>
                        </div>
                        <div style="margin: 0 auto; text-align: center;">
                            <a href="db.newStudents.php" class="small-box-footer"
                                style="color: white; margin: 0px; display:block; margin-bottom: 10px;">View
                                Details <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>