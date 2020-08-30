<!-- Head -->
<?php require 'src/layout/head.php'; 
include('../config/config.php');
$faculty_id = substr($_COOKIE['userid'],7,strlen($_COOKIE['userid']));
$sy = mysqli_query($conn, "SELECT DISTINCT school_year FROM timeframe ORDER BY school_year DESC");
$get_sy = mysqli_fetch_assoc($sy);
?>

<!-- jquery -->
<script src="../src/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

<link rel="stylesheet" type="text/css" href="../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../src/table/css/fixedHeader.dataTables.css">
<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../src/table/css/jquery.dataTables-dark.css">
  <title>GRC System | Report of Grades</title>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Side Nav -->
        <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
          <img src="../src/img/grc-header.png" width="150px;">
        </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Dashboard -->
      <li class="nav-item">
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
      <li class="nav-item active">
        <a class="nav-link" href="grade_report">
          <i class="fas fa-list-ol"></i>
          <span>Report of Grade</span></a>
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
        <?php require 'src/layout/top-nav.php'; ?>
       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><a href="index">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Report of Grade</li>
            </ol>
          </nav>
          <!-- SPACER -->
          <div class="mx-auto" style="height: 10px;"></div>
            <div class="card shadow-sm mb-4"> <!-- card start -->
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold card-text-title-head">Report of Grade</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Settings</div>
                      <a class="dropdown-item" href="" data-toggle="modal" data-target="#rg-config">Configure Document</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <table id="grreport_table" class="display nowrap" style="width:100%">
                  <thead>
                      <tr>
                          <th>Section</th>
                          <th>Subject</th>
                          <th>School Year/Semester</th>
                          <th>Faculty</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                </table>
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

  <!-- Modal Start -->
  <div class="modal fade" id="rg-config" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Report of Grade Configuration</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Selected Signee</h5>
          <div class="table-responsive" style="max-height: 280px; overflow: auto;" id="selected_signee_tbl"></div>
          <br>
          <h5>Available Signee</h5>
          <div class="table-responsive" style="max-height: 280px; overflow: auto;" id="avail_signee_tbl"></div>
        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

  <div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Are you sure to delete this signee?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="confirm_del" ripple><i class="fas fa-check"></i> Confirm</button>
      </div>
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
  <script type="text/javascript">
    $(document).ready(function(){
        var table = $('#grreport_table').DataTable( {

            "order": [[ 0, 'desc' ]],

            "processing" : true,
            
            "serverSide" : true,

            "ajax" : {
                "url":"fetch_grreport.php",
                "data":{"sy":"<?php echo $get_sy['school_year'];?>","fac_id":"<?php echo $faculty_id;?>"}
            },

            responsive: true,

            fixedHeader: {
                header: true,
                footer: true
            }
        } );

      $(document).on('show.bs.modal', '.modal', function (event) {
          var zIndex = 1040 + (10 * $('.modal:visible').length);
          $(this).css('z-index', zIndex);
          setTimeout(function() {
              $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
          }, 0);
      });

      retrieve_available_signee();

      function retrieve_available_signee() {
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"ret_avail_sig":1},
          success:function(data) {
            $('#avail_signee_tbl').html(data);
          }
        });
      }


      $('#grreport_table').on('click', '.view', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        window.open('view_gradereport?id='+id);
      });


        
      
      ret_selected_signee();
      function ret_selected_signee(){
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"ret_sel_sig":1},
          success:function(data) {
            $('#selected_signee_tbl').html(data);
          }
        });
      }
      
      $('#selected_signee_tbl').on('click', '.remove-signee', function(){
        var id = $(this).attr('id');
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"remove_signee":1,id:id},
          success:function(data) {
            ret_selected_signee();
            retrieve_available_signee();
          }
        });
      });

      var tr_num = 0;

      $('#avail_signee_tbl').on('click', '.add_signee', function(){
        var tbl = $('#available_signee tbody tr:last');
        tbl.after('<tr id="row'+tr_num+'"><td><input id="name" style="text-transform: uppercase;" class="form-control" autocomplete="off"></td> <td><input id="pos" style="text-transform: capitalize;" class="form-control" autocomplete="off"></td> <td><select id="role" class="form-control"><option value="Verification">Verification</option><option value="Receiver/Submitted to">Receiver/Submitted to</option></select></td> <td><button type="button" class="btn btn-primary" id="add_sig" style="margin-right:4px;" ripple><i class="fas fa-plus"></i></button><button type="button" class="btn btn-danger cancel-sig" id="'+tr_num+'" ripple><i class="fas fa-times"></i></button></td></tr>');
        $('#name').focus();
        $('#nm1').html('<td colspan="4"><center><span class="add-sig add_signee">Add New Signee</span></center></td>');
        tr_num++;
      });

      $('#avail_signee_tbl').on('click', '.cancel-sig', function(){
        var id = $(this).attr('id');
        var tbl = $('#available_signee tbody');
        $('#row'+id).remove();
        if($('#available_signee tbody tr').length == 0) {
          $('#nm').remove();
          tbl.append('<tr id="nm"><td colspan="4"><center><i>No Signee Available</i> <span class="add-sig add_signee">Add New Signee</span></center></td></tr>');
        }
      });

      $('#avail_signee_tbl').on('click', '.select-signee', function(){
        var id = $(this).attr('id');
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"select_signee":1,id:id},
          success:function(data) {
            ret_selected_signee();
            retrieve_available_signee();
            if(data == '0') {
              $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html('Selected');
            }
            else if(data == '1') {
              $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#warningmsg").html("Number of signee in 'Verification' exceeds");
            }
            else if(data == '2') {
              $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#warningmsg").html("Number of signee in 'Receiver/Submitted to' exceeds");
            }
          }
        });
      });

      var signee_id;
      $('#avail_signee_tbl').on('click', '.delete-signee', function(){
        signee_id = $(this).attr('id');
      });
      $('#confirm_del').click(function(){
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"delete_signee":1,id:signee_id},
          success:function(data) {
            retrieve_available_signee();
            $('#confirm_delete').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html(data);
          }
        });
      });

      $('#avail_signee_tbl').on('click', '#add_sig', function(){
        var name = $('#name').val().toUpperCase();
        var role = $('#role').val();
        var pos = $('#pos').val();
        pos = pos.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });

        if(name != '' && pos != '') {
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{"add_signees":1,name:name,role:role,pos:pos},
            success:function(data) {
              retrieve_available_signee();
              $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html(data);
            }
          });
        }
        else {
          $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#warningmsg").html('Please, fill out all fields');
        }

      });
    });
  </script>
  <!-- Scroll to Top Button -->
  <?php require '../src/layout/go-to-top.php'; ?>
  <!-- Responsive core JavaScript -->
  <script src="src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../src/js/admin.min.js"></script>
</body>

</html>
