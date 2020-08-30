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


  <title>GRC | Registrar</title>

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
    <li class="breadcrumb-item active" aria-current="page">Reports</li>
    <li class="breadcrumb-item active" aria-current="page">Enrollment</li>
  </ol>
</nav>


 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold">Enrollment Report</h6>

     <div class="col-xl-2 col-md-3 col-xs-12 mb-sm-0 mb-3 ">
    <input list="schoolyear" value="" id="sy" class="custom-select custom-select mr-3" placeholder="School Year">
    <datalist id="schoolyear">
    </datalist>
  </div>
  </div>
<div class="card shadow-sm mb-4"> <!-- card 5 start -->
  <!-- Card Header - Dropdown -->
  
    <div class="card-body" >
      <table id="gendertable" class="display nowrap" style="width:100%">
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
</div> <!-- card 5 end -->


 

<!-- For Print -->
  <!-- Modal Start -->
  <div class="modal fade" id="call-the-modal-print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Choose Report</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
    
              <div class="box1" >
                  <label class="select-label">Date:</label>
                    <select name='' id="date-print" required>
                      <option value="" selected hidden>Choose Day</option>
                    </select>
              </div> 

              <div class="box1">
                  <label class="select-label">Course:</label>
                    <select name='' id="course-print" required>
                      <option value="" selected hidden>Choose Course</option>
                      <option value="ALL">ALL</option>
                      <?php 
                       $query = "SELECT DISTINCT course_abbreviation, course_name FROM course WHERE status = 'Active'";
                       $result = mysqli_query($conn, $query); 
                        if($count=mysqli_num_rows($result) > 0)  
                        {
                        while($rows=mysqli_fetch_array($result))
                        {
                          echo "<option value='".$rows['course_abbreviation']."'>".$rows['course_abbreviation']."</option>";
                        }
                        }
                        ?>
                    </select>
              </div> 
              <div class="box1" id="divmajor-print" style="display: none">
                  <label class="select-label">Major:</label>
                    <select name='' id="major-print" required>
                      <option value="" selected hidden>Choose Major</option>
                    </select>
              </div> 
                  <div class="box1">
                  <label class="select-label">Year Level:</label>
                    <select name='' id="year-print" required>
                      <option value="cy" selected hidden>Choose Year</option>
                      <option value="ALL">ALL</option>
                      <option value="First Year">First Year</option>
                      <option value="Second Year">Second Year</option>
                      <option value="Third Year">Third Year</option>
                      <option value="Fourth Year">Fourth Year</option>
                      <option id="5thyrp" value="Fifth Year">Fifth Year</option>
                    </select>
              </div> 

        </div>
        <div class="modal-footer d-flex justify-content-between align-items-center"> 

          
<button id="all-print" class="edit-user pull-xs-right no" ripple>
  <i class="fas fa-venus-mars"></i> ALL
</button>

<button id="male-print" class="view-user pull-xs-right no" ripple>
  <i class="fas fa-mars"></i> MALE
</button> 

<button id="female-print" class="delete-user pull-xs-right no" ripple>
  <i class="fas fa-venus"></i> FEMALE
</button>


        </div>
      </div>
    </div>
  </div> <!-- Modal End -->


<!-- For Excel -->
  <!-- Modal Start -->
  <div class="modal fade" id="call-the-modal-excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Choose Report</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
    
              <div class="box1" >
                  <label class="select-label">Date:</label>
                    <select name='' id="date-excel" required>
                      <option value="" selected hidden>Choose Day</option>
                    </select>
              </div> 

              <div class="box1">
                  <label class="select-label">Course:</label>
                    <select name='' id="course-excel" required>
                      <option value="" selected hidden>Choose Course</option>
                      <option value="ALL">ALL</option>
                      <?php 
                       $query = "SELECT DISTINCT course_abbreviation, course_name FROM course WHERE status = 'Active'";
                       $result = mysqli_query($conn, $query); 
                        if($count=mysqli_num_rows($result) > 0)  
                        {
                        while($rows=mysqli_fetch_array($result))
                        {
                          echo "<option value='".$rows['course_abbreviation']."'>".$rows['course_abbreviation']."</option>";
                        }
                        }
                        ?>
                    </select>
              </div> 
              <div class="box1" id="divmajor" style="display: none">
                  <label class="select-label">Major:</label>
                    <select name='' id="major-excel" required>
                      <option value="" selected hidden>Choose Major</option>
                    </select>
              </div> 
                  <div class="box1">
                  <label class="select-label">Year Level:</label>
                    <select name='' id="year-excel" required>
                      <option value="" selected hidden>Choose Year</option>
                      <option value="ALL">ALL</option>
                      <option value="First Year">First Year</option>
                      <option value="Second Year">Second Year</option>
                      <option value="Third Year">Third Year</option>
                      <option value="Fourth Year">Fourth Year</option>
                      <option id="5thyre" value="Fifth Year">Fifth Year</option>
                    </select>
              </div> 

        </div>
        <div class="modal-footer d-flex justify-content-between align-items-center"> 

          
