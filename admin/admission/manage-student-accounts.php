<!-- Head -->
<?php 
require ('../../config/config.php'); 
require '../../src/layout/admission/head.php'; 
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables-dark.css">

  <title>GRC System | Manage Student Accounts</title>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/admission/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/admission/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">



<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Student Accounts</li>
  </ol>
</nav>



<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>



<div class="card shadow-sm mb-4"> <!-- card start -->

  <div class="card-header d-flex flex-row align-items-center justify-content-end">

    <button type="button" id="add_user_btn" class="delete-user pull-xs-right" data-toggle="modal" data-target="#student_user_modal" ripple><i class="fas fa-user-plus"></i> NEW USER</button>

  </div>

    <div class="card-body" >

      <div class="d-flex align-items-center justify-content-between">
          <label class="container-check">All Courses
            <input type="checkbox" id="checkall">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check">BSIT
            <input type="checkbox" class="checkItem" value="BSIT">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check">BSBA
            <input type="checkbox" class="checkItem" value="BSBA">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check">BSEntrep
            <input type="checkbox" class="checkItem" value="BSEntrep">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check">BSA
            <input type="checkbox" class="checkItem" value="BSA">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check">BSE
            <input type="checkbox" class="checkItem" value="BSE">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check">BEEd
            <input type="checkbox" class="checkItem" value="BEEd">
            <span class="checkmark-check"></span>
          </label>
      </div>    

<hr>
      
      <table id="student_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Student Number</th>
                      <th>Name</th>
                      <th>Course</th>
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
  


<!-- Modal -->
<?php include 'add-new-student-user.php'; ?>      


      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

<div class="alert-box success" style="max-width: 600px;">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>   
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
<div class="alert-box warning" style="max-width: 600px;">
  <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Warning!</span>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
<!-- Button Effect -->
<script src="../../src/js/button-effect.js"></script> 

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

<?php include 'add-existing-student-user.php'; ?>   



  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>
  
  
<script type="text/javascript">
$(document).ready(function(){
  var get_all = [];
  get_data();
  function get_data(get_all) {
    var all = JSON.stringify(get_all);
    var table = $('#student_table').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "pageLength": 10,
      "order": [[ 1, 'desc' ]],     
      "processing": true,     
      "serverSide" : true,
      "ajax" : {
            "url":"fetch_students.php",
            "data":{ 
              "course":all
            }
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
    });
  }
  
  $('#checkall').change(function(){
    $('.checkItem').prop('checked', $(this).prop('checked'));
    if($(this).prop('checked') == true) {
        $('.checkItem:checked').each(function(){
        get_all.push($(this).val());
      });
      $('#student_table').DataTable().destroy();
      get_data(get_all);
      get_all = [];
    } 
  });

  $('.checkItem').click(function(){
    var course = $(this).val();
    $('.checkItem:checked').each(function(){
      get_all.push($(this).val());
    });
    $('#student_table').DataTable().destroy();
    get_data(get_all);
    get_all = [];
  });

  $('.checkItem').change(function(){
    if($(this).prop('checked') == false) {
      $('#checkall').prop('checked', false);
    }
    if($('.checkItem:checked').length == $('.checkItem').length) {
      $('#checkall').prop('checked', true);
    } 
  });

  $('#student_table').on('click', '.create', function(){
    var email = $(this).attr('id');
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"check_account":1,email:email},
      success:function(data) {
        if(data == "0") {
          $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#warningmsg").html('Student already has an account');
        }
        else if(data == "1"){
          $('#student_user_existing_modal').modal('show');
          $('#exist_email').val(email);
        }
      }
    });
  });
});
</script>
<!-- TABLE -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> -->
  <script src="../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
  <script src="../../src/vendor/table/js/jquery.dataTables.min.js"></script>
  <script src="../../src/vendor/table/js/dataTables.responsive.min.js"></script>


  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script> 

  <!-- Input Error Msg -->
  <script src="../../src/js/input-msg-error.js"></script> 

   <!-- Select style -->
  <script src="../../src/js/select-and-textarea-style.js"></script>



</body>

</html>
