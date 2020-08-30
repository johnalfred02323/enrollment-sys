<!-- Head -->
<?php require '../../src/layout/admission/head.php'; 
$sisnum = $_GET['sisnum'];

?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">


  <title>GRC System | Admission</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Side Nav -->
    <?php require '../../src/layout/admission/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/admission/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="index.php">Dashboard </a></li>
                <li class="breadcrumb-item ">Student Information</li>
                <li class="breadcrumb-item ">Evaluation of Scores</li>
                <li class="breadcrumb-item ">BSIT</li>
              </ol>
            </nav>
              <div class="card shadow-sm mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 text-gray-600">Credentials</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">



                  <div class="row">
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">Lastname</small>
                        <input type="text" class="form-control" id="lname" size="18" value="" readonly>
                      </div>    
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">Firstname</small>
                        <input type="text" class="form-control" id="fname" size="18" value="" readonly>
                      </div>    
                    </div>  
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">Middlename</small>
                        <input type="text" class="form-control" id="mname" size="18" value="" readonly>
                      </div>    
                    </div>  
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">Suffix</small>
                        <input type="text" class="form-control" id="suffix" size="18" value="" readonly>
                      </div>    
                    </div>  
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">Gender</small>
                        <input type="text" class="form-control" id="gender" size="18" value="" readonly>
                      </div>    
                    </div>  
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">S.I.S</small>
                        <input type="text" class="form-control" id="sisnum" size="18" value="<?php echo $sisnum; ?>" readonly>
                      </div>    
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Course</small>
                        <input type="text" class="form-control" id="course" size="18" value="" readonly>
                      </div>    
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Major</small>
                        <input type="text" class="form-control" id="major" size="18" value="" readonly>
                      </div>    
                    </div>  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Orientation</small>
                        <input type="text" class="form-control" id="orientation" size="18" value="" readonly>
                      </div>    
                    </div>
                  </div>



                  </div>
                </div>
              </div>

              <div class="card shadow-sm mt-5 mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="m-0 font-weight-bold" id="courselbl"></h5>
                  
                  <div class="d-flex justify-content-end">
                  <button id="selectsub" class="edit-user pull-xs-right edit mr-2" style="display: none" ripple><i class="fas fa-check-circle"></i> SELECT</button>     
                  <button id="checkall" class="view-user pull-xs-right edit mr-2" style="display: none" ripple><i class="fas fa-check"></i> Check&nbsp;All</button>     
                  <button id="uncheckall" class="shift-user pull-xs-right delete mr-2" style="display: none" ripple><i class="far fa-trash-alt"></i> Uncheck&nbsp;All</button> 
                  <button id="cancelsub" class="delete-user pull-xs-right delete mr-2" style="display: none" ripple><i class="fas fa-times"></i> Cancel</button> 
                  <button id="multiselect" class="view-user bg-info border-info pull-xs-right mr-2" ripple><i class="fas fa-check-double"></i> Multi&nbsp;Select</button> 
                  </div>

                </div>
                <div class="card-body">
                  
                <div class="table-responsive">  
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" id="selectlbl" style="display:none">Select</th>
                        <th scope="col">Subject Code</th>
                        <th scope="col">Subject Title</th>
                        <th scope="col">Lec</th>
                        <th scope="col">Lab</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Pre-Req</th>
                        <th scope="col" id="actionlbl">Action</th>
                      </tr>
                    </thead>
                    <tbody id="subjectlist">
                    </tbody>
                  </table>   
                </div>


                </div>
              </div>






