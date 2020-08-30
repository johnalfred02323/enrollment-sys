<!-- Head -->
<?php 
require ('../../../config/config.php'); 
require 'layout/head.php'; 
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">

  <title>GRC System | Manage Accounts</title>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require './layout/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">



<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Accounts</li>
  </ol>
</nav>



<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>



<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Main User Accounts</h6>

      <button type="button" id="add_user_btn" class="btn btn-danger" data-toggle="modal" data-target="#user_modal" ripple onclick="reset()"><i class="fas fa-user-plus"></i> Add New User</button>

  </div>

    <div class="card-body" >
      
      <table id="user_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>First name</th>
                      <th>User Type</th>
                      <th>Department</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                  </tr>
              </thead>
      </table>

    </div>
</div> <!-- card end -->

<!-- SPACER -->
<div class="mx-auto" style="height: 10px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Faculty User Accounts</h6>

      <button type="button" id="add_fac_user_btn" class="btn btn-danger" data-toggle="modal" data-target="#create_account" ripple><i class="fas fa-user-plus"></i> Add New Faculty User</button>

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

<!-- SPACER -->
<div class="mx-auto" style="height: 10px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Student User Accounts</h6>

      <!-- <button type="button" id="add_fac_user_btn" class="btn btn-danger" data-toggle="modal" data-target="#create_account" ripple><i class="fas fa-user-plus"></i> Add New Faculty User</button> -->

  </div>

    <div class="card-body" >

      <table id="stu_user_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Student Number</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                      <th>Created At</th>
                      <th>Updated At</th>
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
      <?php require '../../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->



<!-- Add user Modal -->
<?php require 'add-user.php'; ?>  

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
                <input id="new_fac_firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="new_fac_firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
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
                <input id="new_fac_lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="new_fac_lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
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
                <input id="new_fac_middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="new_fac_middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
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
                <input type="text" id="new_fac_contact_num" spellcheck=false class="form-control" type="text" maxlength="11" alt="login" required="" autocomplete='off'>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="new_fac_contact_num" class="float-label" style="font-family:Arial, FontAwesome">Contact Number</label>
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
                <input type="email" id="new_fac_email" spellcheck=false class="form-control" type="text" alt="login" required="">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="new_fac_email" class="float-label" style="font-family:Arial, FontAwesome">Email</label>
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
                <input id="new_fac_username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="" autocomplete="off">
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                    <label for="new_fac_username" class="float-label" style="font-family:Arial, FontAwesome">Username</label>
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

        <h5><button class="btn btn-danger" data-dismiss="modal" onclick="$('input').val('');$('#contact_num').val('+639');">Cancel</button> <button class="btn btn-primary" id="create_fac_account_btn">Create Account</button></h5>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

  </div>
  <!-- End of Page Wrapper -->



<!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 

<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Are you sure to delete this User?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="confirmdelete_btn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
  var id;
fetch_data();

fetch_faculty_data();

function fetch_faculty_data(){
  var table = $('#fac_user_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 5,

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
      
fetch_student_data();

function fetch_student_data(){
  var table = $('#stu_user_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 5,

      "order": [[ 0, 'asc' ]],

      "processing" : true,

      "serverSide" : true,

      "ajax" : {
          "url":"fetch_student_user.php"
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

$('#user_table').on( 'click', 'button.edit', function (e) {
    var id = $(this).attr("id");
    $('#id_val').val(id);
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"edit":1,id:id},
      success:function(data){
        $('#user_forms').html(data);
        $('#user_forms').show();
        $('#user_forms_new').hide();
      }
    });
});

$('#user_table').on( 'click', 'button.delete', function (e) {
    id = $(this).attr("id");
});

$('#confirmdelete_btn').click(function(){
  $.ajax({
    url:"process.php",
    method:"POST",
    data:{"deleteuser":1,id:id},
    success:function(data){
      if(data != "0"){
        $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#successmsg").html(data);
        $('#user_table').DataTable().destroy();
        fetch_data();
        $('#yesorno').modal('hide');
      }
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

var fname = $('#new_fac_firstname'),
    lname = $('#new_fac_lastname'),
    mname = $('#new_fac_middlename'),
    user = $('#new_fac_username'),
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

$('#create_fac_account_btn').click(function(){
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


  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>
  
  
  
<!-- TABLE -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> -->
<script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>


  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script> 

  <!-- Input Error Msg -->
  <script src="../../../src/js/input-msg-error.js"></script> 

   <!-- Select style -->
  <script src="../../../src/js/select-and-textarea-style.js"></script>


</body>

</html>
