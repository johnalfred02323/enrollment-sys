<?php require '../src/layout/head.php'; // require ('../../config/config.php'); ?>
  <!-- jquery -->
  <script src="../vendor/jquery/jquery-3.3.1.min.js"></script>
</head>
<body class="sb-nav-fixed">   
<?php require '../src/layout/top-nav.php'; ?>
<div id="layoutSidenav">
<?php require 'side-bar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <nav aria-label="breadcrumb" style="margin-top: 25px;">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="../petition">Petition</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Subject</li>
                  </ol>
                </nav>
              <div class="card shadow-sm mt-5 mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 id="vsubject" class="m-0">ACC 1 - Principle of Accounting</h5>
                  <button type="button" class="btn btn-info pull-xs-right" data-toggle="modal" data-target="#join" ripple><i class="fas fa-user-plus"></i> Join</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="table-borderless"> 
                      <tr>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Major</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="petitionlist">
                      <tr>
                        <th scope="col">Joey</th>
                        <th scope="col">Magcalas</th>
                        <th scope="col">Parcero</th>
                        <th scope="col">BSIT</th>
                        <th scope="col">Programming</th>
                        <th scope="col"><button class="btn btn-danger" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i> CANCEL</button></th>
                      </tr>                      
                    </tbody>
                      <caption>Total of Student : 1<label id="studentcount"></label></caption> 
                  </table>
                  </div>
                </div>
              </div>
            </div>
        </main>
        <?php require '../src/layout/footer.php'; ?>
    </div>
</div>

  <!-- Join Modal-->
  <div class="modal fade" id="join" tabindex="-1" role="dialog" aria-labelledby="join" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
    
    <h6>You want to join ACC 1 - Principle of Accounting</h6>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="btn btn-success" id="cancelpetition" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>


    <!-- Cancel Modal-->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Are you sure?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="btn btn-success" id="cancelpetition" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>

    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
