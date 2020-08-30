<!-- Head -->
<?php require '../../src/layout/enlistment/head.php'; ?>
<head>
<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- <style>  
           #searchstudlist ul{  
                background-color:#ccc;  
                cursor:pointer;  
           }  
           #searchstudlist li{  
                padding:12px;  
           }
           </style>     -->       

  <title>GRC System | Enlistment</title>

</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/enlistment/side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">


      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/enlistment/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid" style="z-index: 0;">
          

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Advising</li>
  </ol>
</nav>



<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">




<div class="close-divs">  
  <div class="form-group">

    <input type="text" class="form-controls" id="searchstud" aria-describedby="emailHelp" placeholder="Student Number" maxlength="13" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
    
    <div class="sample-lines" style=" overflow: auto;">
      <div class="show-result-searchs">
        <span id="searchstudlist"></span>
      </div>              
    </div>

  </div>
</div>






    </div>
    <div class="col-sm">
    </div>
  </div>
</div>







<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>


<div class="container m-0" id="studdata">
  <div class="row">
    <div class="col-sm">
      Name:
    </div>

    <div class="col-sm">
      Course:
    </div>

    <div class="col-sm">
      Year: 
    </div>
  </div>
</div>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>


              <!-- Example 2 -->
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0"><button type="button" id="multi" class="edit-user pull-xs-right" style="display: none" ripple><i class="fas fa-check-double"></i> MULTI-SELECT</button> <button type="button" id="multi-cancel" class="delete-user pull-xs-right" style="display: none" ripple><i class="fas fa-times"></i> CANCEL</button> <button type="button" id="multi-save" class="view-user pull-xs-right" style="display: none" ripple><i class="fas fa-check"></i> SELECT</button> Need to take</h6>

<a>
       <button type="button" id="studsched" class="delete-user pull-xs-right edit" ripple style="display: none"><i class="fas fa-calendar"></i> STUDENT'S SCHEDULE</button> &nbsp;&nbsp;&nbsp;
      <button type="button" id="viewgrades" class="view-user pull-xs-right edit" ripple style="display: none"><i class="fas fa-eye"></i> VIEW ALL GRADES</button>
      
</a>      


                </div>
                <div class="card-body">




<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col" class="checked" style="display:none">Select</th>
      <th scope="col">Sub Code</th>
      <th scope="col">Sub Title</th>
      <th scope="col">Year Level</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Unit</th>
      <th scope="col">Pre-Req</th>
      <th scope="col" class="availbtn">Available</th>
    </tr>
  </thead>
  <tbody id="studentsubj">

  </tbody>
  <tfoot class="table-borderless">
   
  </tfoot>
</table>
</div>  

<?php require 'available-sched.php'; ?>


                </div>
              </div>





<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>



              <!-- Example 4 -->
              <div class="card shadow-sm mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold">Selected Schedule</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                <!-- Card Body -->
                <div class="card-body">





<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Sub Code</th>
      <th scope="col">Sub Title</th>
      <th scope="col">unit</th>  
      <th scope="col">Section</th>  
      <th scope="col">Course</th>  
      <th scope="col">Major</th>  
      <th scope="col">Day</th>  
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Room</th>
      <th scope="col">Day</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Room</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="chosensched">

  </tbody>
  <tfoot class="table-borderless">
    <tr>
      <th scope="row" colspan="2">Max Unit: <label id ="maxunits">24</label></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td colspan="2">Total Unit : <label id ="totalunits">0</label></td>
      <td></td>
    </tr>
  </tfoot>
</table>
</div>
<div class="modal-footer">

<button type="button" class="cancel" id="resetchosensched" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="enlist" ripple><i class="fas fa-save"></i> ENLIST</button>

</div>


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
  <!-- End of Page Wrapper -->

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

  <script>  
 $(document).ready(function(){  

    var course = '<?php echo $_SESSION['course']; ?>';
    var major = '<?php echo $_SESSION['major']; ?>';

     $('#searchstud').keyup(function(){
          var val = $(this).val();
          if(val.length == 4) { $(this).val(val+'-'); }
          if(val.length == 7) { $(this).val(val+'-'); }
        });

  //auto search for student number
      $('#searchstud').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"autosearch":1,query:query,course:course,major:major},  
                     success:function(data)  
                     {  
                          $('#searchstudlist ').fadeIn();  
                          $('#searchstudlist').html(data);  
                     }  
                });  
           }
          $('#multi-save').hide();
          $('#multi-cancel').hide();
          $('.availbtn').show();
          $('.checked').hide();
          $('#multi').hide();
          $('#studsched').hide();
          $('#viewgrades').hide();
          document.getElementById("searchstudlist").style.display = "none";
          $('#studentsubj').html('');
          $('#chosensched').html('');  
          $('#totalunits').html('0');  
      });  
