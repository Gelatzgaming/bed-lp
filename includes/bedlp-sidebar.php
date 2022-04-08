  <!-- sidebar menu area start -->
  <div class="sidebar-menu">
      <div class="sidebar-header">
          <div class="logo">
              <!-- <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a> -->
              <h3 class="text-white"> <?php echo $school_name;?> <br> <small
                      class="text-sm"><?php echo $school_address;?>
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
                      </li>';
                    //   END OF MASTER KEY

                    // REGISTRAR SIDE
                      }elseif ($_SESSION['role'] == "Registrar")  {
                      echo '<li class="active">
                      <a href="javascript:void(0)" aria-expanded="true"><i
                              class="ti-dashboard"></i><span>dashboard</span></a>
                  </li>';
                    //   END OF REGISTRAR

                    // PRINCIPAL SIDE
                    }elseif ($_SESSION['role'] == "Principal") {
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