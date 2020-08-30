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
    <li class="breadcrumb-item"><a href="Link-Here">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Transferee</li>
  </ol>
</nav>


<div class="container">



              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0"><input list="transferee-studnumlist" type="text" class="form-controls" id="transferee-studnum" aria-describedby="emailHelp" placeholder="S.I.S Number"></h5>
                  <datalist id="transferee-studnumlist">
                    
                  </datalist>
                </div></div>

 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->

            

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



            </div> <!-- left column End -->


            <div class="col-lg-6">  <!-- Right column Start -->

            
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
       <small class="readonly">S.I.S No.</small>
  <input id="studnum" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  


            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->





 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6">  <!-- Right column Start -->

<!-- Input Start Here -->        
<div id="" class="form-group">
       <small class="readonly">Last School Attended</small>
  <input id="school" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here --> 
</div> 

            <div class="col-lg-6">  <!-- Right column Start -->

<!-- Input Start Here -->        
<div id="" class="form-group">
       <small class="readonly">Available Curriculum</small>
  <select id="curriculumlist" spellcheck=false class="form-control" type="text" alt="login" required="" disabled="true"></select>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  
</div></div>


<div class="table-responsive">
<table class="table table-striped table-bordered" id="add-subject" style="display: none">
  <caption><button id="add-row" class="view-user pull-xs-right edit" ripple><i class="fas fa-plus"></i> ADD ROW</button> </caption>
  <thead>
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Unit</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="tabletr">
    <tr id="ad1" name="1">
      <th scope="row"><input list="data" type="text" class="input-table2 subjectcode" placeholder="Insert Subject Code" id="1" readonly="true"><datalist id="data"></datalist></th>
      <td id="stitle1">Subject Title</td>
      <td id="unit1">0</td>
      <td id="subjid1" hidden>0</td>
      <th class="d-flex justify-content-center"><button id="1" class="delete-user pull-xs-right remove" ripple><i class="far fa-trash-alt"></i> REMOVE</button></th>
    </tr>
  </tbody>
</table>
<div class="modal-footer" id="footer" style="display: none">

<a href="./"><button type="button" class="cancel" ripple><i class="fas fa-times"></i> CANCEL</button></a>

<button type="button" class="save" id="saveall" ripple><i class="fas fa-save"></i> SAVE</button>

          </div>
</div>





                </div>
              </div>



</div>

      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
</body>
<!-- Change Curriculum notif -->
<div class="modal fade" id="changecurmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Changing of Curriculum will Lead to removing of chosen subjects. Continue?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="changecur" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Save subjects notif -->
<div class="modal fade" id="savesubjmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Save Subject as Credited?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="savesubjbtn" ripple><i class="fas fa-check"></i> Yes</button>
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

