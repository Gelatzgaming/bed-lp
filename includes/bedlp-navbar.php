<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-md-6 col-sm-8 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
                <form action="#">
                    <input type="text" name="search" placeholder="Search..." required>
                    <i class="ti-search"></i>
                </form>
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <li>

                    <?php $get_acadyear = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_active_acadyears.ay_id");
                    while ($row = mysqli_fetch_array($get_acadyear)) {
                        $get_ay = $row['academic_year'];
                    }

                    $get_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_active_semesters.semester_id");
                    while ($row = mysqli_fetch_array($get_sem)) {
                        $get_semester = $row['semester'];
                    } ?>

                    <h6 class="info-box-text"><i class="fa fa-bookmark"></i> A.Y <?php echo $get_ay; ?>
                        | <?php echo $get_semester; ?>
                    </h6>



                </li>
                <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                <li class="dropdown">
                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                        <span>2</span>
                    </i>
                    <div class="dropdown-menu bell-notify-box notify-box">
                        <span class="notify-title">You have 3 new notifications <a href="#">view
                                all</a></span>
                        <div class="nofity-list">
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                <div class="notify-text">
                                    <p>You have Changed Your Password</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                <div class="notify-text">
                                    <p>New Commetns On Post</p>
                                    <span>30 Seconds ago</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                <div class="notify-text">
                                    <p>Some special like you</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                <div class="notify-text">
                                    <p>New Commetns On Post</p>
                                    <span>30 Seconds ago</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                <div class="notify-text">
                                    <p>Some special like you</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                <div class="notify-text">
                                    <p>You have Changed Your Password</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                <div class="notify-text">
                                    <p>You have Changed Your Password</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                    <div class="dropdown-menu notify-box nt-enveloper-box">
                        <span class="notify-title">You have 3 new notifications <a href="#">view
                                all</a></span>
                        <div class="nofity-list">
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img1.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img2.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">When you can connect with me...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img3.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">I missed you so much...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img4.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Your product is completely Ready...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img2.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img1.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img3.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="settings-btn">
                    <i class="ti-settings"></i>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- header area end -->

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left"><?php echo $par_page ?></h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="../bedlp-dashboard/index.php"> Home </a></li>

                    <li><span><?php echo $cur_page ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="data:image/jpeg;base64, <?php echo base64_encode($user_img); ?>"
                    alt="avatar">
                <h4 class="user-name dropdown-toggle text-black" data-toggle="dropdown"><?php echo $user_fullname; ?><i
                        class="fa fa-angle-down"></i>
                </h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../bedlp-login/userData/user.bedlp-logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->