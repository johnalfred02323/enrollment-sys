<!-- Head -->
<?php 
require '../layout/head.php'; 
require ('../../../config/config.php');  

?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

<link rel="stylesheet" type="text/css" href="../../../src/export/css/buttons.dataTables.min.css">

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
        <?php require '../layout/top-nav.php'; ?>

       <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Students</li>
    <li class="breadcrumb-item active" aria-current="page">Transferee Students</li>
    <li class="breadcrumb-item active" aria-current="page" id="viewby">ALL</li>
  </ol>
</nav>

<div class="d-flex justify-content-end mb-4 mt-4">

<div class="row">
  <div class="col-xs-12 mb-sm-0 mb-3">
    <select value="" id="sy" class="custom-select custom-select mr-3" placeholder="School Year">
  </select>
  </div>
  <div class="col-xl-6 col-md-6 col-xs-12" id="semdiv">
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
      <h6 class="m-0 font-weight-bold d-inline">Transferee Students List</h6>

<div class="dropdown show d-inline float-right">
  <a class="btn delete-user dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-eye"></i>
    <b id="viewlbl">VIEW STUDENTS BY</b>
  </a>

<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" id="all" style="cursor: pointer">ALL</a>
    <div class="dropdown-divider" style="cursor: pointer"></div>
    <a class="dropdown-item" id="viewsy" style="cursor: pointer">View by School Year</a>
  </div>
</div>

  </div>

<div id="studentdiv">
    <div class="card-body" >
      <table id="transfereelist" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>S.I.S No.</th>
                <th>Student Number</th>
                <th>Fullname</th>
                <th>Last School Attended</th>
                <th>Course</th>
                <th>Major</th>
                <th>School Year</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
    </div>
</div>


<div id="viewsydiv" style="display: none">
  <!-- Card Header - Dropdown -->
  
    <div class="card-body" >
      <table id="transfereetable" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>School Year</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tabledata">
           
        </tbody>
      </table>
    </div>
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

    function tablesy()
    {
        $('#transfereetable').DataTable( {
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
    }



function table()
{
          //for fetching all the student
         var sy=$('#sy').val();
         var sem=$('#sem').val();
         
        var table = $('#transfereelist').DataTable( {

            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 1, 'desc' ]],

            "processing" : true,
            
            "serverSide" : true,

            "ajax" :{ 
                  "url":"fetch_transferee_student.php", 
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
  //for school year
  $.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyear":1},
      success:function(data){
        $('#sy').html(data);  
        $('#transfereelist').DataTable().destroy();
        table();

      var sy=$('#sy').val();
      //for displaying schoolyear and semester
      $.ajax({
            url:"process.php",
            method:"POST",
            data:{"tabledata":1,sy:sy},
            success:function(data){
              $('#tabledata').html(data);
              tablesy();
            }
          });     

      }
      });  

//view all shifting students
$(document).on( 'click','#all', function (e) {
  $('#studentdiv').show();
  $('#viewsydiv').hide();
  $('#semdiv').show();
  var text = $(this).text();
  $("#viewby").text(text);
  $('#transfereelist').DataTable().destroy();
  table();

});

//view Requesting shifting students only
$(document).on( 'click','#inquired', function (e) {
  $('#studentdiv').show();
  $('#viewsydiv').hide();
  $('#semdiv').show();
  var text = $(this).text();
  $("#viewby").text(text);
  $('#transfereelist').DataTable().destroy();
  table();
});

//view all shifting students
$(document).on( 'click','#wcs', function (e) {
  $('#studentdiv').show();
  $('#viewsydiv').hide();
  $('#semdiv').show();
  var text = $(this).text();
  $("#viewby").text(text);
  $('#transfereelist').DataTable().destroy();
  table();
});

//view all shifting students
$(document).on( 'click','#enrolled', function (e) {
  $('#studentdiv').show();
  $('#viewsydiv').hide();
  $('#semdiv').show();
  var text = $(this).text();
  $("#viewby").text(text);
  $('#transfereelist').DataTable().destroy();
  table();
});

//view all by school year
$(document).on( 'click','#viewsy', function (e) {
  $('#studentdiv').hide();
  $('#viewsydiv').show();
  $('#semdiv').hide();
  var text = $(this).text();
  $("#viewby").text(text);
  $('#transfereelist').DataTable().destroy();
  table();
});


  //auto search for school year
      $(document).on( 'change','#sy', function (e) {
          $('#studentlist').DataTable().destroy();
          table();

          var sy=$(this).val();
          //for view by school year
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{"tabledata":1,sy:sy},
            success:function(data){
              $('#tabledata').html(data);
              tablesy();
            }
          });     
      });

  //auto search for semester
      $(document).on( 'change','#sem', function (e) {
          $('#transfereelist').DataTable().destroy();
          table();
      });
        


//view all by school year
$(document).on( 'click','.view', function (e) {
  var studnum = $(this).attr("id");
  var sy=$('#sy').val();
  var sem=$('#sem').val();
   //for button display
  $.ajax({
      url:"process.php",
      method:"POST",
      data:{"studstatus":1,studnum:studnum,sy:sy,sem:sem},
      success:function(data){
          if(data == '0')
          {
          }
          else
          {

          }
              $('#transfereesubject').modal('show');
              //for button display
              $.ajax({
                  url:"process.php",
                  method:"POST",
                  data:{"studdata":1,studnum:studnum,sy:sy,sem:sem},
                  success:function(data){

                      var result = $.parseJSON(data);
                      $('#trlname').val(result.fullname);
                      $('#trgender').val(result.gender);
                      $('#trsis').val(studnum);
                      $('#trstudnum').val(result.studnum);
                      $('#trschool').val(result.school);
                      $('#trcur').val(result.curriculum);

                  }
                }); 
                //for button display
              $.ajax({
                  url:"process.php",
                  method:"POST",
                  data:{"studsubject":1,studnum:studnum,sy:sy,sem:sem},
                  success:function(data)
                  {
                    $('#student-subject').html(data);
                    if(data == '')
                    {
                      $('.footer1').show();
                      $('.footer2').hide();
                    }
                    else
                    {
                      if($('#gr1').val() == '')
                      {
                        $('.footer2').show();
                        $('.footer1').hide();
                        $('#gradeslbl').text('save grades');
                      }
                      else
                      {
                        $('.footer2').show();
                        $('.footer1').hide();
                        $('#gradeslbl').text('update grades');
                      }
                    }
                  }
                });
        }
      });
});


    //for removing student
    $('#transfereesubject').on('click','#removestud', function (e){
      $('#yesorno1').modal('show');
        $('#yesorno1').on('click','#confirmdelete_btn1', function (e){
            var sisnum = $('#trsis').val();
            var sy=$('#sy').val();
            var sem=$('#sem').val();
            $.ajax({
                  url:"process.php",
                  method:"POST",
                  data:{"deletestud":1,sisnum:sisnum,sy:sy,sem:sem},
                  success:function(data)
                  {
                    $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#successmsg").html(data);
                    $('#transfereelist').DataTable().destroy();
                    table();
                    $('#yesorno1').modal('hide');
                    $('#transfereesubject').modal('hide');
                  }
                }); 
            });
        });

// for printing
$(document).on( 'click','.print', function (e) {
  var studnum = $(this).attr("id");
  var schoolyear = $('#sy').val();
  var sem = $('#sem').val();
  var newWin = window.open('print.php?data='+schoolyear+'&data2='+sem);
        newWin.document.close();
        newWin.focus();
        newWin.print();
  });

  } );

  </script>

</body>

</html>
