<!-- Head -->
<?php
require '../layout/head.php'; 
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



<?php

if(isset($_SESSION['department'])) 
{

    if ($_SESSION['department'] == 'Registrar')
    {
        include ('layout/top-nav.php');
    }
    else if ($_SESSION['department'] == 'Accounting')
    {
        include ('layout/top-nav1.php');
    }

}
else
    {
        include ('layout/top-nav1.php');
    }
?>


       <!-- Begin Page Content -->
        <div class="container-fluid">




<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Dashboard</a> / Setting Fees / Petitioned Subject</li>
  </ol>
</nav>




<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Petition Subject</h6>

  </div>

    <div class="card-body" >
      
      <table id="misc" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Subject ID</th>
                      <th>Subject Code</th>
                      <th>Schedule ID</th>
                      <th>Action</th>
                      
                  </tr>
              </thead>
      </table>

    </div>
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
<?php require 'ms_modal.php'; ?> 


  </div>
  <!-- End of Page Wrapper -->


  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 

<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm" style="max-width: 350px;">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Are you sure to delete this Miscellaneous?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()"><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="confirmdelete_btn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
fetch_data();

// $('#misc').on( 'click', 'button.edit', function (e) {
//     var id = $(this).attr("id");
//     $('#id_val').val(id);
//     $.ajax({
//       url:"ms_process.php",
//       method:"POST",
//       data:{"addfees":1,id:id},
//       success:function(data){
//         $('#fees_forms').html(data);
//         $('#fees_forms').show();
//         $('#fees_forms_new').hide();
//       }
//     });
// });


$(document).on( 'click', '.addpet', function (e) {
  var petid = $(this).attr("id");
    $.ajax({  
        url:"ms_process.php",  
        method:"POST",  
        data:{"addpayment":1,petid:petid,semester:"<?php echo $result_data["semester"];?>",school_year:"<?php echo $result_data["school_year"];?>"},
        success:function(data1)  
        {  
        $('#fees_forms').html(data1);
        $('#fees_forms').show();
        $('#fees_forms_new').hide();    
        }  
    });

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
