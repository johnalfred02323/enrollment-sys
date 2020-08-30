<!-- Head -->
<?php
require 'layout/head.php'; 
require '../../../config/config.php'; 
?>

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
        <?php require 'layout/cashier-top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard.php">Dashboard</a> / Transaction / Entrance Exam</li>
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
  <div class="row"> <!-- ROW Start Here -->

            <div class="col-sm-4"> <!-- left column Start -->

            <input type="text" class="form-controls" id="lname" aria-label="Default" placeholder="Last Name" aria-describedby="inputGroup-sizing-default" maxlength="20">

            <br>

            <input type="text" class="form-controls" id="orid" aria-label="Default" placeholder="Official Receipt" aria-describedby="inputGroup-sizing-default" maxlength="20">

            <br>

            <div class="box1">
                  <?php require 'entrance_exam_combo.php'; ?>
                      <select name='fees2' id="transaction" required>
                            <option hidden>Entrance Exam Permit</option>

                                <?php echo exam($conn); ?>

                                <input type="text" id="txt1" hidden="">
                                <input type="text" id="txt2" hidden="">
                                <input type="text" id="txt3" hidden="">
                      </select>
            </div>

            </div> <!-- left column End -->

            <div class="col-sm-4">  <!-- Right column Start -->
            
            <input type="text" class="form-controls" id="fname" aria-label="Default" placeholder="First Name" aria-describedby="inputGroup-sizing-default" maxlength="20">

            <br>

            <input type="text" class="form-controls" id="schoolyr" aria-label="Default" placeholder="School Year" aria-describedby="inputGroup-sizing-default" maxlength="20">


            </div> <!-- Right column Start -->

            <div class="col-sm-4">  <!-- Right column Start -->
            
            <input type="text" class="form-controls" id="mname" aria-label="Default" placeholder="Middle Name" aria-describedby="inputGroup-sizing-default" maxlength="20">

            <br>

            <input type="text" class="form-controls" id="sem" aria-label="Default" placeholder="Semester" aria-describedby="inputGroup-sizing-default" maxlength="20">

            <br>

            <button type="button" id="add" class="add-user pull-xs-right"><i class="fas fa-plus"></i> ADD NEW</button>

            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->
<br>
<br>
</div> <!-- card end -->


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
    });
});  


 $(document).on('click', '#add', function(){
  
  var ln = $('#lname').val();
  var fn = $('#fname').val();
  var mn = $('#mname').val();
  var or = $('#orid').val();
  var sh = $('#schoolyr').val();
  var sm = $('#sem').val();
  var price = $('#txt2').val();

  if(ln == '' || fn == '' || mn == '' || or == '' || sh == '' || sm == '')
  {
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
    $('#failedmsg').html("Please Input A Data");
  }
  else
  {

  
  $.ajax({
      url:"examform.php",
      method:"POST",
      data: {"add":1,ln:ln,fn:fn,mn:mn,or:or,sh:sh,sm:sm,price:price},
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







</script>