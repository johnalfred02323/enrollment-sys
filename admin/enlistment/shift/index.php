<!-- Head -->
<?php require 'layout/head.php'; ?>
<head>
<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<style>  
           #searchstudlist ul{  
                background-color:#ccc;  
                cursor:pointer;  
           }  
           #searchstudlist li{  
                padding:12px;  
           }
           </style>           

  <title>GRC System | Enlistment</title>

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
        <div class="container-fluid" style="z-index: 0;">
          

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Shifting Form</li>
  </ol>
</nav>




  <!-- Modal Start -->
  <div class="modal fade" id="subject-mdoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">SUBJECTS TAKEN</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>

        <div class="modal-body">
          

<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th colspan="9">
      
<div id="" class="col-lg-8">
      <small class="readonly">Curriculum</small>
  <input list="curriculumlist" id="curriculum" spellcheck=false class="form-control" type="text" size="18" alt="login" required=""><datalist id="curriculumlist"></datalist>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
    </th></tr>
     <tr>
      <th scope="col">Take</th>      
      <th scope="col" colspan="4">Subject Taken</th>
      <th scope="col"></th>      
      <th scope="col" colspan="3">Subject Accepted</th>
    </tr>
    <tr>
      <th scope="col" nowrap>Take</th>      
      <th scope="col" nowrap>Subject Code</th>
      <th scope="col" nowrap>Subject&nbsp;Title</th>
      <th scope="col" nowrap>Unit</th>
      <th scope="col" nowrap>Grade</th>
      <th scope="col" nowrap>-</th>      
      <th scope="col" nowrap>Subject Code</th>
      <th scope="col" nowrap>Subject&nbsp;Title</th>
      <th scope="col" nowrap>Unit</th>
    </tr>
  </thead>
  <tbody id="view-subjectlist">
    
  </tbody>
</table>
</div>




<div class="modal-footer">

<button type="button" class="cancel" data-dismiss="modal"  ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="pendingsubject" ripple><i class="fas fa-save"></i> SAVE</button>

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->



  <!-- Modal Start -->
  <div class="modal fade" id="subject-mdoal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">COMPARE</h5>
          <button class="close closecomp" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr>     
      <th scope="col">Subject Code</th>
      <th scope="col">Subject&nbsp;Title</th>
      <th scope="col">Units</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="compare-subject">
  </tbody>
</table>
</div>


<div class="modal-footer">

<button type="button" class="save closecomp" id="" data-dismiss="modal" ripple><i class="fas fa-times"></i> CANCEL</button>

          </div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->






<div class="container">



              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0"><input list="studnumlist" type="text" class="form-controls" id="studnum" aria-describedby="emailHelp" placeholder="Student Number">
                    <datalist id="studnumlist">
                    </datalist></h5>

                  <button id="view-subject" class="view-user pull-xs-right edit" data-toggle="modal" data-target="#subject-mdoal" ripple><i class="fas fa-eye"></i> VIEW SUBJECTS</button>

                </div>
                <div class="card-body">
  

 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->

            
<label id="shiftid" hidden></label>
<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">First Name</small>
  <input id="fname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  


<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">Last Name</small>
  <input id="lname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  


<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">Middle Name</small>
  <input id="mname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>

</div>
<!-- Input End Here -->  

<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">Curriculum Title</small>
  <input id="oldcur" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>

</div>
<!-- Input End Here -->  

            </div> <!-- left column End -->


            <div class="col-lg-6">  <!-- Right column Start -->

            
<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">Student Number</small>
  <input id="studnumber" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  


<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">Course</small>
  <input id="course" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
<!-- Input End Here -->  

            </div> <!-- Right column Start -->


<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">Major</small>
  <input id="major" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  

<!-- Input Start Here -->        
<div id="" class="form-group">
      <small class="readonly">Shifted Curriculum Title</small>
  <input id="shiftedcur" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>

