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
                    <li class="breadcrumb-item active" aria-current="page">Petition</li>
                  </ol>
                </nav>
                <div class="d-flex justify-content-end">
                    <div class="input-group mt-2 mb-4 col-xl-4 col-lg-4 col-md-3 col-sm-12 col-xs-12">
                      <input type="text" class="form-control" placeholder="Input Subject Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#petitionreq-modal">Request</button>
                      </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold card-text-title-head">Request List</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Subject Code</th>
                              <th scope="col">Subject Title</th>
                              <th scope="col" class="d-flex justify-content-center">Total Request</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                              <tbody id="subjectpetition">
                                <tr>
                                  <th scope="col">ACC 1</th>
                                  <th scope="col">Principle of Accounting</th>
                                  <th scope="col" class="d-flex justify-content-center">1</th>
                                  <th scope="col">
                                    <a href="view">
                                    <button class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp;VIEW</button>
                                    </a>
                                </th>
                                </tr>
                              </tbody>
                        </table>
                    </div>    
                  </div>
                </div>
            </div>
        </main>
        <?php require '../src/layout/footer.php'; ?>
    </div>
</div>

<!-- Modal Start -->
<div class="modal fade petreq" id="petitionreq-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="">Petition Request</h6>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Information</label>
                        <input type="text" class="form-control mb-3" id="prfirstname" value="First Name" readonly>
                        <input type="text" class="form-control mb-3" id="prlastname" value="Last Name" readonly>
                        <input type="text" class="form-control mb-3" id="prcourse" value="Course" readonly>
                    </div>
                    </div>
                    <div class="col-lg-6"> 
                        <div class="form-group">
                        <label for="exampleInputEmail1">Your Subject request</label>
                        <input type="text" class="form-control mb-3" id="prsubjid" placeholder="Subject Code" hidden>
                        <input type="text" class="form-control mb-3" id="prsubjcode" placeholder="Subject Code" readonly>
                        <input type="text" class="form-control mb-3" id="prsubjtitle" value="Subject Title" readonly>
                        <input type="text" class="form-control mb-3" id="prunit" value="Unit" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> CANCEL</button>
                    <button type="button" class="btn btn-success" id="savepetition" ripple><i class="fas fa-save"></i> SAVE</button>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Modal End -->

<!-- Alert -->
<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
