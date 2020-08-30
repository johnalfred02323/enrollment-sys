<!-- Head -->
<?php require '../../src/layout/grading/head.php'; 
include('../../config/config.php');

$current_sy_sem = mysqli_query($conn, "SELECT * FROM timeframe WHERE status = 'Active' AND type = 'enrollment'");
$current_sy_sem_data = mysqli_fetch_assoc($current_sy_sem);

$submit = mysqli_query($conn, "SELECT * FROM timeframe WHERE status = 'Active' AND type = 'submission'");
$submit_data = mysqli_fetch_assoc($submit);
$submit_rows = mysqli_num_rows($submit);
$flag = mysqli_query($conn, "SELECT * FROM webpages_flag");
$check_sy_sem = mysqli_query($conn, "SELECT * FROM timeframe WHERE type = 'submission' ORDER BY id DESC LIMIT 1");
$check_sy_sem_data = mysqli_fetch_assoc($check_sy_sem);

$submitted = mysqli_query($conn, "SELECT class_record.submitted, class_record.sched_id, schedule.sched_id, schedule.section, schedule.subject_code, schedule.faculty_id, schedule.school_year, user.lastname, user.firstname, user.middlename FROM class_record INNER JOIN schedule ON schedule.sched_id = class_record.sched_id INNER JOIN user ON schedule.faculty_id = user.id WHERE submitted = 1 AND schedule.school_year = '".$check_sy_sem_data['school_year']."' LIMIT 5;") or die(mysqli_error($conn));
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC | Grading System</title>

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
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
          <!-- SPACER -->
          <div class="mx-auto" style="height: 10px;"></div>

          <div class="row">
            <div class="col-lg-6">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Submission of Grades Schedule</h5>
                    <button id="s_start" class="add-user pull-xs-right edit" ripple><i class="fas fa-play"></i> START</button> 
                    <button type="button" id="s_stop" style="display: none" class="view-user pull-xs-right" ripple><i class="fas fa-stop"></i> STOP</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="text-align: center;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"><span id="s_sy"><?php echo $current_sy_sem_data['school_year'];?></span></th>
                          <th scope="col"><span id="s_sem"><?php echo $current_sy_sem_data['semester'];?></span></th>
                        </tr>
                        <tr>
                          <th scope="col" class="start">Start</th>
                          <th scope="col" class="end">End</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="date" class="date-table" id="s_datestart"></td>
                          <td><input type="date" class="date-table" id="s_dateend"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">


                <div class="d-flex justify-content-between">

                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="fac_web">
                    <label class="custom-control-label" for="fac_web" data-placement="auto" data-toggle="popover2" data-trigger="hover" style="cursor: pointer;">Faculty Webpage 
                  </label>
                  </div>


                  <div id="popover-title2" style="display:none;">
                  <p>Attention: &nbsp;&nbsp;<i class="far fa-question-circle"></i></p>
                  </div>

                  <div id="popover-content2" style="display:none;">
                  <p>Enable this to Activate the Faculty Webpage.</p>
                  </div>


                  <script type="text/javascript">
                  $(document).ready(function(){
                  $("[data-toggle=popover2]").popover({
                      trigger: 'hover',
                      html: true, 
                      title: function() {
                            return $('#popover-title2').html();
                          },
                      content: function() {
                            return $('#popover-content2').html();
                          }                          
                     });
                  });
                  </script> 

                  <br/><br/>

                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="stud_web">
                    <label class="custom-control-label" for="stud_web" data-placement="auto" data-toggle="popover" data-trigger="hover" style="cursor: pointer;">Student Webpage 
                  </label>
                  </div>


                  <div id="popover-title" style="display:none;">
                  <p>Attention: <i class="far fa-question-circle"></i></p>
                  </div>

                  <div id="popover-content" style="display:none;">
                  <p>Enable this to Activate the Student Webpage.</p>
                  </div>

                  <script type="text/javascript">
                  $(document).ready(function(){
                  $("[data-toggle=popover]").popover({
                      trigger: 'hover',
                      html: true, 
                      title: function() {
                            return $('#popover-title').html();
                          },
                      content: function() {
                            return $('#popover-content').html();
                          }
                     });
                  });
                  </script> 

                  </div>

                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card shadow-sm mb-4">              
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Class Record Submitted Monitoring</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="text-align: center;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Section</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Faculty</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        while ($submitted_data = mysqli_fetch_assoc($submitted)) : ?>
                          <tr>
                            <td><?= $submitted_data['section'] ?></td>
                            <td><?= $submitted_data['subject_code'] ?></td>
                            <td><?= $submitted_data['lastname'] ?>, <?= $submitted_data['firstname'] ?> <?php echo substr($submitted_data['middlename'],0,1) ?>.</td>
                          </tr>
                        <?php endwhile;?>
                      </tbody>
                    </table>
                  </div>
                </div>
                  <a class="footer-count pt-1 pb-1 clearfix medium" href="class_records">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
              </div> <!-- Right column Start -->
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>
    </div>
    <!-- End of Content Wrapper -->
  </div>

  <div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">
    
    <h6 id="message">Are you sure?</h6>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel cancel" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="confirm" ripple><i class="fas fa-check"></i> Confirm</button>
      </div>
      </div>
    </div>
  </div>
  <div class="alert-box warning" style="max-width:550px;">
    <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<span id="warningmsg">Successful!</span>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
  <div class="alert-box success" style="max-width:550px;">
    <i class="fas fa-check"></i>&nbsp;&nbsp;<span id="successmsg"> Successful!</span>   
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
  <!-- End of Page Wrapper -->
  <script type="text/javascript">
    $(document).ready(function(){
    <?php if($submit_rows > 0) :?>
      $('[data-toggle="tooltip"]').tooltip(); 
      $('#s_datestart').val('<?= $submit_data["date_from"] ?>');
      $('#s_dateend').val('<?= $submit_data["date_to"] ?>');
      $('#s_dateend').prop('disabled',true);
      $('#s_datestart').prop('disabled',true);
      $('#s_start').hide();
      $('#s_stop').show();
    <?php endif;?>


    <?php while ($flag_data=mysqli_fetch_assoc($flag)) :
      if($flag_data['webpage'] == "faculty") : ?>
      <?php if ($flag_data['status'] == 1) { ?>
      $('#fac_web').prop("checked",true);
      <?php } else if ($flag_data['status'] == 0) { ?>
      $('#fac_web').prop("checked",false);
      <?php } ?>
    <?php endif;?>

    <?php if($flag_data['webpage'] == "student") : ?>
      <?php if ($flag_data['status'] == 1) { ?>
      $('#stud_web').prop("checked",true);
      <?php } else if ($flag_data['status'] == 0) { ?>
      $('#stud_web').prop("checked",false);
      <?php } ?>
    <?php endif;
    endwhile;?>

    $('#fac_web').click(function(){
      var flag = 0;
      if($(this).prop("checked") == true) {
        flag = 1;
      }
      else {
        flag = 0;
      }
      $.ajax({
          url:"process.php",
          method:"POST",
          data:{"fac_onoff":1,flag:flag},
          success:function(data) {
            if(data == "1") {
              $("div.success").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html("Faculty Webpage is Active");
            }
            else if(data == "0") {
              $("div.warning").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#warningmsg").html("Faculty Webpage is Inactive");
            }
          }
        });
    });

    $('#stud_web').click(function(){
      var flag = 0;
      if($(this).prop("checked") == true) {
        flag = 1;
      }
      else {
        flag = 0;
      }
      $.ajax({
          url:"process.php",
          method:"POST",
          data:{"stud_onoff":1,flag:flag},
          success:function(data) {
            if(data == "1") {
              $("div.success").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html("Student Webpage is Active");
            }
            else if(data == "0") {
              $("div.warning").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#warningmsg").html("Student Webpage is Inactive");
            }
          }
        });
    });

      $('#s_stop').click(function(){
        $('#s_start').show();
        $('#s_stop').hide();
        $('#s_datestart').prop('disabled',false);
        $('#s_dateend').prop('disabled',false);
        var id = "<?php echo $submit_data['id'];?>";
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"update_submission_timeframe":1,id:id},
          success:function(data){
            if(data != "0") {
              $("div.success").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html(data);
            }
            else {
              alert(data);
            }
          }
        });
      });

      $('#s_start').click(function(){
        var sem = $('#s_sem').html();
        var sy = $('#s_sy').html();
        var start = $('#s_datestart').val();
        var end = $('#s_dateend').val();
        if(start == "" || end == ""){
          $("div.warning").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#warningmsg").html('Start/End Date of timeframe is required.');
        }
        else{
          $('#yesorno').modal('show');
          $('#message').html(sy+' ('+sem+')<br/>Start of submission of grades: '+start+'<br/>End of submission of grades: '+end);
          $('#confirm').click(function(){
            $.ajax({
              url:"process.php",
              method:"POST",
              data:{"submission_timeframe":1,sem:sem,sy:sy,start:start,end:end},
              success:function(data){
                if(data != "0") {
                  $('#s_change_sem').attr('disabled','disabled');
                  $('#s_datestart').prop('disabled',true);
                  $('#s_dateend').prop('disabled',true);
                  $('#s_stop').show();
                  $('#s_start').hide();
                  $('#yesorno').modal('hide');
                  
                  $("div.success").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#successmsg").html(data);
                }
                else {
                  alert(data);
                }
              }
            });
          });
        }
      });
    });
  </script>
  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>
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
