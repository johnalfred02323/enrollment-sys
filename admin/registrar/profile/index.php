<!-- Head -->
<?php 
require '../layout/head.php'; 
require ('../../../config/config.php');  
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


  <title>GRC System | Profile</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'layout/side-nav.php'; ?>




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
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
  </ol>
</nav>





<?php

$query = "SELECT * FROM user WHERE username = '".$_GET["ID"]."'";  
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_array($result);

?>




    <div class="card shadow-sm mb-4">
      <div class="card-header py-3">
        <h5 class="m-0">Profile Information</h5>
      </div>
      <div class="card-body">


 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg"> <!-- left column Start -->

            

  <div class="form-group">
    <small class="readonly">Last Name</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo $row['lastname']; ?>" readonly>
  </div>

  <div class="form-group">
    <small class="readonly">First Name</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo $row['firstname']; ?>" readonly>
  </div>

  <div class="form-group">
    <small class="readonly">Middle Name</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo $row['middlename']; ?>" readonly>
  </div>    

  <div class="form-group">
    <small class="readonly">Username</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo $row['username']; ?>" readonly>
  </div>  



            </div> <!-- left column End -->




            <div class="col-lg">  <!-- Right column Start -->



            
  <div class="form-group">
    <small class="readonly">Department</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo $row['department']; ?>" readonly>
  </div>

  <div class="form-group">
    <small class="readonly">Role</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo $row['usertype']; ?>" readonly>
  </div>

  <div class="form-group">
    <small class="readonly">Usertype</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo $row['usertype']; ?>" readonly>
  </div>    

  <div class="form-group">
    <small class="readonly">Created at</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="<?php echo date('F d , Y',strtotime($row['created_at'])); ?>" readonly>
  </div>  





            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->



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

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

</body>

</html>
