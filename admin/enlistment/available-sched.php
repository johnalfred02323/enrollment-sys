 <div class="modal fade" id="available-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changebtnid" hidden></h5><h5 class="modal-title" id="subjectcode"></h5><h5 class="modal-title" id="subjecttitle"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

          
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
  <thead>
   <tr class="table-bordered">
      <th scope="col" colspan="4"></th>
      <th scope="col" colspan="4" >Lecture&nbsp;Details</th>
      <th scope="col" colspan="4" >Other&nbsp;Details</th>
      <th scope="col" colspan="2" ></th>
    </tr>
    <tr>
      <th scope="col">Take</th>
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
      <th scope="col">No. of Student</th>
      <th scope="col">Max. Student</th>
    </tr>
  </thead>
  <tbody id="getsched">

  </tbody>
</table>
</div>


<div class="modal-footer">

<button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="savebtn" ripple><i class="fas fa-save"></i> <span id="savelbl">SAVE</span></button>

</div>

        </div>
      </div>
    </div>
  </div> 

  <!-- Modal End -->

  <!-- Modal For selected schedule by student -->
 <div class="modal fade" id="student-sched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ss-changebtnid" hidden></h5><h5 class="modal-title" id="ss-subjectcode"></h5>CHOSEN SCHEDULE OF STUDENT<h5 class="modal-title" id="ss-subjecttitle"></h5>
          <button class="close" type="button" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

          
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
  <thead>
   <tr class="table-bordered">
      <th scope="col"></th>
      <th scope="col" colspan="4">Subject Details</th>
      <th scope="col" colspan="2"></th>
      <th scope="col" colspan="4" >Lecture&nbsp;Details</th>
      <th scope="col" colspan="4" >Other&nbsp;Details</th>
      <th scope="col" colspan="2" ></th>
    </tr>
    <tr>
      <th scope="col">Take</th>
      <th scope="col">Section</th>  
      <th scope="col">Subject Code</th>  
      <th scope="col">Subject Title</th>  
      <th scope="col">Units</th>  
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
      <th scope="col">No. of Student</th>
      <th scope="col">Max. Student</th>
    </tr>
  </thead>
  <tbody id="getstudsched">

  </tbody>
</table>
</div>


<div class="modal-footer">

<button type="button" class="cancel" id="ss-cancel" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="ss-savebtn" ripple><i class="fas fa-save"></i> <span id="savelbl">SAVE</span></button>

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->


<!-- Modal For Selecting many subjects at a time -->
<div class="modal fade" id="multi-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mutiple Selected Subjects</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<div class="card shadow-sm mb-4">
  <!-- Card Header - Accordion -->

  

<div id="multi-result"></div>
              </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" id="cancel-multi" ripple><i class="fas fa-times"></i> Close</button>       
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

<script type="text/javascript">
  
