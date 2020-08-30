<?php require '../src/layout/head.php'; require ('../../config/config.php'); 
$sn = $_COOKIE['sn'];
$get_student = mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, student_info.student_number, course.course_abbreviation as course, course.course_major as major FROM student_info INNER JOIN course ON student_info.course_id = course.course_id WHERE student_number = '".$sn."'") or die(mysqli_error($conn));
$get_student_data = mysqli_fetch_assoc($get_student);

?>
  <!-- jquery -->
  <script src="../vendor/jquery/jquery-3.3.1.min.js"></script>
</head>
<body class="sb-nav-fixed" oncontextmenu="return false;">   
<?php require '../src/layout/top-nav.php'; ?>
<div id="layoutSidenav">
    <?php require 'side-bar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <nav aria-label="breadcrumb" style="margin-top: 25px;">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Grade Report</li>
                  </ol>
                </nav>

                    <div class="card shadow mb-4"> <!-- card start -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold card-text-title-head">Grade Report</h6>
                        </div>
                        <div id="grades" class="card-body noselect blur" style="min-height: 500px;">
                            <div class="row mb-4 p-2">
                                <div class="col-sm-5">
                                    <span class="h6">Name:&nbsp;<span class="h4 text-uppercase"><?php echo $get_student_data['lastname'].', '.$get_student_data['firstname'].' '.substr($get_student_data['middlename'], 0,1).'.'; ?></span></span>  
                                </div>
                                <div class="col-sm-3">
                                    <span class="h6">Student&nbsp;Number:&nbsp;<span class="h4"><?php echo $get_student_data['student_number'];?></span></span>  
                                </div>
                                <div class="col-sm-2">
                                    <span class="h6">Year/Level:&nbsp;<span class="h4 text-uppercase">III</span></span>  
                                </div>
                                <div class="col-sm-2">
                                    <span class="h6">Course/Major:&nbsp;<span class="h4 text-uppercase"><?php echo $get_student_data['course'].'/'.$get_student_data['major'];?></span></span>  
                                </div>
                            </div> 
                            <div class="p-2 dt-view">
                                <div class="row p-2 dt-header mx-auto">
                                    <div class="col-sm-1" style="border-right: 1px solid #ccc;">
                                        <span class="h4">Subject Code</span>
                                    </div>
                                    <div class="col-sm-5" style="border-right: 1px solid #ccc;">
                                        <span class="h4">Subject Description</span>
                                    </div>
                                    <div class="col-sm-1" style="border-right: 1px solid #ccc;">
                                        <span class="h4">Units</span>
                                    </div>
                                    <div class="col-sm-1" style="border-right: 1px solid #ccc;">
                                        <span class="h4">Final Grade</span>
                                    </div>
                                    <div class="col-sm-1" style="border-right: 1px solid #ccc;">
                                        <span class="h4">Section</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span class="h4">Professor</span>
                                    </div>
                                </div>
                                
                                <div id="grade_list">
                                    <div class="row cp-view mx-auto">
                                        <div class="col-sm-1">
                                            <span class="h6 cp-header">Subject Code:&nbsp;</span><span class="tbl-rows">SAM-PLE</span>
                                        </div>
                                        <div class="col-sm-5">
                                            <span class="h6 cp-header">Subject Description:&nbsp;</span><span class="tbl-rows">SAMPLE</span>
                                        </div>
                                        <div class="col-sm-1">
                                            <span class="h6 cp-header">Units:&nbsp;</span><span class="tbl-rows">0</span>
                                        </div>
                                        <div class="col-sm-1">
                                            <span class="h6 cp-header">Final Grade:&nbsp;</span><span class="tbl-rows">
                                              2.00</span>
                                        </div>
                                        <div class="col-sm-1">
                                            <span class="h6 cp-header">Section:&nbsp;</span><span class="tbl-rows">SAMPLE</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="h6 cp-header">Professor:&nbsp;</span><span class="tbl-rows">SAMPLE</span>
                                        </div>
                                    </div>  
                                </div>
                            </div>                  
                        </div>


<div class="code" id="code_form">

