<!-- Head -->
<?php
require 'layout/head.php'; 
$curtitle = $_GET['curriculumtitle'];
$year = $_GET['year'];
include('../../../config/config.php');

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
        <?php require 'layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="../curriculum/index?Course=ALL&Title=All Courses">Curriculum</a></li>
    <li class="breadcrumb-item active" aria-current="page" id="curname"><?php echo $_GET['curriculumtitle']; ?></li>
  </ol>
</nav>


             <!-- First Year -->
              <!-- Card Header - Dropdown -->
<!--               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold " id="year_p" method="POST">First Year <?php echo $_SERVER['']; ?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header" id="year">YEAR:</div>
                      <a class="dropdown-item" href="">First Year</a>
                      <a class="dropdown-item" href="#">Second Year</a>
                      <a class="dropdown-item" href="#">Third Year</a>
                      <a class="dropdown-item" href="#">Fourth Year</a>
                      <a class="dropdown-item" href="#">Fifth Year</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">View All</a>
                    </div>
                  </div>
                </div> -->


<!-- SPACER -->
<div class="mx-auto" style="height: 10px;"></div>



<div class="container">
  <div class="row">
    <div class="col-sm">
      

<h3 id="year_p" method="GET" name="year_p"><?php echo $_GET['year']; ?></h3>


    </div>
    <div class="col-sm">
    </div>
    <div class="col-sm">
 


<div class="dropdown float-right">
  <button class="btn view-user dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Year Level
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="curr_year">
                      <a class="dropdown-item" href="../curriculum/curriculum-subjects?curriculumtitle=<?php echo $curtitle; ?>&year=First Year" id="Firstyr" type="button" onclick="Firstyrlbl()" >First Year</a>

                      <a class="dropdown-item"  id="Secondyr" href="../curriculum/curriculum-subjects?curriculumtitle=<?php echo $curtitle; ?>&year=Second Year" type="button" onclick="Secondyrlbl()" >Second Year</a>

                      <a class="dropdown-item"  id="Thirdyr" href="../curriculum/curriculum-subjects?curriculumtitle=<?php echo $curtitle; ?>&year=Third Year" type="button" onclick="Thirdyrlbl()" >Third Year</a>

                      <a class="dropdown-item"  id="Fourthyr" href="../curriculum/curriculum-subjects?curriculumtitle=<?php echo $curtitle; ?>&year=Fourth Year" type="button" onclick="Fourthyrlbl()" >Fourth Year</a>

                      <a class="dropdown-item"  id="Fifthyr" href="../curriculum/curriculum-subjects?curriculumtitle=<?php echo $curtitle; ?>&year=Fifth Year" type="button" onclick="Fifthyrlbl()" >Fifth Year</a>
                      <!-- divider -->
                      <div class="dropdown-divider"></div>

                      <a class="dropdown-item" id="Summer" href="../curriculum/curriculum-subjects?curriculumtitle=<?php echo $curtitle; ?>&year=Summer" type="button" onclick="Fourthyrlbl()" >Summer</a>

                      <a class="dropdown-item" target="_blank" href="view-all?curriculumtitle=<?php echo $_GET['curriculumtitle']; ?>">View All</a>
  </div>
</div>




    </div>
  </div>
</div>




      




<!-- SPACER -->
<div class="mx-auto" style="height: 10px;"></div>

              <div class="card shadow-sm mb-4" id="firstsemdiv">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold" id="fsem">First Semester</h6>
                  <div class="dropdown no-arrow">
                   
      <button type="button" id="add_sub" class="add-user pull-xs-right" ripple onclick="reset()"><i class="fas fa-plus"></i> ADD SUBJECT</button>

                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table id="subj_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Course Code</th>
                      <th>Course Title</th>
                      <th>Lec Hours</th>
                      <th>Lab Hours</th>
                      <th>Units</th>
                      <th>Pre-Requisite</th>
                      <th>Year</th>
                      <th>Semester</th>
                      <th>Created At</th>
                      <th>Update At</th>
                      <th>Action</th>
                  </tr>
              </thead>
      </table>
                </div>
              </div>



<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>


              <!-- Example 3 -->
              <div class="card shadow-sm mb-4" id="secondsemdiv">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold" id="ssem">Second Semester</h6>
                  <div class="dropdown no-arrow">
                   
      <button type="button" id="add_sub2" class="add-user pull-xs-right" ripple onclick="reset()"><i class="fas fa-plus"></i> ADD SUBJECT</button>

                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="subj_table2" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Course Code</th>
                      <th>Course Title</th>
                      <th>Lec Hours</th>
                      <th>Lab Hours</th>
                      <th>Units</th>
                      <th>Pre-Requisite</th>
                      <th>Year</th>
                      <th>Semester</th>
                      <th>Created At</th>
                      <th>Update At</th>
                      <th>Action</th>
                  </tr>
              </thead>
      </table>
                </div>
              </div>

