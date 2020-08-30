<!-- Head -->
<?php require 'src/layout/head.php'; 
$faculty_id = substr($_COOKIE['userid'],7,strlen($_COOKIE['userid']));
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

  <title>GRC System | Classes</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/grc/faculty/dashboard">
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
      <li class="nav-item active">
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
              <li class="breadcrumb-item active" aria-current="page">Classes</li>
            </ol>
          </nav>

<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>



<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Classes</h6>


  </div>

    <div class="card-body" >
      
      <table id="class_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Section</th>
                      <th>Subject</th>
                      <th>Schedule</th>
                      <th>View Class</th>
                      <th>Download Class Record</th>
                      <th>Status</th>
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
      <?php require 'src/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require 'src/go-to-top.php'; ?>

  <script type="text/javascript">
    fetch_records();
    function fetch_records(){
      var table = $('#class_table').DataTable( {

          "order": [[ 1, 'desc' ]],

          "processing" : true,
          
          "serverSide" : true,

          "ajax" : {
            "url": "fetch_class.php",
            "data":{
              "faculty_id":"<?php echo $faculty_id;?>"
            }
          },

          responsive: true,

          fixedHeader: {
              header: true,
              footer: true
          }
      } );
    }




    $('#class_table').on('click', '.view', function(e){
      var cr_id = $(this).attr('id');
      var encodedID = window.btoa(cr_id);
      window.open('view_class?id='+encodedID, '_self');
    });

    $('#class_table').on('click', '.download', function(e){
      var id = $(this).attr('id');
      window.open('download_classrecord?id='+id);
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