<button id="all-excel" class="edit-user pull-xs-right no" ripple>
  <i class="fas fa-venus-mars"></i> ALL
</button>

<button id="male-excel" class="view-user pull-xs-right no" ripple>
  <i class="fas fa-mars"></i> MALE
</button> 

<button id="female-excel" class="delete-user pull-xs-right no" ripple>
  <i class="fas fa-venus"></i> FEMALE
</button>


        </div>
      </div>
    </div>
  </div> <!-- Modal End -->



<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
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

  <script type="text/javascript">
  $(document).ready(function() {

      $('#gendertable').DataTable( {
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
  //for major display
  $(document).on( 'change','#course-excel', function (e) {
   var course = $(this).val();
   if(course == 'ALL')
   {
      $('#divmajor').hide();
      $('#major-excel').html('<option id="cm" value="" hidden>Choose Major</option>');  
      $('#5thyre').show();  
   }
   else
   {
        $('#divmajor').show();
        $.ajax({
        url:"process.php",
        type:"POST",
        data:{"majorquery":1,course:course},
        success:function(data){
          $('#major-excel').html(data);  
        }
        });
        $.ajax({
        url:"process.php",
        type:"POST",
        data:{"yearquery":1,course:course},
        success:function(data){
          if(data == 1)
          {
            $('#5thyre').show();  
          }
          else
          {
            $('#5thyre').hide();  
          }        
        }
        });
    }
  });

  //for major display
  $(document).on( 'change','#course-print', function (e) {
   var course = $(this).val();
   if(course == 'ALL')
   {
      $('#divmajor-print').hide();
      $('#major-print').html('<option id="cm" value="" hidden>Choose Major</option>');  
      $('#5thyrp').show();  
   }
   else
   {
        $('#divmajor-print').show();
        $.ajax({
        url:"process.php",
        type:"POST",
        data:{"majorquery":1,course:course},
        success:function(data){
          $('#major-print').html(data);  
        }
        });
        $.ajax({
        url:"process.php",
        type:"POST",
        data:{"yearquery":1,course:course},
        success:function(data){
          if(data == 1)
          {
            $('#5thyrp').show();  
          }
          else
          {
            $('#5thyrp').hide();  
          }        }
        });
    }
  });

  //for displaying schoolyear and semester
  $.ajax({
        url:"fetch_gender.php",
        method:"POST",
        data:{"tabledata":1},
        success:function(data){
          $('#tabledata').html(data);
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
              $('#tabledata').html(data); 
            }
            }); 
    });


//for printing
  var idprint, syprint, semprint;
  $(document).on( 'click','.print', function (e) {
    idprint = $(this).attr("id");
    syprint = $('#sy'+idprint).text();
    semprint = $('#sem'+idprint).text();
    var sy = syprint;
    var sem = semprint;
    $.ajax({
      url:"process.php",
      type:"POST",
      data:{"daylist":1,sy:sy,sem:sem},
      success:function(data){
        $('#date-print').html(data); 
      }
      }); 

    $('#call-the-modal-print').modal("show");
  });
  //print all
  $(document).on( 'click','#all-print', function (e) {
    var gender = "ALL";
    var sy = syprint;
    var sem = semprint;
    var course = $('#course-print').val();
    var major = $('#major-print').val();
    var year = $('#year-print').val();
    var date = $('#date-print').val();
    if(course == '' && major == '' && year == '' && date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Fill All Fields');
    }
    else if (date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Date');
    }
    else if(course != '' && major == '' && course !='ALL')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Major');
    }
    else if((course !='' && major != '' && year == '') || (course == 'ALL' && year == ''))
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Year Level');
    }
    else
    {
      var newWin = window.open('print.php?data='+gender+'&data2='+sy+'&data3='+sem+'&data4='+course+'&data5='+major+'&data6='+year+"&data7="+date);
      newWin.document.close();
      newWin.focus();
      newWin.print();
      $('#call-the-modal-print').modal("hide");
    }
  });
  //print male
  $(document).on( 'click','#male-print', function (e) {
    var gender = "Male";
    var sy = syprint;
    var sem = semprint;
    var course = $('#course-print').val();
    var major = $('#major-print').val();
    var year = $('#year-print').val();
    var date = $('#date-print').val();
    if(course == '' && major == '' && year == '' && date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Fill All Fields');
    }
    else if (date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Date');
    }
    else if(course != '' && major == '' && course !='ALL')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Major');
    }
    else if((course !='' && major != '' && year == '') || (course == 'ALL' && year == ''))
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Year Level');
    }
    else
    {
      var newWin = window.open('print.php?data='+gender+'&data2='+sy+'&data3='+sem+'&data4='+course+'&data5='+major+'&data6='+year+"&data7="+date);
      newWin.document.close();
      newWin.focus();
      newWin.print();
      $('#call-the-modal-print').modal("hide");
    }
  });
  //print female
  $(document).on( 'click','#female-print', function (e) {
    var gender = "Female";
    var sy = syprint;
    var sem = semprint;
    var course = $('#course-print').val();
    var major = $('#major-print').val();
    var year = $('#year-print').val();
    var date = $('#date-print').val();
    if(course == '' && major == '' && year == '' && date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Fill All Fields');
    }
    else if (date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Date');
    }
    else if(course != '' && major == '' && course !='ALL')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Major');
    }
    else if((course !='' && major != '' && year == '') || (course == 'ALL' && year == ''))
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Year Level');
    }
    else
    {
      var newWin = window.open('print.php?data='+gender+'&data2='+sy+'&data3='+sem+'&data4='+course+'&data5='+major+'&data6='+year+"&data7="+date);
      newWin.document.close();
      newWin.focus();
      newWin.print();
      $('#call-the-modal-print').modal("hide");
    } 
  });