<!-- End of First Year -->

<!-- For Summer Subjects -->
              <div class="card shadow-sm mb-4" style="display: none" id="summerdiv">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold" id="ssem">Summer</h6>
                  <div class="dropdown no-arrow">
                   
      <button type="button" id="add_sub3" class="add-user pull-xs-right" ripple onclick="reset()"><i class="fas fa-plus"></i> ADD SUBJECT</button>

                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="subj_summer" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Course Code</th>
                      <th>Course Title</th>
                      <th>Year</th>
                      <th>Lec Hours</th>
                      <th>Lab Hours</th>
                      <th>Units</th>
                      <th>Pre-Requisite</th>
                      <th>Created At</th>
                      <th>Update At</th>
                      <th>Action</th>
                  </tr>
              </thead>
      </table>
                </div>
              </div>








      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->



<!-- Add Curriculum Modal -->
<?php require 'add-subjects.php'; ?>



  </div>
  <!-- End of Page Wrapper -->




  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 

<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Are you sure you want to delete this Subject?</h6>
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

var year = '<?php echo $year; ?>';
if(year == 'Summer')
{
  $('#summerdiv').show();
  $('#firstsemdiv').hide();
  $('#secondsemdiv').hide();
  document.getElementById("year").readOnly = false;
  fetch_summer();
}
else
{
  $('#summerdiv').hide();
  $('#firstsemdiv').show();
  $('#secondsemdiv').show();
}

fetch_subjects();

var curtitle = '<?php echo $curtitle; ?>';
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"yeartaken":1,curtitle:curtitle},
      success:function(data){
      var yeartaken = data;
      if(yeartaken == "1")
      {
        $('#Secondyr').hide(); $('#Thirdyr').hide(); $('#Fourthyr').hide(); $('#Fifthyr').hide(); 
        $('#yrfifth').hide();
      }
      else if(yeartaken == "2")
      {
        $('#Thirdyr').hide(); $('#Fourthyr').hide(); $('#Fifthyr').hide(); $('#yrfifth').hide();
      }
      else if(yeartaken == "3")
      {
        $('#Fourthyr').hide(); $('#Fifthyr').hide(); $('#yrfifth').hide();
      }
      else if(yeartaken == "4")
      {
        $('#Fifthyr').hide(); $('#yrfifth').hide();
      }
      else
      {
        $('#yrfifth').show();
      }
    }
  });

$('#subj_table').on( 'click', 'button.edit', function (e) {
    var id = $(this).attr("id");
    $('#id_val').val(id);
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"edit":1,id:id},
      success:function(data){
        $('#curriculum_forms').html(data);
        $('#curriculum_forms').show();
        $('#curriculum_forms_new').hide();
      }
    });
});

$('#subj_table').on( 'click', 'button.delete', function (e) {
    var id = $(this).attr("id");
    $('#confirmdelete_btn').click(function(){
      $('#yesorno').modal('hide');
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"deletesubj":1,id:id},
        success:function(data){
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html(data);
          $('#subj_table').DataTable().destroy();
          $('#subj_table2').DataTable().destroy();
          fetch_subjects();
        }
      }); 
    });
});

$('#subj_table2').on( 'click', 'button.delete2', function (e) {
    var id = $(this).attr("id");
    $('#confirmdelete_btn').click(function(){
      $('#yesorno').modal('hide');
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"deletesubj2":1,id:id},
        success:function(data){
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html(data);
          $('#subj_table').DataTable().destroy();
          $('#subj_table2').DataTable().destroy();
          fetch_subjects();
        }
      }); 
    });
});


$('#subj_summer').on( 'click', 'button.delete3', function (e) {
    var id = $(this).attr("id");
    $('#confirmdelete_btn').click(function(){
      $('#yesorno').modal('hide');
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"deletesubj3":1,id:id},
        success:function(data){
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html(data);
          $('#subj_summer').DataTable().destroy();
          fetch_summer();
        }
      }); 
    });
});

