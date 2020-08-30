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
    <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['Course']; ?> Curriculum</li>
  </ol>
</nav>




<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>






                <!-- Example 2 -->
                <div class="card shadow-sm mb-4" id="ALL">
                  <div class="card-body">
                    

                <div class="table-responsive">
                <table class="table table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col" colspan="3" class="table-color">Active Curriculum

<div class="dropdown show d-inline float-right">
<div class="dropdown show d-inline">               
  <a class="btn major dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="majorbtn"> <i class="fas fa-star"></i> 
    <span id="major">Major</span>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="majorlist" style="color:black;">
  </div></div></div>

                      </th>
                    </tr>
                    <tr>
                      <th scope="col">Year Level</th>
                      <th scope="col">Curriculum Title</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="activecurriculum">
                    <tr><th colspan="3"><center><h5><b>PLEASE CHOOSE A MAJOR</b></h5></center></th></tr>
                  </tbody>
                </table>
                </div>


                  </div>
                </div>





<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>




<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold">Curriculum ( <?php echo $_GET['Course']; ?> ) - <?php echo $_GET['Title']; ?></h6>

      <button type="button" id="" class="add-user pull-xs-right" data-toggle="modal" data-target="#curriculum_modal" ripple onclick="reset()"><i class="fas fa-plus"></i> NEW CURRICULUM</button>

  </div>

    <div class="card-body" >
      
      <table id="curr_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Title</th>
                      <th>Course</th>
                      <th>Major</th>
                      <th>Years</th>
                      <th>Created At</th>
                      <th>Updated At</th>
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



<!-- Add Curriculum Modal -->
<?php require 'add-curriculum.php'; ?>



  </div>
  <!-- End of Page Wrapper -->




  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 

<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Are you sure to delete this Curriculum?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="confirmdelete_btn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {

fetch_curriculum();
var course = '<?php echo $_GET['Course']; ?>';

 //for major
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"major":1,course:course},
      success:function(data){
        if(data == 0)
        {
           $('#majorbtn').hide();  
           $('#major').text('No Major');
           var major = 'No Major';
           $.ajax({
                  url:"process.php",
                  method:"POST",
                  data:{"getactivesubj":1,course:course,major:major},
                  success:function(data){
                    $('#activecurriculum').html(data);
                   }
                  }); 
        }
        else
        {
           $('#majorlist').html(data);  
        }
      }
      });

if(course == 'ALL')
{
  $('#ALL').hide();
}
else
{
//for year display  
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"year":1,course:course},
      success:function(data){
         if(data == 0)
        {
           $('#5thyr').hide();   
        }
        else
        {
           $('#5thyr').show();  
        }
      }
      });  
}

//for selecting the active curriculum each major
//BSIT
$(document).on( 'click','.majorname', function (e) {

    var major = $(this).text();
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"getactivesubj":1,course:course,major:major},
      success:function(data){
        $('#activecurriculum').html(data);
       }
      }); 
});


//change 1st year active curriculum
$(document).on( 'click','#1', function (e) {
    $(this).hide();
    $('#save1').show();
    $('#cancel1').show();
    $('#1styrcurlbl').hide();
    $('#1stinput').show();
});

//cancel 1st year editing of active curriculum
$(document).on( 'click','#cancel1', function (e) {
    $(this).hide();
    $('#save1').hide();
    $('#1').show();
    $('#1styrcurlbl').show();
    $('#1stinput').val('');
    $('#1stinput').hide();
});

//change 2nd year active curriculum
$(document).on( 'click','#2', function (e) {
    $(this).hide();
    $('#save2').show();
    $('#cancel2').show();
    $('#2ndyrcurlbl').hide();
    $('#2ndinput').show();
});

//cancel 2nd year editing of active curriculum
$(document).on( 'click','#cancel2', function (e) {
    $(this).hide();
    $('#save2').hide();
    $('#2').show();
    $('#2ndyrcurlbl').show();
    $('#2ndinput').val('');
    $('#2ndinput').hide();
});

//change 3rd year active curriculum
$(document).on( 'click','#3', function (e) {
    $(this).hide();
    $('#save3').show();
    $('#cancel3').show();
    $('#3rdyrcurlbl').hide();
    $('#3rdinput').show();
});

//cancel 3rd year editing of active curriculum
$(document).on( 'click','#cancel3', function (e) {
    $(this).hide();
    $('#save3').hide();
    $('#3').show();
    $('#3rdyrcurlbl').show();
    $('#3rdinput').val('');
    $('#3rdinput').hide();
});

//change 4th year active curriculum
$(document).on( 'click','#4', function (e) {
    $(this).hide();
    $('#save4').show();
    $('#cancel4').show();
    $('#4thyrcurlbl').hide();
    $('#4thinput').show();
});

//cancel 4th year editing of active curriculum
$(document).on( 'click','#cancel4', function (e) {
    $(this).hide();
    $('#save4').hide();
    $('#4').show();
    $('#4thyrcurlbl').show();
    $('#4thinput').val('');
    $('#4thinput').hide();
});

//change 5th year active curriculum
$(document).on( 'click','#5', function (e) {
    $(this).hide();
    $('#save5').show();
    $('#cancel5').show();
    $('#5thyrcurlbl').hide();
    $('#5thinput').show();
});

//cancel 5th year editing of active curriculum
$(document).on( 'click','#cancel5', function (e) {
    $(this).hide();
    $('#save5').hide();
    $('#5').show();
    $('#5thyrcurlbl').show();
    $('#5thinput').val('');
    $('#5thinput').hide();
});


