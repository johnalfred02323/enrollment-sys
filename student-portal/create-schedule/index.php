<?php require '../src/layout/head.php'; require ('../../config/config.php'); ?>
  <!-- jquery -->
  <script src="../vendor/jquery/jquery-3.3.1.min.js"></script>
</head>
<body class="sb-nav-fixed">   

  <?php require '../src/layout/top-nav.php'; 
  //for student enrollment status

      $query1 = "SELECT * FROM timeframe ORDER BY id DESC";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];
      $studnum = $_SESSION['sn'];
      $query = "SELECT * FROM student_enrollment_record
      INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id WHERE student_enrollment_record.student_number = '$studnum' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";  
            $result = mysqli_query($conn, $query); 

            if(mysqli_num_rows($result) > 0)  
            {
              $count = '1';
            }
            else
            {
              $count = '0';
            }

  ?>

    <div id="layoutSidenav">

      <?php require 'side-bar.php'; ?>

        <div id="layoutSidenav_content">

          <main>
              <div class="container-fluid">

                  <nav aria-label="breadcrumb" style="margin-top: 25px;">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Schedule</li>
                    </ol>
                  </nav>

<div class="card mb-5 border-0">
  <div class="card-header border-0 bg-transparent d-flex justify-content-center">
    <div class="input-group mb-2 mt-3 col-xl-6">
      <input type="text" list="data" class="form-control" placeholder="Search Subject..." aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchtext"><datalist id="data"></datalist>
      <div class="input-group-append">
        <button class="btn btn-danger" id="searchbtn" type="button">Search</button>
      </div>
    </div>
  </div>  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped" id="subjects">
        <thead>
          <tr class="table-bordered">
            <th scope="col"></th>
            <th scope="col" colspan="4">Subject&nbsp;Details</th>
            <th scope="col" colspan="4" >Lecture&nbsp;Details</th>
            <th scope="col" colspan="4" >Other&nbsp;Details</th>
            <th scope="col" colspan="2" ></th>
          </tr>
          <tr class="table-bordered">
            <th scope="col">Action</th>
            <th scope="col">Section</th>
            <th scope="col">Subject&nbsp;Code</th>
            <th scope="col">Subject&nbsp;Title</th>
            <th scope="col">Unit</th>
            <th scope="col">Day</th>  
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Room</th>
            <th scope="col">Day</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Room</th>
            <th scope="col">No. of Student</th>
            <th scope="col">Max. Student</th>
          </tr>
        </thead>
        <tbody class="table-bordered" id="schedlist">
          <tr>
            <th colspan="15"><center>SELECT SCHEDULE</center></th>
          </tr>
        </tbody>
      </table>
    </div> 


<!-- Error Msg -->
<!-- <div class="d-flex justify-content-center mt-3">

  <div class="alert alert-dark" role="alert">
    No Result!
  </div> -->

<!-- Or
  <div class="alert alert-danger" role="alert">
  Conflic!
  </div>
-->

<!-- </div> -->
<!-- Error Msg -->

  </div>
</div>

              <div class="card shadow-sm mb-4">
                <div class="card-header">
                  <h5>Your Schedule</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="subjects">
                      <thead>
                        <tr class="table-bordered">
                          <th scope="col"></th>
                          <th scope="col" colspan="4">Subject&nbsp;Details</th>
                          <th scope="col" colspan="4" >Lecture&nbsp;Details</th>
                          <th scope="col" colspan="4" >Other&nbsp;Details</th>
                          <th scope="col" colspan="2" ></th>
                        </tr>

                        <tr class="table-bordered">
                          <th scope="col">Action</th>
                          <th scope="col">Section</th>
                          <th scope="col">Subject&nbsp;Code</th>
                          <th scope="col">Subject&nbsp;Title</th>
                          <th scope="col">Unit</th>
                          <th scope="col">Day</th>  
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Room</th>
                          <th scope="col">Day</th>
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Room</th>
                          <th scope="col">No. of Student</th>
                          <th scope="col">Max. Student</th>
                        </tr>
                      </thead>
                      <tbody class="table-bordered" id="mylist">
                      </tbody>
                    </table>

                  <b>Total Units: <label id ="totalunits">0</label></b>
                  </div>
                    <div class="d-flex justify-content-end mt-3">
                      <button type="button" class="btn btn-danger mr-3 d-flex align-items-center"><i class="fas fa-trash-alt"></i>&nbsp;Clear All</button>
                      <button type="button" class="btn btn-primary d-flex align-items-center" id="save-sched"><i class="fas fa-save"></i>&nbsp;Save</button>
                    </div>  
                </div>
              </div>
                   
              </div>
          </main>

        <?php require '../src/layout/footer.php'; ?>

      </div>

    </div>

<div class="alert-box failed">
  <i class="fas fa-exclamation-triangle"></i> <span id="failedmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