<!-- Modal for Schedule per Subjects -->
<div class="modal fade" id="viewsched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subcodelbl"></h5> - <h5 class="modal-title" id="subtitlelbl"></h5>
        <h5 class="modal-title" id="unitlbl" hidden></h5><h5 class="modal-title" id="tabletr" hidden></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col" colspan="4"></th> 
                <th scope="col" colspan="4" class="text-center">Lecture&nbsp;Details</th> 
                <th scope="col" colspan="4" class="text-center">Laboratory&nbsp;Details</th>
                <th scope="col" colspan="2" class="text-center"></th>                        
              </tr>                        
              <tr>
                <th scope="col">Select</th>
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
                <th scope="col">No.&nbsp;of&nbsp;Student</th>
                <th scope="col">Max.&nbsp;Student</th>                        
              </tr>
            </thead>
            <tbody id="subjectsched">
             
            </tbody>
          </table>                     
        </div>      

      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> CANCEL</button>

        <button type="button" class="save" id="savebtn" ripple><i class="fas fa-save"></i><b id="savelbl"> SAVE</b></button>        
      </div>
    </div>
  </div>
</div>









<!-- Modal for Schedule per Section -->
<div class="modal fade" id="viewsec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
              <div class="card shadow-sm mb-4" id="multi-result">
                <!-- Card Header - Accordion -->

              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> CLOSE</button>
      </div>
    </div>
  </div>
</div>



              <div class="card shadow-sm mb-4 mt-5">
                <div class="card-header">
                  <h5 class="m-0 font-weight-bold">Your Subjects and Schedule</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <caption>Total Units: <b id="totalunits">0</b></caption>
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
                    </table>                     
                  </div>
                </div>
              </div>




            <div class="d-flex justify-content-end">
               <button type="button" id="enlist" class="add-user pull-xs-right mt-3 mb-5" ripple>Last Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
<!-- Footer -->
<?php require '../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">

// Tooltip Show Slot
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

    var sisnum = '<?php echo $sisnum;?>';
     $.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"displayfullname4":1,sisnum:sisnum},
      success:function(data){
                var result = $.parseJSON(data);
                $('#fname').val(result.fname);
                $('#lname').val(result.lname);
                $('#mname').val(result.mname);
                $('#suffix').val(result.suffix);
                $('#gender').val(result.gender);
                $('#course').val(result.course);
                $('#courselbl').text(result.course);
                $('#major').val(result.major);
                $('#orientation').val(result.status);
                $('#subjectlist').html(result.subject);
      }
    });

  $(document).on( 'click', '#multiselect', function (e) {
    $(this).hide();
    $('#selectsub').show();
    $('#checkall').show();
    $('#uncheckall').show();
    $('#cancelsub').show();
    $('#selectlbl').show();
    $('.selectdata').show();
    $('#actionlbl').hide();
    $('.actiondata').hide();
  });

  $(document).on( 'click', '#cancelsub', function (e) {
    $(this).hide();
    $('#selectsub').hide();
    $('#checkall').hide();
    $('#uncheckall').hide();
    $('#multiselect').show();
    $('#selectlbl').hide();
    $('.selectdata').hide();
    $('#actionlbl').show();
    $('.actiondata').show();
    $('.checkdata').prop('checked', false);
  });


  $(document).on( 'click', '#checkall', function (e) {
      $('.checkdata').prop('checked', true);
  });

  $(document).on( 'click', '#uncheckall', function (e) {
      $('.checkdata').prop('checked', false);
  });

  //viewing of schedule
  $(document).on( 'click', '.viewsched', function (e) {
    var id = $(this).attr('id');
    var subjectcode= $('#subcode'+id).text();
    var subjecttitle= $('#title'+id).text();
    var unit= $('#subunit'+id).text();
    $('#savelbl').text(' SAVE');
    $('#subcodelbl').text(subjectcode);
    $('#subtitlelbl').text(subjecttitle);
    $('#unitlbl').text(unit);
    $('#tabletr').text(id);
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,subjectcode:subjectcode},
      success:function(data){
        $('#subjectsched').html(data);
      }
    });
  });

//delete specific chosen subject
  $(document).on('click', '.delete', function(){  
    var id= $(this).attr("id");
    var er= $(this).attr("name");
    var unit= $('#unit'+id+'').text();
    var totunits = $('#totalunits').text();
    var total = Number(totunits) - Number(unit);
    $('#totalunits').text(total);
    $('#cs'+id+'').remove();
    $('#'+er+'').show();
  });

  var er2;