//getting student number from search to textbox
      $(document).on('click', '#searchstudlist li', function(){  
           $('#searchstud').val($(this).text());  
           $('#searchstudlist').fadeOut(); 
           var query = $(this).text();  
           
           if(query != '')  
           {
                //for student information  
                $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"getstuddata":1,query:query},  
                     success:function(data)  
                     {  
                          $('#studdata').fadeIn();  
                          $('#studdata').html(data);  
                     }  
                });  
                //for student's created schedule check
                $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"schedulecheck":1,query:query},  
                     success:function(data)  
                     {
                          if (data == 0)
                          {

                          } 
                          else
                          {
                                $('#studsched').show();
                          }
                     }  
                });  


                  var studnum = $(this).text();  
                  //for students subjects
                 $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"getstudsubj":1,studnum:studnum},  
                     success:function(data)  
                     {  
                        if(data == 0)
                        {
                          $('#searchstud').val('');
                          $('#totalunits').text('0');  
                          $('#studdata').html(' <div class="row"><div class="col-sm">Name:</div><div class="col-sm">Course:</div><div class="col-sm">Year: </div></div>');
                          $('#studentsubj').html('');
                          $('#chosensched').html('');  
                          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                          $("#failedmsg").html('Student is already Enlisted for this Semester');
                        }
                        else if (data == 1)
                        {
                          $('#searchstud').val('');
                          $('#totalunits').text('0');  
                          $('#studdata').html(' <div class="row"><div class="col-sm">Name:</div><div class="col-sm">Course:</div><div class="col-sm">Year: </div></div>');
                          $('#studentsubj').html('');
                          $('#chosensched').html('');  
                          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                          $("#failedmsg").html('Curriculum is Inactive');

                        }
                        else
                        {
                          $('#studentsubj').fadeIn();  
                          $('#studentsubj').html(data); 
                          $('#viewgrades').show();
                          $('#multi').show();
                          $('.availbtn').show();
                          $('.checked').hide();
                          $('#multi-save').hide();
                          $('#multi-cancel').hide();
                        } 
                     }  
                });  
           } 

          $('#studsched').hide();
          $('#studdata').html('<div class="row"><div class="col-sm">Name:</div> <div class="col-sm">Course:</div> <div class="col-sm">Major:</div></div>');  
          $('#studentsubj').html('');
          $('#chosensched').html('');  
      });
//autosearch for student data
      $('#searchstud').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"getstuddata":1,query:query},  
                     success:function(data)  
                     {  
                          $('#studdata').fadeIn();  
                          $('#studdata').html(data);  
                     }  
                });  
           } 
          $('#studdata').html('<div class="row"><div class="col-sm">Name:</div> <div class="col-sm">Course:</div> <div class="col-sm">Major:</div></div>');  
      });  

// view all
$(document).on('click', '#viewgrades', function(){  
  var studnum = $('#searchstud').val();  
  var encodedstudnum = window.btoa(studnum);
  window.open("view-grades?data="+encodedstudnum);
});

//get schedule
$(document).on('click', '.scheddetail', function(){  
  var id= $(this).attr("id");
  var subjtitle = $('#st'+id+'').text();
  var subjcode = $('#sid'+id+'').text();
  var subjectcode = $('#sc'+id+'').text();
  var units = $('#un'+id+'').text();
  var rowid = 'er'+id+'';
    $('#savelbl').text('SAVE');
  $('#er'+subjcode+'').hide();
  $('#subjectcode').html(subjectcode);
  $('#subjecttitle').html(" - "+subjtitle);
  $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"getscheddata":1,subjectcode:subjectcode,subjtitle:subjtitle,units:units,rowid:rowid},  
           success:function(data)  
           {  
                $('#getsched').fadeIn();  
                $('#getsched').html(data);  
           }  
        });  
});

