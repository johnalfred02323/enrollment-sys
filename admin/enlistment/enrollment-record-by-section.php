<!-- Head -->
<?php 
require '../../src/layout/enlistment/head.php'; 
require ('../../config/config.php');  
?>


<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


  <title>GRC System | Registrar</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/enlistment/side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/enlistment/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Enrollment Record</li>
  </ol>
</nav>


<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>


<h6></h6>

<div class="row">
  <div class="col-lg-3">

  <div class="card shadow-sm mb-4">
    <div class="card-header py-3">
      <h6 class="m-0"><i class="fas fa-info-circle"></i>  &nbsp;School Year: 2019-2020</h6>
    </div>
    <div class="card-body">


<div class="dropdown show mb-3">
  <a class="btn delete-user dropdown-toggle btn-block text-left" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;"><i class="fas fa-book"></i> <lable id="sort">By Subject</lable>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="color:black;">
    <a class="dropdown-item" id="bystud">By Student</a>
  </div>
</div>

<div class="dropdown show mb-3">
  <a class="btn view-user dropdown-toggle btn-block text-left" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-star"></i> 
    Major
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="color:black;">
    <a class="dropdown-item">Programming</a>
    <a class="dropdown-item">Human Resources</a>
    <a class="dropdown-item">Marketing Management</a>
    <a class="dropdown-item">Entrepreneurship</a>
    <a class="dropdown-item">Accountancy</a>
    <a class="dropdown-item">English</a>
    <a class="dropdown-item">Filipino</a>
    <a class="dropdown-item">Social Studies</a>
    <a class="dropdown-item">Physical Education</a>
    <a class="dropdown-item">Elementary Education</a>
  </div>
</div>

<div class="dropdown show mb-3">
  <a class="btn edit-user dropdown-toggle btn-block text-left" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-calendar"></i> 
    Year
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="color:black;">
    <a class="dropdown-item">First Year</a>
    <a class="dropdown-item">Second Year</a>
    <a class="dropdown-item">Third Year</a>
    <a class="dropdown-item">Fourth Year</a>
    <a class="dropdown-item">Fifth Year</a>
  </div>
</div>


    </div>
  </div>
    
  </div>
  <div class="col-lg-9">

<!-- For viewing by subject -->
<!-- viewing by student of Section -->
<div class="card shadow-sm mb-4" id="bysubjectview">
        <a href="#bysubjectcollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h5 class="m-0 text-muted">Section</h5>
      </a>
      <!-- Card Content - Collapse -->
       <div class="collapse show" id="bysubjectcollapse">
      
 <div class="card-body">

<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Total Student</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Sample</th>
      <td>Sample</td>
      <td><button id="" data-toggle="modal" data-target="#seminar-mdoal" class="view-user pull-xs-right edit" ripple><i class="fas fa-eye"></i> VIEW</button> </td>
    </tr>
  </tbody>
</table>
</div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content (viewing by subject) -->
 </div><!-- End of Card Content - Collapse -->



<!-- viewing by student of Section -->
<div class="card shadow-sm mb-4" id="bystudentview">
        <a href="#bystudentcollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h5 class="m-0 text-muted">Section</h5>
      </a>
      <!-- Card Content - Collapse -->
       <div class="collapse show" id="bystudentcollapse">

 <div class="card-body">

<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Total of Subject Taken</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Sample</th>
      <td>Sample</td>
      <td><button id="" data-toggle="modal" data-target="#seminar-mdoal" class="view-user pull-xs-right edit" ripple><i class="fas fa-eye"></i> VIEW</button> </td>
    </tr>
  </tbody>
</table>
</div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content (viewing by student of Section)-->
    </div><!-- End of Card Content - Collapse -->


    </div>
    <!-- End of Content Wrapper -->


  <!-- Modal Start -->
  <div class="modal fade" id="seminar-mdoal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subject</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">


<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Student Number</th>
      <th scope="col">Student Name</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Sample</th>
      <td>Sample</td>
      <td>Sample</td>
    </tr>
  </tbody>
</table>
</div>


          <div class="modal-footer">

<button type="button" class="cancel" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="" ripple><i class="fas fa-save"></i> SAVE</button>

          </div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

      </div>
        <!-- /.row -->
   

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





  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../src/js/counter.js"></script>
  <script type="text/javascript">
  $('#bystudentview').hide();
  $(document).on('click', '#bystud', function(){
    var sort = $('#sort').text();
    if(sort == "By Subject")
    {
      $('#sort').text("By Student");
      $('#bystudentview').show();
      $('#bysubjectview').hide();
    }
    else
    {
      $('#sort').text("By Subject");
      $('#bystudentview').hide();
      $('#bysubjectview').show();
    }
  });
  </script>

</body>

</html>
