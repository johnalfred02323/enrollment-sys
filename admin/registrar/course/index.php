<!-- Head -->
<?php 
require '../layout/head.php'; 
require ('../../../config/config.php');  
?>

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
        <?php require '../layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Course</li>
  </ol>
</nav>


<div class="card shadow-sm mb-4"> <!-- card start -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold">Courses</h6>
      <button type="button" id="add_course_btn" class="add-user pull-xs-right" ripple><i class="fas fa-plus"></i> ADD COURSE</button>
  </div>
    <div class="card-body" >
      <table id="table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Abbreviation</th>
                <th>Name</th>
                <th>Year</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
    </div>
</div> <!-- card end -->


<!-- <div class="card shadow-sm mb-4"> 
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold">Inactive Courses</h6>
  </div>
    <div class="card-body" >
      <table id="table_inactive" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Abbreviation</th>
                <th>Name</th>
                <th>Major</th>
                <th>Year</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
    </div>
</div>  -->
<!-- card end -->



  <div class="modal fade" id="CHANGE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Are you sure?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>


    <div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Change Status?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>


<!-- Modal -->
<form id="modalcontent">
<div class="modal fade" id="course_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Adding Course</h5><h5 id="courseid" hidden></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <div id="coursenamediv" class="form-group">
          <input id="coursename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
              <span class="form-bar"></span>
              <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">Course Name</label>
                <erroru>
                  Course Name is required
                    <i>   
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </erroru>
        </div>

        <div id="abbrivdiv" class="form-group">
          <input id="abbriv" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
              <span class="form-bar"></span>
              <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">Course Abbreviation</label>
                <erroru>
                  Course Abbreviation is required
                    <i>   
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </erroru>
        </div>

        <div id="majordiv" class="form-group">
          <input id="major" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
              <span class="form-bar"></span>
              <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">Major</label>
                <erroru>
                  Major is required
                    <i>   
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </erroru>
                <p class="small text-dark font-weight-bold mt-1"><i class="fas fa-info-circle"></i> Leave blank if course has no Major</p>
        </div>           


        <div id="yeardiv" class="form-group">
          <input id="year" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
              <span class="form-bar"></span>
              <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">Year to be Taken</label>
                <erroru>
                  Year is required
                    <i>   
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                      </svg>
                    </i>
                </erroru>
        </div>  

  <input type="checkbox" id="uselab">
<label class="small text-dark font-weight-bold mt-1">Use of Laboratory Frequently
</label>  

      </div>
      <div class="modal-footer">
          <button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times" onclick="reset()"></i> CANCEL</button>

          <button type="button" class="save" id="addcoursebtn" ripple><i class="fas fa-save"></i> SAVE</button>        
      </div>
    </div>
  </div>
</div>
</form>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box info">
  <i class="fas fa-info-circle"></i> <span id="infomsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>
      <?php require 'add-major_modal.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>