//change chosen subject schedule
 $(document).on('click', '.change', function(){  
    var id= $(this).attr("id");
    var name= $(this).attr("name");
    var subjectcode= $('#scode'+id).text();
    var subjtitle= $('#stitle'+id+'').text();
    var units = $('#unit'+id+'').text();
    $('#savelbl').text(' CHANGE');
    er2 = name;
    var rowid = id;
    $('#subcodelbl').text(subjectcode);
    $('#subtitlelbl').text(subjtitle);
    $('#tabletr').text(id);
    $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"viewsched":1,subjectcode:subjectcode},  
           success:function(data)  
           {    
                $('#subjectsched').fadeIn();  
                $('#subjectsched').html(data);
                $('#viewsched').modal('toggle');    
                $('#viewsched').modal('show');    
           }  
        });  

  });

  //for saving the schedule through schedule button
  $(document).on('click', '#savebtn', function(){
    
    // if($('#savebtn').text() == " SAVE")
    // {
    //     var totalunit = Number($('#unit').text()) + Number($('#totalunits').text());
    // }
    // else
    // {
    //   var totalunit = Number($('#totalunits').text());
    // }
    var totalunit = 0;
  if(totalunit <= 24)
  {
    var count = 0;
    var er = $('#tabletr').text();
    var subjcode = $('#subcodelbl').text();
    var sc = $('#subcodelbl').text();
    var st = $('#subtitlelbl').text();
    var un = $('#unit').text();
    var check = document.getElementsByName('check[]');
    var sec = document.getElementsByName('sec[]');
    var cou = document.getElementsByName('cou[]');
    var maj = document.getElementsByName('maj[]');
    var lecd = document.getElementsByName('lecd[]');
    var lecf = document.getElementsByName('lecf[]');
    var lect = document.getElementsByName('lect[]');
    var lecroom = document.getElementsByName('lecroom[]');
    var labd = document.getElementsByName('labd[]');
    var labf = document.getElementsByName('labf[]');
    var labt = document.getElementsByName('labt[]');
    var labroom = document.getElementsByName('labroom[]');
    var id = document.getElementsByName('id[]');
    var table = document.getElementById("chosensched");
    var totalrowcount = table.rows.length;
    if(totalrowcount == 0)
    {
      var tablecount = Number(totalrowcount) + 1;
    }
    else
    {
      var tablelastid = $('#chosensched td').last().attr('id');
      var tablecount = Number(tablelastid) + 1;
    }
    for(var i=0; i < check.length;i++)
    {
      if(check[i].checked)
      {
          if($('#savebtn').text() == " SAVE")
          {
            $('#tr'+er).hide();
            $('#chosensched').append('<tr id="cs'+tablecount+'"><th scope="row" name="sc'+tablecount+'" id="sc'+tablecount+'" nowrap hidden>'+sc+'</th><td scope="row" name="subjcode'+tablecount+'" id="scode'+tablecount+'" nowrap>'+subjcode+'</td><td id="stitle'+tablecount+'" nowrap>'+st+'</td><td id="unit'+tablecount+'" nowrap>'+un+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap><button id="'+tablecount+'" name="'+er+'" class="edit-user pull-xs-right change" ripple><i class="far fa-edit"></i> CHANGE</button> <button id="'+tablecount+'"  name="tr'+er+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td><td id="'+tablecount+'" class="schedid" hidden><input name="schedidsc'+tablecount+'"  value="'+$(id[i]).text()+ '">'+$(id[i]).text()+'</input></td></tr>');
              $('#viewsched').modal('hide');

              var totunits = $('#totalunits').text();
              var total = Number(totunits) + Number(un);
              $('#totalunits').text(total); 
            }
            else
            { 
              $('#cs'+er).remove();
              $('#chosensched').append('<tr id="cs'+tablecount+'"><th scope="row" name="sc'+tablecount+'" id="sc'+tablecount+'" nowrap hidden>'+sc+'</th><td scope="row" name="subjcode'+tablecount+'" id="scode'+tablecount+'" nowrap>'+subjcode+'</td><td id="stitle'+tablecount+'" nowrap>'+st+'</td><td id="unit'+tablecount+'" nowrap>'+un+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap><button id="'+tablecount+'" name="'+er2+'" class="edit-user pull-xs-right change" ripple><i class="far fa-edit"></i> CHANGE</button> <button id="'+tablecount+'"  name="tr'+er2+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td><td id="'+tablecount+'" class="schedid" hidden><input name="schedidsc'+tablecount+'"  value="'+$(id[i]).text()+ '">'+$(id[i]).text()+'</input></td></tr>');
              $('#viewsched').modal('hide');
            }

      }
      else
      { count++;
      }
      if(check.length == count)
      {
         $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
         $("#failedmsg").html("Please Choose A Schedule First.");
      }
    }
  }
  else
  {
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
         $("#failedmsg").html("Reach Maximum units.");
  }
  });

  //get multiple subjects
    $(document).on('click', '#selectsub', function(){ 
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
                $('#multi-result').html('<h6><center>Some subject/s are Full</center></h6>');
              }
              else
              {
                $('#multi-result').html(data);
              }
            }
            });
            $('#viewsec').modal('show');
      }
    });

    //selecting section for multi-select
    $(document).on('click', '.take', function(){ 
      var section = $(this).attr('id');
      var course = $('#multi-course'+section).text();
      var major = $('#multi-major'+section).text();
      
      var table = document.getElementById("section"+section);
      var totalrowcount = table.rows.length;

      for(var i=1; i <= totalrowcount;i++)
      {
          var row = $('#row'+i).text();
          var er = 'tr'+row;
          $('#'+er).hide();
          $('#chosensched').append('<tr id="cs'+i+'"><th scope="row" name="sc'+i+'" id="sc'+i+'" nowrap hidden>'+$("#sid"+i).text()+'</th><td scope="row" name="subjcode'+i+'" id="scode'+i+'" nowrap>'+$("#sc"+i).text()+'</td><td id="stitle'+i+'" nowrap>'+$("#st"+i).text()+'</td><td id="unit'+i+'" nowrap>'+$("#unit"+i).text()+'</td><td nowrap>'+section+'</td><td nowrap>'+course+'</td><td nowrap>'+major+'</td><td nowrap>'+$("#lecd"+i).text()+'</td><td nowrap>'+$("#lecf"+i).text()+'</td><td nowrap>'+$("#lect"+i).text()+'</td><td nowrap>'+$("#lecr"+i).text()+'</td><td nowrap>'+$("#labd"+i).text()+'</td><td nowrap>'+$("#labf"+i).text()+'</td><td nowrap>'+$("#labt"+i).text()+'</td><td nowrap>'+$("#labr"+i).text()+'</td><td nowrap><button id="'+i+'" name="'+er+'" class="edit-user pull-xs-right change" ripple><i class="far fa-edit"></i> CHANGE</button> <button id="'+i+'"  name="'+er+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td><td id="'+i+'" class="schedid" hidden><input name="schedidsc'+i+'"  value="'+$("#id"+i).text()+ '">'+$("#id"+i).text()+'</input></td></tr>');
                      $('#viewsec').modal('hide');

            var totunits = $('#totalunits').text();
            var total = Number(totunits) + Number($("#unit"+i).text());
            $('#totalunits').text(total); 
      }
      $('#cancelsub').hide();
      $('#selectsub').hide();
      $('#checkall').hide();
      $('#uncheckall').hide();
      $('#multiselect').show();
      $('#selectlbl').hide();
      $('.selectdata').hide();
      $('#actionlbl').show();
      $('.actiondata').show();
      $('.checkdata').prop('checked', false);
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
      var get_studnumber = sisnum;
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
          window.location.href = 'admission-final-process?sisnum='+sisnum;
        }
      });
    }

});
  </script>

  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>
  

</body>

</html>