//enlist student
 $(document).on('click', '#enlist', function(){  
 var all = {};
 var count = 0 ;
  all.studnumber = new Array();
  all.subjectcode = new Array();
  all.schedid = new Array();
  var tablelastid = $('#chosensched td').last().attr('id');
  for(i = 1; i <= tablelastid; i++) 
  {
      var get_studnumber = $('#searchstud').val();
      var sn_get = $('#cs'+i).closest('tr').find('th').attr("name");
      var get_sched_id = $('input[name=schedidsc'+i+']').val();
      if(sn_get == "" || typeof sn_get == 'undefined')
      {       
      } 
      else
      {
              all.studnumber.push(get_studnumber);
              all.schedid.push(get_sched_id);
              count++;
      }
    }
    if(count == 0)
    {     
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('Please Choose A Subject to Enlist');
    }
    else
    {
        var data = JSON.stringify(all);
        console.log(data);
        $.ajax({
        url:"process.php",
        type:"POST",
        data:{"enlist":1,data:data},
          cache:false,
        success:function(data){
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html('Student Successfully Enlisted.');
          $('#searchstud').val('');
          $('#totalunits').text('0');  
          $('#studdata').html('');
          $('#studentsubj').html('');
          $('#chosensched').html('');  
          $('#studsched').hide();
          $('#viewgrades').hide();
          $('#multi-save').hide();
          $('#multi-cancel').hide();
          $('#multi').hide();
          var all = {};
          all.subjectcode = new Array();
          all.schedid = new Array();
          all.studnumber = new Array();
        }
      });
    }

});

//reset the chosen subjects
$(document).on('click', '#resetchosensched', function(){
  $('#chosensched').html('');  
  $('#totalunits').text('0'); 
        var studnum = $('#searchstud').val();  
         //for students subjects
          $.ajax({  
              url:"process.php",  
              method:"POST",  
              data:{"getstudsubj":1,studnum:studnum},  
              success:function(data)  
              {
                if(data == 1 || data == 0 || data == '' )
                {

                }
                else
                {
                    $('#studentsubj').html(data);
                }
                
              }
            }); 
});

//reset the chosen subjects
$(document).on('click', '#studsched', function(){
  var query = $('#searchstud').val();  
  //for student's created schedule
  $.ajax({  
      url:"process.php",  
      method:"POST",  
      data:{"getstudsched":1,query:query},  
      success:function(data)  
          {
                $('#student-sched').modal('show');
                $('#getstudsched').html(data);
           }  
       });
});

//change chosen subject schedule
 $(document).on('click', '.change', function(){  
    var id= $(this).attr("id");
    var subjectcode= $('#scode'+id).text();
    var subjtitle= $('#stitle'+id+'').text();
    var units = $('#unit'+id+'').text();
    $('#savelbl').text('CHANGE');
    var rowid = id;
    $('#subjectcode').html(subjectcode);
    $('#subjecttitle').html(" - "+subjtitle);
    $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"getscheddata":1,subjectcode:subjectcode,subjtitle:subjtitle,units:units,rowid:rowid},  
           success:function(data)  
           {    
                $('#getsched').fadeIn();  
                $('#getsched').html(data);
                $('#available-modal').modal('toggle');    
                $('#available-modal').modal('show');    
           }  
        });  

  });

  //select multiple subjects
   $(document).on('click', '#multi', function(){ 
          $('.availbtn').hide();
          $('.checked').show();
          $('#multi-save').show();
          $(this).hide();
          $('#multi-cancel').show();
   }); 
  //cancel multiple subjects
   $(document).on('click', '#multi-cancel', function(){ 
          $('.availbtn').show();
          $('.checked').hide();
          $('#multi-save').hide();
          $(this).hide();
          $('#multi').show();
          $('input:checkbox').attr('checked',false);
          $('.subcheck').prop('checked', false);
   }); 


  //get multiple subjects
    $(document).on('click', '#multi-save', function(){ 
      var count = 0;
      var all = {};
      all.subjcode = new Array();
      all.rownum = new Array();
      var check = document.getElementsByName('subcheck[]');
      var sc = document.getElementsByName('sc[]');
      for(var i=0; i < check.length;i++)
      {
        if(check[i].checked)
        {
          var sc2 = $(sc[i]).text();
          var er = Number(i) + 1;
          all.subjcode.push(sc2);
          all.rownum.push(er);
        }
        else
        {
          count++;
        }
      }
      if(count == check.length)
      {
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('Select Atleast 1 subject');
      }
      else
      {
            var data = JSON.stringify(all);
            console.log(data);
            $.ajax({
            url:"process.php",
            type:"POST",
            data:{"multi-section":1,data:data},
              cache:false,
            success:function(data){
                if(data == '')
              {
                $('#multi-result').html('<h6><center>Subjects are not in the same Year or some subjects are Full</center></h6>');
              }
              else
              {
                $('#multi-result').html(data);
              }
            }
            });
            $('#multi-modal').modal('show');
      }
    });
    
 });  

 </script>  
</body>

</html>