<!-- TABLE -->
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

  <script type="text/javascript">

  $(document).ready(function() {

  function reset(){
    $('#modalcontent').trigger('reset');
  }

  function fetch_course()
  {
    $('#table').DataTable( {

        "pagingType": "full_numbers",

        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

        "pageLength": 10,

        "order": [[ 1, 'desc' ]],

        "processing" : true,
        
        "serverSide" : true,

        "ajax" : "course_active_fetch.php",

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
    // function fetch_course2()
    //   {
    //  $('#table_inactive').DataTable( {

    //     "pagingType": "full_numbers",

    //     "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

    //     "pageLength": 10,

    //     "order": [[ 1, 'desc' ]],

    //     "processing" : true,
        
    //     "serverSide" : true,

    //     "ajax" : "course_inactive_fetch.php",

    //     responsive: true,

    //     searchPlaceholder: "Search records",

    //     fixedHeader: {
    //         header: true,
    //         footer: true
    //     },

    //     language: {
    //         search: "_INPUT_",
    //         searchPlaceholder: "Search..."
    //     }

    //   } );
    // }
fetch_course();
// fetch_course2();

     // for add course button
     $(document).on( 'click','#add_course_btn', function (e) {
      $('#courseid').text('0');
      $('#ModalLabel').text('Add New Course');
      $('#addcoursebtn').text('SAVE');
      $('#course_modal').modal('show');
      $('#majordiv').show();
      $('#coursename').val('');
      $('#major').val('');
      $('#year').val('');
      $('#abbriv').val('');
     });

     // for editing of course details
     $(document).on( 'click','.edit', function (e) {
      var cid = $(this).attr('id');
      $('#courseid').text(cid);
      $('#ModalLabel').text('Update Course');
      $('#addcoursebtn').text('UPDATE');
      $('#majordiv').hide();
      $('#course_modal').modal('show');
      $.ajax({
        url:'process.php',
        method:'POST',
        data:{"editcourse":1,cid:cid},
        success:function(data)
        {
          var result = $.parseJSON(data);
          $('#coursename').val(result.coursename);
          $('#year').val(result.year);
          $('#major').val(result.major);
          $('#abbriv').val(result.abbriv);
          if(result.uselab == 'Yes')
          {
            $('#uselab').prop('checked', true);
          }
          else
          {
            $('#uselab').prop('checked', false);
          }
        }
      });
     });

     //to enable first modal
     $(document).on( 'click','.overlay', function (e) {
            $('#add-major').css('overflow-y', 'auto');
     });

     // for editing of course details
     $(document).on( 'click','.addmajor', function (e) {
      var cid = $(this).attr('id');
      $('#add-major').modal('show');
      $.ajax({
        url:'process.php',
        method:'POST',
        data:{"editcourse":1,cid:cid},
        success:function(data)
        {
          var result = $.parseJSON(data);
          $('#coursename2').val(result.coursename);
          $('#year2').val(result.year);
          $('#abbriv2').val(result.abbriv);
        }
      });

      //major per course
      $.ajax({
        url:'process.php',
        method:'POST',
        data:{"majorpercourse":1,cid:cid},
        success:function(data)
        {
          $('#majors').html(data);
        }
      });
     });

     //for adding a new course
     $(document).on( 'click','#addcoursebtn', function (e) {
      var cid = $('#courseid').text();
      var buttonlbl = $(this).text();
      var cndiv = $('#coursenamediv');
      var abbdiv = $('#abbrivdiv');
      var yeardiv = $('#yeardiv');
      var coursename = $('#coursename').val();
      var abbriv = $('#abbriv').val();
      var year = $('#year').val();
      var major = $('#major').val();
      var get_lab = document.getElementById('uselab');
      var uselab;
        if(get_lab.checked == true)
        {
          uselab = 'Yes';
        }
        else
        {
          uselab = 'No';
        }

      if(coursename == '' || abbriv == '' || year == ''){
        if(coursename == ''){
          cndiv.attr('errr','');
        }
        if(abbriv == ''){
          abbdiv.attr('errr','');
        }
        if(year == ''){
          yeardiv.attr('errr','');
        }
      }
      else
      {
        $.ajax({
        url:'process.php',
        method:'POST',
        data:{"addcourse":1,coursename:coursename,abbriv:abbriv,year:year,major:major,cid:cid,buttonlbl:buttonlbl,uselab:uselab},
        success:function(data)
        {
          if(data == "0"){
            cndiv.attr('errr','');
            abbriv.attr('errr','');
            umsg.html('Course is already Available or have the same Abbrevation.');
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Curriculum Title is already exists.');
          }
          else if(data == "1"){ 
            $('#course_modal').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Course added successfully.');
            $('#table').DataTable().destroy();
            $('#table_inactive').DataTable().destroy();
            fetch_course();
            // fetch_course2();
            reset();
          }
          else if(data == "updated"){ 
            $('#course_modal').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Course updated successfully.');
            $('#table').DataTable().destroy();
            $('#table_inactive').DataTable().destroy();
            fetch_course();
            // fetch_course2();
            reset();
          }
        }
      });
      }

     });


  });
  </script>

</body>

</html>
