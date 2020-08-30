<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');  
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

<link rel="stylesheet" type="text/css" href="../../../src/export/css/buttons.dataTables.min.css">

  <title>GRC Master list </title>

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
    <li class="breadcrumb-item active" aria-current="page">Reports</li>
    <li class="breadcrumb-item active" aria-current="page">Enrollment-List</li>
  </ol>
</nav>


 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold">Enrollment List</h6>

     <div class="col-xl-2 col-md-3 col-xs-12 mb-sm-0 mb-3 ">
    <input list="schoolyear" value="" id="sy" class="custom-select custom-select mr-3" placeholder="School Year">
    <datalist id="schoolyear">
    </datalist>
  </div>
  </div>
                <!-- Example 2 -->
                <div class="card shadow-sm mb-4">
                  <div class="card-body">
                    
                <table  class="display nowrap" style="width:100%" id="table">
                  <thead>
                    <tr>
                      <th scope="col">School Year</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="year-list">
                  </tbody>
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
  </div>
  <!-- End of Page Wrapper -->
<!-- Button trigger modal -->
<button type="button" data-toggle="modal" data-target="#exampleModal">
   modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal-print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-3">
              <div class="box1">
                  <label class="select-label">Print By</label>
                    <select name='' id="" required>
                      <option value="" selected>All</option>
                      <option value="">By Day</option>
                    </select>
              </div>            
          </div>
          <div class="col-3">
              <div class="box1">
                  <label class="select-label">Course</label>
                    <select name='' id="" required>
                      <option value="" selected>BSIT</option>
                      <option value="">BSBA</option>
                      <option value="">BSEd</option>
                    </select>
              </div>            
          </div>
          <div class="col-3">
              <div class="box1">
                  <label class="select-label">Major</label>
                    <select name='' id="" required>
                      <option value="" selected>Programming</option>
                    </select>
              </div>            
          </div> 
          <div class="col-3">
              <div class="box1">
                  <label class="select-label">Year Level</label>
                    <select name='' id="" required>
                      <option value="" selected>All</option>
                      <option value="">First Year</option>
                      <option value="">Second Year</option>
                      <option value="">Third Year</option>
                      <option value="">Fourth Year</option>
                      <option value="">Fifth Year</option>
                    </select>
              </div>            
          </div>                             
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> CANCEL</button>
        <button type="button" class="save" id="" ripple><i class="fas fa-print"></i> OK</button>
      </div>
    </div>
  </div>
</div>


  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>
  <?php require 'view-modal.php'; ?>

  <script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
  <script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
  <script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>

  <script src="../../../src/export/js/dataTables.buttons.min.js"></script>
  <script src="../../../src/export/js/buttons.flash.min.js"></script>
  <script src="../../../src/export/js/jszip.min.js"></script>
  <script src="../../../src/export/js/pdfmake.min.js"></script>
  <script src="../../../src/export/js/vfs_fonts.js"></script>
  <script src="../../../src/export/js/buttons.html5.min.js"></script>
  <script src="../../../src/export/js/buttons.print.min.js"></script>
  <script src="../../../src/export/js/dataTables.select.min.js"></script>
  <script src="../../../src/export/js/buttons.colVis.min.js"></script>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>




  <script type="text/javascript">

  $(document).ready(function() {

      $('#table').DataTable( {
        sDom: 'lrtip',
        "processing" : true,
        "paging":   false,
        "ordering": false,
        "info":     false,
        
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

  //search for school year and semester
   $.ajax({
      url:"process.php",
      type:"POST",
      data:{"year-list":1},
      success:function(data){
        $('#year-list').html(data); 
      }
      });  

  //for school year
  $.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyear":1},
      success:function(data){
        $('#schoolyear').html(data); 
      }
      }); 


  //auto search for school year
     $('#sy').keyup(function(){  
        var sy = $(this).val();
        //search for school year
         $.ajax({
            url:"process.php",
            type:"POST",
            data:{"search-year-list":1,sy:sy},
            success:function(data){
              $('#year-list').html(data); 
            }
            }); 
});

// for printing
$(document).on( 'click','.print', function (e) {
  // var id = $(this).attr("id");
  // var sy = $('#sy'+id).text();
  // var sem = $('#sem'+id).text();
  // var newWin = window.open('print.php?data='+id+'&data2='+sy+'&data3='+sem);
  //       newWin.document.close();
  //       newWin.focus();
  //       newWin.print();
  $('#modal-print').modal('show');
  });

// for excel exporting
$(document).on( 'click','.excel', function (e) {
  var id = $(this).attr("id");
  var sy = $('#sy'+id).text();
  var sem = $('#sem'+id).text();
  var filename;
  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"excelfilename":1,sy:sy,sem:sem},
        success:function(data){
          filename = data;
        }
      }); 

  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"studentlistexcel":1,sy:sy,sem:sem},
        success:function(data){
          window.location = "for_excel_export.php?data="+ data+"&data2="+filename;
        }
      }); 
   });

// for viewing
$(document).on( 'click','.view', function (e) {
  var id = $(this).attr("id");
  var sy = $('#sy'+id).text();
  var sem = $('#sem'+id).text();
  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"studentlist-view":1,sy:sy,sem:sem},
        success:function(data)
        {
          $('#view-student-list').html(data);
        }
      }); 
  });

$(document).on( 'change','.excel', function (e) {
           event.preventDefault();  
           $.ajax({  
                url:"process.php",  
                method:"POST",  
                success:function(data){  
                     console.log(data);
                     var path = data.responseJSON.path;
                     location.href = path;
                }  
           });  
      });  
  } );

  </script>

</body>

</html>