<label class="d-flex d-flex justify-content-center text-uppercase font-weight-bold">ENTER GRADE VIEWING CODE</label>

  <div class="row"> <!-- ROW Start Here -->
    <div class="col-lg d-flex justify-content-center"> <!-- left column Start -->    

      <input type="text" class="box-code m-1 viewing-code" id="1" maxlength="1">
      <input type="text" class="box-code m-1 viewing-code" id="2" maxlength="1">
      <input type="text" class="box-code m-1 viewing-code" id="3" maxlength="1">
      <input type="text" class="box-code m-1 viewing-code" id="4" maxlength="1">
      <input type="text" class="box-code m-1 viewing-code" id="5" maxlength="1">
      <input type="text" class="box-code m-1 viewing-code" id="6" maxlength="1">
    </div> <!-- left column End -->

    
  </div> <!-- ROW End Here -->    
    <div class="row mt-2"> <!-- ROW Start Here -->
        <div class="col-sm d-flex justify-content-center m-0 p-0">
        <button class="btn btn-danger" id="enter_code">Enter Code</button>
        </div>
    </div> <!-- ROW End Here --> 
</div>

                    </div>
            </div>
        </main>
<?php require '../src/layout/footer.php'; ?>
    </div>
</div>
<div class="alert-box failed" style="max-width: 650px;">
  <i class="fas fa-times-circle"></i> <span id="failedmsg">Failed!</span>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
<div class="alert-box warning" style="max-width: 650px;">
  <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Warning!</span>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="modal fade" id="confirm_code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title">Attention <i class="fas fa-exclamation" style="color: red;"></i><i class="fas fa-exclamation" style="color: red;"></i></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
        </div>
        <div class="modal-body">
            <h5>You can use the Grade Viewing Code only once.</h5>
            <h6>Click Confirm to Proceed.</h6>
        </div>
            <div class="modal-footer"> <!-- Footer -->
                <button type="button" class="btn btn-danger" data-dismiss="modal" ripple><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary" id="confirm_code_btn" ripple><i class="fas fa-check"></i> Confirm</button>
            </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    document.onkeydown = function(e) {
      if(event.keyCode == 123) {
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
         return false;
      }
      if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
         return false;
      }
    }

    $(document).ready(function(){
        $('.viewing-code:first').focus();
    });

    $('.viewing-code').keyup(function(){
        if($(this).val().length == 1) {
          var num = $(this).attr('id');
          if(num < 7) {
            var nxx = parseInt(num)+1;
            $('.viewing-code[id="'+nxx+'"]').focus();
          }
        }
    });

    $('#enter_code').click(function(){
        var code = '';
        var cc = 0;
        $('.viewing-code').each(function(){
            code = code + $(this).val().toUpperCase();
            cc++;
        });
        if(code > 6) {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Incorrect. Please, enter your grade viewing code to view your Grades.');
        }
        else {
            $('#confirm_code').modal('show');
            $('#confirm_code_btn').click(function(){
                $.ajax({
                    url:"process.php",
                    method:"POST",
                    data:{"get_code":1,code:code,sn:"<?php echo $sn; ?>"},
                    success:function(data){
                        if(data == "2"){
                            $('.viewing-code').val('');
                            $('.viewing-code[id=dash]').val('-');
                            $('.viewing-code:first').focus();
                            next = 0;
                            $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                            $("#warningmsg").html('Incorrect Code. Please, enter again.');
                        }
                        else if(data == "3"){
                            $('.viewing-code').val('');
                            $('.viewing-code[id=dash]').val('-');
                            $('.viewing-code:first').focus();
                            next = 0;
                            $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                            $("#warningmsg").html('Your code has passed the expiration date.');
                        }
                        else {
                            $('#code_form').animate({opacity: 0.25,left: "+=50",height:"toggle"},800);
                            $('#grades').removeClass('blur');
                            $('#grade_list').html(data);
                        }
                        $('#confirm_code').modal('hide');
                    }
                });

            });
        }
        // if(code == '0000-0000'){
        //     $('#code_form').animate({opacity: 0.25,left: "+=50",height:"toggle"},800);
        //     $('#grades').removeClass('blur');
        // }
        // else {
        //     $('.viewing-code').val('');
        //     $('.viewing-code[id=dash]').val('-');
        //     $('.viewing-code:first').focus();
        //     next = 0;
        // }
    });
</script>

    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
