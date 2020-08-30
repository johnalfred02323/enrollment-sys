<!-- Head -->
<?php require '../../src/layout/admission/head.php'; 
$sisnum = $_GET['sisnum'];
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables-dark.css">

  <title>GRC System | Admission</title>

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
              <li class="breadcrumb-item "><a href="index.php"> Dashboard </a></li>
              <li class="breadcrumb-item ">Student Information</li>
              <li class="breadcrumb-item ">Evaluation of Scores</li>
              <li class="breadcrumb-item ">Submission of Credentials</li>
              <li class="breadcrumb-item ">Subject Accreditation</li>
              <li class="breadcrumb-item active" aria-current="page">Section & Schedule</li>
            </ol>
          </nav>

          <div class="card my-shadow mb-4"> <!-- card start -->

            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

              <h6 class="m-0 font-weight-bold card-text-title-head">Credentials</h6>

            </div>

            <div class="card-body">

              <div id="" class="form-group">
                  <input id="" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" disabled>
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                  <label for="sis" class="float-label" style="font-family:Arial, FontAwesome"><?php echo $sisnum;?></label>
                </div>      

                <div id="" class="form-group">
                  <input id="fullname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" disabled>
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                  <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome"></label>
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
    <!-- End of Page Wrapper -->

    

<!-- Scroll to Top Button -->
<?php require '../../src/layout/go-to-top.php'; ?>

<script type="text/javascript">
  
    var sisnum = '<?php echo $sisnum;?>';
     $.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"displayfullname":1,sisnum:sisnum},
      success:function(data){
        var result = $.parseJSON(data);
                $('#fullname').val(result.fname+" "+result.mname+" "+result.lname);
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
<script src="../../src/js/dark-mode-switch.min.js"></script>

</body>

</html>
