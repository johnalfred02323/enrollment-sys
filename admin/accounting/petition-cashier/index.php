<?php 
require '../layout/head.php';
require '../../../config/config.php';

if(isset($_COOKIE["username"])): ?>
<label id="usercash" hidden=""><?php echo $_COOKIE['username']; ?></label>
<?php endif ?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">


  <title>GRC System | Accounting</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'layout/cashier-side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../layout/cashier-top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard">Dashboard</a> / Transaction / Petition Subject</div>
  </ol>
</nav>




<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Petition Subject</h6>

  </div>

    <div class="card-body" >

      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <label class="container-check">All Courses
            <input type="checkbox" id="checkall">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" id="course">BSIT
            <input type="checkbox" class="checkItem" value="BSIT">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" >BSBA
            <input type="checkbox" class="checkItem" value="BSBA">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" >BSEntrep
            <input type="checkbox" class="checkItem" value="BSEntrep">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" >BSA
            <input type="checkbox" class="checkItem" value="BSA">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" >BSE
            <input type="checkbox" class="checkItem" value="BSE">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" >BEEd
            <input type="checkbox" class="checkItem" value="BEEd">
            <span class="checkmark-check"></span>
          </label>
        </div>


          <div class="card-body" >
            <div id="fetch_students" class="table-card">
              <div class="table-responsive table-scroll">  
                <table class="table table-striped" id="student_table">
                  <thead>
                    <tr class="table-bordered">
                      <th scope="col">Student&nbsp;Number</th>
                      <th scope="col">Name</th>
                      <th scope="col" class="align-items-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="4"><center>Select Course to display Student List</center></td>
                    </tr>
                  </tbody>
                </table>
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
      <?php require '../../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 

<!-- Modal -->
<div class="modal fade" id="transaction_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" modal-sm>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Petition</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>  
        <div class="modal-body">
          <div id="transaction_content"></div>
          
        </div>
        <div class="modal-footer">
          <button id="cancel" class="view-user pull-xs-right edit" ripple data-dismiss="modal" onclick="reset()"><i class="fas fa-times"></i> Cancel</button>
          <button id="save_btn" class="delete-user pull-xs-right delete" ripple><i class="fas fa-save"></i> SAVE</button>
        </div>
        </div>
      </div>
</div>


  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>


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

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

</body>

</html>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed" style="max-width: 500px;">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Successful!</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="save" id="savedone" ripple><i class="fas fa-check"></i> Ok</button>
      </div>
      </div>
    </div>
</div>





<script>  
$(document).ready(function(){  
      var get_all = [];
      var isRunning = true;

      get_data();

      function get_data(get_all,val) {
        var all = JSON.stringify(get_all);

        var table = $('#student_table').DataTable({
          "pagingType": "full_numbers",
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
          "pageLength": 10,
          "order": [[ 1, 'desc' ]],          
          "serverSide" : true,
          "ajax" : {
                "url":"fetch_students.php",
                "data":{ 
                  "course":all, 
                  "school_year":"<?php echo $result_data["school_year"];?>", 
                  "semester":"<?php echo $result_data["semester"];?>" }
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
      
      $('#search_student').keyup(function(){
        var value = $(this).val();

        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
          
        if(value != '') {
          get_data(get_all,value);
          get_all = [];
          isRunning = false;
        }
        else if(value == ''){
          get_data(get_all);
          get_all = [];
          isRunning = true;
        }
      });


    $('#fetch_students').on('click', '.transact', function(){
      var id = $(this).attr('id');
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"fetch_single":1,sn:id,semester:"<?php echo $result_data["semester"];?>",school_year:"<?php echo $result_data["school_year"];?>"},
        success:function(data) {
          $('#transaction_content').html(data);
        }
      });
    });

  });

$(document).on('click', '#save_btn', function(){
  var query = $('#sn').text();
  var fullname = $('#fullname').text();
  var subject = $('#subject').text();
  var price = $('#price').text();
  var total = $('#total1').text();
  var subj = $('#subj').text();
  var pet = $('#id_val').text();
  var bal = $('#bals').text();

  var totalall1 = parseInt(bal) + parseInt(price);
  var totalall2 = parseInt(total) + parseInt(price);
  
  var r1 = Number(totalall2)*.4;
  var r2 = Number(totalall2)*.7;
  var r3 = Number(totalall2)*1;

    $.ajax({  
        url:"process.php",  
        method:"POST",  
        data:{"addpetid":1,query:query,subject:subject,price:price,totalall1:totalall1,totalall2:totalall2,r1:r1,r2:r2,r3:r3,subj:subj,pet:pet},
        success:function(data)  
        {  
          $('#success').modal('show');
        }  
    });


});

$(document).on('click', '#savedone', function(){
$('#success').modal('hide');
window.location.href='./';
});

$(document).on('click', '.transact', function(){
$('#transaction_modal').modal('show');
});

</script>