//for excel
  var idexcel, syexcel, semexcel;
  $(document).on( 'click','.excel', function (e) {
    idexcel = $(this).attr("id");
    syexcel = $('#sy'+idexcel).text();
    semexcel = $('#sem'+idexcel).text();
    var sy = syexcel;
    var sem = semexcel;
    $.ajax({
      url:"process.php",
      type:"POST",
      data:{"daylist":1,sy:sy,sem:sem},
      success:function(data){
        $('#date-excel').html(data); 
      }
      }); 

    $('#call-the-modal-excel').modal("show");
  });
  //print all
  $(document).on( 'click','#all-excel', function (e) {
    var gender = "ALL";
    var sy = syexcel;
    var sem = semexcel;
    var course = $('#course-excel').val();
    var major = $('#major-excel').val();
    var year = $('#year-excel').val();
    var date = $('#date-excel').val();
    if(course == '' && major == '' && year == '' && date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Fill All Fields');
    }
    else if (date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Date');
    }
    else if(course != '' && major == '' && course !='ALL')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Major');
    }
    else if((course !='' && major != '' && year == '') || (course == 'ALL' && year == ''))
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Year Level');
    }
    else
    {
      window.location.href = 'excel_upload.php?data='+gender+'&data2='+sy+'&data3='+sem+'&data4='+course+'&data5='+major+'&data6='+year+"&data7="+date;
      $('#call-the-modal-excel').modal("hide");
    }
  });
  //excel male
  $(document).on( 'click','#male-excel', function (e) {
    var gender = "Male";
    var sy = syexcel;
    var sem = semexcel;
    var course = $('#course-excel').val();
    var major = $('#major-excel').val();
    var year = $('#year-excel').val();
    var date = $('#date-excel').val();
    if(course == '' && major == '' && year == '' && date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Fill All Fields');
    }
    else if (date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Date');
    }
    else if(course != '' && major == '' && course !='ALL')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Major');
    }
    else if((course !='' && major != '' && year == '') || (course == 'ALL' && year == ''))
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Year Level');
    }
    else
    {
      window.location.href = 'excel_upload.php?data='+gender+'&data2='+sy+'&data3='+sem+'&data4='+course+'&data5='+major+'&data6='+year+"&data7="+date;
      $('#call-the-modal-excel').modal("hide");
    }
  });
  //excel female
  $(document).on( 'click','#female-excel', function (e) {
    var gender = "Female";
    var sy = syexcel;
    var sem = semexcel;
    var course = $('#course-excel').val();
    var major = $('#major-excel').val();
    var year = $('#year-excel').val();
    var date = $('#date-excel').val();
    if(course == '' && major == '' && year == '' && date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Fill All Fields');
    }
    else if (date == '')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Date');
    }
    else if(course != '' && major == '' && course !='ALL')
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Major');
    }
    else if((course !='' && major != '' && year == '') || (course == 'ALL' && year == ''))
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html('Please Choose Year Level');
    }
    else
    {
      window.location.href = 'excel_upload.php?data='+gender+'&data2='+sy+'&data3='+sem+'&data4='+course+'&data5='+major+'&data6='+year+"&data7="+date;
      $('#call-the-modal-excel').modal("hide");
    } 
  });

});


  </script>

</body>

</html>
