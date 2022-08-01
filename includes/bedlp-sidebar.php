  <!-- sidebar menu area start -->
  <div class="sidebar-menu">
      <div class="sidebar-header">
          <div class="logo">
              <!-- <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a> -->
              <h3 class="text-white"> <?php echo $school_name; ?> <br> <small
                      class="text-sm"><?php echo $school_address; ?>
                  </small></h3>
          </div>
      </div>
      <div class="main-menu">

          <div class="menu-inner">
              <nav>
                  <ul class="metismenu" id="menu">
                      <!-- MASTER KEY -->
                      <?php if ($_SESSION['role'] == "Master Key") {
                            echo '<li class="active">
                          <a href="javascript:void(0)" aria-expanded="true"><i
                                  class="ti-dashboard"></i><span>dashboard</span></a>
                        </li>
                      
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-plus-circle"></i>
                            <span>Add Users</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="../bedlp-master-key/add.registrar.php">Add Registrar</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/add.principal.php">Add Principal</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/add.adviser.php">Add Adviser</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/add.teacher.php">Add Teacher</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/add.admission.php">Add Admission</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/add.accounting.php">Add Accounting </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-list"></i>
                            <span>Users Lists</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="../bedlp-master-key/list.registrar.php"> Registrar List</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/list.principal.php"> Principal List</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/list.adviser.php"> Adviser List</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/list.teacher.php"> Teacher List</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/list.admission.php"> Admission List</a>
                                    </li>
                                    <li>
                                        <a href="../bedlp-master-key/list.accounting.php"> Accounting List </a>
                                    </li>
                                </ul>
                            </li>';
                            //   END OF MASTER KEY

                            // REGISTRAR SIDE
                        } elseif ($_SESSION['role'] == "Registrar") {
                            echo '<li class="active">
                      <a href="javascript:void(0)" aria-expanded="true"><i
                              class="ti-dashboard"></i><span>dashboard</span></a>
                  </li>
                  <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-line-chart"></i>
                            <span>Enrollment</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="index3-horizontalmenu.html">Confirm Students </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-gear"></i>
                            <span>Maintenance</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="index3-horizontalmenu.html">Student List </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">Adviser List </a>
                                    </li>
                                    <li><a href="#" aria-expanded="true">Subjects List</a>
                                        <ul class="collapse">
                                        <li>
                                        <a href="index3-horizontalmenu.html">Senior </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">Primary - Junior </a>
                                    </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-newspaper-o"></i>
                            <span>Forms</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="index3-horizontalmenu.html">Pre-Enrollment </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">Reg Form </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-book"></i>
                            <span>View Subjects</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="index3-horizontalmenu.html">ABM </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">STEM </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">HUMMS </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">TVL-HE </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">TVL-ICT </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-chain"></i>
                            <span>Data Entry</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="index3-horizontalmenu.html">Add Students </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">Add Adviser </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">Add Sections </a>
                                    </li>
                                    <li><a href="#" aria-expanded="true">Add Subjects</a>
                                        <ul class="collapse">
                                        <li>
                                        <a href="index3-horizontalmenu.html">Senior </a>
                                    </li>
                                    <li>
                                        <a href="index3-horizontalmenu.html">Primary - Junior </a>
                                    </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>';
                            //   END OF REGISTRAR

                            // PRINCIPAL SIDE
                        } elseif ($_SESSION['role'] == "Principal") {
                            echo '<li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>';
                            // END OF PRINCIPAL

                            // ADMISSION SIDE
                        } elseif ($_SESSION['role'] == "Admission") {
                            echo '<li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>';
                            // END OF ADMISSION

                            // ACCOUNTING SIDE
                        } elseif ($_SESSION['role'] == "Accounting") {
                            echo '<li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>';
                            // END OF ACCOUNTING

                            // TEACHER SIDE
                        } elseif ($_SESSION['role'] == "Teacher") {
                            echo '<li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>';
                            // END OF TEACHER

                            // ADVISER SIDE
                        } elseif ($_SESSION['role'] == "Adviser") {
                            echo '<li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>';
                            // END OF ADVISER

                            // STUDENT SIDE
                        } elseif ($_SESSION['role'] == "Student") {
                            echo '<li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>';
                            // END OF STUDENT
                        }

                        ?>


                  </ul>
              </nav>
          </div>
      </div>
  </div>
  <!-- sidebar menu area end -->