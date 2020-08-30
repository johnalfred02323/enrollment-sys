<?php require '../src/layout/head.php'; require ('../../config/config.php'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                  </ol>
                </nav>

               
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                              <div class="card-header">
                                Student Information
                              </div>                                                              
                                <div class="card-body">
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <label for="inputEmail4">Student No.</label>
                                      <input type="text" class="form-control" id="studnum" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="inputPassword4">Course</label>
                                      <input type="text" class="form-control" id="course" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="inputPassword4">Major</label>
                                      <input type="text" class="form-control" id="major" readonly>
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <label for="inputEmail4">Lastname</label>
                                      <input type="text" class="form-control" id="lname" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="inputPassword4">Firstname</label>
                                      <input type="text" class="form-control" id="fname" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="inputPassword4">Middlename</label>
                                      <input type="text" class="form-control" id="mname" readonly>
                                    </div>
                                  </div> 
                                </div>                   
                            </div>
                        </div>

                        <div class="col-12 mt-4">  
                          <div class="card shadow-sm">
                            <div class="card-header">
                              Accounts
                            </div>                                                              
                              <div class="card-body">
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label for="inputEmail4">Tuition</label>
                                    <input type="text" class="form-control" id="tuition" readonly>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputPassword4">Payment</label>
                                    <input type="text" class="form-control" id="payment" readonly>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputPassword4">Balance</label>
                                    <input type="text" class="form-control" id="balance" readonly>
                                  </div>
                                </div>
                              </div>                   
                          </div>  
                        </div>
                                                
                        <div class="col-lg-12 mt-4">
                          <div class="card shadow-sm">
                            <div class="card-header">
                              Concerned Grade(s)
                            </div>                                
                            <div class="card-body">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col" nowrap>Subject Code</th>
                                    <th scope="col" nowrap>Subject Title</th>
                                    <th scope="col" nowrap>School Year</th>
                                    <th scope="col" nowrap>Semester</th>
                                    <th scope="col" nowrap>Grade</th>
                                  </tr>
                                </thead>
                                <tbody id="student_grade">
                                </tbody>
                              </table>                                
                            </div>
                          </div>
                        </div> 
                                              
                    </div>    
              
            </div>
        </main>
<?php require '../src/layout/footer.php'; ?>
    </div>
</div>
    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
 
  $(document).ready(function(){  

    var studnum = '<?php echo $_COOKIE['sn']; ?>';
    $.ajax({  
        url:"process.php",  
        method:"POST",  
        data:{"studentinfo":1,studnum:studnum},  
        success:function(data)  
        {  
          var result = $.parseJSON(data);
          $('#studnum').val(studnum);
          $('#fname').val(result.firstname);
          $('#lname').val(result.lastname);
          $('#mname').val(result.middlename);
          $('#course').val(result.course);
          $('#major').val(result.major);
          $('#tuition').val(result.amount);
          $('#payment').val(result.payment);
          $('#balance').val(result.balance);
        }  
    });

  $.ajax({  
        url:"process.php",  
        method:"POST",  
        data:{"student_grade":1,studnum:studnum},  
        success:function(data)  
        {  
          $('#student_grade').html(data);
        }  
    });

  });


</script>
</body>
</html>