$(document).ready(function(){  

    //for canceling of modal for multi selected subject
    $(document).on('click', '#cancel-multi', function(){ 
      $('#multi-modal').modal('hide');
    });
    //for canceling of modal for student created schedule
    $(document).on('click', '#ss-cancel', function(){ 
      $('#student-sched').modal('hide');
    });

    //for saving the schedule through schedule button
  $(document).on('click', '#savebtn', function(){
    
    if($('#savebtn').text() == " SAVE")
    {
        var totalunit = Number($('#unit').text()) + Number($('#totalunits').text());
    }
    else
    {
      var totalunit = Number($('#totalunits').text());
    }
  if(totalunit <= 24)
  {
    var count = 0;
    var er = $('#er').text();
    var subjcode = $('#subjectcode').text();
    var sc = $('#scode').text();
    var st = $('#stitle').text();
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
            $('#'+er).hide();
            $('#chosensched').append('<tr id="cs'+tablecount+'"><th scope="row" name="sc'+tablecount+'" id="sc'+tablecount+'" nowrap hidden>'+sc+'</th><td scope="row" name="subjcode'+tablecount+'" id="scode'+tablecount+'" nowrap>'+subjcode+'</td><td id="stitle'+tablecount+'" nowrap>'+st+'</td><td id="unit'+tablecount+'" nowrap>'+un+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap><button id="'+tablecount+'" name="'+er+'" class="edit-user pull-xs-right change" ripple><i class="far fa-edit"></i> CHANGE</button> <button id="'+tablecount+'"  name="'+er+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td><td id="'+tablecount+'" class="schedid" hidden><input name="schedidsc'+tablecount+'"  value="'+$(id[i]).text()+ '">'+$(id[i]).text()+'</input></td></tr>');
              $('#available-modal').modal('hide');

              var totunits = $('#totalunits').text();
              var total = Number(totunits) + Number(un);
              $('#totalunits').text(total); 
            }
            else
            { 
              $('#cs'+er).remove();
              $('#chosensched').append('<tr id="cs'+tablecount+'"><th scope="row" name="sc'+tablecount+'" id="sc'+tablecount+'" nowrap hidden>'+sc+'</th><td scope="row" name="subjcode'+tablecount+'" id="scode'+tablecount+'" nowrap>'+subjcode+'</td><td id="stitle'+tablecount+'" nowrap>'+st+'</td><td id="unit'+tablecount+'" nowrap>'+un+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap><button id="'+tablecount+'" name="'+er+'" class="edit-user pull-xs-right change" ripple><i class="far fa-edit"></i> CHANGE</button> <button id="'+tablecount+'"  name="er'+er+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td><td id="'+tablecount+'" class="schedid" hidden><input name="schedidsc'+tablecount+'"  value="'+$(id[i]).text()+ '">'+$(id[i]).text()+'</input></td></tr>');
              $('#available-modal').modal('hide');
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

//delete specific chosen subject
  $(document).on('click', '.delete', function(){  
    var id= $(this).attr("id");
    var er= $(this).attr("name");
    var unit= $('#unit'+id).text();
    var totunits = $('#totalunits').text();
    var total = Number(totunits) - Number(unit);
    $('#totalunits').text(total);
    $('#cs'+id+'').remove();
    $('#'+er+'').show();
  });
  
});

 //for getting the schedule created by student
$(document).on('click', '#ss-savebtn', function(){

    var counter = 0;
    var count = 0;
    var er = $('#er').text();
    var subjcode = $('#subjectcode').text();
    var check = document.getElementsByName('checked[]');
    var sid = document.getElementsByName('sid[]');
    var sec = document.getElementsByName('sec[]');
    var code = document.getElementsByName('code[]');
    var title = document.getElementsByName('title[]');
    var unit = document.getElementsByName('unit[]');
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
    var table2 = document.getElementById("studentsubj");
    var totalrowcount2 = table2.rows.length;
    if(totalrowcount == 0)
    {
      var tablecount = Number(totalrowcount) + 1;
    }
    else
    {
      var tablelastid = $('#chosensched td').last().attr('id');
      var tablecount = Number(tablelastid) + 1;
    }

    for(var ii=0; ii < check.length;ii++)
    {
      if(check[ii].checked)
      {
        for(var comp=1; comp <=totalrowcount2;comp++)
            {
              var schedrowid = $('#chosensched #scode'+comp).text();
              if(schedrowid == $(code[ii]).text())
              {
                counter++;
              }
              else
              {

              }
            }
      }
    }

    if(counter > 0)
    {
         $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
         $("#failedmsg").html("Some subject have been already chosen. Please remove the subject first.");
    }
    else
    {
    for(var i=0; i < check.length;i++)
    {
      if(check[i].checked)
      {
          var er;
            for(var comp=1; comp <=totalrowcount2;comp++)
            {
              var schedrowid = $('#studentsubj #sc'+comp).text();
              if(schedrowid == $(code[i]).text())
              {
                er= 'er'+comp;
              }
              else
              {

              }
            }
                    $('#'+er).hide();
                    $('#chosensched').append('<tr id="cs'+tablecount+'"><th scope="row" name="sc'+tablecount+'" id="sc'+tablecount+'" nowrap hidden>'+$(sid[i]).text()+'</th><td scope="row" name="subjcode'+tablecount+'" id="scode'+tablecount+'" nowrap>'+$(code[i]).text()+'</td><td id="stitle'+tablecount+'" nowrap>'+$(title[i]).text()+'</td><td id="unit'+tablecount+'" nowrap>'+$(unit[i]).text()+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap><button id="'+tablecount+'" name="'+er+'" class="edit-user pull-xs-right change" ripple><i class="far fa-edit"></i> CHANGE</button> <button id="'+tablecount+'"  name="'+er+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td><td id="'+tablecount+'" class="schedid" hidden><input name="schedidsc'+tablecount+'"  value="'+$(id[i]).text()+ '">'+$(id[i]).text()+'</input></td></tr>');
                      $('#available-modal').modal('hide');

                      tablecount++;
                      var totunits = $('#totalunits').text();
                      var total = Number(totunits) + Number($(unit[i]).text());
                      $('#totalunits').text(total); 
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
    $('#student-sched').modal('hide');
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
          var er = 'er'+row;
          $('#'+er).hide();
          $('#chosensched').append('<tr id="cs'+i+'"><th scope="row" name="sc'+i+'" id="sc'+i+'" nowrap hidden>'+$("#sid"+i).text()+'</th><td scope="row" name="subjcode'+i+'" id="scode'+i+'" nowrap>'+$("#sc"+i).text()+'</td><td id="stitle'+i+'" nowrap>'+$("#st"+i).text()+'</td><td id="unit'+i+'" nowrap>'+$("#unit"+i).text()+'</td><td nowrap>'+section+'</td><td nowrap>'+course+'</td><td nowrap>'+major+'</td><td nowrap>'+$("#lecd"+i).text()+'</td><td nowrap>'+$("#lecf"+i).text()+'</td><td nowrap>'+$("#lect"+i).text()+'</td><td nowrap>'+$("#lecr"+i).text()+'</td><td nowrap>'+$("#labd"+i).text()+'</td><td nowrap>'+$("#labf"+i).text()+'</td><td nowrap>'+$("#labt"+i).text()+'</td><td nowrap>'+$("#labr"+i).text()+'</td><td nowrap><button id="'+i+'" name="'+er+'" class="edit-user pull-xs-right change" ripple><i class="far fa-edit"></i> CHANGE</button> <button id="'+i+'"  name="'+er+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td><td id="'+i+'" class="schedid" hidden><input name="schedidsc'+i+'"  value="'+$("#id"+i).text()+ '">'+$("#id"+i).text()+'</input></td></tr>');
                      $('#available-modal').modal('hide');

            var totunits = $('#totalunits').text();
            var total = Number(totunits) + Number($("#unit"+i).text());
            $('#totalunits').text(total); 
      }
      $('.availbtn').show();
      $('.checked').hide();
      $('#multi-save').hide();
      $('#multi').show();
      $('#multi-cancel').hide();
      $('#multi-modal').modal('hide');
      $('.subcheck').prop('checked', false);

    });

</script>