//edit first sem subject
$('#subj_table').on( 'click', 'button.edit', function (e) {
    var id = $(this).attr("id");
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"editsubj":1,id:id},
      success:function(data){
        var currtitle = '<?php echo $_GET['curriculumtitle'] ?>';
        //for subject pre-requsite selection
        $.ajax({  
          url:"process.php",  
          method:"post",  
          data:{"prereq":1,currtitle:currtitle},  
          success:function(data)
          {   
            $('#pre-req').html(data);
            $('#subject_modal').modal('toggle');
            $('#subject_modal').modal('show');
          }
          });

        var result = $.parseJSON(data);
        $('#subject_code').val(result.subject_code);
        $('#subject_title').val(result.subject_title);
        $('#subject_lecture').val(result.lecture);
        $('#subject_laboratory').val(result.laboratory);
        $('#year').val(result.year);
        $('#semester').val(result.sem);
        $('#pre-reqlbl').val(result.pre_requisite);
        $('#subject_unit').val(result.units);
        $('#addsubjectlbl').text('Update Subject');
        $('#save_btnlbl').text('Update');
        $('#subject_id').text(id);
        $('#subject_modal').modal('show');

            }
    });
});


//edit Second sem subject
$('#subj_table2').on( 'click', 'button.edit2', function (e) {
    var id = $(this).attr("id");
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"editsubj2":1,id:id},
      success:function(data){
        var currtitle = '<?php echo $_GET['curriculumtitle'] ?>';
        //for subject pre-requsite selection
        $.ajax({  
          url:"process.php",  
          method:"post",  
          data:{"prereq":1,currtitle:currtitle},  
          success:function(data)
          {   
            $('#pre-req').html(data);
            $('#subject_modal').modal('toggle');
            $('#subject_modal').modal('show');
          }
          });

        var result = $.parseJSON(data);
        $('#subject_code').val(result.subject_code);
        $('#subject_title').val(result.subject_title);
        $('#subject_lecture').val(result.lecture);
        $('#subject_laboratory').val(result.laboratory);
        $('#year').val(result.year);
        $('#semester').val(result.sem);
        $('#pre-reqlbl').val(result.pre_requisite);
        $('#subject_unit').val(result.units);
        $('#addsubjectlbl').text('Update Subject');
        $('#save_btnlbl').text('Update');
        $('#subject_id').text(id);
        $('#subject_modal').modal('show');

            }
    });
});

//edit Summer subject
$('#subj_summer').on( 'click', 'button.edit3', function (e) {
    var id = $(this).attr("id");
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"editsubj2":1,id:id},
      success:function(data){
        var currtitle = '<?php echo $_GET['curriculumtitle'] ?>';
        //for subject pre-requsite selection
        $.ajax({  
          url:"process.php",  
          method:"post",  
          data:{"prereq":1,currtitle:currtitle},  
          success:function(data)
          {   
            $('#pre-req').html(data);
            $('#subject_modal').modal('toggle');
            $('#subject_modal').modal('show');
          }
          });

        var result = $.parseJSON(data);
        $('#subject_code').val(result.subject_code);
        $('#subject_title').val(result.subject_title);
        $('#subject_lecture').val(result.lecture);
        $('#subject_laboratory').val(result.laboratory);
        $('#year').val(result.year);
        $('#semester').val(result.sem);
        $('#pre-reqlbl').val(result.pre_requisite);
        $('#subject_unit').val(result.units);
        $('#addsubjectlbl').text('Update Subject');
        $('#save_btnlbl').text('Update');
        $('#subject_id').text(id);
        $('#subject_modal').modal('show');

            }
    });
});
});

$(document).on('click','#add_sub', function(){

  var currtitle = '<?php echo $_GET['curriculumtitle'] ?>';
  //for subject pre-requsite selection
  $.ajax({  
    url:"process.php",  
    method:"post",  
    data:{"prereq":1,currtitle:currtitle},  
    success:function(data)
    {
      $('#pre-req').html(data);
      $('#subject_modal').modal('toggle');
      $('#subject_modal').modal('show');
    }
    });
});

//for second semester
$(document).on('click','#add_sub2', function(){

  var currtitle = '<?php echo $_GET['curriculumtitle'] ?>';
  //for subject pre-requsite selection
  $.ajax({  
    url:"process.php",  
    method:"post",  
    data:{"prereq":1,currtitle:currtitle},  
    success:function(data)
    {   
      $('#pre-req').html(data);
      $('#subject_modal').modal('toggle');
      $('#subject_modal').modal('show');
    }
    });
});

//for summer
$(document).on('click','#add_sub3', function(){

  var currtitle = '<?php echo $_GET['curriculumtitle'] ?>';
  //for subject pre-requsite selection
  $.ajax({  
    url:"process.php",  
    method:"post",  
    data:{"prereq":1,currtitle:currtitle},  
    success:function(data)
    {   
      $('#pre-req').html(data);
      $('#subject_modal').modal('toggle');
      $('#subject_modal').modal('show');
    }
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

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

</body>

</html>
