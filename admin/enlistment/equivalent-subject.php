<!-- Head -->
<?php require '../../src/layout/enlistment/head.php'; ?>
<head>
<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- <style>  
           #searchstudlist ul{  
                background-color:#ccc;  
                cursor:pointer;  
           }  
           #searchstudlist li{  
                padding:12px;  
           }
           </style>     -->       

  <title>GRC System | Enlistment</title>

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
        <div class="container-fluid" style="z-index: 0;">
          

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Equivalent</li>
  </ol>
</nav>





<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
  modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label">Old to New Curriculum Subjects</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="table-responsive">      
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col" colspan="2" class="text-center">Old Curriculum Details</th>
                      <th scope="col" colspan="5" class="text-center">New Curriculum Details</th>
                    </tr>          
                    <tr>
                      <th scope="col">Subject Code</th>
                      <th scope="col">Subject Title</th>
                      <th scope="col">Subject Code</th>
                      <th scope="col">Subject Title</th>
                      <th scope="col">Year</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Course</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Sample</th>
                      <td>Sample</td>
                      <td>Sample</td>
                      <td>Sample</td>
                      <td>Sample</td>
                      <td>Sample</td>
                      <td>Sample</td>            
                    </tr>
                  </tbody>
                </table>  
              </div>          
        </div>
      <div class="modal-footer">
        <button type="button" class="save" data-dismiss="modal" ripple><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>




<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>



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

</body>

</html>
