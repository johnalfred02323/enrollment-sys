<!-- Head -->
<?php require '../../src/layout/grading/head.php';
include('../../config/config.php');

?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">
  <link href="../../faculty/src/css/custom-error.css" rel="stylesheet">
  <title>GRC | Grading System</title>

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
      <li class="nav-item active">
        <a class="nav-link" href="faculty_users">
          <i class="fas fa-users"></i>
          <span>Faculty Users</span></a>
      </li>

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
      </li> -->

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
      <li class="nav-item">
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
              <li class="breadcrumb-item active" aria-current="page"><a href="../grading">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Faculty Users</li>
            </ol>
          </nav>
          <!-- SPACER -->
          <div class="mx-auto" style="height: 10px;"></div>

          <div class="card shadow-sm mb-4"> <!-- card start -->

            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold card-text-title-head">User Accounts</h6>

                <button type="button" id="add_user_btn" class="btn btn-danger" data-toggle="modal" data-target="#create_account" ripple><i class="fas fa-user-plus"></i> NEW USER</button>

            </div>

              <div class="card-body" >

                <table id="fac_user_table" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                </table>

              </div>
          </div> <!-- card end -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>
    </div>
    <!-- End of Content Wrapper -->
  </div>


  <!-- Modal Start -->
  <div class="modal fade" id="create_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">

              <div id="cf_f" class="form-group">
                <input id="firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
                      <error_cff>
                        First Name is required
                          <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M0 0h24v24h-24z" fill="none"/>
                              <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                          </i>
                      </error_cff>
              </div>



              <div id="cf_l" class="form-group">
                <input id="lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
                      <error_cfl>
                        Last Name is required
                          <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M0 0h24v24h-24z" fill="none"/>
                              <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                          </i>
                      </error_cfl>
              </div>



              <div id="cf_m" class="form-group">
                <input id="middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
                      <error_cfm>
                        Middle Name is required
                          <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M0 0h24v24h-24z" fill="none"/>
                              <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                          </i>
                      </error_cfm>
              </div>



            </div>
            <div class="col-lg-6">

              <div id="cf_cn" class="form-group">
                <input type="text" id="contact_num" spellcheck=false class="form-control" type="text" maxlength="11" alt="login" required="" autocomplete='off'>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="contact_num" class="float-label" style="font-family:Arial, FontAwesome">Contact Number</label>
                      <error_cfcn>
                        <span>Contact Number is required</span>
                          <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M0 0h24v24h-24z" fill="none"/>
                              <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                          </i>
                      </error_cfcn>
              </div>

              <div id="cf_e" class="form-group">
                <input type="email" id="email" spellcheck=false class="form-control" type="text" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="email" class="float-label" style="font-family:Arial, FontAwesome">Email</label>
                      <error_cfe>
                        <span>Email is required</span>
                          <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M0 0h24v24h-24z" fill="none"/>
                              <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                          </i>
                      </error_cfe>
              </div>

              <div id="cf_u" class="form-group">
                <input id="username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="" autocomplete="off">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="username" class="float-label" style="font-family:Arial, FontAwesome">Username</label>
                      <error_cfu>
                        <span>Username is required</span>
                          <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M0 0h24v24h-24z" fill="none"/>
                              <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                          </i>
                      </error_cfu>
              </div>


            </div>
          </div>
        </div>
        <div class="modal-footer">

        <h5><button class="btn btn-danger" data-dismiss="modal" onclick="$('input').val('');$('#contact_num').val('+639');">Cancel</button> <button class="btn btn-primary" id="create_account_btn">Create Account</button></h5>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

  <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Change Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="cp_fac_id">
          <h4 id="cp_full_name" class="font-weight-bold"></h4><br>
          <h5 id="cp_email"></h5><br>
          <h5 id="cp_username"></h5>
          <div class="d-flex flex-row align-items-center justify-content-left">
            <div class="form-group" style="width:250px;">
              <input type="password" id="cp_new_password" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" disabled>
                <span toggle="#cp_new_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <button class="btn btn-primary ml-3" id="change_pass_btn">Generate Password</button>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal">Cancel</button> <button class="btn btn-primary" id="confirm_change_pass">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="alert-box warning" style="max-width:550px;">
    <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<span id="warningmsg">Successful!</span>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
  <div class="alert-box success" style="max-width:550px;">
    <i class="fas fa-check"></i>&nbsp;&nbsp;<span id="successmsg"> Successful!</span>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#change_pass").on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

      $('#confirm_change_pass').click(function(){
        var new_pass = $('#cp_new_password').val();
        var fac_id = $('#cp_fac_id').val();
        if(new_pass != '') {
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{"user_change_pass":1,new_pass:new_pass,fac_id:fac_id},
            success:function(data) {
              $('#cp_new_password').val('');
              $('#change_pass').modal('hide');
              $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html(data);
              $('#fac_user_table').DataTable().destroy();
              fetch_data();
            }
          });
        }
      });

      $('#change_pass_btn').click(function(){
        var pdiv = $('#p'), errorp = $('errorp');
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"get_new_pass":1},
          success:function(data) {
            $('#cp_new_password').val(data);
          }
        });
      });

      $('#fac_user_table').on('click', '.change-pass', function(){
        var id = $(this).attr('id');
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"get_info_cp":1,id:id},
          success:function(data) {
            var info = JSON.parse(data);
            $('#cp_fac_id').val(info['id']);
            $('#cp_username').html('Username: <b>'+info['username']+'</b>');
            $('#cp_email').html('Email: <b>'+info['email']+'</b>');
            $('#cp_full_name').html(info['firstname']+' '+info['lastname']);
          }
        });
      });

      $('#fac_user_table').on('click', '.stat_btn', function(){
        var id = $(this).attr('id');
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"stat_fac_user":1,id:id},
          success:function(data){
            if(data == '1') {
              $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html('User has been Enabled');
            }
            else if(data == '0') {
              $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#warningmsg").html('User has been Disabled');
            }
            $('#fac_user_table').DataTable().destroy();
            fetch_data();
          }
        });
      });

      fetch_data();

      function fetch_data(){
        var table = $('#fac_user_table').DataTable( {

            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 0, 'asc' ]],

            "processing" : true,

            "serverSide" : true,

            "ajax" : {
                "url":"fetch_faculty_user.php"
            },

            responsive: true,

            searchPlaceholder: "Search records",

            fixedHeader: {
                header: true,
                footer: true
            },
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
        } );
      }

      var fname = $('#firstname'),
          lname = $('#lastname'),
          mname = $('#middlename'),
          user = $('#username'),
          pass = $('#cp_new_password'),
          confirm_pass = $('#confirm_pass'),
          contact = $('#contact_num'),
          email = $('#email'),
          err_fn = $('error_cff'),
          err_ln = $('error_cfl'),
          err_mn = $('error_cfm'),
          err_un = $('error_cfu'),
          err_p = $('errorp'),
          err_cp = $('error_cfcp'),
          err_cn = $('error_cfcn'),
          err_e = $('error_cfe'),
          fdiv = $('#cf_f'),
          ldiv = $('#cf_l'),
          mdiv = $('#cf_m'),
          udiv = $('#cf_u'),
          pdiv = $('#p'),
          cpdiv = $('#cf_cp'),
          ediv = $('#cf_e'),
          cndiv = $('#cf_cn');

      fname.blur(function(){
        if (fname.val() == '') {
          fdiv.attr('errr','');
        } else {
          fdiv.removeAttr('errr');
        }
      });

      lname.blur(function(){
        if (lname.val() == '') {
          ldiv.attr('errr','');
        } else {
          ldiv.removeAttr('errr');
        }
      });

      mname.blur(function(){
        if (mname.val() == '') {
          mdiv.attr('errr','');
        } else {
          mdiv.removeAttr('errr');
        }
      });

      user.blur(function(){
        if (user.val() == '') {
          udiv.attr('errr','');
        } else {
          udiv.removeAttr('errr');
        }
      });

      contact.blur(function(){
        if (contact.val() == '+639') {
          cndiv.attr('errr','');
        } else {
          cndiv.removeAttr('errr');
        }
      });

      email.blur(function(){
        if (email.val() == '') {
          ediv.attr('errr','');
        } else {
          ediv.removeAttr('errr');
        }
      });

      pass.blur(function(){
        if (pass.val() == '') {
          pdiv.attr('errr','');
        } else {
          pdiv.removeAttr('errr');
        }
      });

      $('#create_account_btn').click(function(){
        var firstname = $('#firstname').val(), lastname = $('#lastname').val(), middlename = $('#middlename').val(), username = $('#username').val(), contact_number = $('#contact_num').val(), em = $('#email').val();


        if(fname.val() == '' || lname.val() == '' || mname.val() == '' || user.val() == '' || email.val() == '' || contact.val() == '+639') {
          if (fname.val() == '') {
            fdiv.attr('errr','');
          } else {
            fdiv.removeAttr('errr');
          }
          if (lname.val() == '') {
            ldiv.attr('errr','');
          } else {
            ldiv.removeAttr('errr');
          }
          if (mname.val() == '') {
            mdiv.attr('errr','');
          } else {
            mdiv.removeAttr('errr');
          }
          if (user.val() == '') {
            udiv.attr('errr','');
          } else {
            udiv.removeAttr('errr');
          }
          if (email.val() == '') {
            ediv.attr('errr','');
          } else {
            ediv.removeAttr('errr');
          }

          if (contact.val() == '') {
            cndiv.attr('errr','');
          } else {
            cndiv.removeAttr('errr');
          }

          if (contact.length != 11) {
            cndiv.attr('errr','');
            err_cn.find('span').html('Contact Number is invalid');
          } else {
            cndiv.removeAttr('errr');
          }
        }
        else{
          if (contact.val().length != 11) {
            cndiv.attr('errr','');
            err_cn.find('span').html('Contact Number is invalid');
          }
          else{
            $.ajax({
              url:"create_account_process.php",
              method:"POST",
              data:{"create_account":1,firstname:firstname,lastname:lastname,middlename:middlename,contact_number:contact_number,username:username,em:em},
              success:function(data) {
                alert(data);
                if(data == "0"){
                  udiv.attr('errr','');
                  err_un.find('span').html('User already exists.');
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Username already exists. Please try new one.');
                }
                else if(data == "2"){
                  ediv.attr('errr','');
                  err_e.find('span').html('Email already exists.');
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Email already exists. Please try new one.');
                }
                else{
                  $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#successmsg").html('Account was Created Successfully. <br> Note: Inform the faculty to look into spam mails.');
                  $('#create_account').modal('hide');
                  $('input').val('');
                  $('#contact_num').val('');
                  $('#fac_user_table').DataTable().destroy();
                  fetch_data();
                }
              }
            });
          }
        }
      });
    });
  </script>

  <script src="../../src/vendor/table/js/jquery.dataTables.min.js"></script>
  <script src="../../src/vendor/table/js/dataTables.responsive.min.js"></script>

  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>
</body>


</html>
