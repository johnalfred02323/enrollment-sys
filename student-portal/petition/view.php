<?php require '../src/layout/head.php'; // require ('../../config/config.php'); 
$subjcode = base64_decode($_GET['data']);
?>
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
                    <li class="breadcrumb-item"><a href="../petition">Petition</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Subject</li>
                  </ol>
                </nav>
              <div class="card shadow-sm mt-5 mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 id="vsubject" class="m-0"></h5>
                  <button type="button" class="btn btn-info pull-xs-right" data-toggle="modal" data-target="#confirm" ripple><i class="fas fa-user-plus"></i> Join</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="table-borderless"> 
                      <tr>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Major</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="petitionlist"> 
                    </tbody>
                      <caption>Total of Student : <label id="studentcount"></label></caption> 
                  </table>
                  </div>
                </div>
              </div>
            </div>
        </main>
        <?php require '../src/layout/footer.php'; ?>
    </div>
</div>

  <!-- Join Modal-->
  <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="join" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
    
    <h6 id="vsubject2"></h6>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="btn btn-success" id="join" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>


    <!-- Cancel Modal-->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Are you sure?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="btn btn-danger" data-dismiss="modal" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="btn btn-success" id="cancelpetition" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>


    <!-- No Student Modal-->
  <div class="modal fade" id="NoStud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">

    <h5>Petition Subject Deleted</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <a href="../petition/"><button type="button" class="btn btn-success" id="removepetition" ripple><i class="fas fa-check"></i> OK</button></a>
      </div>
      </div>
    </div>
  </div>

<!-- Alert -->
<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
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
      var subjcode = '<?php echo $subjcode; ?>';

      //for subject description
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"subjectname":1,subjcode:subjcode},
      success:function(data)
      {
          $('#vsubject').text(data); 
          $('#vsubject2').text('You want to join '+data+'?'); 
      }
      });

      //for student list
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"studentlist":1,subjcode:subjcode,studnum:studnum},
      success:function(data)
      {
          $('#petitionlist').html(data); 
          var table = document.getElementById("petitionlist");
          var totalrowcount = table.rows.length;
          $('#studentcount').text(totalrowcount);
      }
      });

      //for joining the petition request
      $(document).on('click', '#join', function(){  
            $.ajax({  
            url:"process.php",  
            method:"POST",  
            data:{"joinpetition":1,studnum:studnum,subjcode:subjcode},  
            success:function(data)  
            {
              if(data == '0')
              {
                    $('#confirm').modal('hide');
                    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#failedmsg").html('You are already listed in this petition.');
              }
              else
              {
                    $('#confirm').modal('hide');
                    $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#successmsg").html(data);
                     //for student list refresh
                    $.ajax({
                    url:"process.php",
                    method:"POST",
                    data:{"studentlist":1,subjcode:subjcode,studnum:studnum},
                    success:function(data)
                    {
                        $('#petitionlist').html(data); 
                        var table = document.getElementById("petitionlist");
                        var totalrowcount = table.rows.length;
                        $('#studentcount').text(totalrowcount);
                    }
                    });
              }
                
            }  
            });  
        });

        //delete petition
        $('#cancelpetition').click(function(){
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"deletepetition":1,studnum:studnum,subjcode:subjcode},
          success:function(data){
                     //for student list refresh
                    $.ajax({
                    url:"process.php",
                    method:"POST",
                    data:{"studentlist":1,subjcode:subjcode,studnum:studnum},
                    success:function(data)
                    {
                        $('#petitionlist').html(data); 
                        var table = document.getElementById("petitionlist");
                        var totalrowcount = table.rows.length;
                        $('#studentcount').text(totalrowcount);

                        if(totalrowcount == 0)
                        {
                          $("#NoStud").modal("show");
                        }
                        else
                        {       
                          $('#delete').modal('hide');
                          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                          $("#successmsg").html('Cancelled Successfully');
                        }
                    }
                    });
          }
          }); 
        });

    });

</script>
</body>
</html>
