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

  <title>GRC Subject Offering</title>

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
    <li class="breadcrumb-item active" aria-current="page">Per Subject</li>
  </ol>
</nav>

<div class="d-flex justify-content-end mb-4 mt-4">

<div class="row">
  <div class="col-xl-6 col-md-6 col-xs-12 mb-sm-0 mb-3">
    <input list="schoolyear" value="" id="sy" class="custom-select custom-select mr-3" placeholder="School Year">
    <datalist id="schoolyear">
    </datalist>
  </div>
  <div class="col-xl-6 col-md-6 col-xs-12">
    <select list="semester" value="" id="sem" class="custom-select custom-select" placeholder="Semester">
    <datalist id="semester">
        <option id="First">First Semester</option>
        <option id="Second">Second Semester</option>
        <option id="Summer">Summer</option>
    </datalist>
    </select>
  </div>
</div>
</div>


<div class="card shadow-sm mb-4"> <!-- card 5 start -->
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold d-inline">Master List</h6>
  </div>
    <div class="card-body" >
      <table id="subjectlist" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Section</th>
                <th>Course</th>
                <th>Major</th>
                <th>Year</th>
                <th>Faculty</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
    </div>
</div> <!-- card 5 end -->

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

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>
  <?php include 'view-modal.php'; ?>

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

  //for school year
  $.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyear":1},
      success:function(data){
        $('#schoolyear').html(data);  
      }
      });  
    //for fetching all the subject
   var sy="";
   var sem="";
    function fetch_subject(){

  var table = $('#subjectlist').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" :{ 
            "url":"fetch_subject.php", 
            "data":{ 
              "schoolyear":sy,
              "semester":sem,
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


fetch_subject();

// for printing
$(document).on( 'click','.print', function (e) {
  var newWin = window.open();
  var schedid = $(this).attr("id");
  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"studentlist":1,schedid:schedid},
        success:function(data){
        newWin.document.write(data);
        newWin.document.close();
        newWin.focus();
        newWin.print();
        newWin.close();
        }
      }); 
  });

// for excel exporting
$(document).on( 'click','.excel', function (e) {
  var schedid = $(this).attr("id");
  var filename;
  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"excelfilename":1,schedid:schedid},
        success:function(data){
          filename = data;
        }
      }); 

  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"studentlistexcel":1,schedid:schedid},
        success:function(data){
          window.location = "for_excel_export.php?data="+ data+"&data2="+filename;
        }
      }); 
   });

// for viewing
$(document).on( 'click','.view', function (e) {
  var schedid = $(this).attr("id");
  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"studentlist-view":1,schedid:schedid},
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

  //auto search for school year
      $('#sy').keyup(function(){  
           $('#subjectlist').DataTable().destroy();
           var sy = $(this).val();  
           var sem = $('#sem').val();  

           var table = $('#subjectlist').DataTable( {

            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 1, 'desc' ]],

            "processing" : true,
            
            "serverSide" : true,

            "ajax" :{ 
                  "url":"fetch_subject.php", 
                  "data":{ 
                    "schoolyear":sy,
                    "semester":sem,
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

  //auto search for semester
      $(document).on( 'click','#sem', function (e) {

           $('#subjectlist').DataTable().destroy();
           var sem = $(this).val();  
           var sy = $('#sy').val();  

           var table = $('#subjectlist').DataTable( {

            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 1, 'desc' ]],

            "processing" : true,
            
            "serverSide" : true,

            "ajax" :{ 
                  "url":"fetch_subject.php", 
                  "data":{ 
                    "schoolyear":sy,
                    "semester":sem,
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

</body>

</html>
