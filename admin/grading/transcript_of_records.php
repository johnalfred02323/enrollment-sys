<!-- Head -->
<?php require '../../src/layout/grading/head.php';
include('../../config/config.php');

?>
  <link href="css/tor.css" rel="stylesheet">
  <link href="datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <!-- jquery -->

  <script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


  <title>GRC | Grading System | Transcript of Records</title>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Side Nav -->
        <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../grading">
        <div class="sidebar-brand-icon">
          <img src="../../src/img/grc-header.png" width="150px;">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../grading">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Student/Faculty
      </div>

      <!-- Faculty Users -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="faculty_users">
          <i class="fas fa-users"></i>
          <span>Faculty Users</span></a>
      </li> -->


      <!-- Grade Viewing -->
      <li class="nav-item">
        <a class="nav-link" href="grade_viewing">
          <i class="fas fa-code"></i>
          <span>Grade Viewing</span></a>
      </li>


      <!-- Class Records -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="class_records">
          <i class="fas fa-cabinet-filing"></i>
          <span>Class Records</span></a>
      </li>       -->

      <!-- Grade Change -->
      <li class="nav-item">
        <a class="nav-link" href="grade_change">
          <i class="far fa-exchange"></i>
          <span>Grade Change</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Reports
      </div>

      <!-- Report of Grade -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="grade_report">
          <i class="fas fa-list-ol"></i>
          <span>Report of Grade</span></a>
      </li> -->

      <!-- Grade Slip -->
      <li class="nav-item">
        <a class="nav-link" href="grade_slip">
          <i class="fas fa-scroll"></i>
          <span>Grade Slip</span></a>
      </li>

      <!-- TOR -->
      <li class="nav-item active">
        <a class="nav-link" href="transcript_of_records">
          <i class="fas fa-clipboard-user"></i>
          <span>Transcript of Records</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Top Nav -->
        <?php require '../../src/layout/grading/top-nav.php'; ?>
       <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="index">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transcript of Records</li>
          </ol>
        </nav>
        <!-- SPACER -->
        <div class="mx-auto" style="height: 10px;"></div>

        <div class="card shadow-sm mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold card-text-title-head" id="header">Transcript of Records Process (Auto)</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Option</div>
                <a class="dropdown-item active" href="#" id="opt_auto">Auto (System Based)</a>
                <a class="dropdown-item" href="#" id="opt_manual">Manual</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <!-- auto -->
            <div id="tor-process">
              <ul id="section-tabs">
                <li class="current active"><span>1.</span> Student Data</li>
                <li><span>2.</span> Education Background</li>
                <li><span>3.</span> Degree Information</li>
                <li><span>4.</span> Remarks</li>
              </ul>
              <div id="fieldsets">
                <fieldset class="current">
                  <div class="row">
                    <div class="col">
                      <div id="sn" class="form-group">
                        <input type="text" class="form-control" id="stud_number" autocomplete="off" required="" maxlength="13">
                        <label for="stud_number" class="float-label" style="font-family:Arial, FontAwesome">Student Number</label>
                        <errorsn>
                          <span>Student Number is required</span>
                            <i>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M0 0h24v24h-24z" fill="none"/>
                                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                              </svg>
                            </i>
                        </errorsn>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="stud_name" autocomplete="off" required="" disabled="">
                        <label for="stud_name" class="float-label" style="font-family:Arial, FontAwesome">Name</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="stud_nationality" autocomplete="off" required="" disabled="">
                        <label for="stud_nationality" class="float-label" style="font-family:Arial, FontAwesome">Nationality</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <input type="text" class="form-control" id="stud_address" autocomplete="off" required="" disabled="">
                        <label for="stud_address" class="float-label" style="font-family:Arial, FontAwesome">Address</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="stud_sex" autocomplete="off" required="" disabled="" maxlength="1">
                        <label for="stud_sex" class="float-label" style="font-family:Arial, FontAwesome">Sex</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group input-group date" data-provide="datepicker" data-date-format="MM dd, yyyy">
                          <input type="text" class="form-control" id="stud_birthday" required="" autocomplete="off" disabled="">
                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                          </div>
                          <label for="stud_birthday" class="float-label" style="font-family:Arial, FontAwesome">Date of Birth</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="stud_birthplace" autocomplete="off" required="" disabled="">
                        <label for="stud_birthplace" class="float-label" style="font-family:Arial, FontAwesome">Place of Birth</label>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <fieldset class="next">
                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_prelim_educ" autocomplete="off" required="">
                    <label for="stud_prelim_educ" class="float-label" style="font-family:Arial, FontAwesome">Preliminary Education</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_second_educ" autocomplete="off" required="">
                    <label for="stud_second_educ" class="float-label" style="font-family:Arial, FontAwesome">Secondary Education</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_dt_admission" autocomplete="off" required="" >
                    <label for="stud_dt_admission" class="float-label" style="font-family:Arial, FontAwesome">Date/Semeter Admitted</label>
                  </div>
                </fieldset>
                <fieldset class="next">
                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_degree" autocomplete="off" required="">
                    <label for="stud_degree" class="float-label" style="font-family:Arial, FontAwesome">Degree/Title/Course</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_major" autocomplete="off" required="">
                    <label for="stud_major" class="float-label" style="font-family:Arial, FontAwesome">Major</label>
                  </div>

                  <div class="form-group input-group date" data-provide="datepicker" data-date-format="MM dd, yyyy">
                      <input type="text" class="form-control" id="stud_dt_conferred" required="" autocomplete="off">
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <label for="stud_dt_conferred" class="float-label" style="font-family:Arial, FontAwesome">Date Conferred</label>
                  </div>
                </fieldset>
                <fieldset class="next">
                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_prepared_by" autocomplete="off" required="" value="<?php echo $_COOKIE['name'];?>">
                    <label for="stud_prepared_by" class="float-label" style="font-family:Arial, FontAwesome">Prepared By</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_checked_by" autocomplete="off" required="">
                    <label for="stud_checked_by" class="float-label" style="font-family:Arial, FontAwesome">Checked By</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_remarks" autocomplete="off" required="">
                    <label for="stud_remarks" class="float-label" style="font-family:Arial, FontAwesome">Remarks</label>
                  </div>

                  <div class="form-group input-group date" data-provide="datepicker" data-date-format="MM dd, yyyy">
                      <input type="text" class="form-control" id="stud_dt_issued" required="" autocomplete="off">
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <label for="stud_dt_issued" class="float-label" style="font-family:Arial, FontAwesome">Date Issued</label>
                  </div>
                  <?php $get_registrar = mysqli_query($conn,"SELECT name FROM gradereport_config WHERE position = 'Registrar'");
                  $get_registrar_data = mysqli_fetch_assoc($get_registrar);?>
                  <div class="form-group">
                    <input type="text" class="form-control" id="stud_registrar" autocomplete="off" required="" value="<?php echo $get_registrar_data['name']; ?>">
                    <label for="stud_registrar" class="float-label" style="font-family:Arial, FontAwesome">University Registrar</label>
                  </div>
                </fieldset>
                <button class="btn btn-danger c-btn disabled" disabled="" id="next">Next Section ▷</button>
                <button class="btn btn-danger c-btn" id="process_btn" data-toggle="modal" data-target="#review-output">Process</button>
              </div>
            </div>

            <!-- manual process -->

            <div id="tor-process-manual" style="display:none;">
              <ul id="section-tabs-manual">
                <li class="current active"><span>1.</span> Student Data</li>
                <li><span>2.</span> Education Background</li>
                <li><span>3.</span> Degree Information</li>
                <li><span>4.</span> Grades</li>
                <li><span>5.</span> Remarks</li>
              </ul>
              <div id="fieldsets-manual">
                <fieldset-manual class="current">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_stud_number" autocomplete="off" required="" maxlength="13">
                        <label for="stud_number" class="float-label" style="font-family:Arial, FontAwesome">Student Number</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_stud_name" autocomplete="off" required="">
                        <label for="manual_stud_name" class="float-label" style="font-family:Arial, FontAwesome">Name</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_stud_nationality" autocomplete="off" required="">
                        <label for="manual_stud_nationality" class="float-label" style="font-family:Arial, FontAwesome">Nationality</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_stud_address" autocomplete="off" required="">
                        <label for="manual_stud_address" class="float-label" style="font-family:Arial, FontAwesome">Address</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_stud_sex" autocomplete="off" required="" maxlength="1">
                        <label for="manual_stud_sex" class="float-label" style="font-family:Arial, FontAwesome">Sex</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group input-group date" data-provide="datepicker" data-date-format="MM dd, yyyy">
                          <input type="text" class="form-control" id="manual_stud_birthday" required="" autocomplete="off">
                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                          </div>
                          <label for="manual_stud_birthday" class="float-label" style="font-family:Arial, FontAwesome">Date of Birth</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_stud_birthplace" autocomplete="off" required="">
                        <label for="manual_stud_birthplace" class="float-label" style="font-family:Arial, FontAwesome">Place of Birth</label>
                      </div>
                    </div>
                  </div>
                </fieldset-manual>
                <fieldset-manual class="next overflow-auto">
                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_prelim_educ" autocomplete="off" required="">
                    <label for="manual_stud_prelim_educ" class="float-label" style="font-family:Arial, FontAwesome">Preliminary Education</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_second_educ" autocomplete="off" required="">
                    <label for="manual_stud_second_educ" class="float-label" style="font-family:Arial, FontAwesome">Secondary Education</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_dt_admission" autocomplete="off" required="" >
                    <label for="manual_stud_dt_admission" class="float-label" style="font-family:Arial, FontAwesome">Date/Semeter Admitted</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="manual_transferee_checkbox" required="" style="cursor: pointer;">
                    <label for="manual_transferee_checkbox" class="form-check-label" style="font-family:Arial, FontAwesome;cursor: pointer;">Transferee</label>
                  </div>

                  <div id="manual_transfere_educ" style="display:none">
                    <table class="table mh-25" id="educ_transferee">
                      <tbody>
                        <td><input id="transferee_school_name" style="text-transform: uppercase;" class="form-control" autocomplete="off"></td>
                        <td style="width:20%"><input id="transferee_school_year" class="form-control " autocomplete="off"></td>
                        <td style="width:auto"><button type="button" class="btn btn-primary" id="transferee_add_school" ripple><i class="fas fa-plus"></i> Add</button></td>
                      </tbody>
                    </table>
                  </div>

                </fieldset-manual>
                <fieldset-manual class="next">
                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_degree" autocomplete="off" required="">
                    <label for="manual_stud_degree" class="float-label" style="font-family:Arial, FontAwesome">Degree/Title/Course</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_major" autocomplete="off" required="">
                    <label for="manual_stud_major" class="float-label" style="font-family:Arial, FontAwesome">Major</label>
                  </div>

                  <div class="form-group input-group date" data-provide="datepicker" data-date-format="MM dd, yyyy">
                      <input type="text" class="form-control" id="manual_stud_dt_conferred" required="" autocomplete="off">
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <label for="manual_stud_dt_conferred" class="float-label" style="font-family:Arial, FontAwesome">Date Conferred</label>
                  </div>
                </fieldset-manual>
                <fieldset-manual class="next">
                  <div class="row">
                    <div class="col">
                      <div class="box2" style="margin-top: 5px;">
                        <label class="select-label">Semester</label>
                        <select id="manual_semester" required>
                          <option value="First Semester">First Semester</option>
                          <option value="Second Semester">Second Semester</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_school_year" autocomplete="off" required="">
                        <label for="manual_school_year" class="float-label" style="font-family:Arial, FontAwesome">School Year</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_subj_code" autocomplete="off" required="">
                        <label for="manual_subj_code" class="float-label" style="font-family:Arial, FontAwesome">Subject Code</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_subj_title" autocomplete="off" required="">
                        <label for="manual_subj_title" class="float-label" style="font-family:Arial, FontAwesome">Descriptive Title</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_final_grade" autocomplete="off" required="">
                        <label for="manual_final_grade" class="float-label" style="font-family:Arial, FontAwesome">Final Grade</label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <input type="text" class="form-control" id="manual_unit" autocomplete="off" required="">
                        <label for="manual_unit" class="float-label" style="font-family:Arial, FontAwesome">Units</label>
                      </div>
                    </div>
                    <div class="col">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <button class="btn btn-danger float-right mr-1" id="manual_add_grade"><i class="fas fa-plus"></i> Add</button>
                        <!-- <button class="btn btn-danger float-right mr-1" id="manual_sample" data-toggle="modal" data-target="#review-output"><i class="fas fa-plus"></i> sample</button> -->
                    </div>
                  </div>
                </fieldset-manual>
                <fieldset-manual class="next">
                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_prepared_by" autocomplete="off" required="" value="<?php echo $_COOKIE['name'];?>">
                    <label for="manual_stud_prepared_by" class="float-label" style="font-family:Arial, FontAwesome">Prepared By</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_checked_by" autocomplete="off" required="">
                    <label for="manual_stud_checked_by" class="float-label" style="font-family:Arial, FontAwesome">Checked By</label>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_remarks" autocomplete="off" required="">
                    <label for="manual_stud_remarks" class="float-label" style="font-family:Arial, FontAwesome">Remarks</label>
                  </div>

                  <div class="form-group input-group date" data-provide="datepicker" data-date-format="MM dd, yyyy">
                      <input type="text" class="form-control" id="manual_stud_dt_issued" required="" autocomplete="off">
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <label for="manual_stud_dt_issued" class="float-label" style="font-family:Arial, FontAwesome">Date Issued</label>
                  </div>
                  <?php $get_registrar = mysqli_query($conn,"SELECT name FROM gradereport_config WHERE position = 'Registrar'");
                  $get_registrar_data = mysqli_fetch_assoc($get_registrar);?>
                  <div class="form-group">
                    <input type="text" class="form-control" id="manual_stud_registrar" autocomplete="off" required="" value="<?php echo $get_registrar_data['name']; ?>">
                    <label for="manual_stud_registrar" class="float-label" style="font-family:Arial, FontAwesome">University Registrar</label>
                  </div>
                </fieldset-manual>
                <button class="btn btn-danger c-btn" id="next_manual">Next Section ▷</button>
                <button class="btn btn-danger c-btn" id="manual_process_btn" data-toggle="modal" data-target="#review-output">Process</button>
              </div>
            </div>
          </div>
        </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>
    </div>
    <form method="POST" action="view_tor.php" id="form" target="_blank">
      <input type="hidden" name="data" id="data" value="" />

      <input type="hidden" name="manual_stud_info" id="manual_stud_info" value="" />
      <input type="hidden" name="manual_all_grades" id="manual_all_grades" value="" />
      <input type="hidden" name="manual_com_sem_sy" id="manual_com_sem_sy" value="" />
      <input type="hidden" name="manual_tranferee_educ" id="manual_tranferee_educ" value="" />
      <input type="hidden" name="id_viewtor" id="id_viewtor" value="" />
    </form>

    <!-- <form method="POST" action="view_tor.php" id="manual_form" target="_blank">
      <input type="hidden" name="manual_stud_info" id="manual_stud_info" value="" />
      <input type="hidden" name="manual_all_grades" id="manual_all_grades" value="" />
      <input type="hidden" name="manual_viewtor" id="manual_viewtor" value="manual" />
    </form> -->

    <!-- Modal Start -->
    <div class="modal fade" id="review-output" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Review</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <h4>Student Data</h4>
            <span>Student Number: </span><strong><span id="review_sn"></span></strong><br/>
            <span>Name: </span><strong><span id="review_name"></span></strong><br/>
            <span>Nationality: </span><strong><span id="review_nationality"></span></strong><br/>
            <span>Gender: </span><strong><span id="review_sex"></span></strong><br/>
            <span>Address: </span><strong><span id="review_address"></span></strong><br/>
            <span>Date of Birth: </span><strong><span id="review_birthday"></span></strong><br/>
            <span>Birthplace: </span><strong><span id="review_birthplace"></span></strong><br/>
            <br>
            <h4>Educational Background</h5>
            <span>Preliminary Education: </span><strong><span id="review_prelim_educ"></span></strong><br/>
            <span>Secondary Education: </span><strong><span id="review_second_educ"></span></strong><br/>
            <span>Date/Semeter Admitted: </span><strong><span id="review_dt_admission"></span></strong><br/>
            <div id="review_educ_transferee" class="d-none"></div>
            <br>
            <h4>Degree Information</h4>
            <span>Degree/Title/Course: </span><strong><span id="review_degree"></span></strong><br/>
            <span>Major: </span><strong><span id="review_major"></span></strong><br/>
            <span>Date Conferred: </span><strong><span id="review_dt_conferred"></span></strong><br/>
            <div id="review_grades" class="d-none"></div>
            <br/>
            <h4>Remarks</h4>
            <span>Remarks: </span><strong><span id="review_remarks"></span></strong><br/>
            <span>Prepared By: </span><strong><span id="review_prepared_by"></span></strong><br/>
            <span>Checked By: </span><strong><span id="review_checked_by"></span></strong><br/>
            <span>Registrar: </span><strong><span id="review_registrar"></span></strong><br/>
            <span>Date Issued: </span><strong><span id="review_dt_issued"></span></strong><br/>
            <br>
          </div>
          <div class="modal-footer"> <!-- Footer -->

            <button type="button" class="btn btn-danger" data-dismiss="modal" ripple><i class="fas fa-times"></i> Cancel</button>
            <a href="" onclick="sendForm(); return false;" ><button type="button" class="btn btn-primary" id="confirm" ripple><i class="fas fa-check" ></i>  Confirm</button></a>

          </div>
        </div>
      </div>
    </div> <!-- Modal End -->

    <div class="alert-box success" style="max-width: 500px;">
      <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <div class="alert-box failed" style="max-width: 500px;">
      <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span>
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">
    function removeA(arr) {
      var what, a = arguments, L = a.length, ax;
      while (L > 1 && arr.length) {
          what = a[--L];
          while ((ax= arr.indexOf(what)) !== -1) {
              arr.splice(ax, 1);
          }
      }
      return arr;
    }

    $(document).ready(function(){
      $('#opt_auto').click(function(){
        $('#tor-process').show();
        $('#tor-process-manual').hide();
        $('#header').html('Transcript of Records Process (Auto)');
        $(this).addClass('active');
        $('#opt_manual').removeClass('active');
      });

      $('#opt_manual').click(function(){
        $('#tor-process').hide();
        $('#tor-process-manual').show();
        $('#header').html('Transcript of Records Process (Manual)');
        $(this).addClass('active');
        $('#opt_auto').removeClass('active');
      });

      $('#stud_number').focus();

      $('#datepicker').datepicker({
        "setDate": new Date(),
        "autoclose": true
      });

      $("#datepicker").datepicker("setDate", new Date());

      });

      $('#manual_transferee_checkbox').change(function(){
        if($(this).is(':checked')) {
          $('#manual_transfere_educ').show();
        }
        else {
          $('#manual_transfere_educ').hide();
        }
      });

      var cc = 0;
      var transferee_educ_details = [];
      var com_sem_sy = [];
      var manual_grade = {};
      manual_grade.semester_sy = new Array();
      // manual_grade.sy = new Array();
      manual_grade.subject_code = new Array();
      manual_grade.subject_title = new Array();
      manual_grade.final_grade = new Array();
      manual_grade.unit = new Array();

      $('#manual_add_grade').click(function(){
        var sem = $('#manual_semester').val(), school_year = $('#manual_school_year').val(), subj_code = $('#manual_subj_code').val(), subj_title = $('#manual_subj_title').val(), final_gr = $('#manual_final_grade').val(), unit = $('#manual_unit').val();
        if(school_year == '' || subj_code == '' || subj_title == '' || final_gr == '', unit == '') {
          $("div.failed").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html("Please, fill up all fields to execute your command.");
        }
        else {
          com_sem_sy.push(sem+' ('+school_year+')');
          // sample_sy.push(school_year);
          manual_grade.semester_sy.push(sem+' ('+school_year+')');
          // manual_grade.sy.push(school_year);
          manual_grade.subject_code.push(subj_code);
          manual_grade.subject_title.push(subj_title);
          manual_grade.final_grade.push(final_gr);
          manual_grade.unit.push(unit);
          $("div.success").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html("Added!");
          $('#manual_subj_code').val('');
          $('#manual_subj_title').val('');
          $('#manual_final_grade').val('');
          $('#manual_unit').val('');
        }
      });

      $('#transferee_add_school').click(function(){
        var sc_name = $('#transferee_school_name').val(), sc_sy = $('#transferee_school_year').val();
        var tbl = $('#educ_transferee tbody tr:last');

        if(sc_name == '' || sc_sy == '') {
          $("div.failed").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html("Please, fill up all fields to execute your command.");
        }
        else {
          transferee_educ_details.push(sc_name+' ('+sc_sy+')');
          $("div.success").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html("Added!");
          $('#transferee_school_name').val('');
          $('#transferee_school_year').val('');
          tbl.after('<tr id="'+cc+'"><td><span id="sc_name'+cc+'">'+sc_name+'</span></td><td><span id="sc_sy'+cc+'">'+sc_sy+'</span></td><td><button type="button" id="'+cc+'" class="btn btn-danger remove-transferee-school" ripple><i class="far fa-times-circle"></i> Remove</button></td></tr>');
          cc++;
        }
      });

      $('#educ_transferee').on('click', '.remove-transferee-school', function(){
        var id = $(this).attr('id');
        var sc_name = $('#sc_name'+id).val();
        var sc_sy = $('#sc_sy'+id).val();

        // removeA(transferee_educ_details, sc_name+' ('+sc_sy+')');
        transferee_educ_details.splice(id,1);
        $('#educ_transferee tr#'+id).remove();
        console.log(transferee_educ_details);

      });

    var manual_stud_info = [];
    $('#manual_process_btn').click(function(){
      $('#id_viewtor').val('manual');
      var sn = $('#manual_stud_number').val(), name = $('#manual_stud_name').val(), nationality = $('#manual_stud_nationality').val(), address = $('#manual_stud_address').val(), sex = $('#manual_stud_sex').val(), birthday = $('#manual_stud_birthday').val(), birthplace = $('#manual_stud_birthplace').val(), prelim_educ = $('#manual_stud_prelim_educ').val(), second_educ = $('#manual_stud_second_educ').val(), dt_admission = $('#manual_stud_dt_admission').val(), degree = $('#manual_stud_degree').val(), major = $('#manual_stud_major').val(), dt_conferred = $('#manual_stud_dt_conferred').val(), remarks = $('#manual_stud_remarks').val(), prepared_by = $('#manual_stud_prepared_by').val(), checked_by = $('#manual_stud_checked_by').val(), registrar = $('#manual_stud_registrar').val(), dt_issued = $('#manual_stud_dt_issued').val(), is_transferee = $('#manual_transferee_checkbox');

      if(is_transferee.is(':checked')) {
        is_transferee = 1;
      }
      else {
        is_transferee = 0;
      }

      if(nationality != '') {
        $('#review_nationality').html(nationality);
      }
      else {
        $('#review_nationality').html('N/A');
      }

      if(address != '') {
        $('#review_address').html(address);
      }
      else {
        $('#review_address').html('N/A');
      }

      if(sex != '') {
        $('#review_sex').html(sex);
      }
      else {
        $('#review_sex').html('N/A');
      }

      if(birthday != '') {
        $('#review_birthday').html(birthday);
      }
      else {
        $('#review_birthday').html('N/A');
      }

      if(birthplace != '') {
        $('#review_birthplace').html(birthplace);
      }
      else {
        $('#review_birthplace').html('N/A');
      }

      if(prelim_educ != '') {
        $('#review_prelim_educ').html(prelim_educ);
      }
      else {
        $('#review_prelim_educ').html('N/A');
      }

      if(second_educ != '') {
        $('#review_second_educ').html(second_educ);
      }
      else {
        $('#review_second_educ').html('N/A');
      }

      if(dt_admission != '') {
        $('#review_dt_admission').html(dt_admission);
      }
      else {
        $('#review_dt_admission').html('N/A');
      }

      if(degree != '') {
        $('#review_degree').html(degree);
      }
      else {
        $('#review_degree').html('N/A');
      }

      if(major != '') {
        $('#review_major').html(major);
      }
      else {
        $('#review_major').html('N/A');
      }

      if(dt_conferred != '') {
        $('#review_dt_conferred').html(dt_conferred);
      }
      else {
        $('#review_dt_conferred').html('N/A');
      }

      if(remarks != '') {
        $('#review_remarks').html(remarks);
      }
      else {
        $('#review_remarks').html('N/A');
      }

      if(prepared_by != '') {
        $('#review_prepared_by').html(prepared_by);
      }
      else {
        $('#review_prepared_by').html('N/A');
      }

      if(checked_by != '') {
        $('#review_checked_by').html(checked_by);
      }
      else {
        $('#review_checked_by').html('N/A');
      }

      if(registrar != '') {
        $('#review_registrar').html(registrar);
      }
      else {
        $('#review_registrar').html('N/A');
      }

      if(dt_issued != '') {
        $('#review_dt_issued').html(dt_issued);
      }
      else {
        $('#review_dt_issued').html('N/A');
      }

      $('#review_name').html(name);
      $('#review_sn').html(sn);

      var review_sn = $('#review_sn').html(), review_name = $('#review_name').html(), review_nationality = $('#review_nationality').html(), review_address = $('#review_address').html(), review_sex = $('#review_sex').html(), review_birthday = $('#review_birthday').html(), review_birthplace = $('#review_birthplace').html(), review_prelim_educ = $('#review_prelim_educ').html(), review_second_educ = $('#review_second_educ').html(), review_dt_admission = $('#review_dt_admission').html(), review_degree = $('#review_degree').html(), review_major = $('#review_major').html(), review_dt_conferred = $('#review_dt_conferred').html(), review_remarks = $('#review_remarks').html(), review_prepared_by = $('#review_prepared_by').html(), review_checked_by = $('#review_checked_by').html(), review_registrar = $('#review_registrar').html(), review_dt_issued = $('#review_dt_issued').html();

      manual_stud_info = [{'stud_number':review_sn},{'name':review_name},{'nationality':review_nationality},{'address':review_address},{'sex':review_sex},{'birthday':review_birthday},{'birthplace':review_birthplace},{'prelim_educ':review_prelim_educ},{'second_educ':review_second_educ},{'dt_admission':review_dt_admission},{'degree':review_degree},{'major':review_major},{'dt_conferred':review_dt_conferred},{'remarks':review_remarks},{'prepared_by':review_prepared_by},{'checked_by':review_checked_by},{'registrar':review_registrar},{'dt_issued':review_dt_issued}];

      var display = [];
      var unique_com_sem_sy = com_sem_sy.filter(function(itm, i, a) {
          return i == a.indexOf(itm);
      });
      display.push('<br><h4>Grades</h4>');
      
      for (var i = 0; i < unique_com_sem_sy.length; i++) {
        display.push('<h6><strong>'+unique_com_sem_sy[i]+'</strong></h6>');
        for (var j = 0; j < manual_grade['semester_sy'].length; j++) {
          if(unique_com_sem_sy[i] == manual_grade['semester_sy'][j]) {
            display.push('<span>' + manual_grade['subject_code'][j] + ' - ' + manual_grade['subject_title'][j] + ' - ' + manual_grade['final_grade'][j] + ' (Unit : ' + manual_grade['unit'][j] + ')</span><br>');
          }
        }
      }
      
      if(!jQuery.isEmptyObject(unique_com_sem_sy)) {
        $('#review_grades').removeClass('d-none');
        $('#review_grades').html(display.join(""));
      }
      
      var educ_display = [];
      educ_display.push('<br><h5>Transfered From</h5>');
      for (var i = 0; i < transferee_educ_details.length; i++) {
        educ_display.push('<span>'+transferee_educ_details[i]+'</span><br/>');
      }      

      if(!jQuery.isEmptyObject(transferee_educ_details)) {
        $('#review_educ_transferee').removeClass('d-none');
        $('#review_educ_transferee').html(educ_display.join(""));
      }
    });

    


    // BALIKAN TO

    // function myFunction() {
    // var array1 = ['one','one','two','two','three','four'];
    // var array = [1,2,3,4,5,6];
    // var newHTML = [];
    // for (var i = 0; i < array.length; i++) {
    // 	var w = array1[i];
    //     newHTML.push('<span>data: ' + array[i] + '</span><br>');
    // 	if(w != array1[i+1]) {
    //     	newHTML.push('<span>TITLE: ' + array1[i] + '</span><br>');
    //     }
    //
    //
    // }
    // document.getElementById("demo").innerHTML = newHTML.join("");
    //
    // }



    // $('#manual_sample').click(function(){
    //   var display = [];
    //   var unique_com_sem_sy = com_sem_sy.filter(function(itm, i, a) {
    //       return i == a.indexOf(itm);
    //   });
    //   var o = 0;
    //   for (var i = 0; i < unique_com_sem_sy.length; i++) {
    //     display.push('<span>'+unique_com_sem_sy[i]+'</span><br>');
    //     for (var j = 0; j < manual_grade['semester_sy'].length; j++) {
    //       if(unique_com_sem_sy[i] == manual_grade['semester_sy'][j]) {
    //         display.push('<span>' + manual_grade['subject_code'][j] + '</span><br>');
    //       }
    //     }
    //   }
    //   $('#review_grades').show();
    //   $('#review_grades').html(display.join(""));
    // });


    var data = [];
    $('#process_btn').click(function(){
      $('#id_viewtor').val('auto');
      var sn = $('#stud_number').val(), name = $('#stud_name').val(), nationality = $('#stud_nationality').val(), address = $('#stud_address').val(), sex = $('#stud_sex').val(), birthday = $('#stud_birthday').val(), birthplace = $('#stud_birthplace').val(), prelim_educ = $('#stud_prelim_educ').val(), second_educ = $('#stud_second_educ').val(), dt_admission = $('#stud_dt_admission').val(), degree = $('#stud_degree').val(), major = $('#stud_major').val(), dt_conferred = $('#stud_dt_conferred').val(), remarks = $('#stud_remarks').val(), prepared_by = $('#stud_prepared_by').val(), checked_by = $('#stud_checked_by').val(), registrar = $('#stud_registrar').val(), dt_issued = $('#stud_dt_issued').val();

      if(nationality != '') {
        $('#review_nationality').html(nationality);
      }
      else {
        $('#review_nationality').html('N/A');
      }

      if(address != '') {
        $('#review_address').html(address);
      }
      else {
        $('#review_address').html('N/A');
      }

      if(sex != '') {
        $('#review_sex').html(sex);
      }
      else {
        $('#review_sex').html('N/A');
      }

      if(birthday != '') {
        $('#review_birthday').html(birthday);
      }
      else {
        $('#review_birthday').html('N/A');
      }

      if(birthplace != '') {
        $('#review_birthplace').html(birthplace);
      }
      else {
        $('#review_birthplace').html('N/A');
      }

      if(prelim_educ != '') {
        $('#review_prelim_educ').html(prelim_educ);
      }
      else {
        $('#review_prelim_educ').html('N/A');
      }

      if(second_educ != '') {
        $('#review_second_educ').html(second_educ);
      }
      else {
        $('#review_second_educ').html('N/A');
      }

      if(dt_admission != '') {
        $('#review_dt_admission').html(dt_admission);
      }
      else {
        $('#review_dt_admission').html('N/A');
      }

      if(degree != '') {
        $('#review_degree').html(degree);
      }
      else {
        $('#review_degree').html('N/A');
      }

      if(major != '') {
        $('#review_major').html(major);
      }
      else {
        $('#review_major').html('N/A');
      }

      if(dt_conferred != '') {
        $('#review_dt_conferred').html(dt_conferred);
      }
      else {
        $('#review_dt_conferred').html('N/A');
      }

      if(remarks != '') {
        $('#review_remarks').html(remarks);
      }
      else {
        $('#review_remarks').html('N/A');
      }

      if(prepared_by != '') {
        $('#review_prepared_by').html(prepared_by);
      }
      else {
        $('#review_prepared_by').html('N/A');
      }

      if(checked_by != '') {
        $('#review_checked_by').html(checked_by);
      }
      else {
        $('#review_checked_by').html('N/A');
      }

      if(registrar != '') {
        $('#review_registrar').html(registrar);
      }
      else {
        $('#review_registrar').html('N/A');
      }

      if(dt_issued != '') {
        $('#review_dt_issued').html(dt_issued);
      }
      else {
        $('#review_dt_issued').html('N/A');
      }

      $('#review_name').html(name);
      $('#review_sn').html(sn);

      var review_sn = $('#review_sn').html(), review_name = $('#review_name').html(), review_nationality = $('#review_nationality').html(), review_address = $('#review_address').html(), review_sex = $('#review_sex').html(), review_birthday = $('#review_birthday').html(), review_birthplace = $('#review_birthplace').html(), review_prelim_educ = $('#review_prelim_educ').html(), review_second_educ = $('#review_second_educ').html(), review_dt_admission = $('#review_dt_admission').html(), review_degree = $('#review_degree').html(), review_major = $('#review_major').html(), review_dt_conferred = $('#review_dt_conferred').html(), review_remarks = $('#review_remarks').html(), review_prepared_by = $('#review_prepared_by').html(), review_checked_by = $('#review_checked_by').html(), review_registrar = $('#review_registrar').html(), review_dt_issued = $('#review_dt_issued').html();

      data = [{'stud_number':review_sn},{'name':review_name},{'nationality':review_nationality},{'address':review_address},{'sex':review_sex},{'birthday':review_birthday},{'birthplace':review_birthplace},{'prelim_educ':review_prelim_educ},{'second_educ':review_second_educ},{'dt_admission':review_dt_admission},{'degree':review_degree},{'major':review_major},{'dt_conferred':review_dt_conferred},{'remarks':review_remarks},{'prepared_by':review_prepared_by},{'checked_by':review_checked_by},{'registrar':review_registrar},{'dt_issued':review_dt_issued}];
    });

    function sendForm() {
      // var dd = JSON.stringify(data);
      // console.log(dd);
      if(document.getElementById('id_viewtor').value == 'auto') {
        document.getElementById('data').value = JSON.stringify(data);
      }
      else if(document.getElementById('id_viewtor').value == 'manual') {
        document.getElementById('manual_stud_info').value = JSON.stringify(manual_stud_info);
        document.getElementById('manual_all_grades').value = JSON.stringify(manual_grade);
        document.getElementById('manual_com_sem_sy').value = JSON.stringify(com_sem_sy);
        if($('#manual_transferee_checkbox').is(':checked')) {
          document.getElementById('manual_tranferee_educ').value = JSON.stringify(transferee_educ_details);
        }
      }
      document.getElementById('form').submit(); //fixed syntax
    }

    $('#stud_number').keyup(function(){
      var val = $(this).val(), sndiv = $('#sn'), errorsn = $('errorsn'), nxt_btn = $('#next');

      if(val.length == 4) { $(this).val(val+'-'); }
      if(val.length == 7) { $(this).val(val+'-'); }

      if(val == '') {
        sndiv.attr('errr','');
      }
      else {
        sndiv.removeAttr('errr');
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"search_sn":1,val:val},
          success:function(data){
            if(data == "0") {
              sndiv.attr('errr','');
              errorsn.find('span').html("Student Number doesn't exists.");
              nxt_btn.attr('disabled','');
              nxt_btn.addClass('disabled');
              $('#stud_name').val('');
              $('#stud_degree').val('');
              $('#stud_major').val('');
              $('#stud_address').val('');
              $('#stud_birthday').val('');
              $('#stud_birthplace').val('');
              $('#stud_dt_admission').val('');
              $('#stud_sex').val('');
              $('#stud_nationality').attr('disabled','');
              $('#stud_address').attr('disabled','');
              $('#stud_sex').attr('disabled','');
              $('#stud_birthday').attr('disabled','');
              $('#stud_birthplace').attr('disabled','');
            }
            else {
              var dd = JSON.parse(data);
              $('#stud_name').val(dd['name']);
              $('#stud_degree').val(dd['course']);
              $('#stud_major').val(dd['major']);
              $('#stud_address').val(dd['address']);
              $('#stud_birthday').val(dd['birthday']);
              $('#stud_birthplace').val(dd['birthplace']);
              $('#stud_dt_admission').val(dd['dt_admission']);
              $('#stud_sex').val(dd['gender']);
              nxt_btn.removeAttr('disabled');
              nxt_btn.removeClass('disabled');
              $('#stud_name').removeAttr('disabled');
              $('#stud_nationality').removeAttr('disabled');
              $('#stud_sex').removeAttr('disabled');
              $('#stud_address').removeAttr('disabled');
              $('#stud_birthday').removeAttr('disabled');
              $('#stud_birthplace').removeAttr('disabled');
            }
          }
        });
      }
    });

    $(document).ready(function(){
      var stud_number = $('#stud_number'),
      sndiv = $('#sn');

      stud_number.blur(function() {
        if(stud_number.val() == '') {
          sndiv.attr('errr','');
        } else {
          sndiv.removeAttr('errr');
        }
      });
    });

    // auto

    $("body").on("keyup", "#tor-process", function(e){
      if (e.which == 13){
        if ($("#next").is(":visible") && $("fieldset.current").find("input, textarea").valid() ){
          e.preventDefault();
          nextSection();
          return false;
        }
      }
    });

    $("#next").on("click", function(e){
      console.log(e.target);
      nextSection();
    });

    $("form").on("submit", function(e){
      if ($("#next").is(":visible") || $("fieldset.current").index() < 3){
        e.preventDefault();
      }
    });

    function goToSection(i){
      $("fieldset:gt("+i+")").removeClass("current").addClass("next");
      $("fieldset:lt("+i+")").removeClass("current");
      $("#tor-process").find("li").eq(i).addClass("current").siblings().removeClass("current");
      setTimeout(function(){
        $("fieldset").eq(i).removeClass("next").addClass("current active");
          if ($("fieldset.current").index() == 3){
            $("#next").hide();
            $("#process_btn").show();
          } else {
            $("#next").show();
            $("#process_btn").hide();
          }
      }, 80);

    }

    function nextSection(){
      var i = $("fieldset.current").index();
      if (i < 3){
        $("#tor-process").find("li").eq(i+1).addClass("active");
        goToSection(i+1);
      }
    }

    $("#tor-process").on("click","li", function(e){
      var i = $(this).index();
      if ($(this).hasClass("active")){
        goToSection(i);
      } else {
        alert("Please complete previous sections first.");
      }
    });

    // manual

    $("body").on("keyup", "#tor-process-manual", function(e){
      if (e.which == 13){
        if ($("#next").is(":visible") && $("fieldset-manual.current").find("input, textarea").valid() ){
          e.preventDefault();
          nextSection_manual();
          return false;
        }
      }
    });

    $("#next_manual").on("click", function(e){
      console.log(e.target);
      nextSection_manual();
    });

    $("form").on("submit", function(e){
      if ($("#next").is(":visible") || $("fieldset.current").index() < 3){
        e.preventDefault();
      }
    });

    function goToSection_manual(i){
      $("fieldset-manual:gt("+i+")").removeClass("current").addClass("next");
      $("fieldset-manual:lt("+i+")").removeClass("current");
      $("#tor-process-manual").find("li").eq(i).addClass("current").siblings().removeClass("current");
      setTimeout(function(){
        $("fieldset-manual").eq(i).removeClass("next").addClass("current active");
          if ($("fieldset-manual.current").index() == 4){
            $("#next_manual").hide();
            $("#manual_process_btn").show();
          } else {
            $("#next_manual").show();
            $("#manual_process_btn").hide();
          }
      }, 80);

    }

    function nextSection_manual(){
      var i = $("fieldset-manual.current").index();
      if (i < 4){
        $("#tor-process-manual").find("li").eq(i+1).addClass("active");
        goToSection_manual(i+1);
      }
    }

    $("#tor-process-manual").on("click","li", function(e){
      var i = $(this).index();
      if ($(this).hasClass("active")){
        goToSection_manual(i);
      } else {
        alert("Please complete previous sections first.");
      }
    });
  </script>

  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="js/tor.js"></script>
</body>

</html>