//saving 1st year editing of active curriculum
$(document).on( 'click','#save1', function (e) {
    var year = 'First Year';
    var course = '<?php echo $_GET['Course']; ?>';
    var major = $('#major').text();
    var title = $('#1stinput').val();
    $.ajax({
        url:"activecurriculum-process.php",
        method:"POST",
        data:{"saveactivecur":1,year:year,course:course,major:major,title:title},
        success:function(data){
          if(data == '1')
          {
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Curriculum Change successfully.');
              $(this).hide();
              $('#save1').hide();
              $('#cancel1').hide();
              $('#1').show();
              $('#1styrcurlbl').text(title);
              $('#1styrcurlbl').show();
              $('#1stinput').val('');
              $('#1stinput').hide();

          }
          else
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html(data);
          }

        }
      }); 
});

//saving 2nd year editing of active curriculum
$(document).on( 'click','#save2', function (e) {
    var year = 'Second Year';
    var course = '<?php echo $_GET['Course']; ?>';
    var major = $('#major').text();
    var title = $('#2ndinput').val();
    $.ajax({
        url:"activecurriculum-process.php",
        method:"POST",
        data:{"saveactivecur":1,year:year,course:course,major:major,title:title},
        success:function(data){
          if(data == '1')
          {
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Curriculum Change successfully.');
              $(this).hide();
              $('#save2').hide();
              $('#cancel2').hide();
              $('#2').show();
              $('#2ndyrcurlbl').text(title);
              $('#2ndyrcurlbl').show();
              $('#2ndinput').val('');
              $('#2ndinput').hide();

          }
          else
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html(data);
          }

        }
      }); 
});

//saving 3rd year editing of active curriculum
$(document).on( 'click','#save3', function (e) {
    var year = 'Third Year';
    var course = '<?php echo $_GET['Course']; ?>';
    var major = $('#major').text();
    var title = $('#3rdinput').val();
    $.ajax({
        url:"activecurriculum-process.php",
        method:"POST",
        data:{"saveactivecur":1,year:year,course:course,major:major,title:title},
        success:function(data){
          if(data == '1')
          {
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Curriculum Change successfully.');
              $(this).hide();
              $('#save3').hide();
              $('#cancel3').hide();
              $('#3').show();
              $('#3rdyrcurlbl').text(title);
              $('#3rdyrcurlbl').show();
              $('#3rdinput').val('');
              $('#3rdinput').hide();

          }
          else
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html(data);
          }

        }
      }); 
});

//saving 4th year editing of active curriculum
$(document).on( 'click','#save4', function (e) {
    var year = 'Fourth Year';
    var course = '<?php echo $_GET['Course']; ?>';
    var major = $('#major').text();
    var title = $('#4thinput').val();
    $.ajax({
        url:"activecurriculum-process.php",
        method:"POST",
        data:{"saveactivecur":1,year:year,course:course,major:major,title:title},
        success:function(data){
          if(data == '1')
          {
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Curriculum Change successfully.');
              $(this).hide();
              $('#save4').hide();
              $('#cancel4').hide();
              $('#4').show();
              $('#4thyrcurlbl').text(title);
              $('#4thyrcurlbl').show();
              $('#4thinput').val('');
              $('#4thinput').hide();

          }
          else
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html(data);
          }

        }
      }); 
});

//saving 5th year editing of active curriculum
$(document).on( 'click','#save5', function (e) {
    var year = 'Fifth Year';
    var course = '<?php echo $_GET['Course']; ?>';
    var major = $('#major').text();
    var title = $('#5thinput').val();
    $.ajax({
        url:"activecurriculum-process.php",
        method:"POST",
        data:{"saveactivecur":1,year:year,course:course,major:major,title:title},
        success:function(data){
          if(data == '1')
          {
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Curriculum Change successfully.');
              $(this).hide();
              $('#save5').hide();
              $('#cancel5').hide();
              $('#5').show();
              $('#5thyrcurlbl').text(title);
              $('#5thyrcurlbl').show();
              $('#5thinput').val('');
              $('#5thinput').hide();

          }
          else
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html(data);
          }

        }
      }); 
});

//edit button for curriculum
$('#curr_table').on( 'click', 'button.edit', function (e) {
    var id = $(this).attr("id");
    $('#id_val').val(id);
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"editcurr":1,id:id},
      success:function(data){
        var result = $.parseJSON(data);
        $('#curriculumtitle').val(result.curtitle);
        $('#curriculumyear').val(result.year);
        $('#course').val(result.course);
        $('#major1').html('<option>'+result.major+'</option>');
        $('#save_btnlbl').text('Update');
        $('#curriculumlbl').text('Update Curriculum');
        $('#curid').text(id);
        $('#curriculum_modal').modal('show');
      }
    });
});

//delete button for curriculum
$('#curr_table').on( 'click', 'button.delete', function (e) {
    var id = $(this).attr("id");
    $('#confirmdelete_btn').click(function(){
      $('#yesorno').modal('hide');
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"deletecurr":1,id:id},
        success:function(data){
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html(data);
          $('#curr_table').DataTable().destroy();
          fetch_curriculum();
        }
      }); 
    });
});

$('#curr_table').on( 'click', 'button.view', function (e) {
    var id = $(this).attr("id");
    $('#id_val').val(id);
    window.location.href = "curriculum-subjects?curriculumtitle="+id+"&year=First Year";
});

});
</script>




  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>



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

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

</body>

</html>
