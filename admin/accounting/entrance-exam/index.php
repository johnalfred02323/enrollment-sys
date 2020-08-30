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
    <li class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard">Dashboard</a> / Transaction / Entrance Exam</li>
  </ol>
</nav>




<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Entrance Exam</h6>

  </div>

  <br>
  <div class="row">

            <div class="col-sm-4">
            <div class="col-sm-12"> 

            <input type="text" class="form-controls" id="lname" aria-label="Default" placeholder="Last Name" aria-describedby="inputGroup-sizing-default" maxlength="20" onkeypress="return Validate(event);" autocomplete="off">

            <br>

            <input type="text" class="form-controls" id="orid" aria-label="Default" placeholder="Official Receipt" aria-describedby="inputGroup-sizing-default" maxlength="6" onkeypress="return ValidateNumber(event);" autocomplete="off">

            <br>

<!--             <div class="box1">
                  <?php //require 'entrance_exam_combo.php'; ?>
                      <select name='fees2' id="transaction" required>
                            <option hidden></option>

                                <?php //cho exam($conn); ?>

                                <input type="text" id="txt1" hidden="">
                                <input type="text" id="txt2" hidden="">
                                <input type="text" id="txt3" hidden="">
                      </select>
            </div> -->

            </div>
            </div>

            <div class="col-sm-4">  
            
            <input type="text" class="form-controls" id="fname" aria-label="Default" placeholder="First Name" aria-describedby="inputGroup-sizing-default" maxlength="20" onkeypress="return Validate(event);" autocomplete="off">

            <br>

            <!-- <input type="text" class="form-controls" id="schoolyr" aria-label="Default" placeholder="School Year Ex: '2020-2021'" aria-describedby="inputGroup-sizing-default" maxlength="9" onkeypress="return ValidateNumber1(event);" autocomplete="off"> -->

            <label><b>School Year:</b> <span id="sy"><?php echo $result_data['school_year']; ?></span></label>

            <br>
            <br>

            <span><b>Price:</b> <span id="prc2"></span></span>

            <label id="enexam" hidden="">Entrance Exam</label>

            </div> 

            <div class="col-sm-4">
            <div class="col-sm-12"> 
            
            <input type="text" class="form-controls" id="mname" aria-label="Default" placeholder="Middle Name (Optional)" aria-describedby="inputGroup-sizing-default" maxlength="20" onkeypress="return Validate(event);" autocomplete="off">

            <br>

            <!-- <input type="text" class="form-controls" id="sem" aria-label="Default" placeholder="Semester Ex: 'First Semester'" aria-describedby="inputGroup-sizing-default" maxlength="20" onkeypress="return Validate(event);" autocomplete="off"> -->

            <label><b>Semester:</b> <span id="sem1"><?php echo $result_data['semester']; ?></span></label>

            <br><br>

            <button type="button" id="add" class="add-user pull-xs-right"><i class="fas fa-plus"></i> ADD NEW</button>

            </div>
            </div>

</div> 
<br>
</div> 
































              <div class="card mb-4">
                <div class="card-header">
                  <h5 class="m-0 font-weight-bold">Entrance Exam</h5>
                </div>
                <div class="card-body">
                  <div class="row d-flex align-items-center">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Last Name</small>
                        <input type="text" class="form-control" id="" size="18" placeholder="" value="" onkeypress="return Validate(event);">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">First Name</small>
                        <input type="text" class="form-control" id="fname" size="18" placeholder="" value="" onkeypress="return Validate(event);">
                      </div>                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Middle Name (Optional)</small>
                        <input type="text" class="form-control" id="mnae" size="18" placeholder="" value="" onkeypress="return Validate(event);">
                      </div>                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Official Receipt</small>
                        <input type="text" class="form-control" id="" size="18" placeholder="" value="" onkeypress="return ValidateNumber(event);">
                      </div>                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">School Year</small>
                        <input type="text" class="form-control" id="sy" size="18" placeholder="" value="<?php echo $result_data['school_year']; ?>" readonly>
                      </div>                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Semester</small>
                        <input type="text" class="form-control" id="sem1" size="18" placeholder="" value="<?php echo $result_data['semester']; ?>" readonly>
                      </div>                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Ano to?</small>
                          <div class="box1">
                            <?php require 'entrance_exam_combo.php'; ?>
                            <select name='fees2' id="transaction" required>
                              <option hidden>Choose Value</option>
                              <?php echo "<option value=''>" . exam($conn) . "</option>"; ?>
                            </select>
                          </div>
                      </div>                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Price</small>
                        <label id="enexam" hidden="">Entrance Exam</label>
                        <input type="text" class="form-control" id="prc2" size="18" placeholder="" value="" readonly>
                      </div>                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <button type="button" id="add" class="btn-block add-user pull-xs-right"><i class="fas fa-plus"></i> ADD NEW</button>
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


<!-- Add Miscellaneous Modal -->



  </div>
  <!-- End of Page Wrapper -->


  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 




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


<script type="text/javascript">
  $(document).ready(function(){
    $("#transaction").change(function(){
      var display1=$("#transaction option:selected").text();
      $("#txt1").val(display1);
      var id = $("#transaction option:selected").attr('id');
      $("#txt3").val(id);
    })

          

  $(document).on('change','#transaction', function(){
    var fees = $(this).val();
    $("#txt2").val(fees);
    $("#TotMarks").val(fees);

    $('#prc2').text(fees);

    });
});  



 $(document).on('click', '#add', function(){
  
  var ln = $('#lname').val();
  var fn = $('#fname').val();
  var mn = $('#mname').val();
  var or = $('#orid').val();
  var sh = $('#sy').text();
  var sm = $('#sem1').text();
  var price = $('#txt2').val();
  var uc = $('#usercash').text();
  var ee = $('#enexam').text();


  if(ln == '' || ln == ' ' || fn == '' || fn == ' ' || mn == ' ' || or == '' || price == '')
  {
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
    $('#failedmsg').html("Please Input Data");
  }
  else
  {

  
  $.ajax({
      url:"examform.php",
      method:"POST",
      data: {"add":1,ln:ln,fn:fn,mn:mn,or:or,sh:sh,sm:sm,price:price,uc:uc,ee:ee},
      success:function(data){
       if(data=='0')
        {
          $('#success').modal('show');

        }
        else{
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $('#failedmsg').html("Official Receipt Number Exist");
        } 
               
      }
    });

  }
  
}); 


$(document).on('click', '#savedone', function(){
$('#success').modal('hide');
window.location.href='./';
});



 function Validate(event) {
        var regex = new RegExp("^[a-zA-Z\ whitespace]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }

     function ValidateNumber(event) {
        var regex = new RegExp("^[0-9]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }

    function ValidateNumber1(event) {
        var regex = new RegExp("^[0-9-]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }



</script>