<script type="text/javascript">

    var studnum = '<?php echo $_SESSION['sn']; ?>';

    //if student have already created a schedule
             $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"createdsched":1,studnum:studnum},  
               success:function(data)  
               {    
                  $('#mylist').html(data);
                  $('#totalunits').text($('#unitcount').text());
               }  
              });

             //for subject code  
             $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"searchsubject":1,studnum:studnum},  
               success:function(data)  
               {    
                  $('#data').html(data);
               }  
              });

//getting subjects details
         $(document).on('keyup', '#searchtext', function(){
             var query = $(this).val();
              //subject details
               $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"searchscheddetails":1,query:query},  
               success:function(data)  
               { 
                  $('#schedlist').html(data);
               }  
            }); 
        });

//get schedule
          $(document).on('click', '.check', function(){
            var id = $(this).attr("id");
            var checked = document.getElementById(id);
            var check = document.getElementsByName('check[]');
            var sec = document.getElementsByName('sec[]');
            var code = document.getElementsByName('code[]');
            var title = document.getElementsByName('title[]');
            var unit = document.getElementsByName('unit[]');
            var lecday = document.getElementsByName('lecday[]');
            var lecfrom = document.getElementsByName('lecfrom[]');
            var lecto = document.getElementsByName('lecto[]');
            var lecroom = document.getElementsByName('lecroom[]');
            var labday = document.getElementsByName('labday[]');
            var labfrom = document.getElementsByName('labfrom[]');
            var labto = document.getElementsByName('labto[]');
            var labroom = document.getElementsByName('labroom[]');
            var studno = document.getElementsByName('studno[]');
            var max = document.getElementsByName('max[]');
            var lechrfrom = document.getElementsByName('lechrfrom[]');
            var lechrto = document.getElementsByName('lechrto[]');
            var labhrfrom = document.getElementsByName('labhrfrom[]');
            var labhrto = document.getElementsByName('labhrto[]');
            var table = document.getElementById("mylist");
            var totalrowcount = table.rows.length;
            if(totalrowcount == 0)
            {
              var tablecount = Number(totalrowcount) + 1;
            }
            else
            {
                var count = $('#mylist tr').last().attr('id');
                var tablecount = Number(count)+1;
            }
            for(var i=0; i < check.length;i++)
            {
              if(check[i].checked)
              {
                var counter = 0;
                var conflict = 0;
                //for maximum units 
                  var un2 = $(unit[i]).text();
                  var unit2 = $('#totalunits').text();
                  var newunit = Number(unit2)+Number(un2);
                  if(newunit > 24)
                  {
                    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#failedmsg").html('You will Reach the maximum units required');
                  }
                  else
                  {
                  for (var ii=1; ii <= tablecount; ii++)
                  {
                    var lecdaynew  = $(lecday[i]).text();
                    var labdaynew  = $(labday[i]).text();
                    var lecday2  = $('#lecday'+ii).text();
                    var labday2  = $('#labday'+ii).text();
                    var subcode  = $(code[i]).text();
                    var lecfromnew  = $(lechrfrom[i]).text();
                    var lectonew  = $(lechrto[i]).text();
                    var labfromnew  = $(labhrfrom[i]).text();
                    var labtonew  = $(labhrto[i]).text();
                    var subcode2  = $('#code'+ii).text();
                    var lecfrom2  = $('#lechrfrom'+ii).text();
                    var lecto2  = $('#lechrto'+ii).text();
                    var labfrom2  = $('#labhrfrom'+ii).text();
                    var labto2  = $('#labhrto'+ii).text();
                    //for duplicate subject
                    if(subcode == subcode2)
                    {
                      counter++;
                      check[i].checked = false;
                      (function() {
                            var $el = $('#'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#fc988d");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                    }
                    else
                    {
                       
                        if ((lecdaynew == lecday2 && lecfrom2 < lectonew && lecto2 > lectonew) || (lecdaynew == labday2 && labfrom2 < lectonew && labto2 > lectonew))
                        {
                           conflict ++;
                           check[i].checked = false;
                            (function() {
                            var $el = $('#'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                        } 
                        else if ((lecdaynew == lecday2 && lecfrom2 >= lecfromnew && lecto2 <= lectonew) || (lecdaynew == labday2 && (labfrom2 >= lecfromnew && labto2 <= lectonew)))
                        {
                           conflict ++;
                           check[i].checked = false;
                            (function() {
                            var $el = $('#'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                        }
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 <= labfromnew && labto2 >= labfromnew) || (labdaynew == lecday2 && lecfrom2 <= labfromnew && lecto2 >= labfromnew))
                          {
                            conflict ++;
                           check[i].checked = false;
                            (function() {
                            var $el = $('#'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                          } 
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 <= labtonew && labto2 >= labtonew) || (labdaynew == lecday2 && lecfrom2 <= labtonew && lecto2 >= labtonew))
                        {
                           conflict ++;
                           check[i].checked = false;
                            (function() {
                            var $el = $('#'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                        } 
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 >= labfromnew && labto2 <= labtonew)|| (labdaynew == lecday2 && lecfrom2 >= labfromnew && lecto2 <= labtonew))
                        {
                           conflict ++;
                           check[i].checked = false;
                            (function() {
                            var $el = $('#'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                        }

                      }
                    


                  }

                  if(counter == 0 && conflict == 0)
                  {
                      $('#mylist').append('<tr class="tr'+tablecount+'" id="'+tablecount+'"><td><button type="button" class="btn btn-danger d-flex align-items-center remove" id="'+tablecount+'"><i class="fas fa-trash-alt"></i>&nbsp;Remove</button></td><th name="sec'+tablecount+'" scope="row" style="white-space: nowrap;">'+$(sec[i]).text()+'</th><th id="schedid'+tablecount+'" hidden>'+id+'</th><td name="code'+tablecount+'" id="code'+tablecount+'" scope="row" style="white-space: nowrap;">'+$(code[i]).text()+'</td><td name="title'+tablecount+'" style="white-space: nowrap;">'+$(title[i]).text()+'</td> <td name="unit'+tablecount+'" id="unit'+tablecount+'" style="white-space: nowrap;">'+$(unit[i]).text()+'</td><td name="lecday'+tablecount+'" id="lecday'+tablecount+'" style="white-space: nowrap;">'+$(lecday[i]).text()+'</td><td name="lecfrom'+tablecount+'" id="lecfrom'+tablecount+'" style="white-space: nowrap;">'+$(lecfrom[i]).text()+'</td><td name="lecto'+tablecount+'" id="lecto'+tablecount+'" style="white-space: nowrap;">'+$(lecto[i]).text()+'</td><td name="lecroom'+tablecount+'" id="lecroom'+tablecount+'" style="white-space: nowrap;">'+$(lecroom[i]).text()+'</td><td name="labday'+tablecount+'" id="labday'+tablecount+'" style="white-space: nowrap;">'+$(labday[i]).text()+'</td><td name="labfrom'+tablecount+'" id="labfrom'+tablecount+'" style="white-space: nowrap;">'+$(labfrom[i]).text()+'</td><td name="labto'+tablecount+'" id="labto'+tablecount+'" style="white-space: nowrap;">'+$(labto[i]).text()+'</td><td name="labroom'+tablecount+'" id="labroom'+tablecount+'" style="white-space: nowrap;">'+$(labroom[i]).text()+'</td><td name="studno'+tablecount+'" id="studno'+tablecount+'" style="white-space: nowrap;">'+$(studno[i]).text()+'</td><td name="max'+tablecount+'" id="max'+tablecount+'" style="white-space: nowrap;">'+$(max[i]).text()+'</td><td name="lechrfrom'+tablecount+'" id="lechrfrom'+tablecount+'" style="white-space: nowrap;" hidden>'+$(lechrfrom[i]).text()+'</td><td name="lechrto'+tablecount+'" id="lechrto'+tablecount+'" style="white-space: nowrap;" hidden>'+$(lechrto[i]).text()+'</td><td name="labhrfrom'+tablecount+'" id="labhrfrom'+tablecount+'" style="white-space: nowrap;" hidden>'+$(labhrfrom[i]).text()+'</td><td name="labhrto'+tablecount+'" id="labhrto'+tablecount+'" style="white-space: nowrap;" hidden>'+$(labhrto[i]).text()+'</td></tr>');

                        var un = $(unit[i]).text();
                        var totunits = $('#totalunits').text();
                        var total = Number(totunits) + Number(un);
                        $('#totalunits').text(total); 
                  }
                  else if(counter > 0)
                  {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $("#failedmsg").html('Duplicate Entry! Please remove the current schedule to continue...');
                  }
                  else if(conflict > 0)
                  {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $("#failedmsg").html('Conflict Schedule');
                  }
                }
              }
            }
            
          });
          //remove chosen schedule
          $(document).on('click', '.remove', function(){
            var id = $(this).attr("id");
            var unit = $('#unit'+id).text();
            var unit2 = $('#totalunits').text();
            var newunit = Number(unit2)-Number(unit);
            $('#totalunits').text(newunit);
            $('.tr'+id).remove();
          });

          //save chosen schedule
          $(document).on('click', '#save-sched', function(){
            
            var count = $('#mylist tr').last().attr('id');
            var all = {};
            all.sched_id = new Array();
            for(var i = 1; i <= count; i++)
            {
              var schedid = $('#schedid'+i).text();
              if(typeof schedid == 'undefined' || schedid == '')
              {

              }
              else
              {
                  all.sched_id.push(schedid);
              }
            }
            if(count > 0)
            {
              if('<?php echo $count; ?>' == 0)
              {
              // for showing of subjects
                    var data = JSON.stringify(all);
                    console.log(data);
                    //for dislpaying
                  $.ajax({
                      url:"process.php",
                      type:"POST",
                      data:{"savesched":1,data:data,studnum:studnum},
                        cache:false,
                      success:function(data){
                        $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $("#successmsg").html('Your schedule is saved!');
                        var all = {};
                        all.sched_id = new Array();
                      }
                    });
                }
                else
                {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $("#failedmsg").html('Cannot save when status is Enrolled!');
                }
            }
          });
</script>
</html>