</body>
<script type="text/javascript">
  $(document).ready(function(){
    //for the course 
    var course = '<?php echo $_SESSION['course']; ?>';
    var major = '<?php echo $_SESSION['major']; ?>';
    var currentcur;

    $('#studnum').val("");
      //for getting student number
      $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"transfereestudent":1,course:course,major:major},  
           success:function(data)  
           {    
                $('#transferee-studnumlist').html(data);   
           }  
        }); 

      //for getting curriculum
      $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"activecurriculum":1,course:course,major:major},  
           success:function(data)  
           {    
                $('#curriculumlist').html(data);  
                currentcur = $('#curriculumlist').val();
           }  
        }); 



        $('#transferee-studnum').keyup(function(){ 
           var query = $(this).val(); 
           currentcur = 'Choose Curriculum'; 
           $('#curriculumlist').val('Choose Curriculum');
           $('.subjectcode').prop('readonly', true);
           // for reset of chosen subjects
           $("#add-subject > tbody").empty();
          var table = document.getElementById("add-subject");
          var totalrowcount = table.rows.length;
          $('#add-subject').append('<tr id="ad'+totalrowcount+'" name="'+totalrowcount+'"><th scope="row"><input list="data" type="text" class="input-table2 subjectcode" placeholder="Insert Subject Code" id="'+totalrowcount+'" readonly="true"><datalist id="data"></datalist></th><td id="stitle'+totalrowcount+'">Subject Title</td><td id="unit'+totalrowcount+'">0</td><td id="subjid'+totalrowcount+'" hidden></td><td class="d-flex justify-content-center"><button id="'+totalrowcount+'" class="delete-user pull-xs-right remove" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');

          $.ajax({  
               url:"process.php",  
               method:"POST",  
               data:{"transfereedetails":1,query:query,course:course,major:major},  
               success:function(data)  
               {    
                  var result = $.parseJSON(data);
                  $('#studnum').val(result.studnum);
                  $('#fname').val(result.firstname);
                  $('#lname').val(result.lastname);
                  $('#mname').val(result.middlename);
                  $('#school').val(result.school);

                  if($('#fname').val() == '')
                  {
                       document.getElementById("curriculumlist").disabled = true;
                       $('#add-subject').hide();
                       $('#footer').hide();
                  }
                  else
                  {
                       document.getElementById("curriculumlist").disabled = false;
                       $('#add-subject').show();
                       $('#footer').show();
                  }
               }  
            }); 
        });

         $(document).on('change', '#curriculumlist', function(){ 
            var cur = $(this).val();
            var table = document.getElementById("tabletr");
            var totalrowcount = table.rows.length; 
            if(currentcur != 'Choose Curriculum')
            {
              $('#changecurmodal').modal('show');
              $('#changecurmodal').on('click', '#changecur', function(){ 
              $('#changecurmodal').modal('hide');
                //for getting curriculum
            $.ajax({  
                 url:"process.php",  
                 method:"POST",  
                 data:{"checkcurriculum":1,cur:cur,course:course,major:major},  
                 success:function(data)  
                 {    
                      if(data == 1)
                      {
                       $('input[type="text"], textarea').prop("readonly",false);
                       document.getElementById("lname").readOnly = true;
                       document.getElementById("fname").readOnly = true;
                       document.getElementById("mname").readOnly = true;
                       document.getElementById("school").readOnly = true;
                       document.getElementById("studnum").readOnly = true;
                       document.getElementById("curriculumlist").disabled = false;

                          $.ajax({  
                           url:"process.php",  
                           method:"POST",  
                           data:{"searchsubject":1,cur:cur},  
                           success:function(data)  
                           {    
                              $('#data').html(data);
                           }  
                        });
                      }
                      else
                      {
                        $('input[type="text"], textarea').prop("readonly",true);
                       document.getElementById("lname").readOnly = true;
                       document.getElementById("fname").readOnly = true;
                       document.getElementById("mname").readOnly = true;
                       document.getElementById("school").readOnly = true;
                       document.getElementById("studnum").readOnly = true;
                       document.getElementById("curriculumlist").disabled = false;
                      }
                 }  
              }); 
                      currentcur = cur;
                      // for reset of chosen subjects
                      $("#add-subject > tbody").empty();
                      var table = document.getElementById("add-subject");
                      var totalrowcount = table.rows.length;
                     $('#add-subject').append('<tr id="ad'+totalrowcount+'" name="'+totalrowcount+'"><th scope="row"><input list="data" type="text" class="input-table2 subjectcode" placeholder="Insert Subject Code" id="'+totalrowcount+'" readonly="true"><datalist id="data"></datalist></th><td id="stitle'+totalrowcount+'">Subject Title</td><td id="unit'+totalrowcount+'">0</td><td id="subjid'+totalrowcount+'" hidden></td><td class="d-flex justify-content-center"><button id="'+totalrowcount+'" class="delete-user pull-xs-right remove" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');

              });
              $('#changecurmodal').on('click', '.no', function(){ 
              $('#changecurmodal').modal('hide');
                $('#curriculumlist').val(currentcur);
              });
            }
            else
            {
              currentcur = cur;
              //for getting curriculum
            $.ajax({  
                 url:"process.php",  
                 method:"POST",  
                 data:{"checkcurriculum":1,cur:cur,course:course,major:major},  
                 success:function(data)  
                 {    
                      if(data == 1)
                      {
                       $('input[type="text"], textarea').prop("readonly",false);
                       document.getElementById("lname").readOnly = true;
                       document.getElementById("fname").readOnly = true;
                       document.getElementById("mname").readOnly = true;
                       document.getElementById("school").readOnly = true;
                       document.getElementById("studnum").readOnly = true;
                       document.getElementById("curriculumlist").disabled = false;

                          $.ajax({  
                           url:"process.php",  
                           method:"POST",  
                           data:{"searchsubject":1,cur:cur},  
                           success:function(data)  
                           {    
                              $('#data').html(data);
                           }  
                        });
                      }
                      else
                      {
                        $('input[type="text"], textarea').prop("readonly",true);
                       document.getElementById("lname").readOnly = true;
                       document.getElementById("fname").readOnly = true;
                       document.getElementById("mname").readOnly = true;
                       document.getElementById("school").readOnly = true;
                       document.getElementById("studnum").readOnly = true;
                       document.getElementById("curriculumlist").disabled = false;
                      }
                 }  
              }); 
            }
         });




         $('#add-row').click(function() {
          var table = document.getElementById("add-subject");
          var tablecount = table.rows.length;
          if(tablecount == 1)
          {
              var totalrowcount = '1';
          }
          else
          {
              var table = $('#add-subject tr').last().attr('name');
              var totalrowcount = Number(table)+1;
          }

          if($('#curriculumlist').val() == 'Choose Curriculum')
          {
              $('#add-subject').append('<tr id="ad'+totalrowcount+'" name="'+totalrowcount+'"><th scope="row"><input list="data" type="text" class="input-table2 subjectcode" placeholder="Insert Subject Code" id="'+totalrowcount+'" readonly="true"><datalist id="data"></datalist></th><td id="stitle'+totalrowcount+'">Subject Title</td><td id="unit'+totalrowcount+'">0</td><td id="subjid'+totalrowcount+'" hidden></td><td class="d-flex justify-content-center"><button id="'+totalrowcount+'" class="delete-user pull-xs-right remove" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');
          }
          else
          {
              $('#add-subject').append('<tr id="ad'+totalrowcount+'" name="'+totalrowcount+'"><th scope="row"><input list="data" type="text" class="input-table2 subjectcode" placeholder="Insert Subject Code" id="'+totalrowcount+'"><datalist id="data"></datalist></th><td id="stitle'+totalrowcount+'">Subject Title</td><td id="unit'+totalrowcount+'">0</td><td id="subjid'+totalrowcount+'" hidden></td><td class="d-flex justify-content-center"><button id="'+totalrowcount+'" class="delete-user pull-xs-right remove" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');
          }

        });

          $(document).on('click', '.remove', function(){
            var id = $(this).attr("id");
            document.getElementById("ad"+id).remove();
        });


         $(document).on('keyup', '.subjectcode', function(){
            var id = $(this).attr("id");
             var query = $(this).val();  
             var curriculum = currentcur; 
              //subject details
               $.ajax({  
               url:"process.php",  
               method:"POST",  
               data:{"searchsubjectdetails":1,query:query,curriculum:curriculum},  
               success:function(data)  
               {  
                   var result = $.parseJSON(data);
                  $('#stitle'+id).text(result.subtitle);
                  $('#unit'+id).text(result.units);
                  $('#subjid'+id).text(result.subjid);
               }  
            }); 
        });

  //accepting summer sched
     $('#saveall').click(function() {
      var c = 0;
      var dup = 0;
      var count = $('#add-subject tr').last().attr('name');
      var all = {};
      all.subjectid = new Array();
            for(var i = 1; i <= count; i++)
            {
              var subjid = $('#subjid'+i).text();
              var subjtitle = $('#stitle'+i).text();
              if(typeof subjtitle == 'undefined' || subjtitle == '')
              {

              }
              else
              {
                  if(subjtitle == 'Subject Title')
                  {
                    c++;
                    (function() {
                    var $el = $('#ad'+i),
                    originalColor = $el.css("background");
                    $el.css("background", "#ffc1bd");
                    setTimeout(function () {
                        $el.css("background", originalColor);
                    }, 3000); })(i);
                  }
                  else
                  {
                      var duplicate = 0;
                       //for checking if duplicate subject inputted
                        for(var ii = 1; ii <= count; ii++)
                          {
                              var subjid2 = $('#subjid'+ii).text();
                              if(typeof subjid2 == 'undefined')
                              {

                              }
                              else
                              {
                                if(subjid == subjid2)
                                  {
                                    duplicate++;
                                  }
                              }
                          }

                        if(duplicate == 1)
                        {
                                  (function() {
                                    var $el = $('#ad'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#1C00ff00");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);
                                    all.subjectid.push(subjid);

                        }
                        else
                        {
                                  (function() {
                                    var $el = $('#ad'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#a6c8ff");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);       
                                  
                                  dup++; 
                        }
                    }
              }        
            }
              if(c > 0 && dup > 0)
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Invalid Subject Code and Duplicate Subject');
                var all = {};
                all.subjectid = new Array();
              }
              else if(c > 0)
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Invalid Subject Code');
                var all = {};
                all.subjectid = new Array();
              }
              else if (dup > 0)
              {
                 $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                 $("#failedmsg").html('Duplicate Subject Code');
                 var all = {};
                 all.subjectid = new Array();
              }
              else
              {
                  $('#savesubjmodal').modal('show');
                  $('#savesubjmodal').on('click','#savesubjbtn', function(){
                      var data = JSON.stringify(all);
                      console.log(data);
                      var sisnum = $('#studnum').val();
                        $.ajax({
                        url:"process.php",
                        type:"POST",
                        data:{"savesubj":1,cur:cur,data:data,sisnum,sisnum},
                          cache:false,
                        success:function(data){
                          $('#savesubjmodal').modal('hide');
                        }
                      });
                        currentcur = 'Choose Curriculum'; 
                        $('#curriculumlist').val('Choose Curriculum');
                        $('.subjectcode').prop('readonly', true);
                        document.getElementById("curriculumlist").disabled = true;
                        $('#transferee-studnum').val('');
                         $('#add-subject').hide();
                         $('#footer').hide();
                        // for reset of chosen subjects
                        $("#add-subject > tbody").empty();
                        var table = document.getElementById("add-subject");
                        var totalrowcount = table.rows.length;
                        $('#add-subject').append('<tr id="ad'+totalrowcount+'" name="'+totalrowcount+'"><th scope="row"><input list="data" type="text" class="input-table2 subjectcode" placeholder="Insert Subject Code" id="'+totalrowcount+'" readonly="true"><datalist id="data"></datalist></th><td id="stitle'+totalrowcount+'">Subject Title</td><td id="unit'+totalrowcount+'">0</td><td id="subjid'+totalrowcount+'" hidden></td><td class="d-flex justify-content-center"><button id="'+totalrowcount+'" class="delete-user pull-xs-right remove" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');
                          $('#studnum').val('');
                          $('#fname').val('');
                          $('#lname').val('');
                          $('#mname').val('');
                          $('#school').val('');
                       $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                       $("#successmsg").html('Subject Saved successfully');
                       //for getting student number
                        $.ajax({  
                             url:"process.php",  
                             method:"POST",  
                             data:{"transfereestudent":1,course:course,major:major},  
                             success:function(data)  
                             {    
                                  $('#transferee-studnumlist').html(data);   
                             }  
                          }); 
                  });
              }
      
     });
      });
</script>


</html>
