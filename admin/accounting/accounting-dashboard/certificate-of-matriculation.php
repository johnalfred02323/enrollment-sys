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
    <?php require 'layout/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require 'layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="breadcrumb-item active" aria-current="page"><a href="../">Dashboard</a> / Certificate of Matriculation</div>
  </ol>
</nav>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Certificate of Matriculation</h6>

  </div>

    <div class="card-body" >

      <table id="com_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Student Number</th>
                      <th>Course</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody></tbody>
      </table>


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


<!-- Add Transaction Modal -->
<?php require 'com_modal.php'; ?>

  </div>
  <!-- End of Page Wrapper -->


  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script>

<script type="text/javascript">
$(document).ready(function() {
dashcom_data();
function dashcom_data(){
  var table = $('#com_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "certificate_of_matriculation.php",

      responsive: true,

      searchPlaceholder: "Search records",

      fixedHeader: {
          header: true,
          footer: true
      },
      language: {
          search: "_INPUT_",
          searchPlaceholder: "Search..."
      }
  } );
}

});

$('#com_table').on( 'click', 'button.edit', function (e) {
    var id = $(this).attr("id");
    $('#id_val').val(id);
    $.ajax({
      url:"com_process.php",
      method:"POST",
      data:{"editfees":1,id:id},
      success:function(data){
        $('#fees_forms').html(data);
        $('#fees_forms').show();
        $('#fees_forms_new').hide();
      }
    });
});

</script>


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

<script>
$(document).on('click', '#print', function(){
  var stud = $('#studno').text();
  var scholar1 = $('#scholar').text();
  var fees1 = $('#fees').text();
  var tunits1 = $('#tunits1').text();
  var perunits1 = $('#perunits').text();
  var tunits2 = $('#tunits2').text();
  var amount = $('#amount').text();
  var dis = $('#dis').text();
  var tdis = $('#tdis').text();
  var dts = $('#today').text();
  var yr = $('#yrlvl').text();
  var stat = $('#status1').text();


  $.ajax({  
    url:"com_process.php",  
    method:"POST",  
    data:{"editfees":1,stud:stud},
    success:function(data)  
    {  
                        
     window.open('printed_com?studentnumber='+stud+'&scholar='+scholar1+'&miscellaneous='+fees1+'&tunit1='+tunits1+'&perunit='+perunits1+'&tunit2='+tunits2+'&amount='+amount+'&discount='+dis+'&totaldiscount='+tdis+'&today='+dts+'&yearlevel='+yr+'&status='+stat);

    }  
    });
    
    });
   
</script>
