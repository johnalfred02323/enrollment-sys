<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');  
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script> <!-- CKEditor textarea -->


<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">


<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">


  <title>GRC System | Registrar</title>

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
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="index">Schedule</a></li>
    <li class="breadcrumb-item active" aria-current="page">Summer</li>
  </ol>
</nav>


<div class="d-flex justify-content-between">

    <div class="dropdown show d-inline">
    </div>


    <div class="d-flex justify-content-end mb-4 mt-4">

      <div class="col-xl-11 col-md-6">
        <input list="schoolyear" value="" id="sy" class="custom-select custom-select mr-3" placeholder="School Year">
        <datalist id="schoolyear">
        </datalist>
      </div>
    </div>

</div>



<div class="card shadow-sm mb-4"> <!-- card 5 start -->

  <!-- Card Header - Dropdown -->
  <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold">Schedule ( Summer )</h6>

      <button type="button" id="" class="add-user pull-xs-right" data-toggle="modal" data-target="#subject-summer" ripple onclick="reset()"><i class="fas fa-plus"></i> Create Schedule</button>

  </div>

    <div class="card-body" >
      
      <table id="summersched" class="display nowrap table" style="width:100%">
              <thead>
                  <tr>
                      <th>Section</th>
                      <th>School Year</th>
                      <th>Semester</th>
                      <th>Action</th>
                  </tr>
              </thead>
      </table>

    </div>
</div> <!-- card 5 end -->


        </div>
        <!-- /.container-fluid -->
   

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
   


      </div>
      <!-- End of Main Content -->

  <?php include 'view-summer.php'; ?>
      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>

<script type="text/javascript">

 $(document).ready(function() {
var sy = "";
var sem = "";
$.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyear":1},
      success:function(data){
        $('#schoolyear').html(data);  
      }
      });
$.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyearvalue":1},
      success:function(data){
        $('#sy').val(data);  
      }
      });

var sem=$('#sem').val();  

function fetch_summersched(){

  var table = $('#summersched').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" :{ 
            "url":"summer_fetch.php", 
            "data":{ 
              "schoolyear":sy,
            }
          },  

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


fetch_summersched();

 $(document).on('click','.view', function(e)
    {
      var id = $(this).attr("id");
      $('#section').text(id);
      $('#view-modal-summer').modal('show');
          $.ajax({
          url:"petition-summer-process.php",
          method:"POST",
          data:{"viewsummersched":1,id:id},
          success:function(data){
            $('#schedlist').html(data);
          }
          });

    });

 });
  //auto search for school year
      $('#sy').keyup(function(){  
           $('#summersched').DataTable().destroy();
           var sy = $(this).val();  

           var table = $('#summersched').DataTable( {

            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 1, 'desc' ]],

            "processing" : true,
            
            "serverSide" : true,

            "ajax" :{ 
                  "url":"summer_fetch.php", 
                  "data":{ 
                    "schoolyear":sy,
                  }
                },  

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

      });

</script>


  <!-- TABLE js -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> -->
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
