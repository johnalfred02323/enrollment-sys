<?php require '../src/layout/head.php'; // require ('../../config/config.php'); ?>
  <!-- jquery -->
  <script src="../vendor/jquery/jquery-3.3.1.min.js"></script>
</head>
<body class="sb-nav-fixed">   
<?php require '../src/layout/top-nav.php'; ?>
<div id="layoutSidenav">
<?php require 'side-bar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <nav aria-label="breadcrumb" style="margin-top: 25px;">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Petition</li>
                  </ol>
                </nav>
                <div class="d-flex justify-content-end">
                    <div class="input-group mt-2 mb-4 col-xl-4 col-lg-4 col-md-3 col-sm-12 col-xs-12">
                      <input list="subjectlist" id="subjecttb" type="text" class="form-control" placeholder="Input Subject Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <datalist id="subjectlist">
                      </datalist>
                      <div class="input-group-append">
                        <button class="btn btn-danger" id="requestbtn" type="button">Request</button>
                      </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold card-text-title-head">Request List</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Subject Code</th>
                              <th scope="col">Subject Title</th>
                              <th scope="col" class="d-flex justify-content-center">Total Request</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                              <tbody id="subjectpetition">
                              </tbody>
                        </table>
                    </div>    
                  </div>
                </div>
            </div>
        </main>
        <?php require '../src/layout/footer.php'; ?>
    </div>
</div>

<!-- Modal Start -->
<div class="modal fade petreq" id="petitionreq-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="">Petition Request</h6>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Information</label>
                        <input type="text" class="form-control mb-3" id="prfullname" value="Full Name" readonly>
                        <input type="text" class="form-control mb-3" id="prcourse" value="Course" readonly>
                        <input type="text" class="form-control mb-3" id="prmajor" value="Major" readonly>
                        <input type="text" class="form-control mb-3" id="prcnum" name="phone" pattern="09+[0-9]{9}" placeholder="09*********" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                    </div>
                    </div>
                    <div class="col-lg-6"> 
                        <div class="form-group">
                        <label for="exampleInputEmail1">Your Subject request</label>
                        <input type="text" class="form-control mb-3" id="prsubjcode" readonly>
                        <input type="text" class="form-control mb-3" id="prsubjtitle"readonly>
                        <input type="text" class="form-control mb-3" id="prunit" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" ripple><i class="fas fa-times"></i> CANCEL</button>
                    <button type="button" class="btn btn-success" id="savepetition" ripple><i class="fas fa-save"></i> SAVE</button>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Modal End -->


<!-- Modal Start -->
  <div class="modal fade" id="aprrovepetition-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request Approved</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
        <p id="appproved"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" ripple><i class="fas fa-check"></i> OK</button>
        </div>

      </div>
    </div>
  </div> <!-- Modal End -->

<!-- Alert -->
<div class="alert-box warning">
  <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box info">
  <i class="far fa-info-circle"></i> <span id="infomsg"></span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
      
    $(document).ready(function() {

      var studnum = '<?php echo $_SESSION['sn']; ?>';
      var fullname = '<?php echo $_SESSION['name']; ?>';
      //for list of petition subject
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"petitionsubject":1},
      success:function(data)
      {
          $('#subjectpetition').html(data);  
      }
      });

      //for viewing of students list in a petition subject
      $(document).on('click', '.view', function(){  
          var id = $(this).attr("id");
          var subject = $('#ps'+id).text();
          var subj_code = window.btoa(subject);
          window.location.href = 'view?data='+subj_code;
       }); 

      //for searching of subject for petition
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"searchpetition":1,studnum:studnum},
      success:function(data)
      {
          $('#subjectlist').html(data);  
      }
      });

      //for Approved subject modal
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"approvesubj":1,studnum:studnum},
      success:function(data)
      {
        if(data == '0')
        {

        }
        else
        {
          $('#appproved').html(data); 
          $('#aprrovepetition-modal').modal('show'); 
        }
      }
      });

      //for viewing of student and subject info
      $(document).on('click', '#requestbtn', function(){  
          var subject = $('#subjecttb').val();
          $.ajax({
          url:"process.php",
          method:"POST",
          data:{"requestsubject":1,subject:subject,studnum:studnum},
          success:function(data)
          {
              var result = $.parseJSON(data);
              $('#prfullname').val(fullname);
              $('#prcourse').val(result.course);
              $('#prmajor').val(result.major);
              $('#prsubjcode').val(result.subject_code);
              $('#prsubjtitle').val(result.subject_title);
              $('#prunit').val(result.units);
              var subjcode = $('#prsubjcode').val();
              if(subjcode == '')
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Please Choose A Subject to be Petition');
              }
              else
              {
                $('#petitionreq-modal').modal("show");
              }
              
          }
          });
       }); 

    //save petition request
    $(document).on('click', '#savepetition', function(){   
          var subject = $('#prsubjcode').val();
          var connum = $('#prcnum').val();
          var length = $("#prcnum").val().length;
          if(connum != '' && length == '11')
          {
           $.ajax({
            url:"process.php",
            method:"POST",
            data:{"savepetition":1,studnum:studnum,subject:subject},
            success:function(data)
            {
              //table refresh for petition subject
               $.ajax({
                url:"process.php",
                method:"POST",
                data:{"petitionsubject":1},
                success:function(data)
                {
                  $('#subjectpetition').html(data);  
                }
                }); 

              if(data == '0')
              {
                $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#warningmsg").html('Subject is already Requested, Please Join on the petition subject list.');
                $('#subjecttb').val('');
              } 
              else if(data == '1')
              {
                $( "div.info" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#infomsg").html('Subject is already Approved!');
                $('#subjecttb').val('');
              }
              else
              {
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html(data);
                $('#petitionreq-modal').modal('hide');
                $('#subjecttb').val('');
              }
            }
            }); 
         }
         else
         {
                $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#warningmsg").html('Contact Number is Required And Must Be In the Correct Format.');
         }
    });

});
    </script>

</body>
</html>
