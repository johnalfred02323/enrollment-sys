<!-- Head -->
<?php include('../config/config.php');
require 'src/layout/head.php';
$id = substr($_COOKIE['userid'],7,strlen($_COOKIE['userid']));
$get_details = mysqli_query($conn, "SELECT * FROM faculty_user WHERE id = $id");
$get_data = mysqli_fetch_assoc($get_details);
?>
<link href="src/css/custom-error.css" rel="stylesheet">
<!-- jquery -->
<script src="src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Account Settings</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/grc/faculty/dashboard">
        <div class="sidebar-brand-icon">
          <img src="../src/img/logo-white.png" width="50px;">
        </div>
        <div class="sidebar-brand-text mx-3">GRC <!-- <sup>admin</sup> --></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Classes -->
      <li class="nav-item">
        <a class="nav-link" href="classes">
          <i class="fas fa-users"></i>
          <span>Classes</span></a>
      </li>

      <!-- Report of Grade -->
      <li class="nav-item">
        <a class="nav-link" href="grade_report">
          <i class="fas fa-list-ol"></i>
          <span>Report of Grade</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
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
        <?php require 'src/layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
          </ol>
        </nav>
        <div class="py-3">
          <div class="card shadow-sm">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold card-text-title-head">Account Settings</h6></div>
            <div class="card-body">
              <div class="row mx-auto">
                <div class="col mb-5">
                  <h3 class="p-3">Personal Details</h3>

                  <div class="form-group">
                    <label for="firstname">First Name: </label>
                    <input type="text" class="form-control ed" disabled id="firstname" value="<?php echo $get_data['firstname'];?>">
                  </div>
                  <div class="form-group">
                    <label for="middlename">Middle Name: </label>
                    <input type="text" class="form-control ed" disabled id="middlename" value="<?php echo $get_data['middlename'];?>">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name: </label>
                    <input type="text" class="form-control ed" disabled id="lastname" value="<?php echo $get_data['lastname'];?>">
                  </div>
                  <div class="form-group">
                    <label for="contact_num">Contact Number: </label>
                    <input type="text" class="form-control ed" disabled id="contact_num" value="<?php echo $get_data['contact_number'];?>">
                  </div>
                  <div class="float-right">
                    <button class="btn btn-primary" id="edit_pd_btn"><i class="fas fa-edit"></i> Edit Personal Details</button>
                    <button class="btn btn-danger" id="cancel_edit" style="display: none;"><i class="fas fa-times"></i> Cancel</button>
                    <button class="btn btn-secondary" id="save_pd" style="display: none;"><i class="fas fa-save"></i> Save</button>
                  </div>
                </div>
                <div class="col">
                  <h3 class="p-3">Account Details</h3>

                  <div class="form-group">
                    <label for="username">Username: </label>
                    <input type="text" class="form-control" disabled id="username" value="<?php echo $get_data['username'];?>">
                  </div>
                  <div class="float-right">
                    <button class="btn btn-primary mb-10" id="change_pass_btn" data-toggle="modal" data-target="#change_modal" onclick="change_pass_func();">Change Password</button>
                    <button class="btn btn-primary" id="change_username_btn" data-toggle="modal" data-target="#change_modal" onclick="change_username_func();">Change Username</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require 'src/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->
  <div class="alert-box warning" style="max-width: 600px;">
    <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Warning!</span>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
  <div class="alert-box success" style="max-width: 600px;">
    <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>

  <!-- Modal Start -->
  <div class="modal fade" id="change_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="change_modal_header"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <input type="hidden" id="flag">
        <div class="modal-body">
          <div id="for_change_username">
            <div id="change_u" class="form-group">
              <input id="change_username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="" value="<?php echo $get_data['username'];?>">
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="username" class="float-label" style="font-family:Arial, FontAwesome">Username</label>
                <error_change_u>
                  <span>Username is required</span>
                    <i>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </error_change_u>
            </div>
            <div id="change_p" class="form-group">
              <input type="password" id="conf_change_password" spellcheck=false class="form-control" size="18" alt="login" required="">
                <span toggle="#conf_change_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="conf_change_password" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
                <error_change_p>
                  <span>Password is required</span>
                    <i>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </error_change_p>
                <br>
              <small>Enter Password to confirm changes.</small>
            </div>
          </div>

          <div id="for_change_password">
            <div id="old_pass" class="form-group">
              <input type="password" id="old_password" spellcheck=false class="form-control" size="18" alt="login" required="">
                <span toggle="#old_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="password" class="float-label" style="font-family:Arial, FontAwesome">Enter Old Password</label>
                <error_op>
                  <span>Old Password is required</span>
                    <i>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </error_op>
            </div>
            <div id="new_pass" class="form-group">
              <input type="password" id="new_password" spellcheck=false class="form-control" size="18" alt="login" required="">
                <span toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="password" class="float-label" style="font-family:Arial, FontAwesome">Enter New Password</label>
                <error_np>
                  <span>Password is required</span>
                    <i>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </error_np>
            </div>
            <div id="con_new_pass" class="form-group">
              <input type="password" id="conf_new_password" spellcheck=false class="form-control" size="18" alt="login" required="">
                <span toggle="#conf_new_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="password" class="float-label" style="font-family:Arial, FontAwesome">Confirm New Password</label>
                <error_cnp>
                  <span>Confirm Password is required</span>
                    <i>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </error_cnp>
            </div>
            <script type="text/javascript">

            </script>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal" onclick="$('#conf_change_password').val(null);"><i class="fas fa-times"></i> Cancel</button>
          <button class="btn btn-secondary" id="save_changes"><i class="fas fa-save"></i> Save</button>
        </div>
      </div>
    </div>
  </div> <!-- Modal End -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require 'src/go-to-top.php'; ?>
  <script type="text/javascript">
  $("#change_modal").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

    $('#edit_pd_btn').click(function(){
      $('#save_pd').show();
      $('#cancel_edit').show();
      $('#edit_pd_btn').hide();
      $('.ed').removeAttr('disabled');
      $('.ed:first').focus();
    });
    $('#cancel_edit').click(function(){
      $('#save_pd').hide();
      $('#cancel_edit').hide();
      $('#edit_pd_btn').show();
      $('.ed').attr('disabled','disabled');
    });

    $('#save_pd').click(function(){
      var firstname = $('#firstname').val(), middlename = $('#middlename').val(), lastname = $('#lastname').val(), contact_number = $('#contact_num').val();
      if(firstname == '' || lastname == '' || middlename == '' || contact_number == '') {
        $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#warningmsg").html('Please, fill out all fields.');
      }
      else {
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"edit_personal_data":1,id:"<?php echo $id; ?>",firstname:firstname,lastname:lastname,middlename:middlename,contact_number:contact_number},
          success:function(data){
            if(data == "1") {
              $('#save_pd').hide();
              $('#cancel_edit').hide();
              $('#edit_pd_btn').show();
              $('.ed').attr('disabled','disabled');
              $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html('Personal Details Updated Successfully');
            }
            else {
              $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#warningmsg").html(data);
            }
          }
        });
      }
    });

    var old_password = $('#old_password'),
        new_password = $('#new_password'),
        conf_new_password = $('#conf_new_password'),
        change_u = $('#change_username'),
        change_p = $('#conf_change_password'),
        err_op = $('error_op'),
        err_np = $('error_np'),
        err_cnp = $('error_cnp'),
        err_change_u = $('error_change_u'),
        err_change_p = $('error_change_p'),
        odiv = $('#old_pass'),
        ndiv = $('#new_pass'),
        cdiv = $('#con_new_pass'),
        cudiv = $('#change_u'),
        cpdiv = $('#change_p');

    old_password.blur(function(){
      if (old_password.val() == '') {
        odiv.attr('errr','');
      } else {
        odiv.removeAttr('errr');
      }
    });

    new_password.blur(function(){
      if (new_password.val() == '') {
        ndiv.attr('errr','');
      } else {
        ndiv.removeAttr('errr');
      }
    });

    conf_new_password.blur(function(){
      if (conf_new_password.val() == '') {
        cdiv.attr('errr','');
      } else {
        cdiv.removeAttr('errr');
      }
    });

    change_u.blur(function(){
      if (change_u.val() == '') {
        cudiv.attr('errr','');
      } else {
        cudiv.removeAttr('errr');
      }
    });

    change_p.blur(function(){
      if (change_p.val() == '') {
        cpdiv.attr('errr','');
      } else {
        cpdiv.removeAttr('errr');
      }
    });

    function change_pass_func() {
      $('#change_modal_header').html('Change Password');
      $('#flag').val('1');
      $('#for_change_username').hide();
      $('#for_change_password').show();
    }

    function change_username_func() {
      $('#change_modal_header').html('Change Username');
      $('#flag').val('2');
      $('#for_change_password').hide();
      $('#for_change_username').show();
    }

    $('#save_changes').click(function(){
      var flag = $('#flag').val();
      if(flag == 1) {
        var old_pass = $('#old_password').val();
        var new_pass = $('#new_password').val();
        var conf_new_pass = $('#conf_new_password').val();
        if(new_pass != conf_new_pass) {
          ndiv.attr('errr','');
          cdiv.attr('errr','');
          err_np.find('span').html('Password did not match.');
          err_cnp.find('span').html('Password did not match.');
        }
        else {
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{"change_password":1,id:"<?php echo $id; ?>",old_pass:old_pass,new_pass:new_pass},
            success:function(data) {
              if(data == "0") {
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html('Password Changed Successfully');
                $('#change_modal').modal('hide');
                $('#old_password').val(null);
                $('#new_password').val(null);
                $('#conf_new_password').val(null);
              }
              else if(data == "1") {
                odiv.attr('errr','');
                err_op.find('span').html('Password is incorrect.');
              }
            }
          });
        }
      }
      else if(flag == 2){
        var username = $('#change_username').val();
        var conf_pass = $('#conf_change_password').val();
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"change_username":1,id:"<?php echo $id; ?>",username:username,conf_pass:conf_pass},
          success:function(data) {
            if(data == '0'){
              $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html('Username Changed Successfully');
              $('#username').val(username);
              $('#change_modal').modal('hide');
              $('#conf_change_password').val(null);
            }
            else if(data == '1') {
              cpdiv.attr('errr','');
              err_change_p.find('span').html('Password is incorrect.');
            }
            else if(data == '2') {
              cudiv.attr('errr','');
              err_change_u.find('span').html('Username is already existing.');
            }
          }
        });
      }
    });
  </script>
  <!-- Responsive core JavaScript -->
  <script src="src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../src/js/dark-mode-switch.min.js"></script>

</body>

</html>
