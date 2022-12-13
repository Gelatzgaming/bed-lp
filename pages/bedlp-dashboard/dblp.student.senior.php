<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-3 mt-5 mb-3">
                <div class="card">
                    <div class="small-box bg-info">
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <div class="seofct-icon"><i class="fa fa-book"></i><br><small> Total No.
                                    of</small><br>
                                Subjects</div>
                            <?php
                            $get_stud =  mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                        WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
                            $confirm = mysqli_num_rows($get_level_id);

                            if ($confirm > 0) {
                                $get_enrolled_sub = mysqli_query($conn, "SELECT count(sub.subject_id) AS csub
                            FROM tbl_enrolled_subjects AS ensub
                            LEFT JOIN tbl_schedules AS sched ON sched.schedule_id = ensub.schedule_id
                            LEFT JOIN tbl_students AS stud ON stud.student_id = ensub.student_id
                            LEFT JOIN tbl_subjects_senior AS sub ON sub.subject_id = sched.subject_id
                            LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                            LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                            WHERE stud.student_id = $stud_id AND sched.semester = '$sem_n' AND sched.acadyear = '$acad_n'") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($get_enrolled_sub)) {
                            ?>
                            <h1 class="mb-5" style="color: white;"><?php echo $row['csub']; ?></h1>
                            <?php }
                            } else { ?>
                            <h1 class="mb-5" style="color: white;">0</h1>
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
    </div>
</section>