</div>
<!-- Input End Here -->  
</div> <!-- ROW End Here -->





<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject&nbsp;Title</th>
      <th scope="col">Unit</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="chosen-subjects">
  </tbody>
</table>
</div>




<div class="modal-footer">

<button type="button" id="cancelall" class="cancel" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="saveall" ripple><i class="fas fa-save"></i> SAVE</button>

          </div>

                </div>
              </div>



</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>

<!-- FOR CANCELLING -->
  <div class="modal fade" id="cancel-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Cancel?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no overlay" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save overlay" id="canceling" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>

<!-- FOR SAVING -->
  <div class="modal fade" id="save-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Save students subjects?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no overlay" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save overlay" id="savesub" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>
<!-- FOR CHANGING OF SUBJECTS TAKEN -->
  <div class="modal fade" id="change-subj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>The subjects have different curriculum. Continue?</h5>
    <h6>(the other subjects will replace for these new chosen subjects)</h6>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no overlay" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save overlay" id="changecurr" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
   


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>


  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
    //for the course 
    var course = '<?php echo $_SESSION['course']; ?>';
    var major = '<?php echo $_SESSION['major']; ?>';

    $('#studnum').val("");
      //for getting student number with shifting form
      $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"shiftingstudent":1,course:course,major:major},  
           success:function(data)  
           {    
                $('#studnumlist').html(data);   
           }  
        }); 



        $('#studnum').keyup(function(){ 
           var studnum = $(this).val();   
           var course = '<?php echo $_SESSION['course']; ?>';
           var major = '<?php echo $_SESSION['major']; ?>';
          //for getting student details with shifting form
          $.ajax({  
               url:"process.php",  
               method:"POST",  
               data:{"shiftingstudentdetails":1,studnum:studnum,course:course,major:major},  
               success:function(data)  
               {    
                  var result = $.parseJSON(data);
                  $('#studnumber').val(result.studnum);
                  $('#shiftid').text(result.shift);
                  $('#fname').val(result.firstname);
                  $('#lname').val(result.lastname);
                  $('#mname').val(result.middlename);
                  $('#course').val(result.course);
                  $('#major').val(result.major);
                  $('#oldcur').val(result.oldcur);
               }  
            }); 
        });

        $('#view-subject').click(function(){
           var studnum = $('#studnum').val();
           $('#curriculum').val('');
          var table = document.getElementById("chosen-subjects");
          var totalrowcount = table.rows.length;
          var all = {};
          all.oldcode = new Array();
          for(var i = 0; i < totalrowcount; i++)
          {
            all.oldcode.push($('#oldcode'+i+'').text());
          }
          var data = JSON.stringify(all);
          console.log(data);
          //for getting curriculum
          $.ajax({  
               url:"process.php",  
               method:"POST",  
               data:{"activecurriculum":1,course:course,major:major},  
               success:function(data)  
               {    
                    $('#curriculumlist').html(data);  
               }  
            }); 
           $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"view-subject":1,studnum:studnum,data:data},  
           success:function(data)  
           {    
                $('#view-subjectlist').html(data);  
           }  
        }); 
        });


