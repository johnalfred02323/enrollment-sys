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
<style>
  #grclogo_anim {
    fill:#DA2129;
    width: 7rem;
    height: 7rem;
    animation: logo_bounce 1s ease-in-out infinite alternate;
    animation-timing-function: cubic-bezier(0.95, 0.15, 0.695, 0.095);
  }

  .st0{
    stroke:#FFFFFF;stroke-width:3;stroke-miterlimit:10;
  }

  @keyframes logo_bounce{
    /* from{
      transform: translateY(0%);
    }
    to{
      transform: translateY(50%);
    } */
    0% {
      transform: translateY(0%) scale(1,1);
    }
    50%{
      transform: translateY(50%) scale(1,.5);
    }
    55%{
      transform: translateY(0%) scale(1,1);
    }
    60%{
      transform: rotateY(0deg);
    }
    100%{
      transform: rotateY(1000deg);
    }
  }
</style>

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
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Faculty Account</h5>
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
                <input type="text" id="new_fac_contact_num" spellcheck=false class="form-control" type="text" maxlength="13" alt="login" required="" autocomplete='off' value="+639">
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

        <h5><button class="btn btn-danger" data-dismiss="modal" onclick="$('input').val('');$('#new_fac_contact_num').val('+639');">Cancel</button> <button class="btn btn-primary" id="create_fac_account_btn">Create Account</button></h5>

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

<div class="modal fade" id="loading_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
      <!-- <div class="text-light">Loading....</div> -->
      <svg version="1.1" id="grclogo_anim" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 602 488" style="enable-background:new 0 0 602 488;" xml:space="preserve">
          
            <path class="st0" d="M421,103c-20.75-0.44-35-2-52,9c-7,5-18,13-24,30c-12.11,34.33-21.92,76.67-23,83c-8,47-39.56,85.77-78,84
	c-34.32-1.58-62.35-32.51-63.93-66.84C178.3,203.72,208.95,172,247,172c17.59,0,47.56,13.5,61.28,36.93
	c0.46,0.78,1.63,0.59,1.82-0.29c1.92-8.72,6.03-25.67,11.36-44.26c0.1-0.36,0-0.74-0.26-1C301.1,143.64,272.24,132,247,132
	c-59.6,0-107.82,48.73-106.99,108.52c0.8,57.63,47.92,108.72,105.47,105.47c34.06-1.93,57.2-12.42,74.52-28.99
	c18.55-17.74,30.28-42.49,37-73c3.22-14.61,19-85,31-97c9-9,16-8,35-8l161.85,1.97c0.5,0.01,0.92-0.35,1-0.85l5.1-32.71
	c0.1-0.61-0.37-1.16-0.99-1.15C564.14,106.56,446.01,103.53,421,103z"/>
            <path class="st0" d="M456,145c-35-0.85-49,15-55,32c-10,32-14,49-17,64c-14.54,72.71-64.1,133-137,133s-133-58.55-133-132
	s59.1-133,132-133c31.37,0,60.14,8.91,82.79,27.18c0.54,0.44,1.35,0.21,1.57-0.45c0.54-1.59,1.09-3.17,1.64-4.73
	c4.72-13.38,12.53-21.17,19.06-26.32c0.51-0.4,0.52-1.18,0.01-1.58C321.8,79.99,285.44,68,245,68c-94.99,0-172,77.01-172,172
	s77.01,172,172,172c106,0,163.7-75.66,180-168c3-17,6.42-31.68,9-42c2-8,4.58-14.47,9-18c5-4,11.13-3,21-3l114.42,1.22
	c0.5,0.01,0.92-0.35,1-0.85l5.33-34.18c0.09-0.6-0.37-1.15-0.98-1.15L456,145z"/>
            <path class="st0" d="M476,186.01c-16,6-19.57,42.87-22,57c-21,122-97.2,193.33-206,193.33S51,348.89,51,241.01
	S139.2,45.68,248,45.68c56.91,0,87.6,9.88,131.78,46.64c8.52-1.06,17.51-0.54,28.22-0.32c4.49,0.1,11.99,0.27,21.41,0.49
	c-0.01-0.1-0.05-0.19-0.12-0.28C382,37,317.36,9.01,247,9.01c-130.34,0-236,104.77-236,234s105.66,234,236,234
	s227.09-100.41,243-233c3-25,7-22,17-22c14.07,0,58.32,0.72,65.08,0.83c0.5,0.01,0.93-0.35,1-0.85l5.44-34.85
	c0.09-0.6-0.36-1.14-0.96-1.15C566.74,185.77,482.55,184.13,476,186.01z"/>
      </svg>
    </div>
  </div> <!-- Modal End -->

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
      fetch_faculty_data();
    }
  });
});

var fname = $('#new_fac_firstname'),
    lname = $('#new_fac_lastname'),
    mname = $('#new_fac_middlename'),
    user = $('#new_fac_username'),
    pass = $('#cp_new_password'),
    confirm_pass = $('#confirm_pass'),
    contact = $('#new_fac_contact_num'),
    email = $('#new_fac_email'),
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
  var firstname = $('#new_fac_firstname').val(), lastname = $('#new_fac_lastname').val(), middlename = $('#new_fac_middlename').val(), username = $('#new_fac_username').val(), contact_number = $('#new_fac_contact_num').val(), em = $('#new_fac_email').val();


  if(fname.val() == '' || lname.val() == '' || mname.val() == '' || user.val() == '' || email.val() == '' || contact.val() == '' || contact.val() == '+639') {
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

    if (contact.val() == '+639') {
      cndiv.attr('errr','');
    } else {
      cndiv.removeAttr('errr');
    }

    if (contact.val().length != 13) {
      cndiv.attr('errr','');
      err_cn.find('span').html('Contact Number is invalid');
    } else {
      cndiv.removeAttr('errr');
    }
  }
  else{
    $('#loading_modal').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#create_account').modal('hide');
    $.ajax({
      url:"create_account_process.php",
      method:"POST",
      data:{"create_account":1,firstname:firstname,lastname:lastname,middlename:middlename,contact_number:contact_number,username:username,em:em},
      success:function(data) {
        console.log(data);
        if(data == "0"){
          udiv.attr('errr','');
          err_un.find('span').html('User already exists.');
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('Username already exists. Please try new one.');
          $('#create_account').modal('show');
        }
        else if(data == "2"){
          ediv.attr('errr','');
          err_e.find('span').html('Email already exists.');
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('Email already exists. Please try new one.');
          $('#create_account').modal('show');
        }
        else{
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html('Account was Created Successfully. <br> Note: Inform the faculty to look into spam mails.');
          $('#create_account').modal('hide');
          $('input').val('');
          $('#contact_num').val('');
          $('#fac_user_table').DataTable().destroy();
          fetch_faculty_data();
        }
        $('#loading_modal').modal('hide');
      }
    });
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
