<!-- Head -->
<?php require '../../src/layout/grading/head.php'; 
include('../../config/config.php');

$check_sy_sem = mysqli_query($conn, "SELECT * FROM timeframe WHERE type = 'enrollment' ORDER BY id DESC LIMIT 1");
$check_sy_sem_data = mysqli_fetch_assoc($check_sy_sem);
$all_students = mysqli_query($conn ,"SELECT DISTINCT student_enrollment_record.student_number FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number");
$all_students_count = mysqli_num_rows($all_students);
$fetch_codes = mysqli_query($conn, "SELECT * FROM grade_viewing_code");
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC | Grading System | Grade Viewing</title>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Side Nav -->
    <?php require '../../src/layout/grading/side-nav.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Top Nav -->
        <?php require '../../src/layout/grading/top-nav.php'; ?>
       <!-- Begin Page Content -->
      <div class="container-fluid">
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Grade Viewing</li>
  </ol>
</nav>
<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>
      <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-5">
<div class="input-group mb-3 d-flex justify-content-center d-inline-flex">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Search</span>
  </div>
  <input type="text" class="form-controls" placeholder="E.g. '2020-01-00001'" aria-label="Search" id="search_student">
</div>
    </div>
    <div class="col-lg-3">
    </div>
  </div>
<div class="card shadow-sm mb-4"> <!-- card start -->

 <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <label class="container-check">All Courses
      <input type="checkbox" id="checkall">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSIT
      <input type="checkbox" class="checkItem" value="BSIT">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSBA
      <input type="checkbox" class="checkItem" value="BSBA">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSEntrep
      <input type="checkbox" class="checkItem" value="BSEntrep">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSA
      <input type="checkbox" class="checkItem" value="BSA">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSE
      <input type="checkbox" class="checkItem" value="BSE">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BEEd
      <input type="checkbox" class="checkItem" value="BEEd">
      <span class="checkmark-check"></span>
    </label>
    <button id="generate_code_all" class="edit-user" data-toggle="modal" data-target="#all_modal">Generate&nbsp;All</button>
  </div>

    <div class="card-body" >
      <div id="fetch_students" class="table-card">
        <div class="table-responsive table-scroll">  
          <table class="table table-striped" id="student_table">
            <thead>
              <tr class="table-bordered">
                <th scope="col">Student&nbsp;Number</th>
                <th scope="col">Name</th>
                <th scope="col">Grade&nbsp;Viewing&nbsp;Code</th>
                <th scope="col" class="align-items-center">Generate&nbsp;Code</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="4"><center>Select Course to display Student List</center></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div> <!-- card end -->

      </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>
    </div>

    <!-- Modal Start -->
    <div class="modal fade" id="all_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generate Code for All Students in all Courses</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <h6>The system will generate code for all student who currently enrolled in the <?php echo $check_sy_sem_data["semester"];?> of School Year <?php echo $check_sy_sem_data["school_year"];?>.</h6>
            <h6>Click Confirm to Generate.</h6>
            <div class="d-flex justify-content-center">
            <div id="current" class="align-items-center"></div>
            <div class="progress" style="display: none; width: 400px; margin-top: 2rem;" id="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%;" id="loading_bar">1%</div>
            </div>
            </div>
          <div class="modal-footer">
            <button type="button" style="width:100px;" class="cancel no" onclick="reset()" data-dismiss="modal" ripple><i class="fas fa-times"></i> Cancel</button>
            <button type="button" class="save" id="confirm_generate" ripple><i class="fas fa-check"></i> Confirm</button>
          </div>

          </div>
        </div>
      </div>
    </div> <!-- Modal End -->
    <div class="alert-box success" style="max-width: 500px;"> 
      <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>   
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <div class="alert-box failed" style="max-width: 500px;">
      <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">

    $(document).ready(function(){
      var get_all = [];
      var isRunning = true;
      function get_data(get_all,val) {
        var all = JSON.stringify(get_all);
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"get_students":1,all:all,semester:"<?php echo $check_sy_sem_data["semester"];?>",school_year:"<?php echo $check_sy_sem_data["school_year"];?>",val:val},
          success:function(data) {
            $('#fetch_students').html(data);
          }
        });
      }
      
      var refresh = setInterval(ref, 2000);
      function ref() {
        if(!isRunning) { }
        else {
          $('.checkItem:checked').each(function(){
            get_all.push($(this).val());
          });
          get_data(get_all);
          get_all = [];
        }
      }
      
      var i = 0;
      var width = 1;
      var id;
      var count = 0;
      $('#generate_code_all').click(function(){
        var sn = [];
        <?php while($row = mysqli_fetch_assoc($all_students)) : ?>
          sn.push('<?php echo $row["student_number"];?>');
        <?php endwhile; ?>
        console.log(sn);
        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });

        $('#confirm_generate').click(function(){
          $('#progress').show();
          i = 0;
          if(i == 0) {
            i = 1;
            var elem = $('#loading_bar');
            elem.removeClass('bg-danger');
            elem.addClass('bg-info');
            width = 1;
            var max = <?php echo $all_students_count; ?>0;
            id = setInterval(frame, max);
            
            function frame() {
              if(width >= 100) {
                clearInterval(id);
                i = 0;
                $('#all_modal').modal('hide');
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html('Code Generated Successfully');
                get_data(get_all);
                get_all = [];
              }
              else {
                var ss = sn[count];
                console.log(ss);
                if(count < <?php echo $all_students_count; ?>){
                  $.ajax({
                    url:"process.php",
                    method:"POST",
                    data:{"generate_all":1,student_num:ss},
                    success:function(data) {
                      $('#current').html(data);
                        count++;
                    }
                  });
                }
                width++;
                elem.attr('aria-valuenow',width).css('width', width + "%");
                elem.html(width + "%");
                if(width >= 75 && width < 90){
                  elem.removeClass('bg-info');
                  elem.addClass('bg-warning');
                }
                else if(width >= 90){
                  elem.removeClass('bg-warning');
                  elem.addClass('bg-danger');
                }
              }
            }
          }
        });
      });
      $('#checkall').change(function(){
        $('.checkItem').prop('checked', $(this).prop('checked'));
        if($(this).prop('checked') == true) {
           $('.checkItem:checked').each(function(){
            get_all.push($(this).val());
          });
        }
        get_data(get_all);
        get_all = [];
      });
      $('.checkItem').change(function(){
        if($(this).prop('checked') == false) {
          $('#checkall').prop('checked', false);
        }
        if($('.checkItem:checked').length == $('.checkItem').length) {
          $('#checkall').prop('checked', true);
        } 
      });

      $('.checkItem').click(function(){
        var course = $(this).val();
        
        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
        get_data(get_all);
        get_all = [];
      });
      
      $('#search_student').keyup(function(){
        var value = $(this).val();

        // $("table tr").each(function (index) {
        //     if (!index) return;
        //     $(this).find("td").each(function () {
        //         var id = $(this).text().toLowerCase().trim();
        //         var not_found = (id.indexOf(value) == -1);
        //         $(this).closest('tr').toggle(!not_found);
        //         return not_found;
        //     });
        // });
        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
          
        if(value != '') {
          get_data(get_all,value);
          get_all = [];
          isRunning = false;
        }
        else if(value == ''){
          get_data(get_all);
          get_all = [];
          isRunning = true;
        }
      });
    });

    $('#fetch_students').on('click', '.generate', function(){
      var id = $(this).attr('id');
      // 
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"generate_code":1,id:id},
        success:function(data) {
          if(data == "0") {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html(id+' has already an active code.');
          }
          else {

            $('.generate[id='+id+']').closest('td').prev('td').text(data);
            $('.generate[id='+id+']').closest('td').prev('td').css('color','green');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Code Generated for '+id+' has been set.');
          }
        }
      });
    });
    
    function reset() {
      var elem = $('#loading_bar');
      elem.attr('aria-valuenow',1).css('width', "1%");
      elem.html("1%");
      i=0;
      width=1;
      clearInterval(id);
    }
  </script>


  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>
</body>

</html>