var checkid;
  //checkbox
    $(document).on('click', '.checkb', function(){
          checkid = $(this).attr("id");
          var cur = $('#curriculum').val();
          var id = $(this).attr("id");
          var checkBox = document.getElementById(id);
              if(checkBox.checked == true)
              {
                    $('#subject-mdoal2').modal("show");
                    //for getting curriculum
                    $.ajax({  
                        url:"process.php",  
                        method:"POST",  
                        data:{"compare-subject":1,cur:cur,id:id},  
                        success:function(data)  
                        {    
                            if(data == 0)
                            {
                                $('#compare-subject').html('<tr><th scope="row" colspan="4">No Data </th></tr>'); 
                                $("#"+id). prop("checked", false);
                            }
                            else
                            {
                                $('#compare-subject').html(data); 
                            }
                        }  
                        }); 
              }
              else 
              {
                  $('#scodenew'+id).text('');
                  $('#stitlenew'+id).text('');
                  $('#unitnew'+id).text('');
              }
      });
        //remove check
        $(document).on('click', '.closecomp', function(){
           $("#"+checkid). prop("checked", false);
           // $("#subject-mdoal").modal("toggle");
            $('#subject-mdoal').css('overflow-y', 'auto');
        });

        //getting subject with same subject definition
        $(document).on('click', '.getcompare', function(){
          var id = $(this).attr("id");
          var id2 = $('#scold').text();
          var subjid = $('#subjid'+id).text();
          var subj = $('#codecomp'+id).text();
          var title = $('#titlecomp'+id).text();
          var unit = $('#unitcomp'+id).text();
          $('#scodenew'+id2).text(subj);
          $('#stitlenew'+id2).text(title);
          $('#unitnew'+id2).text(unit);
          $('#sid'+id2).text(subjid);
          $('#subject-mdoal2').modal("hide");
          $('#subject-mdoal').css('overflow-y', 'auto');

        });

        //for getting subject with check
         $(document).on('click', '#pendingsubject', function(){

            var count = 0;
            var table = document.getElementById("view-subjectlist");
            var totalrowcount = table.rows.length;
            if($('#shiftedcur').val() != $('#curriculum').val() && $('#shiftedcur').val() != '')
            {
                $('#change-subj').modal("show");
                $(document).on('click', '#changecurr', function(){
                  $('#change-subj').modal("hide");
                  $('#chosen-subjects').text('');
                  $('#shiftedcur').val($('#curriculum').val());
                  $('#subject-mdoal').modal("hide");

                  var check = document.getElementsByName('check[]');
                  var grid = document.getElementsByName('grid[]');
                  var code = document.getElementsByName('code[]');
                  var oldcode = document.getElementsByName('scodeold[]');
                  var title = document.getElementsByName('title[]');
                  var units = document.getElementsByName('units[]');
                  var sid = document.getElementsByName('sid[]');
                  var table = document.getElementById("chosen-subjects");
                  var totalrowcount = table.rows.length;
                  if(totalrowcount == 0)
                    {
                      var tablecount = Number(totalrowcount) + 1;
                    }
                    else
                    {
                      var tablelastid = $('#chosen-subjects td').last().attr('id');
                      var tablecount = Number(tablelastid) + 1;
                    }

                  for(var i=0; i < check.length;i++)
                    {
                      if(check[i].checked)
                      {
                        $('#chosen-subjects').append(' <tr id="tr'+tablecount+'"><th id="oldcode'+tablecount+'" scope="row">'+$(oldcode[i]).text()+'</th><th scope="row">'+$(code[i]).text()+'</th><td>'+$(title[i]).text()+'</td><td>'+$(units[i]).text()+'</td><td id="subjidt'+tablecount+'" hidden>'+$(sid[i]).text()+'</td><td id="gradeid'+tablecount+'" hidden>'+$(grid[i]).text()+'</td><td class="d-flex justify-content-center" id="'+tablecount+'"><button id="'+tablecount+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVEs</button></td></tr>');
                        tablecount++;
                      }
                    }

                });
            }
            else
            {
                $('#shiftedcur').val($('#curriculum').val());
                $('#subject-mdoal').modal("hide");

                var check = document.getElementsByName('check[]');
                  var grid = document.getElementsByName('grid[]');
                var code = document.getElementsByName('code[]');
                var oldcode = document.getElementsByName('scodeold[]');
                var title = document.getElementsByName('title[]');
                var units = document.getElementsByName('units[]');
                var sid = document.getElementsByName('sid[]');
                  var table = document.getElementById("chosen-subjects");
                  var totalrowcount = table.rows.length;
                  if(totalrowcount == 0)
                    {
                      var tablecount = Number(totalrowcount);
                    }
                    else
                    {
                      var tablelastid = $('#chosen-subjects td').last().attr('id');
                      var tablecount = Number(tablelastid) + 1;
                    }


                for(var i=0; i < check.length;i++)
                  {
                    if(check[i].checked)
                    {
                      $('#chosen-subjects').append(' <tr id="tr'+tablecount+'"><th id="oldcode'+tablecount+'" scope="row">'+$(oldcode[i]).text()+'</th><th scope="row">'+$(code[i]).text()+'</th><td>'+$(title[i]).text()+'</td><td>'+$(units[i]).text()+'</td><td id="subjidt'+tablecount+'" hidden>'+$(sid[i]).text()+'</td><td id="gradeid'+tablecount+'" hidden>'+$(grid[i]).text()+'</td><td class="d-flex justify-content-center" id="'+tablecount+'"><button id="'+tablecount+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');
                        tablecount++;
                    }
                  }
            }
         });
         //delete specific credited grades
          $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            document.getElementById("tr"+id).remove();
        });

          //for cancelling of info
        $(document).on('click', '#cancelall', function(){

          if($('#fname').val() != '')
          {
          $('#cancel-shift').modal('show');
            $(document).on('click', '#canceling', function(){
                  $('#shiftid').text('');
                  $('#studnum').val('');
                  $('#studnumber').val('');
                  $('#fname').val('');
                  $('#lname').val('');
                  $('#mname').val('');
                  $('#course').val('');
                  $('#major').val('');
                  $('#oldcur').val('');
                  $('#shiftedcur').val('');
                  $('#studnum').text('');
                  $('#chosen-subjects').text('');
                  $('#cancel-shift').modal('hide');
            });
          }
          else
          {

          }
        });  
         //save subjects
          $(document).on('click', '#saveall', function(){

          if($('#fname').val() != '')
          {
          $('#save-shift').modal('show');
                $(document).on('click', '#savesub', function(){
                var studnumber = $('#studnumber').val();
                var all = {};
                all.subjectcode = new Array();
                all.grade_id = new Array();      
                all.curr_from = new Array();       
                all.curr_to = new Array();     
                //get table count
                var table = document.getElementById("chosen-subjects");
                var totalrowcount = table.rows.length;  

                //other variable data
                var shiftid = $('#shiftid').text();   
                var get_curr_from = $('#oldcur').val();        
                var get_curr_to = $('#shiftedcur').val(); 

                for(i = 0; i < totalrowcount; i++) 
                {
                  var get_gradeid = $('#gradeid'+i).text();
                  var get_subjid = $('#subjidt'+i).text();
                  all.subjectcode.push(get_subjid);
                  all.grade_id.push(get_gradeid);
                  all.curr_from.push(get_curr_from);
                  all.curr_to.push(get_curr_to);
                }    
                var data = JSON.stringify(all);
                console.log(data);
                $.ajax({
                url:"process.php",
                type:"POST",
                data:{"creditsubject":1,data:data,shiftid:shiftid,studnumber:studnumber},
                  cache:false,
                success:function(data){
                  alert(data);
                  $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#successmsg").html('Crediting of subject/s Successful.');
                  $('#studnum').val('');
                  $('#studnumber').val('');
                  $('#fname').val('');
                  $('#lname').val('');
                  $('#mname').val('');
                  $('#course').val('');
                  $('#major').val('');
                  $('#oldcur').val('');
                  $('#shiftedcur').val('');
                  $('#studnum').text('');
                  $('#chosen-subjects').text('');
                  $('#save-shift').modal('hide');
                  all.studnumber = new Array();
                  all.subjectcode = new Array();
                  all.grade_id = new Array();      
                  all.curr_from = new Array();       
                  all.curr_to = new Array();    
                }
                });
            });
            }
            else
            {

            }
        });


      });
  




  </script>

</body>

</html>
